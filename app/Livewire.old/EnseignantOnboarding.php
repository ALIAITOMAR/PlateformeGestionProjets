<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Enseignant;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class EnseignantOnboarding extends Component
{
       /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];
    
    /**
     * Mount the component.
     *
     * @return void
     */
    public function mount()
    {
        if (Auth::user()->hasCompletedRegistration() || !Auth::user()->isEnseignant()) {
            return redirect()->route('dashboard');
        }
    }

    public function submit()
    {
        sleep(3);

        Validator::make($this->state, [
            'matricule' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9]+$/','unique:enseignants'],
            'cadre' => ['required', 'string', 'max:255'],
            'date_embauche' => ['required', 'date'],
            'date_affectation' => ['required', 'date'],
            'specialite' => ['required', 'string', 'max:255'],
            'etablissement' => ['required', 'string', 'max:255'],
            'cycle' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'regex:#^(?:\+?212|0)([ \-_/]*)(\d[ \-_/]*){9}$#'],
        ])->validate();

        auth()->user()->enseignants()->create([
            'matricule' => $this->state['matricule'],
            'cadre' => $this->state['cadre'],
            'date_embauche' => $this->state['date_embauche'],
            'date_affectation' => $this->state['date_affectation'],
            'specialite' => $this->state['specialite'],
            'etablissement' => $this->state['etablissement'],
            'cycle' => $this->state['cycle'],
            'tel' => $this->state['tel'],
        ]);

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.enseignant-onboarding');
    }
}
