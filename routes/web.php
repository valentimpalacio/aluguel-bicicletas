<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BicicletaController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Rotas de autenticação
Auth::routes();



// Rotas protegidas por autenticação
Route::middleware('auth')->group(function () {
    // Rotas de Bicicletas
    Route::get('/bicicletas', [BicicletaController::class, 'index'])->name('bicicletas.index');
    Route::get('/bicicletas/create', [BicicletaController::class, 'create'])->name('bicicletas.create');
    Route::post('/bicicletas', [BicicletaController::class, 'store'])->name('bicicletas.store');
    Route::put('/bicicletas/{id}', [BicicletaController::class, 'update'])->name('bicicletas.update');
    Route::delete('/bicicletas/{id}', [BicicletaController::class, 'destroy'])->name('bicicletas.destroy');

    // Rotas de Reservas
    Route::post('/reservas/{bicicletaId}', [ReservaController::class, 'reservar'])->name('reservas.reservar');
    Route::post('/reservas/{id}/finalizar', [ReservaController::class, 'finalizarReserva'])->name('reservas.finalizar');
});
Route::middleware('auth')->group(function () {
    // Outras rotas já existentes...

    // Página de alteração/edição
    
    Route::put('/bicicletas/{id}', [BicicletaController::class, 'update'])->name('bicicletas.update');
});

Route::get('/bicicletas/edit', function () {return view('bicicletas.edit');})->name('bicicletas.edit');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
