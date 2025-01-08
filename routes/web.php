<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

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
    
    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('admin.dashboard');
    });
    
    Route::get('/invitations', function () {
        return view('invitations');
    })->name('admin.invitations');

    Route::get('/enseignants', function () {
        return view('enseignants');
    })->name('admin.enseignants');

});

// Route group for enseignant
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:enseignant', 'enseignant.onboarding.completed'])->prefix('enseignant')->group(function () {
    
    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified', 'enseignant.onboarding.completed',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('enseignant.dashboard');
    });

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

    Route::get('/evaluation', function () {
        return view('evaluation');
    })->name('enseignant.evaluation');

    Route::get('/indicateurs', function () {
        return view('indicateurs');
    })->name('enseignant.indicateurs');

    Route::get('/projet/{userId}/{id}-{titre}', function ($userId, $projetId) {
        return view('projet-details', ['userId' => $userId, 'projetId' => $projetId]);
    })->name('enseignant.projet-details');

});

// Route group for apprenant
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:apprenant'])->prefix('apprenant')->group(function () {
    
    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('apprenant.dashboard');
    });

    Route::get('/projets', function () {
        return view('projets');
    })->name('apprenant.projets');

    Route::get('/livrables', function () {
        return view('livrables');
    })->name('apprenant.livrables');

    Route::get('/projets/{id}-{titre}', function ($projetId) {
        return view('projet-details', ['projetId' => $projetId]);
    })->name('apprenant.projet-details');

});

Route::get('/enseignant/onboarding', function () {
    return view('enseignant-onboarding');
})->name('enseignant.onboarding');