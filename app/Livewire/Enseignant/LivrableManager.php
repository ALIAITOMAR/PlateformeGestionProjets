<?php

namespace App\Livewire\Enseignant;

use Livewire\Component;
use App\Models\Enseignant;
use App\Models\Apprenant;
use App\Models\Livrable;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class LivrableManager extends Component
{
    use WithPagination;

    public $search = '';

    public $livrableId;

    /**
     * The livrable instance.
     *
     * @var mixed
     */
    public $livrable;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    /**
     * Indicates if livrable update is being confirmed.
     *
     * @var bool
     */
    public $confirmingLivrableUpdate = false;

     /**
     * Indicates if livrable deletion is being confirmed.
     *
     * @var bool
     */
    public $confirmingLivrableDeletion = false;

     /**
     * The ID of the livrable being deleted.
     *
     * @var int
     */
    public $livrableIdBeingDeleted;

    /**
     * Mount the component.
     *
     * @return void
     */
    public function mount()
    {
        Auth::check() ? : abort(404);
        $this->livrable = Livrable::all();
    }

    /**
     * Confirm that the given Livrable should be updated.
     *
     * @param  int  $livrableId
     * @return void
     */
    public function confirmLivrableEdit($livrableId)
    {
        $this->resetErrorBag();

        $livrable = Livrable::find($livrableId);
        
        $this->state = [
            'id' => $livrable->id,
            'note_produit' => $livrable->note_produit,
            'note_propos' => $livrable->note_propos,
            'note_processus' => $livrable->note_processus,
            'commentaires' => $livrable->commentaires,
        ];

        $this->confirmingLivrableUpdate = true;
    }
    
    /**
     * Update the Livrable.
     *
     * @return void
     */
    public function updateLivrable()
    {
        Validator::make($this->state, [
            'note_produit' => ['nullable', 'regex:/^\d{1,2}\.\d{1,2}$/'],
            'note_propos' => ['nullable', 'regex:/^\d{1,2}\.\d{1,2}$/'],
            'note_processus' => ['nullable', 'regex:/^\d{1,2}\.\d{1,2}$/'],
            'commentaires' => ['required', 'string', 'max:255',],
        ])->validate();

        
        if ($this->state['id']) {
                        
            $livrable = Livrable::findOrFail($this->state['id']);

            $livrable->note_produit = $this->state['note_produit'];
            $livrable->note_propos = $this->state['note_propos'];
            $livrable->note_processus = $this->state['note_processus'];
            $livrable->commentaires = $this->state['commentaires'];
            $livrable->save();
                
            session()->flash('message', 'Livrable a été modifié avec succès.');
            $this->confirmingLivrableUpdate = false;
            $this->reset('state');
        }
    }

    /**
     * Confirm that the given API token should be deleted.
     *
     * @param  int  $livrableId
     * @return void
     */
    public function confirmLivrableDeletion($livrableId)
    {
        $this->confirmingLivrableDeletion = true;

        $this->livrableIdBeingDeleted = $livrableId;
    }

    /**
     * Delete the Livrable.
     *
     * @return void
     */
    public function deleteLivrable()
    {
        $livrable = Livrable::findOrFail($this->livrableIdBeingDeleted);
        $livrable->delete();
        $this->confirmingLivrableDeletion = false;
        session()->flash('message', 'Livrable a été supprimé avec succès.');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    /*public function updated($fields)
    {
        $this->validateOnly($fields);
    }*/

    public function downloadLivrable($livrableId)
    {
        // Récupérer la livraison
        $livrable = Livrable::findOrFail($livrableId);

        // Vérifiez si le chemin du fichier existe
        if ($livrable->chemin_fichier) {
            // Générer la réponse de téléchargement de fichier
            return response()->download(public_path($livrable->chemin_fichier));
        } else {
            // Gérer le cas où le fichier n'existe pas
            session()->flash('message', 'Aucun fichier disponible en téléchargement.');
            return back();
        }
    }

    
    public function render()
    {
        $livrables = Livrable::whereIn('projet_id', Auth::user()->enseignants->projets->pluck('id'))
        ->with(['projet', 'affectation'])
        ->whereHas('projet', function ($query) {
            $query->where('titre', 'like', '%' . $this->search . '%');
        })
        ->orWhere('commentaires', 'like', '%'.$this->search.'%')
        ->orderBy('id','ASC')
        ->paginate(5);

        return view('livewire.enseignant.livrable-manager', ['livrables' => $livrables]);
    }
}
