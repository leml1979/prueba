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
    return view('home');
});

Route::resource('/categorias', '\App\Http\Controllers\CategoriaController');

Route::get('/categorias/inactivar/{id}', [App\Http\Controllers\CategoriaController::class, 'inactivar'])->name('categorias.inactivar');

Route::resource('/productos', '\App\Http\Controllers\ProductoController');

Route::get('/productos/inactivar/{id}', [App\Http\Controllers\ProductoController::class, 'inactivar'])->name('productos.inactivar');

Route::resource('/precios', '\App\Http\Controllers\PrecioController');

Route::get('/precios/inactivar/{id}', [App\Http\Controllers\PrecioController::class, 'inactivar'])->name('precios.inactivar');

Route::get('/inventario', [App\Http\Controllers\InventarioController::class, 'index'])->name('inventario.index');
Route::get('/inventario/api', [App\Http\Controllers\InventarioController::class, 'api'])->name('inventario.api');
