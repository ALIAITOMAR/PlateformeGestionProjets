<?php

namespace App\Livewire\Apprenant;

use Livewire\Component;
use App\Models\Enseignant;
use App\Models\Apprenant;
use App\Models\Projet;
use App\Models\Tache;
use App\Models\User;
use App\Models\Commentaire;
use App\Models\Livrable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class ProjetDetails extends Component
{    
    use WithPagination;

    use WithFileUploads;

    public $search = '';

    public $file;

    public $projetId;

    public $affectation;

    public $commentaires;

    public $livrables;

    public $isSaving = false; 

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
     * Indicates if affectation add is being confirmed.
     *
     * @var bool
     */
    public $confirmingLivrableAdd = false;

    public function mount($id)
    {
        $this->projetId = $id;
        $this->affectation = auth()->user()->apprenants->classe->affectations()
            ->with(['projet', 'livrable'])
            ->where('projet_id', $this->projetId)
            ->firstOrFail();

        
        $this->livrables = Livrable::whereHas('affectation', function ($query) {
                $query->where('projet_id', $this->projetId);
                $query->where('apprenant_id', auth()->user()->id);
            })->get();

        $this->commentaires = Commentaire::whereHas('projet', function ($query) {
                $query->where('id', $this->projetId);
            })->whereNull('parent_id')->latest()->get();

        //$this->commentaires = $this->affectation->projet->commentaires()->latest()->paginate(3);
    }

    public function telechargerFichier($cheminFichier)
    {
        if (Storage::exists($cheminFichier)) {
            return response()->streamDownload(function () use ($cheminFichier) {
                echo Storage::get($cheminFichier);
            }, basename($cheminFichier));
        } else {
            session()->flash('error', 'Fichier introuvable.');
        }
    }

    /**
     * Confirm that the given Affectation should be added.
     *
     * @param  int  $classeId
     * @return void
     */
    public function confirmLivrableAdd()
    {
        $this->resetErrorBag();
        $this->confirmingLivrableAdd = true;
        $this->reset('state');
    }

    /**
     * Create a new Livrable.
     *
     * @return void
     */
    public function createLivrable()
    {
        $this->isSaving = true;

        sleep(3);
        
        Validator::make($this->state, [
            'description' => ['required', 'string', 'max:255'],
        ])->validate();

        $this->validate([
            'file' => ['required', 'file', 'mimes:pdf,xlsx,docx,zip', 'max:2048'],
        ]);

        $piece_jointe = $this->file ? $this->file->storeAs('livrables/' . auth()->user()->apprenants->cne, $this->file->getClientOriginalName()) : null;        
        
        $this->affectation->livrable()->create([
            'apprenant_id' => auth()->user()->apprenants->id,
            'piece_jointe' => $piece_jointe,
            'etat' => Carbon::now()->isAfter($this->affectation->date_echeance) ? 'rendu en retard' : 'rendu',
            'description' => $this->state['description'],
        ]);

        session()->flash('message', 'Livrable bien ajouter avec succès.');

        $this->confirmingLivrableAdd = false;
        
        $this->reset('state');

        $this->isSaving = false;

    }

    public function postCommentaire()
    {
        Validator::make($this->state, [
            'commentaire' => ['required', 'string', 'max:255'],
        ])->validate();

        Commentaire::create([
            'user_id' => auth()->id(),
            'projet_id' => $this->projetId,
            'commentaire' => $this->state['commentaire'],
        ]);

        $this->reset('state');
    }

    public function addRepondre($parentId)
    {
        Validator::make($this->state, [
            'reply' => ['required', 'string', 'max:255'],
        ])->validate();
        
        Commentaire::create([
            'user_id' => auth()->id(),
            'parent_id' => $parentId,
            'projet_id' => $this->projetId,
            'commentaire' => $this->state['reply'],
        ]);

        $this->reset('state');
    }

    public function voteUp($commentaireId)
    {
        $commentaire = Commentaire::findOrFail($commentaireId);
        if (!session()->has('voted_commentaire_' . $commentaireId)) {
            $commentaire->increment('thumbs_up');
            session()->put('voted_commentaire_' . $commentaireId, true);
        }
    }

    public function voteDown($commentaireId)
    {
        $commentaire = Commentaire::findOrFail($commentaireId);

        if (!session()->has('voted_commentaire_' . $commentaireId)) {
            $commentaire->increment('thumbs_down');
            session()->put('voted_commentaire_' . $commentaireId, true);
        }
    }

    public function render()
    {
        return view('livewire.apprenant.projet-details');
    }
}
