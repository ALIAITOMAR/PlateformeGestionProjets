<?php

use Illuminate\Support\Facades\Route;

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


Route::middleware(['auth:sanctum', 'verified'])->get('/admin/enseignants', function () {
    return view('enseignants');
})->name('enseignants');


Route::middleware(['auth:sanctum', 'verified'])->get('/apprenants', function () {
    return view('apprenants');
})->name('apprenants');

Route::middleware(['auth:sanctum', 'verified'])->get('/classes', function () {
    return view('classes');
})->name('classes');

Route::middleware(['auth:sanctum', 'verified'])->get('/projets', function () {
    return view('projets');
})->name('projets');