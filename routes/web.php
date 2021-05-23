<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\OficinaController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Routes
Route::get('/login', [PageController::class, 'getLogin'])->name('login');
Route::get('/', [PageController::class, 'getInicio'])->name('inicio')/* ->middleware('auth') */;

Route::resource('servicios', ServicioController::class);
Route::resource('oficinas', OficinaController::class);
Route::resource('empleados', EmpleadoController::class);
Route::resource('usuarios', UsuarioController::class);


