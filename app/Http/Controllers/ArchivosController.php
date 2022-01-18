<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Rutas;
use App\Checkin;
use App\Huespedes;
use App\Hoteles;
use Illuminate\Support\Facades\Storage;

class ArchivosController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        // if ($foto=Rutas::setImagen($request->fotoDelante)) {
        //     $request->request->add(['rutas_url'=>$foto]);
        // }
        $file = $request->file('file');
        //print_r($file);
        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();
        //indicamos que queremos guardar un nuevo archivo en el disco local
        //Storage::disk('enLaCarpetaPublic')->put($nombre,\File::get($file));
        //Storage::disk('enLaCarpetaPublic')->put($nombre,$file);
        \Storage::disk('public')->put($nombre,\File::get($file));
        return "archivo guardado";
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function terminosCondiciones($id){
        set_time_limit(300);
        $c= Checkin::find($id);
        if($c!= null){
            // $DatosNecesarios = new \stdClass();
            $DatosNecesarios = '';
            $FechaDeCheckin=$c->checkins_fechaIngresoCheckin;
            $cantidadDeAdultos=$c->checkins_adultos;
            $cantidadDeNinos=$c->checkins_ninos;
            $nombreTitular='';

            $idDeCheckin=$c->checkins_id;
            $DNItitular='';
            //$DatosNecesarios[0] = 'gggggg';
            foreach (Hoteles::all() as $unHotel) {
                if($unHotel['hoteles_id']==$c->checkins_idHotel){
                    // $DatosNecesarios['datosDelHotel']=$unHotel;
                    $DatosNecesarios = $unHotel;
                }
            }
            foreach ($c->Huespedes as $unHuespedDeEsteChekin) {
                if($unHuespedDeEsteChekin->huespedes_titular=='1'){
                    $nombreTitular=$unHuespedDeEsteChekin->huespedes_nombre.' '.$unHuespedDeEsteChekin->huespedes_apellido;
                    $DNItitular=$unHuespedDeEsteChekin->huespedes_numeroDocumento;
                }
            }

            $pdf = \PDF::loadView('terminosCondiciones',compact('DatosNecesarios','FechaDeCheckin','cantidadDeAdultos','cantidadDeNinos','nombreTitular','idDeCheckin','DNItitular'));
            // $pdf = \PDF::loadView('terminosCondiciones')->with(compact('DatosNecesarios'));
            // $pdf = \PDF::loadView('terminosCondiciones')->with('DatosNecesarios',$DatosNecesarios);
            //$pdf = \PDF::loadView('terminosCondiciones',$DatosNecesarios);

            return $pdf->stream('terminos y Condiciones.pdf');
        }else{
            return [
                'errores'  => "No existe un check-in con ese id"           
            ];
        }
    }

    public function parteDeEntrada($id){
        set_time_limit(300);
        $c= Checkin::find($id);
        if($c!= null){
            // DATOS PARA LA CABEZERA:
            $DatosNecesarios = '';//TODO EL HOTEL
            //DATOS PARA EL CUERPO:
            $elTitular;
            $listahuestedes=[];
            foreach (Hoteles::all() as $unHotel) {
                if($unHotel['hoteles_id']==$c->checkins_idHotel){
                    $DatosNecesarios = $unHotel;
                }
            }
            foreach ($c->Huespedes as $unHuespedDeEsteChekin) {
                if($unHuespedDeEsteChekin->huespedes_titular=='1'){
                    $elTitular=$unHuespedDeEsteChekin;
                }
                array_push($listahuestedes, $unHuespedDeEsteChekin);
            }
            $pdf = \PDF::loadView('parteDeEntrada',compact('DatosNecesarios','c','elTitular','listahuestedes'));
            return $pdf->stream('parte de Entrada.pdf'); 
        }else{
            return [
                'errores'  => "No existe un check-in con ese id"           
            ];
        }       
    }
}
