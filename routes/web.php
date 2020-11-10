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

Route::get('/declaracionjurada', function () {
    return view('registro.declaracionJurada');
})->name('declaracionjurada');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/seniat', [App\Http\Controllers\SeniatController::class, 'index'])->name('seniat');
Route::post('/seniat/guardar', [App\Http\Controllers\SeniatController::class, 'store'])->name('seniat.guardar');
Route::post('/registro/validar', [App\Http\Controllers\TUsuariosTemporalController::class, 'store'])->name('registro.validar');

Route::get('/usuarios/verificar/{hash}', [App\Http\Controllers\TUsuariosTemporalController::class, 'verificar'])->name('usuario.verificar');

Route::post('/password', [App\Http\Controllers\TUsuariosTemporalController::class, 'guardarUsuario'])->name('registro.password');


Route::get('/mensaje', function () {
    return view('registro.registroMensaje');
})->name('registroMensaje');

//declaracion jurada
Route::post('/declaracionjurada', [App\Http\Controllers\HomeController::class, 'guardarDeclaracion'])->name('declaracionjurada');

//informacion adicional
Route::get('/adicional', [App\Http\Controllers\AdicionalController::class, 'create'])->name('adicional.create');


//accionistas
Route::get('/accionista', [App\Http\Controllers\AccionistaController::class, 'index'])->name('accionista.index');
Route::get('/accionista-agregar', [App\Http\Controllers\AccionistaController::class, 'create'])->name('accionista.create');
Route::post('/buscar', [App\Http\Controllers\AccionistaController::class, 'buscar'])->name('accionista.buscar');
Route::post('/store', [App\Http\Controllers\AccionistaController::class, 'store'])->name('accionista.store');

//proveedores
Route::resource('/proveedores', '\App\Http\Controllers\ProveedorController');

Route::post('/proveedores/buscarDatos', [App\Http\Controllers\ProveedorController::class, 'buscarDatos'])->name('proveedor.buscarDatos');

Route::get('/proveedores/eliminar/{id}', [App\Http\Controllers\ProveedorController::class, 'destroy'])->name('proveedor.eliminar');

