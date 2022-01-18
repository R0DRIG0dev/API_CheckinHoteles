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

//ruta para ver imagenes poniendo por get su nombre//16_44444444_D
//http://localhost:8000/documentos/1_11111111_d.jpg//idCheckin_DNI_(Adelante|Detras|Firma)
Route::get('/documentos/{archivo}', function($archivo) {
    return Storage::disk('public')->response($archivo); 
})->name('documentos.buscarArchivo');

//ruta para ver un pdf: http://localhost:8000/generarpdf/terminosCondiciones/1
//http://localhost/z_proyectosLaravel/SistemaCheckin/public/generarpdf/terminosCondiciones/4
Route::name('PDF_terminosCondiciones')->get('/generarpdf/terminosCondiciones/{id}','ArchivosController@terminosCondiciones');

//ruta para ver un parte de entrada:http://localhost:8000/generarpdf/parteDeEntrada/3 
//http://localhost/z_proyectosLaravel/SistemaCheckin/public/generarpdf/parteDeEntrada/1
Route::name('PDF_parteDeEntrada')->get('/generarpdf/parteDeEntrada/{id}','ArchivosController@parteDeEntrada');
