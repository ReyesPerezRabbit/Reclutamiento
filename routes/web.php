<?php

use App\Http\Controllers\AgendaEntrevistaController;
use App\Http\Controllers\CandidatoCreateController;
use App\Http\Controllers\HomeCrontroller;
use App\Http\Controllers\LoginCrontroller;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () { return view('welcome');});

Route::get('/register', [RegisterController::class, 'show']);

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/', [LoginCrontroller::class, 'show']);

Route::get('/login', [LoginCrontroller::class, 'show']);

Route::post('/login', [LoginCrontroller::class, 'login']);

Route::get('/home', [HomeCrontroller::class, 'index']);

Route::get('/logout', [LogoutController::class, 'logout']);


#empezar haci con estps


Route::controller(CandidatoCreateController::class)->group(function () {

    Route::get('Añadir_candidato', 'mostrar')->name('candidato.mostrar');

    Route::post('Añadir_candidato', 'guardar')->name('candidato.guardar');

    Route::get('Lista_evaluacion', 'lista')->name('candidato.lista');

    Route::get('Expediente/{candidato}/editar', 'editar')->name('candidato.editar');

    Route::put('Expediente/{candidato}', 'actualizar')->name('candidato.actualizar');;

});

Route::controller(AgendaEntrevistaController::class)->group(function () {
    Route::get('Entrevista', 'cita')->name('candidato.entravista');
});