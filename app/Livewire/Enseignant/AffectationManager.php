<?php

namespace App\Livewire\Enseignant;

use Livewire\Component;
use App\Models\Enseignant;
use App\Models\Apprenant;
use App\Models\Affectation;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class AffectationManager extends Component
{
    use WithPagination;

    public $search = '';

    public $classeId;
    /**
     * The affectation instance.
     *
     * @var mixed
     */
    public $affectation;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    /**
     * Indicates if affectation add is being confirmed.
     *
     * @var bool
     */
    public $confirmingAffectationAdd = false;

    /**
     * Indicates if affectation update is being confirmed.
     *
     * @var bool
     */
    public $confirmingAffectationUpdate = false;

     /**
     * Indicates if affectation deletion is being confirmed.
     *
     * @var bool
     */
    public $confirmingAffectationDeletion = false;

     /**
     * The ID of the affectation being deleted.
     *
     * @var int
     */
    public $affectationIdBeingDeleted;

    /**
     * Mount the component.
     *
     * @return void
     */
    public function mount()
    {
        Auth::check() ? : abort(404);
        $this->affectation = Affectation::all();
    }

    /**
     * Confirm that the given Affectation should be added.
     *
     * @param  int  $classeId
     * @return void
     */
    public function confirmAffectationAdd()
    {
        $this->resetErrorBag();
        $this->confirmingAffectationAdd = true;
        $this->reset('state');
    }

    /**
     * Create a new Affectation.
     *
     * @return void
     */
    public function createAffectation()
    {
        $enseignant_id = auth()->user()->enseignants->id;

        Validator::make($this->state, [
            'projet_id' => ['required'],
            'classe_id' => ['required'],
            'date_affectation' => ['required', 'date'],
            'date_fin' => ['required', 'date'],
            'etat' => ['required'],
        ])->validate();

        $affectation = auth()->user()->enseignants->affectations()->create([
            'projet_id' => $this->state['projet_id'],
            'classe_id' => $this->state['classe_id'],
            'date_affectation' => $this->state['date_affectation'],
            'date_fin' => $this->state['date_fin'],
        ]);

        $affectation->projet->etat = $this->state['etat'];
        $affectation->projet->save();

        session()->flash('message', 'Projet affecté avec succès à la classe.');

        $this->confirmingAffectationAdd = false;
        
        $this->reset('state');
    }

    /**
     * Confirm that the given Affectation should be updated.
     *
     * @param  int  $affectationId
     * @return void
     */
    public function confirmAffectationEdit($affectationId)
    {
        $this->resetErrorBag();

        $affectation = Affectation::find($affectationId);
        
        $this->state = [
            'id' => $affectation->id,
            'projet_id' => $affectation->projet_id,
            'classe_id' => $affectation->classe_id,
            'date_affectation' => $affectation->date_affectation->format('Y-m-d'),
            'date_fin' => $affectation->date_fin->format('Y-m-d'),
            'etat' => $affectation->projet->etat,
        ];

        $this->confirmingAffectationUpdate = true;
    }
    
    /**
     * Update the Affectation.
     *
     * @return void
     */
    public function updateAffectation()
    {
        Validator::make($this->state, [
            'projet_id' => ['required'],
            'classe_id' => ['required'],
            'date_affectation' => ['required', 'date'],
            'date_fin' => ['required', 'date'],
            'etat' => ['required'],
        ])->validate();

        
        if ($this->state['id']) {
                        
            $affectation = Affectation::findOrFail($this->state['id']);

            $affectation->projet_id = $this->state['projet_id'];
            $affectation->classe_id = $this->state['classe_id'];
            $affectation->date_affectation = $this->state['date_affectation'];
            $affectation->date_fin = $this->state['date_fin'];
            $affectation->projet->etat = $this->state['etat'];

            $affectation->projet->save();
            $affectation->save();
                
            session()->flash('message', 'Affectation a été modifié avec succès.');
            $this->confirmingAffectationUpdate = false;
            $this->reset('state');
        }
    }

    /**
     * Confirm that the given API token should be deleted.
     *
     * @param  int  $affectationId
     * @return void
     */
    public function confirmAffectationDeletion($affectationId)
    {
        $this->confirmingAffectationDeletion = true;

        $this->affectationIdBeingDeleted = $affectationId;
    }

    /**
     * Delete the Affectation.
     *
     * @return void
     */
    public function deleteAffectation()
    {
        $affectation = Affectation::findOrFail($this->affectationIdBeingDeleted);
        $affectation->delete();
        $affectation->projet->update(['etat' => 'Non Affecté']);
        $this->confirmingAffectationDeletion = false;
        session()->flash('message', 'Affectation a été supprimé avec succès.');
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
        $affectations = auth()->user()->enseignants->affectations()
        ->with(['projet', 'classe'])
        ->orderBy('id', 'ASC')
        ->paginate(5);

        $projets = auth()->user()->enseignants->projets;
        $classes = auth()->user()->enseignants->classes;

        return view('livewire.enseignant.affectation-manager', ['affectations' => $affectations, 'projets' => $projets, 'classes' => $classes]);
    }
}
