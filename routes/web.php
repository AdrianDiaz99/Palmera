<?php

use App\Http\Controllers\PredioController;
use Illuminate\Support\Facades\Route;

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

Route::resource('/predios', 'PredioController');

Route::get('/predios', 'PredioController@index')->name('predios.index');
Route::post('/predios', 'PredioController@store')->name('predios.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
