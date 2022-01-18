<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//ver todos los hoteles: http://localhost:8000/api/hoteles
Route::apiResource('/hoteles','HotelController')->only(['index','show']);
//ver todos los chekin: http://localhost:8000/api/checkin
//ver solo un chekin: http://localhost:8000/api/checkin/2
//update: localhost:8000/api/checkin/4 + (Json/text por PUT)
//borrar: localhost:8000/api/checkin/4 + (por DELETE)
Route::apiResource('/checkin','CheckinController');//->only(['index','store','show']);
//insertar chekin,huespedes y imagenes
Route::post('/checkin/insertar','CheckinController@superInsercion')
	->name('checkin.superInsert');
//buscar entre dos fechas: http://localhost:8000/api/checkin/buscar/2020-03-29/2020-09-01
Route::get('/checkin/buscar/{primeraFecha}/{segundaFecha}','CheckinController@buscarPorFecha')
	->name('checkin.buscarPorFecha');
//buscar por nombre o apellido: http://localhost:8000/api/checkin/buscar/Arredondo
Route::get('/checkin/buscar/{nombre}','CheckinController@buscarPorNombre')
	->name('checkin.buscarPorNombre');
//ver todos los huespedes: http://localhost:8000/api/huespedes
//ver solo un huesped: http://localhost:8000/api/huespedes/4
//insertar: http://localhost:8000/api/huespedes + (Json/text por POST)
//update: http://localhost:8000/api/huespedes/4 + (Json/text por PUT)
//borrar: http://localhost:8000/api/huespedes/4 + (por DELETE)
Route::apiResource('/huespedes','HuespedController');
//ver todos los idiomas: http://localhost:8000/api/idiomas
//ver solo un idioma: http://localhost:8000/api/idiomas/1
Route::apiResource('/idiomas','IdiomaController')->only(['index','show']);
//ver todos los paises: http://localhost:8000/api/paises
//ver solo un pais: http://localhost:8000/api/paises/173
Route::apiResource('/paises','PaisController')->only(['index','show']);
//ver todos los documento: http://localhost:8000/api/documento
//ver solo un documento: http://localhost:8000/api/documento/3
Route::apiResource('/documento','DocumentoController')->only(['index','show']);
//gestion de archivos:
//Route::apiResource('/archivos','ArchivosController');
