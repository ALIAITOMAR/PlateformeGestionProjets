<?php

namespace App\Livewire\Apprenant;

use Livewire\Component;
use App\Models\Enseignant;
use App\Models\Apprenant;
use App\Models\Projet;
use App\Models\Tache;
use App\Models\User;
use App\Models\Livrable;
use App\Models\Affectation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class LivrableManager extends Component
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
        $this->projet = Livrable::all();
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
        $livrables = auth()->user()->apprenants->livrables()
        ->where('description', 'like', '%'.$this->search.'%')
        ->orderBy('id','ASC')
        ->paginate(5);

        return view('livewire.apprenant.livrable-manager', ['livrables' => $livrables]);
    }
}
