<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Route::post('home',[UserController::class, 'update'])->name('updateUser');

Route::get('fotos', [UserController::class, 'fotos'])->name('fotos');
Route::post('fotos/aceptar', [UserController::class, 'aceptarFoto'])->name('aceptarFoto');
Route::post('fotos/rechazar', [UserController::class, 'rechazarFoto'])->name('rechazarFoto');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
