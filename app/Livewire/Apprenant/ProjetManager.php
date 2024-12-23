<?php

namespace App\Livewire\Apprenant;

use Livewire\Component;
use App\Models\Enseignant;
use App\Models\Apprenant;
use App\Models\Projet;
use App\Models\Tache;
use App\Models\User;
use App\Models\Affectation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ProjetManager extends Component
{
    use WithPagination;

    use WithFileUploads;

    public $search = '';

    public $file;

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
    public $state = [];

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
        //$this->projet = Projet::all();
    }
    
    public function deliverProject()
    {
        dd("sss");

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

        $projet_affecter = Affectation::find($projetId);
        
        $this->state = [
            'id' => $projet_affecter->projet->id,
            'titre' => $projet_affecter->projet->titre,
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
        ])->validate();

        if ($this->state['id']) {

            $projet = Projet::findOrFail($this->state['id']);        
            
            // Mettre à jour les champs Projet
            $projet->titre = $this->state['titre'];
          
            $projet->save();

            session()->flash('message', 'Projet a été modifié avec succès.');
            $this->confirmingProjetUpdate = false;
            $this->reset('state');
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $affectations = auth()->user()->apprenants->classe->affectations()
            ->with('projet')
            ->where(function ($query) {
                $query->whereHas('classe', function ($query) {
                    $query->where('nom', 'like', '%' . $this->search . '%');
                });
                $query->orWhereHas('projet', function ($query) {
                    $query->where('titre', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('id', 'ASC')
            ->paginate(5);

        return view('livewire.apprenant.projet-manager', ['affectations' => $affectations]);
    }
}
