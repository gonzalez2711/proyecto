<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CasillaController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\EleccionController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\EleccioncomiteController;
use App\Http\Controllers\VotoController;
use App\Http\Controllers\VotocandidatoController;
use App\Http\Controllers\FuncionariocasillaController;
use App\Http\Controllers\ImeiautorizadoController;
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
Route::get('/', function () {
    return view('welcome');
});
Route::resource('casilla', CasillaController::class);
Route::resource('candidato', CandidatoController::class);
Route::resource('eleccion', EleccionController::class);
Route::resource('funcionario', FuncionarioController::class);
Route::resource('rol', RolController::class);
Route::resource('eleccioncomite', EleccioncomiteController::class);
Route::resource('voto', VotoController::class);
Route::resource('votocandidato', VotocandidatoController::class);
Route::resource('funcionariocasilla', FuncionariocasillaController::class);
Route::resource('imeiautorizado', ImeiautorizadoController::class);