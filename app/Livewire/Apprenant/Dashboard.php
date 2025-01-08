<?php

namespace App\Livewire\Apprenant;

use Livewire\Component;
use App\Models\Enseignant;
use App\Models\User;
use App\Models\Apprenant;
use App\Models\Livrable;
use App\Models\Projet;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public $total_projets, $total_livrables, $total_apprenants, $total_online;

    public function render()
    {
        if(Auth::check())
        {
            $this->total_projets = Projet::whereHas('affectations', function ($query) {
                $query->whereHas('classe', function ($query){
                    $query->whereHas('apprenants', function ($query) {
                        $query->where('id', auth()->user()->apprenants->id);
                    });
                });
            })->count();
    
            $this->total_livrables = Livrable::where('apprenant_id', auth()->user()->apprenants->id)->count();
        }

        $livrables = Livrable::whereHas('affectation.projet', function ($query) {
            $query->where('apprenant_id', auth()->user()->apprenants->id);
        })
        ->orderBy('created_at', 'desc')
        ->limit(10)
        ->paginate(10);

        return view('livewire.apprenant.dashboard', ['livrables' => $livrables]);
    }
}
