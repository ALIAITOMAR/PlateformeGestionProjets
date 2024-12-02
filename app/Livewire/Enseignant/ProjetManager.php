<?php

namespace App\Livewire\Enseignant;

use Livewire\Component;
use App\Models\Enseignant;
use App\Models\Apprenant;
use App\Models\Projet;
use App\Models\Tache;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProjetManager extends Component
{
    use WithPagination;

    public $search = '';

    public $projetId;
    /**
     * The projet instance.
     *
     * @var mixed
     */
    public $projet;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [
        'id' => null,
        'titre' => null,
        'description' => null,
        'module' => null,
        'competence' => null,
        'etat' => null,
        'taches' => [
            ['titre' => '', 'description' => '']
        ]
    ];

    //public $fields = [];

    /**
     * Indicates if projet add is being confirmed.
     *
     * @var bool
     */
    public $confirmingProjetAdd = false;

    /**
     * Indicates if projet update is being confirmed.
     *
     * @var bool
     */
    public $confirmingProjetUpdate = false;

     /**
     * Indicates if projet deletion is being confirmed.
     *
     * @var bool
     */
    public $confirmingProjetDeletion = false;

     /**
     * The ID of the projet being deleted.
     *
     * @var int
     */
    public $projetIdBeingDeleted;

    /**
     * Mount the component.
     *
     * @return void
     */
    public function mount()
    {
        Auth::check() ? : abort(404);
        $this->projet = Projet::all();
    }

    public function addTache()
    {
        $this->state['taches'][] = ['titre' => '', 'description' => ''];
    }

    public function removeTache($index)
    {
        unset($this->state['taches'][$index]);
        $this->state['taches'] = array_values($this->state['taches']);
    }

    /**
     * Confirm that the given Projet should be added.
     *
     * @param  int  $projetId
     * @return void
     */
    public function confirmProjetAdd()
    {
        $this->resetErrorBag();
        $this->confirmingProjetAdd = true;
        $this->reset('state');
    }

    /**
     * Create a new Projet.
     *
     * @return void
     */
    public function createProjet()
    {
        Validator::make($this->state, [
            'titre' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'module' => ['required', 'string', 'max:255'],
            'competence' => ['required', 'string', 'max:255'],
            'etat' => ['required'],
            'taches.*.titre' => ['required', 'string', 'max:255'],
            'taches.*.description' => ['required', 'string', 'max:255'],
        ])->validate();

        DB::beginTransaction();

        try {
         
            $projet = auth()->user()->enseignants->projets()->create([
                'titre' => $this->state['titre'],
                'description' => $this->state['description'],
                'module' => $this->state['module'],
                'competence' => json_encode(explode(',', $this->state['competence'])),
                'etat' => $this->state['etat'],
            ]);

            
            foreach ($this->state['taches'] as $tache) {
                $projet->taches()->create($tache);
            }

            DB::commit();

        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            session()->flash('error', 'Une erreur s\'est produite lors de la création du apprenant.');
        }

        session()->flash('message', 'Projet a été ajouté avec succès.');

        $this->confirmingProjetAdd = false;
        
        $this->reset('state');
    }

    /**
     * Confirm that the given Projet should be updated.
     *
     * @param  int  $projetId
     * @return void
     */
    public function confirmProjetEdit($projetId)
    {
        $this->resetErrorBag();

        $projet = Projet::find($projetId);
        
        $this->state = [
            'id' => $projet->id,
            'titre' => $projet->titre,
            'description' => $projet->description,
            'module' => $projet->module,
            'competence' => json_decode($projet->competence, true),
            'etat' => $projet->etat,
            'taches' => $projet->taches->toArray(),
        ];

        $this->confirmingProjetUpdate = true;
    }
    
    /**
     * Update the Projet.
     *
     * @return void
     */
    public function updateProjet()
    {
        Validator::make($this->state, [
            'titre' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'module' => ['required', 'string', 'max:255'],
            'competence' => ['required', 'string', 'max:255'],
            'etat' => ['required'],
            'taches.*.titre' => ['required', 'string', 'max:255'],
            'taches.*.description' => ['required', 'string', 'max:255'],
        ])->validate();

        
        if ($this->state['id']) {

            $projet = Projet::findOrFail($this->state['id']);        
            
            // Mettre à jour les champs Projet
            $projet->titre = $this->state['titre'];
            $projet->description = $this->state['description'];
            $projet->module = $this->state['module'];
            $projet->competence =  json_encode(explode(',', $this->state['competence']));
            $projet->etat = $this->state['etat'];

            // Mettre à jour les champs Tache
            $tacheIds = collect($this->state['taches'])->pluck('id')->filter()->toArray();
            $projet->taches()->whereNotIn('id', $tacheIds)->delete();

            collect($this->state['taches'])->each(function ($tache) use ($projet) {
                $projet->taches()->updateOrCreate(['id' => $tache['id'] ?? null], $tache);
            });
            
            //$projet->taches()->delete();
            //$projet->taches()->createMany($this->state['taches']);

            // Mettre à jour les champs Question

            // Mettre à jour les champs Critere
             
            $projet->save();

            session()->flash('message', 'Projet a été modifié avec succès.');
            $this->confirmingProjetUpdate = false;
            $this->reset('state');
            
        }
    }

    /**
     * Confirm that the given API token should be deleted.
     *
     * @param  int  $projetId
     * @return void
     */
    public function confirmProjetDeletion($projetId)
    {
        $this->confirmingProjetDeletion = true;

        $this->projetIdBeingDeleted = $projetId;
    }

    /**
     * Delete the Projet.
     *
     * @return void
     */
    public function deleteProjet()
    {
        $projet = Projet::findOrFail($this->projetIdBeingDeleted);
        $projet->delete();
        $this->confirmingProjetDeletion = false;
        session()->flash('message', 'Projet a été supprimé avec succès.');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    /*public function updated($fields)
    {
        $this->validateOnly($fields);
    }*/
    
    public function render()
    {
        $projets = auth()->user()->enseignants->projets()
        ->where('titre', 'like', '%'.$this->search.'%')
        ->where('description', 'like', '%'.$this->search.'%')
        ->where('module', 'like', '%'.$this->search.'%')
        ->where('competence', 'like', '%'.$this->search.'%')
        ->orderBy('id','ASC')
        ->paginate(5);

        return view('livewire.enseignant.projet-manager', ['projets' => $projets]);
    }
}
