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

class ApprenantManager extends Component
{
    use WithPagination;

    public $search = '';

    public $apprenantId;
    /**
     * The apprenant instance.
     *
     * @var mixed
     */
    public $apprenant;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    /**
     * Indicates if apprenant add is being confirmed.
     *
     * @var bool
     */
    public $confirmingApprenantAdd = false;

    /**
     * Indicates if apprenant update is being confirmed.
     *
     * @var bool
     */
    public $confirmingApprenantUpdate = false;

     /**
     * Indicates if apprenant deletion is being confirmed.
     *
     * @var bool
     */
    public $confirmingApprenantDeletion = false;

     /**
     * The ID of the apprenant being deleted.
     *
     * @var int
     */
    public $apprenantIdBeingDeleted;

    public $classes;

    /**
     * Mount the component.
     *
     * @return void
     */
    public function mount()
    {
        Auth::check() ? : abort(404);

        $this->classes = Auth::user()->enseignants->classes;

        //$this->classes = Classe::with('enseignant')->get();
      
        $this->apprenant = Apprenant::all();
    }

    /**
     * Confirm that the given Apprenant should be added.
     *
     * @param  int  $apprenantId
     * @return void
     */
    public function confirmApprenantAdd()
    {
        $this->resetErrorBag();
        $this->confirmingApprenantAdd = true;
        $this->reset('state');
    }

    /**
     * Create a new Apprenant.
     *
     * @return void
     */
    public function createApprenant()
    {
        
        Validator::make($this->state, [
            'nom' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9\s\-_]+$/'],
            'prenom' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9\s\-_]+$/'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/'],
            'cne' => ['required', 'string', 'max:255'],
            'date_naissance' => ['required', 'date'],
            'niveau' => ['required', 'string', 'max:255'],
            'classe' => ['required'],
        ])->validate();

        DB::beginTransaction();


        try {
         
            $user = User::create([
                'nom' => $this->state['nom'],
                'prenom' => $this->state['prenom'],
                'email' => $this->state['email'],
                'password' => Hash::make($this->state['password']),
                'role' => 'apprenant',
            ]);

           
            //dd(auth()->user()->enseignants->id);

            $user->apprenants()->create([
                'cne' => $this->state['cne'],
                'date_naissance' => $this->state['date_naissance'],
                'niveau' => $this->state['niveau'],
                'classe_id' => $this->state['classe'],
                'enseignant_id' => auth()->user()->enseignants->id,
            ]);

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'Une erreur s\'est produite lors de la création du apprenant.');
        }

        session()->flash('message', 'Apprenant a été ajouté avec succès.');

        $this->confirmingApprenantAdd = false;
        
        $this->reset('state');
    }

    /**
     * Confirm that the given Apprenant should be updated.
     *
     * @param  int  $apprenantId
     * @return void
     */
    public function confirmApprenantEdit($apprenantId)
    {
        $this->resetErrorBag();

        $apprenant = Apprenant::find($apprenantId);

        $this->state = [
            'id' => $apprenant->id,
            'user_id' => $apprenant->user->id,
            'nom' => $apprenant->user->nom,
            'prenom' => $apprenant->user->prenom,
            'email' => $apprenant->user->email,
            'cne' => $apprenant->cne,
            'date_naissance' => $apprenant->date_naissance,
            'niveau' => $apprenant->niveau,
            'branche' => $apprenant->branche,
            'classe' => $apprenant->classe->id,
        ];

        $this->confirmingApprenantUpdate = true;
    }
    
    /**
     * Update the Apprenant.
     *
     * @return void
     */
    public function updateApprenant()
    {   
        //$user = User::findOrFail($this->state['user_id']);

        Validator::make($this->state, [
            'nom' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'prenom' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.Auth::user()->enseignants->apprenants()->value('user_id')],
            'password' => ['string', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/'],
            'niveau' => ['required', 'string', 'max:255'],
            'cne' => ['required', 'string', 'max:255'],
            'date_naissance' => ['required', 'string', 'max:255'],
            'classe' => ['required'],
        ])->validate();

        
        if ($this->state['id']) {
            
            $apprenant = Apprenant::findOrFail($this->state['id']);

            // Mettre à jour les champs User
            $apprenant->user->nom = $this->state['nom'];
            $apprenant->user->prenom = $this->state['prenom'];
            $apprenant->user->email = $this->state['email'];

            if(!empty($this->state['password'])) {
                $apprenant->user->password = Hash::make($this->state['password']);
            }

            // Mettre à jour les champs Apprenant
            $apprenant->niveau = $this->state['niveau'];
            $apprenant->cne = $this->state['cne'];
            $apprenant->date_naissance = $this->state['date_naissance'];
            $apprenant->classe_id = $this->state['classe'];

            // Enregistre les modifications apportées si des champs ont changé
            if ($apprenant->user->isDirty() || $apprenant->isDirty()) {
                $apprenant->user->save();
                $apprenant->save();
                session()->flash('message', 'Apprenant a été modifié avec succès.');
                $this->confirmingApprenantUpdate = false;
                $this->reset('state');
            }
        }
    }

    /**
     * Confirm that the given Apprenant should be deleted.
     *
     * @param  int  $apprenantId
     * @return void
     */
    public function confirmApprenantDeletion($apprenantId)
    {
        $this->confirmingApprenantDeletion = true;

        $this->apprenantIdBeingDeleted = $apprenantId;
    }

    /**
     * Delete the Apprenant.
     *
     * @return void
     */
    public function deleteApprenant()
    {
        $apprenant = Apprenant::findOrFail($this->apprenantIdBeingDeleted);
        $apprenant->user()->delete(); 
        $apprenant->delete();
        $this->confirmingApprenantDeletion = false;
        session()->flash('message', 'Apprenant a été supprimé avec succès.');
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
        $apprenants = auth()->user()->enseignants->apprenants()
        ->with(['user'])
        ->whereHas('user', function ($query) {
            $query->where('nom', 'like', '%' . $this->search . '%')
                  ->orWhere('prenom', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%');
        })
        ->orWhereHas('classe', function ($query) {
            $query->where('nom', 'like', '%' . $this->search . '%');
        })
        ->orWhere('cne', 'like', '%'.$this->search.'%')
        ->orWhere('niveau', 'like', '%'.$this->search.'%')
        ->orderBy('id', 'ASC')
        ->paginate(5);

        return view('livewire.enseignant.apprenant-manager', ['apprenants' => $apprenants]);
    }
}
