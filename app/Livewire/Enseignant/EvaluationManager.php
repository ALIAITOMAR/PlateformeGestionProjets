<?php

namespace App\Livewire\Enseignant;

use Livewire\Component;
use App\Models\Classe;
use App\Models\Apprenant;
use App\Models\Projet;
use App\Models\Affectation;
use App\Models\Critere;
use App\Models\Indicateur;
use App\Models\Question;
use App\Models\Livrable;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class EvaluationManager extends Component
{

    public $noteProduit_total = 0.0;
    public $noteProcessus_total = 0.0;
    public $notePropos_total = 0.0;
    public $note_obtenu = 0.0;

    public $classeId;
    public $projetId;
    public $critereId;
    public $indicateurId;
    public $apprenantId;
    public $bareme;
    public $state = [];

    public $currentStep = 1;

    public $classes;
    public $questions;
    public $criteres;
    public $indicateurs;
    public $apprenants;
    public $projets;

    public $isSaving = false; 

    public function goToStep($step)
    {
        $this->currentStep = $step;
    }

    public function nextStep()
    {        
        Validator::extend('max_bareme', function ($attribute, $value, $parameters, $validator) {
            $keys = explode('.', $attribute);
            $critereId = $keys[1];
            $indicateurId = $keys[2];
        
            // Récupérer le critère et l'indicateur correspondant
            $projet = Projet::findOrFail($this->projetId);

            $critere = $projet->criteres->find($critereId);
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

        if($this->currentStep === 1)
        {
            Validator::make([
                'classeId' => $this->classeId,
                'apprenantId' => $this->apprenantId,
                'projetId' => $this->projetId,
            ], [
                'classeId' => ['required'],
                'apprenantId' => ['required'],
                'projetId' => ['required'],
            ])->validate();
        }

        if($this->currentStep === 2)
        {
            Validator::make($this->state, [
                'notesProduit.*.*' => ['required', 'numeric', 'max_bareme'],
                'commentairesProduit.*.*' => ['nullable', 'string', 'max:255'],
            ],[
                'notesProduit.*.*.required' => 'Le champ note est requis.',
                'notesProduit.*.*.numeric' => 'Le champ note doit être numérique.',
                'notesProduit.*.*.max_bareme' => 'Les note ne doivent pas dépasser la valeur du barème.',
                'commentairesProduit.*.*.string' => 'Le champ commentaires doit être une chaîne de caractères.',
                'commentairesProduit.*.*.max' => 'Le champ commentaires ne doit pas dépasser :max caractères.',
            ])->validate();
        }

        if($this->currentStep === 3)
        {
            Validator::make($this->state, [
                'noteProcessus' => ['required', 'numeric'],
                'commentaireProcessus' => ['nullable', 'string', 'max:255'],
            ],[
                'noteProcessus.required' => 'Le champ note est requis.',
                'noteProcessus.numeric' => 'Le champ note doit être numérique.',
                'commentaireProcessus.string' => 'Le champ commentaires doit être une chaîne de caractères.',
                'commentaireProcessus.max' => 'Le champ commentaires ne doit pas dépasser :max caractères.',
            ])->validate();
        }

        if($this->currentStep === 4)
        {
            Validator::make($this->state, [
                'notesPropos.*.*' => ['required', 'numeric'],
                'commentairesPropos.*.*' => ['nullable', 'string', 'max:255'],
            ],[
                'notesPropos.*.*.required' => 'Le champ notes est requis.',
                'notesPropos.*.*.numeric' => 'Le champ notes doit être numérique.',
                'notesPropos.*.*.max' => 'Le champ notes ne doit pas dépasser :max.',
                'commentairesPropos.*.*.string' => 'Le champ commentaires doit être une chaîne de caractères.',
                'commentairesPropos.*.*.max' => 'Le champ commentaires ne doit pas dépasser :max caractères.',
            ])->validate();
        }

        if($this->currentStep === 5)
        {
            Validator::make($this->state, [
                'appreciation' => ['nullable', 'string', 'max:255'],
            ],[
                'appreciation.string' => 'Le champ appreciation doit être une chaîne de caractères.',
                'appreciation.max' => 'Le champ appreciation ne doit pas dépasser :max caractères.',
            ])->validate();
        }
        
        $this->currentStep++;
    }

    public function previousStep()
    {
        $this->currentStep--;
    }

    public function render()
    {
        $this->classes = auth()->user()->enseignants->classes;
        
        $this->apprenants = $this->classeId ? Apprenant::where('classe_id', $this->classeId)
        ->where('enseignant_id', auth()->user()->enseignants->id)
        ->with('user')->get() : collect();

        // Fetch projects based on selected classeId through Affectation
        //$this->projets = $this->classeId ? Affectation::where('classe_id', $this->classeId)->with('projet')->get()->pluck('projet')->unique() : collect();
        
        $this->projets = $this->apprenantId ? Projet::whereHas('affectations', function ($query) {
            $query->where('classe_id', $this->classeId)
                ->whereHas('classe.apprenants', function ($query) {
                    $query->where('id', $this->apprenantId);
                });
        })->get()
        : collect();
        

        $this->questions = $this->projetId ? Question::where('projet_id', $this->projetId)->get() : collect(); // Fetch criteres based on selected projet
        
        $this->criteres = $this->projetId ? Critere::where('projet_id', $this->projetId)->get() : collect(); // Fetch criteres based on selected projet
        $this->indicateurs = $this->critereId ? Indicateur::where('critere_id', $this->critereId)->get() : collect(); // Fetch indicateurs based on selected critere
        
        // Fetch bareme based on selected indicateur
        if ($this->indicateurId) {
            $indicateur = Indicateur::find($this->indicateurId);
            $this->bareme = $indicateur->bareme;
        } else {
            $this->bareme = null;
        }

        return view('livewire.enseignant.evaluation-manager', [
            'classes' => $this->classes,
            'projets' => $this->projets,
            'criteres' => $this->criteres,
            'indicateurs' => $this->indicateurs,
            'questions' => $this->questions,
            'apprenants' => $this->apprenants,
        ]);
    }

    public function updatedClasseId($value)
    {
        $this->projetId = null; // Reset projetId when classeId changes
        $this->critereId = null; // Reset critereId when classeId changes
        $this->indicateurId = null; // Reset indicateurId when classeId changes
        $this->bareme = null; // Reset bareme when classeId changes
        $this->apprenantId = null;
    }

    public function updatedApprenantId($value)
    {
        $this->projetId = null; // Reset projetId when apprenantId changes
    }

    public function updatedProjetId($value)
    {
        $this->reset(['critereId', 'indicateurId', 'bareme']);
    }

    public function generatePdf()
    {
        $this->isSaving = true;

        sleep(3);

        $this->noteProduit_total = array_reduce($this->state['notesProduit'], function($carry, $indicateurs) {
            return $carry + array_sum($indicateurs);
        }, 0);
        $this->noteProcessus_total = $this->state['noteProcessus'];
        $this->notePropos_total = array_reduce($this->state['notesPropos'], function($carry, $question) {
            return $carry + array_sum($question);
        }, 0);

        $this->note_obtenu = $this->noteProduit_total+$this->noteProcessus_total+$this->notePropos_total;

        $apprenant = Apprenant::findOrFail($this->apprenantId); 
        $projet = Projet::findOrFail($this->projetId);
        
        $pdfContent = Pdf::loadView('pdf.fiche-projet', [
            'state' => $this->state,
            'criteres' => $this->criteres,
            'indicateurs' => $this->indicateurs,
            'questions' => $this->questions,
            'apprenant' => $apprenant,
            'projet' => $projet,
            'noteProduit_total' => $this->noteProduit_total,
            'noteProcessus_total' => $this->noteProcessus_total,
            'notePropos_total' => $this->notePropos_total,
            'note_obtenu' => $this->note_obtenu,
        ])->setPaper('array(0,0,595.28,841.89)', 'portrait')->output();

        $livrable = Livrable::where('apprenant_id', $this->apprenantId)
        ->orderBy('created_at', 'desc')
        ->first();

         // Determine the directory path and filename
    $directory = 'livrables/' . $apprenant->cne;
    $filename = 'Rapport_Evaluation_du_projet.pdf';

    // Store the PDF in the storage/app directory
    Storage::put($directory . '/' . $filename, $pdfContent);

    // Generate the URL for the stored PDF
    $pdfPath = $directory . '/' . $filename;
    
        Livrable::where('apprenant_id', $this->apprenantId)
        ->whereHas('affectation', function ($query) {
            $query->whereHas('projet', function ($query) {
                $query->where('id', $this->projetId);
            });
        })
            ->orderBy('created_at', 'desc')
            ->update([
                'evaluation_jointe' => $pdfPath,
                'note_produit' => $this->noteProduit_total,
                'note_propos' => $this->notePropos_total,
                'note_processus' => $this->noteProcessus_total,
        ]);

        $this->isSaving = false;

        return response()->streamDownload(
            fn () => print($pdfContent),
            "file.pdf"
        );
    }

    public function saveEvaluation()
    {
        sleep(3);
                
        $filename = 'Rapport_Evaluation_du_projet.pdf';

        Storage::put('livrables/' . $livrable->apprenant->cne.'/' . $filename, $pdfContent);

        $pdfUrl = Storage::get('livrables/' . $livrable->apprenant->cne.'/' . $filename);
        
        dd($pdfUrl);
        //$evaluation_jointe = $this->file ? $this->file->storeAs('livrables/' . $livrable->apprenant->cne, $this->file->getClientOriginalName()) : null;        

        // Find the last livrable for the apprenant
        /**/

        $livrable = Livrable::where('apprenant_id', $this->apprenantId)
            ->orderBy('created_at', 'desc')
            ->update([
                'evaluation_jointe' => $pdfUrl,
            ]);

        session()->flash('message', 'Evaluation bien ajouter avec succès.');
        
        $this->reset('state');
    }
}
