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

Route::get('/predios', 'PredioController@iniciaRegistrarPredio')->name('predios.index');
Route::post('/predios', 'PredioController@registrarPredio')->name('predios.postEvents');
Route::get('/predios/consultar', 'PredioController@consultar')->name('predios.consultar');

Route::get('/actividades_palmeras/', 'ActividadPalmeraController@iniciaProgramarActividades')->name('actividades_palmeras.index');
Route::get('/actividades_palmeras/{predio}', 'ActividadPalmeraController@seleccionarPredio')->name('actividades_palmeras.seleccionarPredio');
Route::post('/actividades_palmeras/', 'ActividadPalmeraController@buscarPredio')->name('actividades_palmeras.buscarPredio');
Route::get('/actividades_palmeras/{predio}/{palmera}', 'ActividadPalmeraController@seleccionaPalmera')->name('actividades_palmeras.seleccionaPalmera');
Route::get('/actividades_palmeras/{predio}/{palmera}/{actividad}', 'ActividadPalmeraController@seleccionaActividad')->name('actividades_palmeras.agregar_actividad');
Route::post('/actividades_palmeras/programar_actividad', 'ActividadPalmeraController@agregarActividad')->name('actividades_palmeras.programar_actividad');


Route::get('/actividades_predios/', 'ActividadPredioController@iniciaProgramarActividades')->name('actividades_predios.index');
Route::get('/actividades_predios/{predio}', 'ActividadPredioController@seleccionarPredio')->name('actividades_predios.seleccionarPredio');
Route::post('/actividades_predios/', 'ActividadPredioController@buscarPredio')->name('actividades_predios.buscarPredio');
Route::get('/actividades_predios/{predio}/{actividad}', 'ActividadPredioController@seleccionaActividad')->name('actividades_predios.agregar_actividad');
Route::post('/actividades_predios/programar_actividad', 'ActividadPredioController@agregarActividad')->name('actividades_predios.programar_actividad');

Route::get('/home/{opcion}', 'HomeController@eventos')->name('home.eventos');

Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
