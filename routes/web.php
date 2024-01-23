<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controller_book;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RelawanController;
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

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/detail', function () {
    return view('detail');
});
Route::resource('/pesan',\App\Http\Controllers\PesanController::class);
Route::resource('/user',\App\Http\Controllers\UserController::class);
Route::resource('/',\App\Http\Controllers\MasterController::class);
Route::resource('/relawan',\App\Http\Controllers\RelawanController::class);
Route::resource('/book',\App\Http\Controllers\controller_book::class);

Route::get('/detail/{id}', [controller_book::class, 'show']);
Route::get('/hapusBuku/{id}', [controller_book::class, 'destroy']);
Route::get('/show_read/{id}', [controller_book::class, 'showRead']);

Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/portal', [AuthController::class, 'login']);

