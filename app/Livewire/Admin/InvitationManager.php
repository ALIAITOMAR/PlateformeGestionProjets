<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Invitation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Mail\InvitationEmail;
use Illuminate\Support\Facades\Mail;

class InvitationManager extends Component
{
    use WithPagination;

    public $search = '';

    public $invitationId;
    /**
     * The invitation instance.
     *
     * @var mixed
     */
    //public $invitation;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    /**
     * Indicates if invitation add is being confirmed.
     *
     * @var bool
     */
    public $confirmingInvitationAdd = false;

    /**
     * Indicates if invitation update is being confirmed.
     *
     * @var bool
     */
    public $confirmingInvitationUpdate = false;

     /**
     * Indicates if invitation deletion is being confirmed.
     *
     * @var bool
     */
    public $confirmingInvitationDeletion = false;

     /**
     * The ID of the invitation being deleted.
     *
     * @var int
     */
    public $invitationIdBeingDeleted;


    /**
     * Mount the component.
     *
     * @return void
     */
    public function mount()
    {
        Auth::check() ? : abort(404);
        //$this->invitation = Invitation::all();
    }

    /**
     * Confirm that the given Invitation should be added.
     *
     * @param  int  $invitationId
     * @return void
     */
    public function confirmInvitationAdd()
    {
        $this->resetErrorBag();
        $this->confirmingInvitationAdd = true;
        $this->reset('state');
    }

    /**
     * Create a new Invitation.
     *
     * @return void
     */
    public function createInvitation()
    {
        Validator::make($this->state, [
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'token' => ['required', 'string', 'unique:invitations'],
            'expires_at' => ['required'],
        ])->validate();

        $invitation = Invitation::create([
            'email' => $this->state['email'],
            'token' => $this->state['token'],
            'expires_at' => $this->state['expires_at'],
        ]);

        // Trigger email notification
        if(isset($this->state['notify']))
        {
            Mail::to($this->state['email'])->send(new InvitationEmail($invitation));

            session()->flash('message', 'Invitation a été ajouté avec succès. Un e-mail a été envoyé à l\'enseignant.');
        }
        else
        {
            session()->flash('message', 'Invitation a été ajouté avec succès.');
        }

        $this->confirmingInvitationAdd = false;

        $this->reset('state');
        
    }

    /**
     * Confirm that the given Invitation should be updated.
     *
     * @param  int  $invitationId
     * @return void
     */
    public function confirmInvitationEdit($invitationId)
    {
        $this->resetErrorBag();

        $invitation = Invitation::find($invitationId);

        $this->state = [
            'id' => $invitation->id,
            'email' => $invitation->email,
            'token' => $invitation->token,
            'statut' => $invitation->statut,
        ];

        $this->confirmingInvitationUpdate = true;
    }
    
    /**
     * Update the Invitation.
     *
     * @return void
     */
    public function updateInvitation()
    {
        Validator::make($this->state, [
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'token' => ['required', 'string', 'min:8'],
            'expires_at' => ['required'],
            'statut' => ['required'],
        ])->validate();

        if ($this->state['id']) {
            
            $invitation = Invitation::findOrFail($this->state['id']);

            // Mettre à jour les champs Invitation
            $invitation->email = $this->state['email'];
            $invitation->token = $this->state['token'];
            $invitation->expires_at = $this->state['expires_at'];

            // Enregistre les modifications apportées si des champs ont changé
            if ($invitation->isDirty()) {
                $invitation->save();
                session()->flash('message', 'Invitation a été modifié avec succès.');
                $this->confirmingInvitationUpdate = false;
                $this->reset('state');
            }
        }
    }

    /**
     * Confirm that the given API token should be deleted.
     *
     * @param  int  $invitationId
     * @return void
     */
    public function confirmInvitationDeletion($invitationId)
    {
        $this->confirmingInvitationDeletion = true;

        $this->invitationIdBeingDeleted = $invitationId;
    }

    /**
     * Delete the Invitation.
     *
     * @return void
     */
    public function deleteInvitation()
    {
        $invitation = Invitation::findOrFail($this->invitationIdBeingDeleted);
        $invitation->delete();
        
        $this->confirmingInvitationDeletion = false;
        session()->flash('message', 'Invitation a été supprimé avec succès.');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function regenerateToken()
    {
        $this->state['token'] = $this->generateRandomToken();
    }

    private function generateRandomToken()
    {
        // Génère un token aléatoire
        return bin2hex(random_bytes(16)); // 32 caractères de longueur
    }
    
    public function render()
    {
        $invitations = Invitation::where('email', 'like', '%'.$this->search.'%')
        ->orWhere('token', 'like', '%' . $this->search . '%')
        ->orderBy('id','ASC')
        ->paginate(5);

        return view('livewire.admin.invitation-manager', ['invitations' => $invitations]);
    }
}
