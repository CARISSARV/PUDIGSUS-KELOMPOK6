<?php

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
    $nama="carissa";
    return view('welcome');
});

Route::resource('/membaca',\App\Http\Controllers\MembacaController::Class);
//Route::get('/membaca/create', 'MembacaController@create')->name('Membaca.create');
//Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
//Route::get('/membaca', 'App\Http\Controllers\MembacaController@index');

Route::get('/Membaca/create', 'MembacaController@create');
Route::get('/Membaca/edit', 'MembacaController@edit');
