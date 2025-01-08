<?php

namespace App\Livewire\Admin;

use Livewire\Component;

use App\Models\Enseignant;
use App\Models\User;
use App\Models\Apprenant;
use App\Models\Projet;
use Livewire\WithPagination;

class Dashboard extends Component
{

    use WithPagination;

    public $total_admins, $total_ensignants, $total_apprenants, $total_online, $total_projets;

    public function render()
    {

        $this->total_admins = User::where('role', 'admin')->count();
        $this->total_projets = Projet::count();
        $this->total_ensignants = User::where('role', 'enseignant')->count();
        $this->total_apprenants = User::where('role', 'apprenant')->count();
        $this->total_online = User::count();


        $topEnseignants = Enseignant::with('user')
        ->withCount('projets')
        ->having('projets_count', '>', 0)
        ->orderByDesc('projets_count')
        ->limit(10)
        ->paginate(10);

        return view('livewire.admin.dashboard', ['topEnseignants' => $topEnseignants]);
    }
}
