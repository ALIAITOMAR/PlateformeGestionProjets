<?php

namespace App\Livewire\Enseignant;

use Livewire\Component;
use App\Models\Enseignant;
use App\Models\Apprenant;
use App\Models\Projet;
use App\Models\Tache;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjetManager extends Component
{
    use WithPagination;

    use WithFileUploads;

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
    public $state = [
        'id' => null,
        'titre' => null,
        'description' => null,
        'module' => null,
        'competence' => null,
        'piece_jointe' => null,
        'taches' => [
            ['titre' => '', 'description' => '']
        ],
        'questions' => [
            ['titre' => '']
        ],
        /*'criteres' => [
            ['libelle' => '']
        ],*/
        'criteres' => [
            ['libelle' => '', 'indicateurs' => [['libelle' => '', 'bareme' => '']]],
        ],
    ];

    /**
     * The new file for the projet.
     *
     * @var mixed
     */
    public $file;

    //public $fields = [];

    /**
     * Indicates if projet add is being confirmed.
     *
     * @var bool
     */
    public $confirmingProjetAdd = false;

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
        $this->projet = Projet::all();
    }

    
    public function addTache()
    {
        $this->state['taches'][] = ['titre' => '', 'description' => ''];
    }

    public function removeTache($index)
    {
        unset($this->state['taches'][$index]);
        $this->state['taches'] = array_values($this->state['taches']);
    }

    public function addQuestion()
    {
        $this->state['questions'][] = ['question' => ''];
    }

    public function removeQuestion($index)
    {
        unset($this->state['questions'][$index]);
        $this->state['questions'] = array_values($this->state['questions']);
    }

    public function addCritere()
    {
        //$this->state['criteres'][] = ['libelle' => ''];
        $this->state['criteres'][] = ['libelle' => '', 'indicateurs' => [['libelle' => '', 'bareme' => '']]];
    }

    public function removeCritere($index)
    {
        unset($this->state['criteres'][$index]);
        $this->state['criteres'] = array_values($this->state['criteres']);
    }

    public function addIndicateur($critereIndex)
    {
        $this->state['criteres'][$critereIndex]['indicateurs'][] = ['libelle' => '', 'bareme' => ''];
    }

    public function removeIndicateur($critereIndex, $indicateurIndex)
    {
        unset($this->state['criteres'][$critereIndex]['indicateurs'][$indicateurIndex]);
        $this->state['criteres'][$critereIndex]['indicateurs'] = array_values($this->state['criteres'][$critereIndex]['indicateurs']);
    }

    public function addField($field)
    {
        $this->state[$field][] = [];
    }

    public function removeField($field, $index)
    {
        unset($this->state[$field][$index]);
        $this->state[$field] = array_values($this->state[$field]);
    }

    public function messages()
    {
        return [
            'state.criteres.*.libelle.required' => 'Le libelle du critère est requis.',
            'state.criteres.*.libelle.string' => 'Le libelle du critère doit être une chaîne de caractères.',
            'state.criteres.*.libelle.max' => 'Le libelle du critère ne doit pas dépasser :max caractères.',
            'state.criteres.*.indicateurs.*.libelle.required' => 'Le libelle de l\'indicateur est requis.',
            'state.criteres.*.indicateurs.*.libelle.string' => 'Le libelle de l\'indicateur doit être une chaîne de caractères.',
            'state.criteres.*.indicateurs.*.libelle.max' => 'Le libelle de l\'indicateur ne doit pas dépasser :max caractères.',
        ];
    }

    /**
     * Confirm that the given Projet should be added.
     *
     * @param  int  $projetId
     * @return void
     */
    public function confirmProjetAdd()
    {
        $this->resetErrorBag();
        $this->confirmingProjetAdd = true;
        $this->reset('state');
        $this->reset('file');
    }

    /**
     * Create a new Projet.
     *
     * @return void
     */
    public function createProjet()
    {
        Validator::make($this->state, [
            'titre' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'module' => ['required', 'string', 'max:255'],
            'competence' => ['required', 'string', 'max:255', 'regex:/^[\w\s,]+$/'],
            'taches.*.titre' => ['required', 'string', 'max:255'],
            'taches.*.description' => ['required', 'string', 'max:255'],
            'criteres.*.libelle' => ['required', 'string', 'max:255'],
            'questions.*.question' => ['required', 'string', 'max:255'],
            'criteres.*.indicateurs' => ['required', 'array'],
            'criteres.*.indicateurs.*.libelle' => ['required', 'string', 'max:255'],
            'criteres.*.indicateurs.*.bareme' => ['required', 'numeric', 'max:255'],
        ], [
            'titre.required' => 'Le titre est requis.',
            'titre.string' => 'Le titre doit être une chaîne de caractères.',
            'titre.max' => 'Le titre ne doit pas dépasser :max caractères.',
            'description.required' => 'La description est requise.',
            'description.string' => 'La description doit être une chaîne de caractères.',
            'description.max' => 'La description ne doit pas dépasser :max caractères.',
            'module.required' => 'Le module est requis.',
            'module.string' => 'Le module doit être une chaîne de caractères.',
            'module.max' => 'Le module ne doit pas dépasser :max caractères.',
            'competence.required' => 'La compétence est requise.',
            'competence.string' => 'La compétence doit être une chaîne de caractères.',
            'competence.max' => 'La compétence ne doit pas dépasser :max caractères.',
            'competence.regex' => 'La compétence doit être au format correct.',
            'taches.*.titre.required' => 'Le titre de la tâche est requis.',
            'taches.*.titre.string' => 'Le titre de la tâche doit être une chaîne de caractères.',
            'taches.*.titre.max' => 'Le titre de la tâche ne doit pas dépasser :max caractères.',
            'taches.*.description.required' => 'La description de la tâche est requise.',
            'taches.*.description.string' => 'La description de la tâche doit être une chaîne de caractères.',
            'taches.*.description.max' => 'La description de la tâche ne doit pas dépasser :max caractères.',
            'criteres.*.libelle.required' => 'Le libelle du critère est requis.',
            'criteres.*.libelle.string' => 'Le libelle du critère doit être une chaîne de caractères.',
            'criteres.*.libelle.max' => 'Le libelle du critère ne doit pas dépasser :max caractères.',
            'questions.*.question.required' => 'Le titre de la question est requis.',
            'questions.*.question.string' => 'Le titre de la question doit être une chaîne de caractères.',
            'questions.*.question.max' => 'Le titre de la question ne doit pas dépasser :max caractères.',
            'criteres.*.indicateurs.required' => 'Les indicateurs sont requis pour ce critère.',
            'criteres.*.indicateurs.array' => 'Les indicateurs doivent être sous forme de tableau.',
            'criteres.*.indicateurs.*.libelle.required' => 'Le libelle de l\'indicateur est requis.',
            'criteres.*.indicateurs.*.libelle.string' => 'Le libelle de l\'indicateur doit être une chaîne de caractères.',
            'criteres.*.indicateurs.*.libelle.max' => 'Le libelle de l\'indicateur ne doit pas dépasser :max caractères.',
            'criteres.*.indicateurs.*.bareme.required' => 'Le barème de l\'indicateur est requis.',
            'criteres.*.indicateurs.*.bareme.numeric' => 'Le barème de l\'indicateur doit être un nombre.',
            'criteres.*.indicateurs.*.bareme.max' => 'Le barème de l\'indicateur ne doit pas dépasser :max.',
        ])->validate();

        $this->validate([
            'file' => ['nullable', 'file', 'mimes:pdf,xlsx,docx,zip', 'max:2048'],
        ], [
            //'file.required' => 'Le fichier est requis.',
            'file.file' => 'Le champ doit être un fichier.',
            'file.mimes' => 'Le fichier doit être de type :values.',
            'file.max' => 'La taille maximale du fichier est :max kilo-octets.',
        ]);

        DB::beginTransaction();

        try {
            
            $piece_jointe = $this->file ? $this->file->storeAs('projets/' . auth()->user()->enseignants->matricule, $this->file->getClientOriginalName()) : null;        

            $projet = auth()->user()->enseignants->projets()->create([
                'titre' => $this->state['titre'],
                'description' => $this->state['description'],
                'module' => $this->state['module'],
                'competence' => $this->state['competence'],
                'piece_jointe' => $piece_jointe,
            ]);
            
            $projet->taches()->createMany($this->state['taches']);
            $projet->questions()->createMany($this->state['questions']);

            $indicateurs = collect($this->state['criteres'])->flatMap(function ($critere) {
                return $critere['indicateurs'];
            })->all();

            $projet->criteres()->createMany($this->state['criteres']);

            $projet->criteres()->each(function ($critere) use ($indicateurs) {
                $critere->indicateurs()->createMany($indicateurs);
            });

            DB::commit();

        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            session()->flash('error', 'Une erreur s\'est produite lors de la création du apprenant.');
        }

        session()->flash('message', 'Projet a été ajouté avec succès.');

        $this->confirmingProjetAdd = false;
        
        $this->reset('state');
        $this->reset('file');
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

        $projet = Projet::find($projetId);
        
        //dd(json_decode($projet->competence, true));

        $this->state = [
            'id' => $projet->id,
            'titre' => $projet->titre,
            'description' => $projet->description,
            'module' => $projet->module,
            'competence' => $projet->competence,
            'piece_jointe' => $projet->piece_jointe,
            'taches' => $projet->taches->toArray(),
            'criteres' => $projet->criteres->map(function ($critere) {
                $critereData = $critere->toArray();
                $critereData['indicateurs'] = $critere->indicateurs->toArray();
                return $critereData;
            })->toArray(),
            'questions' => $projet->questions->toArray(),
        ];

        $this->confirmingProjetUpdate = true;
    }
    
    public function download(Projet $projet)
    {
        $filePath = storage_path('app/' . $projet->piece_jointe);
        return response()->download($filePath);
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
            'description' => ['required', 'string', 'max:255'],
            'module' => ['required', 'string', 'max:255'],
            'competence' => ['required', 'string', 'regex:/^[\w\s,]+$/'],
            'taches.*.titre' => ['required', 'string', 'max:255'],
            'taches.*.description' => ['required', 'string', 'max:255'],
            'criteres.*.libelle' => ['required', 'string', 'max:255'],
            'questions.*.question' => ['required', 'string', 'max:255'],
            'criteres.*.indicateurs' => ['required', 'array'],
            'criteres.*.indicateurs.*.libelle' => ['required', 'string', 'max:255'],
            'criteres.*.indicateurs.*.bareme' => ['required', 'numeric', 'max:255'],
        ], [
            'titre.required' => 'Le titre est requis.',
            'titre.string' => 'Le titre doit être une chaîne de caractères.',
            'titre.max' => 'Le titre ne doit pas dépasser :max caractères.',
            'description.required' => 'La description est requise.',
            'description.string' => 'La description doit être une chaîne de caractères.',
            'description.max' => 'La description ne doit pas dépasser :max caractères.',
            'module.required' => 'Le module est requis.',
            'module.string' => 'Le module doit être une chaîne de caractères.',
            'module.max' => 'Le module ne doit pas dépasser :max caractères.',
            'competence.required' => 'La compétence est requise.',
            'competence.string' => 'La compétence doit être une chaîne de caractères.',
            'competence.max' => 'La compétence ne doit pas dépasser :max caractères.',
            'competence.regex' => 'La compétence doit être au format correct.',
            'taches.*.titre.required' => 'Le titre de la tâche est requis.',
            'taches.*.titre.string' => 'Le titre de la tâche doit être une chaîne de caractères.',
            'taches.*.titre.max' => 'Le titre de la tâche ne doit pas dépasser :max caractères.',
            'taches.*.description.required' => 'La description de la tâche est requise.',
            'taches.*.description.string' => 'La description de la tâche doit être une chaîne de caractères.',
            'taches.*.description.max' => 'La description de la tâche ne doit pas dépasser :max caractères.',
            'criteres.*.libelle.required' => 'Le libelle du critère est requis.',
            'criteres.*.libelle.string' => 'Le libelle du critère doit être une chaîne de caractères.',
            'criteres.*.libelle.max' => 'Le libelle du critère ne doit pas dépasser :max caractères.',
            'questions.*.question.required' => 'Le titre de la question est requis.',
            'questions.*.question.string' => 'Le titre de la question doit être une chaîne de caractères.',
            'questions.*.question.max' => 'Le titre de la question ne doit pas dépasser :max caractères.',
            'criteres.*.indicateurs.required' => 'Les indicateurs sont requis pour ce critère.',
            'criteres.*.indicateurs.array' => 'Les indicateurs doivent être sous forme de tableau.',
            'criteres.*.indicateurs.*.libelle.required' => 'Le libelle de l\'indicateur est requis.',
            'criteres.*.indicateurs.*.libelle.string' => 'Le libelle de l\'indicateur doit être une chaîne de caractères.',
            'criteres.*.indicateurs.*.libelle.max' => 'Le libelle de l\'indicateur ne doit pas dépasser :max caractères.',
            'criteres.*.indicateurs.*.bareme.required' => 'Le barème de l\'indicateur est requis.',
            'criteres.*.indicateurs.*.bareme.numeric' => 'Le barème de l\'indicateur doit être un nombre.',
            'criteres.*.indicateurs.*.bareme.max' => 'Le barème de l\'indicateur ne doit pas dépasser :max.',
        ])->validate();

        $this->validate([
            'file' => ['nullable', 'file', 'mimes:pdf,xlsx,docx,zip', 'max:2048'],
        ], [
            //'file.required' => 'Le fichier est requis.',
            'file.file' => 'Le champ doit être un fichier.',
            'file.mimes' => 'Le fichier doit être de type :values.',
            'file.max' => 'La taille maximale du fichier est :max kilo-octets.',
        ]);
        
        if ($this->state['id']) {

            $projet = Projet::findOrFail($this->state['id']);        

            // Mettre à jour les champs Projet
            $projet->titre = $this->state['titre'];
            $projet->description = $this->state['description'];
            $projet->module = $this->state['module'];
            $projet->competence = $this->state['competence'];
            if($this->file)
            {
                $fileName = $this->file->store('projets');
                $projet->piece_jointe = $fileName;
            }
            
            // Mettre à jour les champs Tâche
            $tacheIds = collect($this->state['taches'])->pluck('id')->filter()->toArray();
            $projet->taches()->whereNotIn('id', $tacheIds)->delete();

            collect($this->state['taches'])->each(function ($tache) use ($projet) {
                $projet->taches()->updateOrCreate(['id' => $tache['id'] ?? null], $tache);
            });

            // Mettre à jour les champs Critere
            /*$critereIds = collect($this->state['criteres'])->pluck('id')->filter()->toArray();
            $projet->criteres()->whereNotIn('id', $critereIds)->delete();

            collect($this->state['criteres'])->each(function ($critere) use ($projet) {
                $projet->criteres()->updateOrCreate(['id' => $critere['id'] ?? null], $critere);
            });*/

            // Mettre à jour les champs Critere et Indicateur
            $critereIds = collect($this->state['criteres'])->pluck('id')->filter()->toArray();
            $projet->criteres()->whereNotIn('id', $critereIds)->delete();

            collect($this->state['criteres'])->each(function ($critereData) use ($projet) {
                $critere = $projet->criteres()->updateOrCreate(['id' => $critereData['id'] ?? null], [
                    'libelle' => $critereData['libelle'],
                ]);

                if (isset($critereData['indicateurs'])) {
                    $indicateurIds = collect($critereData['indicateurs'])->pluck('id')->filter()->toArray();
                    $critere->indicateurs()->whereNotIn('id', $indicateurIds)->delete();

                    collect($critereData['indicateurs'])->each(function ($indicateur) use ($critere) {
                        $critere->indicateurs()->updateOrCreate(['id' => $indicateur['id'] ?? null], [
                            'libelle' => $indicateur['libelle'],
                            'bareme' => $indicateur['bareme'],
                        ]);
                    });
                }
            });

            // Mettre à jour les champs Question
            $questionIds = collect($this->state['questions'])->pluck('id')->filter()->toArray();
            $projet->questions()->whereNotIn('id', $questionIds)->delete();

            collect($this->state['questions'])->each(function ($question) use ($projet) {
                $projet->questions()->updateOrCreate(['id' => $question['id'] ?? null], $question);
            });

            $projet->save();

            session()->flash('message', 'Projet a été modifié avec succès.');
            $this->confirmingProjetUpdate = false;
            $this->reset('state');
            $this->reset('file');
            
        }
    }

    /**
     * Confirm that the given API token should be deleted.
     *
     * @param  int  $projetId
     * @return void
     */
    public function confirmProjetDeletion($projetId)
    {
        $this->confirmingProjetDeletion = true;

        $this->projetIdBeingDeleted = $projetId;
    }

    /**
     * Delete the Projet.
     *
     * @return void
     */
    public function deleteProjet()
    {
        $projet = Projet::findOrFail($this->projetIdBeingDeleted);
        $projet->delete();
        $this->confirmingProjetDeletion = false;
        session()->flash('message', 'Projet a été supprimé avec succès.');
    }

    public function updatingSearch()
    {
        $this->resetPage();
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
    
    public function render()
    {
        $projets = auth()->user()->enseignants->projets()
        ->where(function ($query) {
            $query->where('titre', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('module', 'like', '%' . $this->search . '%')
                ->orWhere('competence', 'like', '%' . $this->search . '%');
        })
        ->orderBy('id', 'ASC')
        ->paginate(5);

        return view('livewire.enseignant.projet-manager', ['projets' => $projets]);
    }
}
