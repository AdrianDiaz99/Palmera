<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PredioController;
use App\Http\Controllers\ActividadController;

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
    return redirect()->route('login');
});

//Route::resource('/predios', 'PredioController');

Route::get('/predios', 'PredioController@index')->name('predios.index');
Route::post('/predios', 'PredioController@postEvents')->name('predios.postEvents');
Route::get('/predios/consultar', 'PredioController@consultar')->name('predios.consultar');

Route::get('/actividades_palmeras/', 'ActividadController@iniciaProgramarActividades')->name('actividades_palmeras.index');
Route::get('/actividades_palmeras/{predio}', 'ActividadController@seleccionarPredio')->name('actividades_palmeras.seleccionarPredio');
Route::post('/actividades_palmeras/', 'ActividadController@buscarPredio')->name('actividades_palmeras.buscarPredio');
Route::get('/actividades_palmeras/predio/{palmera}', 'ActividadController@seleccionaPalmera')->name('actividades_palmeras.seleccionaPalmera');
Route::get('/actividades_palmeras/actividades/{palmera}', 'ActividadController@actividades')->name('actividades_palmeras.actividades');
Route::get('/actividades_palmeras/actividades/{palmera}/{actividad}', 'ActividadController@mostrarActividad')->name('actividades_palmeras.agregar_actividad');
Route::post('/actividades_palmeras/programar_actividad', 'ActividadController@programarActividad')->name('actividades_palmeras.programar_actividad');

Route::get('/home/{opcion}', 'HomeController@eventos')->name('home.eventos');

Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
