<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PredioController;

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


Route::get('/home/{opcion}', 'HomeController@eventos')->name('home.eventos');

Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
