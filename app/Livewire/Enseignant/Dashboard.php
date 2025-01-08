<?php

namespace App\Livewire\Enseignant;

use Livewire\Component;
use App\Models\Enseignant;
use App\Models\User;
use App\Models\Apprenant;
use App\Models\Livrable;
use App\Models\Projet;
use App\Models\Classe;

use Livewire\WithPagination;

class Dashboard extends Component
{
    
    use WithPagination;

    public $total_apprenants, $total_projets, $total_classes, $total_online;

    public function render()
    {
        
        $this->total_apprenants = Apprenant::where('enseignant_id', auth()->user()->enseignants->id)->count();
        $this->total_projets = Projet::where('enseignant_id', auth()->user()->enseignants->id)->count();
        $this->total_classes = Classe::where('enseignant_id', auth()->user()->enseignants->id)->count();
        //$this->total_livrables = Livrable::where('enseignant_id', auth()->user()->apprenants->id)->count();

        $topApprenants = Apprenant::withCount(['livrables' => function ($query) {
            $query->where('complete', 1);
        }])
        ->where('enseignant_id', auth()->user()->enseignants->id)
        ->has('livrables', '>', 0)
        ->orderByDesc('livrables_count')
        ->take(10)
        ->get();

        return view('livewire.enseignant.dashboard', ['topApprenants' => $topApprenants]);
    }
}
