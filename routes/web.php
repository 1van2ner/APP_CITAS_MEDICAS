<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Web\PacienteController;
use App\Http\Controllers\Web\MedicoController;
use App\Http\Controllers\Web\CitaController;
use App\Http\Controllers\Web\DiagnosticoController;
use App\Http\Controllers\Web\TratamientoController;
use App\Http\Controllers\Web\MedicamentoController;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('auth.google');
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('/auth/github/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('auth.github');
Route::get('/auth/github/callback', [LoginController::class, 'handleGithubCallback']);


// Rutas protegidas con autenticación
Route::middleware('auth')->group(function () {
    // Pacientes CRUD
    Route::resource('pacientes', PacienteController::class);
    
    // Médicos CRUD
    Route::resource('medicos', MedicoController::class);
    
    // Citas CRUD
    Route::resource('citas', CitaController::class);
    
    // Diagnósticos CRUD
    Route::resource('diagnosticos', DiagnosticoController::class);
    
    // Tratamientos CRUD
    Route::resource('tratamientos', TratamientoController::class);
    
    // Medicamentos CRUD
    Route::resource('medicamentos', MedicamentoController::class);


    // En routes/web.php
Route::post('/medicamentos', [App\Http\Controllers\Web\MedicamentoController::class, 'store'])->name('medicamentos.store');

Route::post('/tratamientos', [App\Http\Controllers\Web\TratamientoController::class, 'store'])->name('tratamientos.store');
});
