<?php
namespace App\Http\Controllers;
use App\Hoteles;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(){
        return Hoteles::all();
    }
    /**Almacene un recurso recién creado en el almacenamiento
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response */
    public function store(Request $request){
        //
    }
    /**Mostrar el recurso especificado.
     * @param  int  $id
     * @return \Illuminate\Http\Response*/
    public function show($id){
        $c= Hoteles::find($id);
        if($c!= null){
            return $c;
        }else{
            return [
                'errores'  => "No existe un hotel con ese id"           
            ];
        }
    }
    /**Actualiza el recurso especificado en el almacenamiento.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response*/
    public function update(Request $request, $id){
        //
    }
    /**Eliminar el recurso especificado del almacenamiento.
     * @param  int  $id
     * @return \Illuminate\Http\Response*/
    public function destroy($id){
        //
    }
}
