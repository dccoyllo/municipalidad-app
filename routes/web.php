<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\OficinaController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [PageController::class, 'getLogin'])->name('login');
Route::post('login', [PageController::class, 'dataLogin'])->name('dataLogin');
Route::get('/logout', [PageController::class, 'logout'])->name('logout');
Route::get('/', [PageController::class, 'getInicio'])->name('inicio')->middleware('auth');

Route::resource('servicio', ServicioController::class)->middleware('auth');
Route::resource('oficina', OficinaController::class)->middleware('auth');
Route::resource('empleado', EmpleadoController::class)->middleware('auth');
Route::resource('usuario', UsuarioController::class)->middleware('auth');
Route::resource('modulo', ModuloController::class)->middleware('auth');


