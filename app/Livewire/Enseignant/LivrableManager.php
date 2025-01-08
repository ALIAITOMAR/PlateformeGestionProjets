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
use Illuminate\Support\Facades\Storage;

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
            'description' => ['required', 'string', 'max:255',],
        ])->validate();

        
        if ($this->state['id']) {
                        
            $livrable = Livrable::findOrFail($this->state['id']);

            $livrable->note_produit = $this->state['note_produit'];
            $livrable->note_propos = $this->state['note_propos'];
            $livrable->note_processus = $this->state['note_processus'];
            $livrable->description = $this->state['description'];
            $livrable->save();
                
            session()->flash('message', 'Livrable a été modifié avec succès.');
            $this->confirmingLivrableUpdate = false;
            $this->reset('state');
        }
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
        $livrables = Livrable::whereHas('affectation.projet', function ($query) {
            $query->where('enseignant_id', auth()->user()->enseignants->id);
        })
        ->whereIn('etat', ['Rendu', 'Rendu en retard'])
        ->where(function ($query) {
            $query->whereHas('affectation', function ($query) {
                    $query->whereHas('classe', function ($query) {
                        $query->where('nom', 'like', '%' . $this->search . '%');
                    });
                    $query->orWhereHas('projet', function ($query) {
                        $query->where('titre', 'like', '%' . $this->search . '%');
                    });
                })
                ->orWhereHas('apprenant.user', function ($query) {
                    $query->where('nom', 'like', '%' . $this->search . '%')
                          ->orWhere('prenom', 'like', '%' . $this->search . '%');
                });
        })
        ->latest('created_at')
        ->paginate(10)
        ->unique('affectation_id');

        return view('livewire.enseignant.livrable-manager', ['livrables' => $livrables]);
    }
}
