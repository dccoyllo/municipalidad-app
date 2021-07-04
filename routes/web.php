<?php

use App\Http\Controllers\BuscadorController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\ContribuyenteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\OficinaController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PersonaJuridicaController;
use App\Http\Controllers\PersonaNaturalController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Middleware\Administrador;
use App\Http\Middleware\Logistica;
use App\Http\Middleware\Operaciones;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group([
    'middleware' => Administrador::class,
    'prefix' => 'admin'
], function () {
    Route::get('/series', 'SeriesController@index');
    Route::get('/series/{id}', 'SeriesController@edit');
});
Route::middleware(['auth'])->group(function () {

        Route::get('/', [PageController::class, 'getInicio'])->name('inicio');
        Route::resource('servicio', ServicioController::class);
        Route::resource('oficina', OficinaController::class);
        Route::resource('empleado', EmpleadoController::class);
        Route::resource('usuario', UsuarioController::class);
        Route::resource('modulo', ModuloController::class);
    
        Route::resource('persona', PersonaNaturalController::class);
        Route::resource('empresa', PersonaJuridicaController::class);
    
        Route::resource('contribuyente', ContribuyenteController::class);
        Route::resource('contrato', ContratoController::class);
    
        Route::get('dni/{dni}', [BuscadorController::class, 'getSearchDNI']);
        Route::get('ruc/{ruc}', [BuscadorController::class, 'getSearchRUC']);

});

// Route::middleware([Logistica::class])->group(function () {

//     Route::resource('persona', PersonaNaturalController::class);
//     Route::resource('empresa', PersonaJuridicaController::class);

//     Route::resource('contribuyente', ContribuyenteController::class);
//     Route::resource('contrato', ContratoController::class);

// });

// Route::middleware(['auth', Operaciones::class])->group(function () {
    
//     Route::resource('servicio', ServicioController::class);

// });


Route::get('/login', [PageController::class, 'getLogin'])->name('login');
Route::post('login', [PageController::class, 'dataLogin'])->name('dataLogin');
Route::get('/logout', [PageController::class, 'logout'])->name('logout');



