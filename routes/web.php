<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\EnseignantForm;
use App\Livewire\Apprenant\ProjetDetails;
use App\Http\Livewire\Enseignant\LivrableManager;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', 'enseignant.onboarding.completed',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route group for admin
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:admin'])->prefix('admin')->group(function () {
    
    Route::get('/invitations', function () {
        return view('invitations');
    })->name('admin.invitations');

    Route::get('/enseignants', function () {
        return view('enseignants');
    })->name('admin.enseignants');

});

// Route group for enseignant
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:enseignant', 'enseignant.onboarding.completed'])->prefix('enseignant')->group(function () {
    
    Route::get('/projets', function () {
        return view('projets');
    })->name('enseignant.projets');

    Route::get('/classes', function () {
        return view('classes');
    })->name('enseignant.classes');

    Route::get('/apprenants', function () {
        return view('apprenants');
    })->name('enseignant.apprenants');

    Route::get('/affectations', function () {
        return view('affectations');
    })->name('enseignant.affectations');

    Route::get('/livrables', function () {
        return view('livrables');
    })->name('enseignant.livrables');

    /*Route::get('/livrable/{id?}', function ($id) {
        return view('livrables', ['id' => $id]);
    })->name('enseignant.livrables');*/

    Route::get('/projet/{userId}/{id}-{titre}', function ($userId, $projetId) {
        return view('projet-details', ['userId' => $userId, 'projetId' => $projetId]);
    })->name('enseignant.projet-details');

});

// Route group for apprenant
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:apprenant'])->prefix('apprenant')->group(function () {
    
    Route::get('/projets', function () {
        return view('projets');
    })->name('apprenant.projets');

    Route::get('/livrables', function () {
        return view('livrables');
    })->name('apprenant.livrables');

    /*Route::get('/projets/{projetid}', function () {
        return view('projet-details');
    })->name('apprenant.projet-details');*/

    Route::get('/projets/{id}-{titre}', function ($projetId) {
        return view('projet-details', ['projetId' => $projetId]);
    })->name('apprenant.projet-details');

    //Route::get('/projets/{projetid}', ProjetDetails::class)->name('apprenant.projet-details');

    //Route::get('/projets/{id}', [ProjetDetails::class])->name('apprenant.projet-details');
});


Route::get('/enseignant/onboarding', function () {
    return view('enseignant-onboarding');
})->name('enseignant.onboarding');