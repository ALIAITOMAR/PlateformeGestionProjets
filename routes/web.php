<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\EnseignantForm;
use App\Livewire\Apprenant\ProjetDetails;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
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
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:enseignant', 'completed_registration'])->prefix('enseignant')->group(function () {
    
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


// Route for completing the enseignant profile
Route::middleware(['auth:sanctum', 'verified', 'role:enseignant', 'completed_registration'])->group(function () {
    Route::get('/complete-enseignant-profile', function () {
        return view('complete-enseignant-profile-form');
    })->name('complete.enseignant.profile');
});