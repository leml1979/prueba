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
    return view('welcome');
});

Route::get('/registro', function () {
    return view('registro');
})->name('registro');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/seniat', [App\Http\Controllers\SeniatController::class, 'index'])->name('seniat');
Route::post('/seniat/guardar', [App\Http\Controllers\SeniatController::class, 'store'])->name('seniat.guardar');
Route::post('/registro/validar', [App\Http\Controllers\TUsuariosTemporalController::class, 'store'])->name('registro.validar');
