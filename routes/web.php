<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Routes
Route::get('/login', [PageController::class, 'getLogin'])->name('login');
Route::get('/', [PageController::class, 'getInicio'])->name('inicio')/* ->middleware('auth') */;

