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
    return view('auth.login');
});

Route::get('/registro', function () {
    return view('registro');
})->name('registro');

Route::get('/declaracionjurada', function () {
    return view('registro.declaracionJurada');
})->name('declaracionjurada');

Route::post('/registro/validar', [App\Http\Controllers\TUsuariosTemporalController::class, 'store'])->name('registro.validar');

Route::get('/usuarios/verificar/{hash}', [App\Http\Controllers\TUsuariosTemporalController::class, 'verificar'])->name('usuario.verificar');
Route::post('/password', [App\Http\Controllers\TUsuariosTemporalController::class, 'guardarUsuario'])->name('registro.password');

Route::get('/mensaje', function () {
    return view('registro.registroMensaje');
})->name('registroMensaje');

Auth::routes();

Route::middleware(['auth'])->group(function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/seniat', [App\Http\Controllers\SeniatController::class, 'index'])->name('seniat')->middleware('permission:seniat.index');
Route::post('/seniat/guardar', [App\Http\Controllers\SeniatController::class, 'store'])->name('seniat.guardar');



//declaracion jurada
Route::post('/declaracionjurada', [App\Http\Controllers\HomeController::class, 'guardarDeclaracion'])->name('declaracionjurada');

//informacion adicional
Route::resource('/adicional', '\App\Http\Controllers\AdicionalController');
Route::post("municipios",[App\Http\Controllers\AdicionalController::class, 'municipio'])->name("municipios");
Route::post("parroquias",[App\Http\Controllers\AdicionalController::class, 'parroquia'])->name("parroquias");
Route::post("division",[App\Http\Controllers\AdicionalController::class, 'divisiones'])->name("division");
Route::post("grupo",[App\Http\Controllers\AdicionalController::class, 'grupos'])->name("grupos");
Route::post("clase",[App\Http\Controllers\AdicionalController::class, 'clases'])->name("clases");

//accionistas
Route::resource('/accionista', '\App\Http\Controllers\AccionistaController');
Route::post('/buscarpersona', [App\Http\Controllers\AccionistaController::class, 'buscar'])->name('accionista.buscar')->middleware('permission:accionista.buscar');
Route::get('/accionista/eliminar/{id}', [App\Http\Controllers\AccionistaController::class, 'destroy'])->name('accionista.eliminar')->middleware('permission:accionista.eliminar');

//proveedores
Route::resource('/proveedores', '\App\Http\Controllers\ProveedorController');
Route::post('/proveedores/buscarDatos', [App\Http\Controllers\ProveedorController::class, 'buscarDatos'])->name('proveedor.buscarDatos');

Route::get('/proveedores/eliminar/{id}', [App\Http\Controllers\ProveedorController::class, 'destroy'])->name('proveedor.eliminar');

//representante legal
Route::resource('/representante', '\App\Http\Controllers\RepresentanteLegalController');
Route::get('/representante/eliminar/{id}', [App\Http\Controllers\RepresentanteLegalController::class, 'destroy'])->name('representante.eliminar');

//establecimiento
Route::resource('/establecimiento', '\App\Http\Controllers\EstablecimientoController');
Route::get('/establecimiento/eliminar/{id}', [App\Http\Controllers\EstablecimientoController::class, 'destroy'])->name('establecimiento.eliminar');
Route::get('/establecimiento/{id}/contacto', [App\Http\Controllers\ContactoEstablecimientoController::class, 'index'])->name('establecimiento.contacto');


//establecimiento contacto
Route::resource('/establecimiento-contacto', '\App\Http\Controllers\ContactoEstablecimientoController');
Route::get('/establecimiento-contacto/{id}/create',[App\Http\Controllers\ContactoEstablecimientoController::class, 'create']);
Route::get('/contactos/eliminar/{id}/{establecimiento_id}', [App\Http\Controllers\ContactoEstablecimientoController::class, 'destroy'])->name('establecimiento-contacto.eliminar');


//certificados
Route::resource('/certificados', '\App\Http\Controllers\CertificadoController');
//generar pdf
Route::get('/certificado-matriz/{id}/pdf',[App\Http\Controllers\CertificadoController::class, 'pdf'])->name("pdf.matriz");
Route::get('/certificado/matriz/{id}/certificar',[App\Http\Controllers\CertificadoController::class, 'certificarSujeto'])->name("certificar.matriz");
Route::get('/certificado/establecimiento/pdf/{id}',[App\Http\Controllers\CertificadoController::class, 'pdfEstablecimiento'])->name("pdf.establecimiento");
Route::get('/certificado/{id}/certificar',[App\Http\Controllers\CertificadoController::class, 'certificarEstablecimiento'])->name("certificar.establecimiento");

});
//validar Certificados
Route::get("/certificado/matriz/validar/{codigo}",[App\Http\Controllers\CertificadoValidarController::class,'validarMatriz']);
Route::get("/certificado/establecimiento/validar/{codigo}",[App\Http\Controllers\CertificadoValidarController::class,'validarEstablecimiento']);
