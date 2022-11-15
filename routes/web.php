<?php

use App\Http\Controllers\PetsController;
use App\Http\Controllers\AdotantesController;
use App\Http\Controllers\AdotadosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('pets/buscar', [PetsController::class, 'buscar']);
Route::resource('pets', PetsController::class);

Route::get('adotantes/buscar', [AdotantesController::class, 'buscar']);
Route::resource('adotantes', AdotantesController::class);

Route::get('adotados/buscar', [AdotadosController::class, 'buscar']);
Route::resource('adotados', AdotadosController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
