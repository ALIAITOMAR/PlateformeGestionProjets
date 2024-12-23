<?php

namespace App\Livewire\Enseignant;

use Livewire\Component;
use App\Models\Enseignant;
use App\Models\Apprenant;
use App\Models\Projet;
use App\Models\Tache;
use App\Models\User;
use App\Models\Commentaire;
use App\Models\Livrable;
use App\Models\Affectation;
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

    public $user;

    public function mount($userId, $id)
    {
        $this->projetId = $id;

        $this->user = User::find($userId); 

        $this->livrables = $this->user->apprenants->livrables()->with('affectation.projet')->get();

        $this->affectation = $this->user->apprenants->classe->affectations()
            ->with(['projet', 'livrable' => function ($query) {
                $query->where('apprenant_id', $this->user->apprenants->id)->orderBy('created_at', 'desc')->take(1);
            }])
            ->where('projet_id', $this->projetId)
            ->firstOrFail();

            $this->commentaires = Commentaire::whereNull('parent_id')
            ->whereHas('affectation', function ($query) {
                $query->whereHas('classe', function ($query) {
                    $query->where('id', $this->user->apprenants->classe->id);
                });
            })
            ->latest()
            ->get();
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

    public function postCommentaire()
    {
        Validator::make($this->state, [
            'commentaire' => ['required', 'string', 'max:255'],
        ])->validate();

        Commentaire::create([
            'user_id' => auth()->id(),
            'affectation_id' => $this->affectation->id,
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
            'affectation_id' => $this->affectation->id,
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
        return view('livewire.enseignant.projet-details');
    }
}
