<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// Ruta para la página de bienvenida
Route::view('/', 'welcome')->name('welcome');

Route::middleware('auth')->group(function () {
    // Ruta para el dashboard
    Route::view('/dashboard', 'dashboard')->name('dashboard');



    // Rutas para el perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Ruta para la vista de chirps
    Route::get('/chirps', [ChirpController::class, 'index'])
    ->name('chirps.index');

    Route::post('/chirps', [ChirpController::class, 'store'])
    ->name('chirps.store'); 

    Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit'])
    ->name('chirps.edit'); 

    Route::put('/chirps/{chirp}', [ChirpController::class, 'update'])
    ->name('chirps.update');

    Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy'])
    ->name('chirps.destroy');

});

    // Ruta para la vista de Sena
    Route::get('/sena', function () {
        return view('sena.sena');
    })->name('sena.sena');


require __DIR__ . '/auth.php';