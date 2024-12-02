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

class EnseignantManager extends Component
{
    use WithPagination;

    public $search = '';

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
     * Indicates if enseignant update is being confirmed.
     *
     * @var bool
     */
    public $confirmingEnseignantUpdate = false;

    /**
     * Indicates if enseignant add is being confirmed.
     *
     * @var bool
     */
    public $confirmingEnseignantAdd = false;

     /**
     * Indicates if enseignant deletion is being confirmed.
     *
     * @var bool
     */
    public $confirmingEnseignantDeletion = false;

     /**
     * The ID of the enseignant being removed.
     *
     * @var int|null
     */
    public $enseignantIdBeingRemoved = null;

    public $enseignantId, $cadre, $date_embauche, $date_affectation, $specialite, $etablissement, $cycle, $tel;
    public $nom, $prenom, $email, $password;

        /**
     * Mount the component.
     *
     * @param  mixed  $enseignant
     * @return void
     */
    public function mount()
    {
        Auth::check() ? : abort(404);
        $this->enseignant = Enseignant::all();
    }

    public function confirmEnseignantAdd()
    {
        $this->resetErrorBag();
        $this->confirmingEnseignantAdd = true;
        $this->reset('state');
    }

    public function confirmEnseignantEdit($enseignantId)
    {
        $this->resetErrorBag();

        $enseignant = Enseignant::find($enseignantId);

        /*$this->state = [
            'id' => $enseignant->id,
            'cadre' => $enseignant->cadre,
            'date_embauche' => $enseignant->price,
            'date_affectation' => $enseignant->active,
            'specialite' => $enseignant->active,
            'etablissement' => $enseignant->active,
            'cycle' => $enseignant->active,
            'tel' => $enseignant->active,
        ];*/

        $this->enseignantId = $enseignantId;
        $this->nom = $enseignant->user->nom;
        $this->prenom = $enseignant->user->prenom;
        $this->email = $enseignant->user->email;
        //$this->password = $enseignant->user->password;
        $this->cadre = $enseignant->cadre;
        $this->date_embauche = $enseignant->date_embauche;
        $this->date_affectation = $enseignant->date_affectation;
        $this->specialite = $enseignant->specialite;
        $this->etablissement = $enseignant->etablissement;
        $this->cycle = $enseignant->cycle;
        $this->tel = $enseignant->tel;

        $this->confirmingEnseignantUpdate = true;
    }

    public function store()
    {
        $this->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
            'cadre' => 'required|string|max:255',
            'date_embauche' => 'required|date',
            'date_affectation' => 'required|date',
            'specialite' => 'required|string|max:255',
            'etablissement' => 'required|string|max:255',
            'cycle' => 'required|string|max:255',
            'tel' => 'required|numeric',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {

            $user = User::create([
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            $user->enseignants()->create([
                'cadre' => $this->cadre,
                'date_embauche' => $this->date_embauche,
                'date_affectation' => $this->date_affectation,
                'specialite' => $this->specialite,
                'etablissement' => $this->etablissement,
                'cycle' => $this->cycle,
                'tel' => $this->tel,
            ]);

            // Commit the transaction
            DB::commit();

        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollback();
            session()->flash('error', 'An error occurred while creating the teacher.');
        }

        /*$enseignant = Enseignant::create([$this->state]);

        $enseignant->user()->create([
            'name' => 'sdsdsd',
            'email' => 'sdsd@gmail.com',
            'password' => bcrypt('sdsds'),
        ]);

        /*auth()->user()->enseignant()->create([
            'cadre' => $this->state['cadre'],
            'date_embauche' => $this->state['date_embauche'],
            'date_affectation' => $this->state['date_affectation'],
            'specialite' => $this->state['specialite'],
            'etablissement' => $this->state['etablissement'],
            'cycle' => $this->state['cycle'],
            'tel' => $this->state['tel'],
        ]);*/

        session()->flash('message', 'Enseignant a été ajouté avec succès.');

        $this->confirmingEnseignantAdd = false;
        
        $this->reset('state');
    }

    public function edit($enseignantId)
    {
        $enseignant = Enseignant::findOrFail($enseignantId);

        $this->state = [
            'id' => $enseignant->id,
            'cadre' => $enseignant->cadre,
            'date_embauche' => $enseignant->price,
            'date_affectation' => $enseignant->active,
            'specialite' => $enseignant->active,
            'etablissement' => $enseignant->active,
            'cycle' => $enseignant->active,
            'tel' => $enseignant->active,
        ];
        $this->confirmingEnseignantUpdate = true;
    }

    public function update()
    {
        $validator = Validator::make($this->state, [
            'cadre' => 'required|string|max:255',
            'date_embauche' => 'required|date',
            'date_affectation' => 'required|date',
            'specialite' => 'required|string|max:255',
            'etablissement' => 'required|string|max:255',
            'cycle' => 'required|string|max:255',
            'tel' => 'required|numeric',
        ])->validate();

        if ($this->state['id']) {
            $enseignant = Enseignant::findOrFail($this->state['id']);
            $enseignant->update([
                'cadre' => $this->state['cadre'],
                'date_embauche' => $this->state['date_embauche'],
                'date_affectation' => $this->state['date_affectation'],
                'specialite' => $this->state['specialite'],
                'etablissement' => $this->state['etablissement'],
                'cycle' => $this->state['cycle'],
                'tel' => $this->state['tel']
            ]);
            session()->flash('message', 'Enseignant a été modifié avec succès.');
            $this->confirmingEnseignantUpdate = false;
            $this->reset('state');
        }
    }

    /**
     * Confirm that the given enseignant should be removed.
     *
     * @param  int  $enseignantId
     * @return void
     */

    public function confirmEnseignantDeletion($enseignantId)
    {
        $this->confirmingEnseignantDeletion = true;
        $this->enseignantIdBeingRemoved = $enseignantId;
    }

    public function deleteEnseignant($enseignantId)
    {
        $enseignant = Enseignant::findOrFail($enseignantId);
        $enseignant->user()->delete(); 
        $enseignant->delete();
        
        $this->confirmingEnseignantDeletion = false;
        $this->enseignantIdBeingRemoved = null;
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
        ->orWhere('cadre', 'like', '%' . $this->search . '%')
        ->orWhere('date_embauche', 'like', '%' . $this->search . '%')
        ->orWhere('etablissement', 'like', '%' . $this->search . '%')
        ->orderBy('id', 'ASC')
        ->paginate(10);

        return view('livewire.admin.enseignant-manager', ['enseignants' => $enseignants]);
    }
}