<?php

namespace App\Livewire\Enseignant;

use Livewire\Component;
use App\Models\Enseignant;
use App\Models\Apprenant;
use App\Models\Classe;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ClasseManager extends Component
{
    use WithPagination;

    public $search = '';

    public $classeId;
    /**
     * The classe instance.
     *
     * @var mixed
     */
    public $classe;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    /**
     * Indicates if classe add is being confirmed.
     *
     * @var bool
     */
    public $confirmingClasseAdd = false;

    /**
     * Indicates if classe update is being confirmed.
     *
     * @var bool
     */
    public $confirmingClasseUpdate = false;

     /**
     * Indicates if classe deletion is being confirmed.
     *
     * @var bool
     */
    public $confirmingClasseDeletion = false;

     /**
     * The ID of the classe being deleted.
     *
     * @var int
     */
    public $classeIdBeingDeleted;

    /**
     * Mount the component.
     *
     * @return void
     */
    public function mount()
    {
        Auth::check() ? : abort(404);
        $this->classe = Classe::all();
    }

    /**
     * Confirm that the given Classe should be added.
     *
     * @param  int  $classeId
     * @return void
     */
    public function confirmClasseAdd()
    {
        $this->resetErrorBag();
        $this->confirmingClasseAdd = true;
        $this->reset('state');
    }

    /**
     * Create a new Classe.
     *
     * @return void
     */
    public function createClasse()
    {
        Validator::make($this->state, [
            'nom' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9\s\-_]+$/'],
        ])->validate();

        auth()->user()->enseignants->classes()->create([
            'nom' => $this->state['nom'],
        ]);

        session()->flash('message', 'Classe a été ajouté avec succès.');

        $this->confirmingClasseAdd = false;
        
        $this->reset('state');
    }

    /**
     * Confirm that the given Classe should be updated.
     *
     * @param  int  $classeId
     * @return void
     */
    public function confirmClasseEdit($classeId)
    {
        $this->resetErrorBag();

        $classe = Classe::find($classeId);

        $this->state = [
            'id' => $classe->id,
            'nom' => $classe->nom,
        ];

        $this->confirmingClasseUpdate = true;
    }
    
    /**
     * Update the Classe.
     *
     * @return void
     */
    public function updateClasse()
    {
        Validator::make($this->state, [
            'nom' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9\s\-_]+$/'],
        ])->validate();

        
        if ($this->state['id']) {
                                   
            Classe::where('id',$this->state['id'])->update([
                'nom' => $this->state['nom'],
            ]);
                
            session()->flash('message', 'Classe a été modifié avec succès.');
            $this->confirmingClasseUpdate = false;
            $this->reset('state');
        }
    }

    /**
     * Confirm that the given API token should be deleted.
     *
     * @param  int  $classeId
     * @return void
     */
    public function confirmClasseDeletion($classeId)
    {
        $this->confirmingClasseDeletion = true;

        $this->classeIdBeingDeleted = $classeId;
    }

    /**
     * Delete the Classe.
     *
     * @return void
     */
    public function deleteClasse()
    {
        $classe = Classe::findOrFail($this->classeIdBeingDeleted);
        $classe->delete();
        $this->confirmingClasseDeletion = false;
        session()->flash('message', 'Classe a été supprimé avec succès.');
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
        $classes = auth()->user()->enseignants->classes()
        ->where('nom', 'like', '%'.$this->search.'%')
        ->orderBy('id','ASC')
        ->paginate(5);

        return view('livewire.enseignant.classe-manager', ['classes' => $classes]);
    }
}