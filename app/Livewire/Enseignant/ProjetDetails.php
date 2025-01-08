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
use App\Models\Indicateur;
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

    public $noteProduit_total = 0.0;
    public $noteProcessus_total = 0.0;
    public $notePropos_total = 0.0;
    public $note_obtenu = 0.0;
    
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
     * Indicates if livrable approval is being confirmed.
     *
     * @var bool
     */
    public $confirmingLivrableApproval = false;

     /**
     * Indicates if livrable rejection is being confirmed.
     *
     * @var bool
     */
    public $confirmingLivrableRejection = false;    

     /**
     * The ID of the livrable being approved.
     *
     * @var int
     */
    public $livrableIdBeingApproved;

     /**
     * The ID of the livrable being rejected.
     *
     * @var int
     */
    public $livrableIdBeingRejected;

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

        $this->livrables = $this->user->apprenants->livrables()->with('affectation.projet')
        ->whereHas('affectation', function ($query) {
            $query->whereHas('projet', function ($query) {
                $query->where('id', $this->projetId);
            });
        })
        ->get();

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

    public function marquerCommeTermine()
    {

        $livrable = Livrable::where('apprenant_id', $this->user->apprenants->id)
        ->whereHas('affectation', function ($query) {
            $query->whereHas('projet', function ($query) {
                $query->where('id', $this->projetId);
            });
        })
        ->orderBy('created_at', 'desc')
        ->first();

        if ($livrable) {
            $livrable->update([
                'complete' => true,
            ]);
            
            session()->flash('success', 'Projet marqué comme terminé avec succès!');
        } else {
            session()->flash('error', 'Projet non trouvé!');
        }
    }

    public function validateNotes($critereId, $indicateurId)
    {
        $bareme = $this->getIndicateurBareme($critereId, $indicateurId);
        $note = $this->state['notesProduit'][$critereId][$indicateurId];

        // Perform validation
        $this->validate([
            "notesProduit.{$critereId}.{$indicateurId}" => "required|numeric|max:{$bareme}",
        ]);
    }

    public function getIndicateurBareme($critereId, $indicateurId)
    {
        $indicateur = Indicateur::find($indicateurId);
        return $indicateur->bareme;
    }

    public function genEvaluationPDF()
    {
        sleep(3);

        Validator::extend('max_bareme', function ($attribute, $value, $parameters, $validator) {
            $keys = explode('.', $attribute);
            $critereId = $keys[1];
            $indicateurId = $keys[2];
        
            // Récupérer le critère et l'indicateur correspondant
            $critere = $this->affectation->projet->criteres->find($critereId);
            if (!$critere) {
                return false; // Critère non trouvé
            }
        
            $indicateur = $critere->indicateurs->find($indicateurId);
            if (!$indicateur) {
                return false; // Indicateur introuvable
            }
        
            // Comparer notesProduit avec bareme
            $notesProduit = $this->state['notesProduit'][$critereId][$indicateurId];
            $bareme = $indicateur->bareme;
        
            return $notesProduit <= $bareme;
        });

        
        Validator::make($this->state, [
            'notesProduit.*.*' => ['required', 'numeric', 'max_bareme'],
            'commentairesProduit.*.*' => ['required', 'string', 'max:255'],
            'noteProcessus' => ['required', 'numeric'],
            'commentaireProcessus' => ['required', 'string', 'max:255'],
            'notesPropos.*.required' => ['required', 'numeric'],
            'commentairesPropos.*' => ['required', 'string', 'max:255'],
            'noteGlobale' => ['required', 'numeric', 'max:20'],
            'appreciation' => ['required', 'string', 'max:255'],

        ],[
            'notesProduit.*.*.required' => 'Le champ note est requis.',
            'notesProduit.*.*.numeric' => 'Le champ note doit être numérique.',
            'notesProduit.*.*.max_bareme' => 'Les note ne doivent pas dépasser la valeur du barème.',
            'commentairesProduit.*.*.required' => 'Le champ commentaires est requis.',
            'commentairesProduit.*.*.string' => 'Le champ commentaires doit être une chaîne de caractères.',
            'commentairesProduit.*.*.max' => 'Le champ commentaires ne doit pas dépasser :max caractères.',
            'noteProcessus.required' => 'Le champ note est requis.',
            'noteProcessus.numeric' => 'Le champ note doit être numérique.',
            'commentaireProcessus.required' => 'Le champ commentaires est requis.',
            'commentaireProcessus.string' => 'Le champ commentaires doit être une chaîne de caractères.',
            'commentaireProcessus.max' => 'Le champ commentaires ne doit pas dépasser :max caractères.',
            'notesPropos.*.required' => 'Le champ notes est requis.',
            'notesPropos.*.numeric' => 'Le champ notes doit être numérique.',
            'notesPropos.*.max' => 'Le champ notes ne doit pas dépasser :max.',
            'commentairesPropos.*.required' => 'Le champ commentaires est requis.',
            'commentairesPropos.*.string' => 'Le champ commentaires doit être une chaîne de caractères.',
            'commentairesPropos.*.max' => 'Le champ commentaires ne doit pas dépasser :max caractères.',
            'noteGlobale.required' => 'Le champ note globale est requis.',
            'noteGlobale.numeric' => 'Le champ note globale doit être numérique.',
            'noteGlobale.max' => 'La note globale ne doit pas dépasser :max.',
            'appreciation.required' => 'Le champ appreciation est requis.',
            'appreciation.string' => 'Le champ appreciation doit être une chaîne de caractères.',
            'appreciation.max' => 'Le champ appreciation ne doit pas dépasser :max caractères.',
        ])->validate();

        $this->noteProduit_total = array_reduce($this->state['notesProduit'], function($carry, $indicateurs) {
            return $carry + array_sum($indicateurs);
        }, 0);
        $this->noteProcessus_total = $this->state['noteProcessus'];
        $this->notePropos_total = array_sum($this->state['notesPropos']);
        $this->note_obtenu = $this->noteProduit_total+$this->notePropos_total+$this->note_obtenu;



        //dd($this->noteProduit_total);

    }

    /**
     * Confirm that the given livrable should be approved.
     *
     * @param  int  $livrableId
     * @return void
     */
    public function confirmLivrableApproval($livrableId)
    {
        $this->confirmingLivrableApproval = true;

        $this->livrableIdBeingApproved = $livrableId;
    }

    /**
     * Confirm that the given livrable should be rejected.
     *
     * @param  int  $livrableId
     * @return void
     */
    public function confirmLivrableRejection($livrableId)
    {
        $this->confirmingLivrableRejection = true;

        $this->livrableIdBeingRejected = $livrableId;
    }

    /**
     * Approve the Livrable.
     *
     * @return void
     */
    public function approveLivrable()
    {
        $livrable = Livrable::findOrFail($this->livrableIdBeingApproved);
        $livrable->update(['etat' => 'Approuvé']);
        $this->confirmingLivrableApproval = false;
        session()->flash('message', 'Livrable a été Approuvé avec succès.');
    }

    /**
     * Reject the Livrable.
     *
     * @return void
     */
    public function rejectLivrable()
    {
        $livrable = Livrable::findOrFail($this->livrableIdBeingRejected);
        $livrable->update(['etat' => 'Rejeté']);
        $this->confirmingLivrableRejection = false;
        session()->flash('message', 'Livrable a été Rejeté avec succès.');
    }

    public function render()
    {
        return view('livewire.enseignant.projet-details');
    }
}
