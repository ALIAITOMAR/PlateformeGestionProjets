<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Enseignant;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class EnseignantManager extends Component
{
    use WithPagination;

    public $search = '';

    public $enseignantId;
    /**
     * The enseignant instance.
     *
     * @var mixed
     */
    public $enseignant;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    /**
     * Indicates if enseignant add is being confirmed.
     *
     * @var bool
     */
    public $confirmingEnseignantAdd = false;

    /**
     * Indicates if enseignant update is being confirmed.
     *
     * @var bool
     */
    public $confirmingEnseignantUpdate = false;

     /**
     * Indicates if enseignant deletion is being confirmed.
     *
     * @var bool
     */
    public $confirmingEnseignantDeletion = false;

     /**
     * The ID of the enseignant being deleted.
     *
     * @var int
     */
    public $enseignantIdBeingDeleted;


    /**
     * Mount the component.
     *
     * @return void
     */
    public function mount()
    {
        Auth::check() ? : abort(404);
        $this->enseignant = Enseignant::all();
    }

    /**
     * Confirm that the given Enseignant should be added.
     *
     * @param  int  $enseignantId
     * @return void
     */
    public function confirmEnseignantAdd()
    {
        $this->resetErrorBag();
        $this->confirmingEnseignantAdd = true;
        $this->reset('state');
    }

    /**
     * Create a new Enseignant.
     *
     * @return void
     */
    public function createEnseignant()
    {
        Validator::make($this->state, [
            'nom' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'prenom' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/'],
            'matricule' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9]+$/'],
            'cadre' => ['required', 'string', 'max:255'],
            'date_embauche' => ['required', 'date'],
            'date_affectation' => ['required', 'date'],
            'specialite' => ['required', 'string', 'max:255'],
            'etablissement' => ['required', 'string', 'max:255'],
            'cycle' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'regex:#^(?:\+?212|0)([ \-_/]*)(\d[ \-_/]*){9}$#'],
        ])->validate();

        DB::beginTransaction();

        try {

            $user = User::create([
                'nom' => $this->state['nom'],
                'prenom' => $this->state['prenom'],
                'email' => $this->state['email'],
                'password' => Hash::make($this->state['password']),
                'role' => 'enseignant',
            ]);

            $user->enseignants()->create([
                'matricule' => $this->state['matricule'],
                'cadre' => $this->state['cadre'],
                'date_embauche' => $this->state['date_embauche'],
                'date_affectation' => $this->state['date_affectation'],
                'specialite' => $this->state['specialite'],
                'etablissement' => $this->state['etablissement'],
                'cycle' => $this->state['cycle'],
                'tel' => $this->state['tel'],
            ]);

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'Une erreur s\'est produite lors de la création du enseignant.');
        }
        
        session()->flash('message', 'Enseignant a été ajouté avec succès.');

        $this->confirmingEnseignantAdd = false;
        
        $this->reset('state');
    }

    /**
     * Confirm that the given Enseignant should be updated.
     *
     * @param  int  $enseignantId
     * @return void
     */
    public function confirmEnseignantEdit($enseignantId)
    {
        $this->resetErrorBag();

        $enseignant = Enseignant::find($enseignantId);

        $this->state = [
            'id' => $enseignant->id,
            'nom' => $enseignant->user->nom,
            'prenom' => $enseignant->user->prenom,
            'email' => $enseignant->user->email,
            'matricule' => $enseignant->matricule,
            'cadre' => $enseignant->cadre,
            'date_embauche' => $enseignant->date_embauche,
            'date_affectation' => $enseignant->date_affectation,
            'specialite' => $enseignant->specialite,
            'etablissement' => $enseignant->etablissement,
            'cycle' => $enseignant->cycle,
            'tel' => $enseignant->tel,
        ];

        $this->confirmingEnseignantUpdate = true;
    }
    
    /**
     * Update the Enseignant.
     *
     * @return void
     */
    public function updateEnseignant()
    {
        Validator::make($this->state, [
            'nom' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'prenom' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.Enseignant::findOrFail($this->state['id'])->user->id],
            'password' => ['string', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/'],
            'matricule' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9]+$/'],
            'cadre' => ['required', 'string', 'max:255'],
            'date_embauche' => ['required', 'date'],
            'date_affectation' => ['required', 'date'],
            'specialite' => ['required', 'string', 'max:255'],
            'etablissement' => ['required', 'string', 'max:255'],
            'cycle' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'regex:#^(?:\+?212|0)([ \-_/]*)(\d[ \-_/]*){9}$#'],
        ])->validate();

        
        if ($this->state['id']) {
            
            $enseignant = Enseignant::findOrFail($this->state['id']);

            // Mettre à jour les champs User
            $enseignant->user->nom = $this->state['nom'];
            $enseignant->user->prenom = $this->state['prenom'];
            $enseignant->user->email = $this->state['email'];
            if(!empty($this->state['password'])) {
                $enseignant->user->password = Hash::make($this->state['password']);
            }

            // Mettre à jour les champs Enseignant
            $enseignant->matricule = $this->state['matricule'];
            $enseignant->cadre = $this->state['cadre'];
            $enseignant->date_embauche = $this->state['date_embauche'];
            $enseignant->date_affectation = $this->state['date_affectation'];
            $enseignant->specialite = $this->state['specialite'];
            $enseignant->etablissement = $this->state['etablissement'];
            $enseignant->cycle = $this->state['cycle'];
            $enseignant->tel = $this->state['tel'];

            // Enregistre les modifications apportées si des champs ont changé
            if ($enseignant->user->isDirty() || $enseignant->isDirty()) {
                $enseignant->user->save();
                $enseignant->save();
                session()->flash('message', 'Enseignant a été modifié avec succès.');
                $this->confirmingEnseignantUpdate = false;
                $this->reset('state');
            }
        }
    }

    /**
     * Confirm that the given API token should be deleted.
     *
     * @param  int  $enseignantId
     * @return void
     */
    public function confirmEnseignantDeletion($enseignantId)
    {
        $this->confirmingEnseignantDeletion = true;

        $this->enseignantIdBeingDeleted = $enseignantId;
    }

    /**
     * Delete the Enseignant.
     *
     * @return void
     */
    public function deleteEnseignant()
    {
        $enseignant = Enseignant::findOrFail($this->enseignantIdBeingDeleted);
        $enseignant->user()->delete(); 
        $enseignant->delete();
        
        $this->confirmingEnseignantDeletion = false;
        session()->flash('message', 'Enseignant a été supprimé avec succès.');
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
        $enseignants = Enseignant::with('user')
        ->whereHas('user', function ($query) {
            $query->where('nom', 'like', '%' . $this->search . '%')
                  ->orWhere('prenom', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%');
        })
        ->orWhere('matricule', 'like', '%' . $this->search . '%')
        ->orWhere('cadre', 'like', '%' . $this->search . '%')
        ->orWhere('date_embauche', 'like', '%' . $this->search . '%')
        ->orWhere('etablissement', 'like', '%' . $this->search . '%')
        ->orderBy('id', 'ASC')
        ->paginate(10);

        return view('livewire.admin.enseignant-manager', ['enseignants' => $enseignants]);
    }
}