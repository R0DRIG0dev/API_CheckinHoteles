<?php
namespace App\Http\Controllers;
use App\Checkin;
use App\Huespedes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnvioDeCorreos;

class CheckinController extends Controller
{
    public function index()
    {
        $TodalaData=Checkin::all();
        foreach ($TodalaData as  $value) {
            $value->Huespedes;//['huespedes_nombre'];
            $value->Idioma;
            $value->Hotel;
            // $tt=$value->Hotel['hoteles_nombre'];
        }
        return $TodalaData;
        // return $tt;
    }

    public function store(Request $request)
    {
        $rules = [
            'checkins_fechaEntradaReserva'  => 'required|date',
            'checkins_fechaSalidaReserva'   => 'required|date',
            'checkins_adultos'              => 'required|integer',
            'checkins_ninos'                => 'required|integer',
            'checkins_idHotel'              => 'required|integer|exists:hoteles,hoteles_id',
            'checkins_idioma'               => 'required|integer',
            'checkins_idreserva'            => 'required|alpha_num'
        ];
        //$validator = \Validator::make($request->all(), $rules);
        $validator = \Validator::make(json_decode($request->getContent(),true), $rules);
        if ($validator->fails()) {
            return [
                'estado' => false,
                'errores'  => $validator->errors()->all()
            ];
        }
        Checkin::create($request->all());
        return ['estado' => true];

    }

    public function show($id)
    {
        $c= Checkin::find($id);
        if($c!= null){
            $c->Huespedes;////////AQUI ESTA LA NUEVA DATA
            $c->Idioma;
            $c->Hotel;
            return $c;
        }else{
            return [
                'errores'  => "No existe un check-in con ese id"           
            ];
        }
    }

    public function update(Request $request, $id)
    {
        $CheckinParaActualizar = Checkin::find($id);
        if($CheckinParaActualizar != null){
            $rules = [
                'checkins_fechaEntradaReserva'  => 'date',
                'checkins_fechaSalidaReserva'   => 'date',
                'checkins_fechaIngresoCheckin'  => 'date',
                'checkins_adultos'              => 'integer',
                'checkins_ninos'                => 'integer',
                'checkins_idHotel'              => 'integer|exists:hoteles,hoteles_id',
                'checkins_idioma'               => 'integer|exists:idiomas,idiomas_id',
                'checkins_idreserva'            => 'alpha_num'
            ];
            //$validator = \Validator::make($request->all(), $rules);
            $validator = \Validator::make(json_decode($request->getContent(),true), $rules);
            if ($validator->fails()) {
                return [
                    'estado' => false,
                    'errores'  => $validator->errors()->all()
                ];
            }
            //$CheckinParaActualizar->update($request->all());
            $CheckinParaActualizar->update(json_decode($request->getContent(),true));
            return [
                    'estado' => true,
                    'contenido'  => $CheckinParaActualizar
                ];
        }else{
            return [
                'estado' => false,
                'errores'  => "No existe un check-in con ese id"           
            ];
        }
    }

    public function destroy($id)
    {
        $CheckinParaBorrar = Checkin::find($id);      
        if($CheckinParaBorrar != null){
            $CheckinParaBorrar->delete();
            return [
                'estado' => true,
                'contenido'  => "Se borro el registro"
            ];
        }else{
            return [
                'estado' => false,
                'errores'  => "No existe un check-in con ese id"           
            ];
        }
    }

    public function superInsercion(Request $request){
        $enviarCorreoA='';
        $enviarCorreoNombre;

        $content=json_decode($request->getContent(),true);
        echo gettype($content);
        // echo "</pre>";
        echo "___________________________";
        return "hola";

        $content=json_decode($request->getContent(),true);
        $validator = \Validator::make($content,[
            'checkins_fechaEntradaReserva'  => 'required|date',
            'checkins_fechaSalidaReserva'   => 'required|date',
            //'checkins_fechaIngresoCheckin'  => 'required|date',
            'checkins_adultos'              => 'required|integer',
            'checkins_ninos'                => 'required|integer',
            'checkins_idHotel'              => 'required|integer|exists:hoteles,hoteles_id',
            'checkins_idioma'               => 'required|integer|exists:idiomas,idiomas_id',
            'checkins_idreserva'            => 'required|alpha_num',

            'huespedes'=> 'required|array',
            'huespedes.*.huespedes_tipo'=> ['required','string',Rule::in(['a', 'n'])],
            'huespedes.*.huespedes_nombre'=> 'required|string',
            'huespedes.*.huespedes_apellido'=> 'required|string',
            'huespedes.*.huespedes_email'=>'email|required_if:huespedes.*.huespedes_tipo,==,a',
            'huespedes.*.huespedes_sexo'=>['required','string',Rule::in(['m', 'f'])],
            'huespedes.*.huespedes_tipoDocumento'=>'required|integer|exists:documentos,documentos_id',
            'huespedes.*.huespedes_numeroDocumento'=> 'required|integer',
            'huespedes.*.huespedes_nacionalidad'=> 'required|string',
            'huespedes.*.huespedes_fechaNacimiento'=> 'required|date',
            'huespedes.*.huespedes_fechaExpiracion'=> 'required|date',
            'huespedes.*.huespedes_fechaexpedicion'=> 'required|date',
            'huespedes.*.huespedes_titular'=> ['required','string',Rule::in(['0', '1'])],

            'huespedes.*.huespedes_fotoDelante'=> 'required',
            'huespedes.*.huespedes_fotoAtras'=> 'required',
            'huespedes.*.huespedes_firma'=> 'required_if:huespedes.*.huespedes_tipo,==,a'
        ]);
        if ($validator->fails()) {
            return [
                'estado' => false,
                'errores'  => $validator->errors()->all()
            ];
        }
        $CheckinCreado = Checkin::create($content);
        $POST_huespedes = $content['huespedes'];
        $todosLoshuespedes = count($POST_huespedes);
        $contador=0;
        while ( $todosLoshuespedes > 0) {
            $nuevoHuesped = new Huespedes;
            if(empty($POST_huespedes[$contador]['huespedes_email'])) {//no existe, no esta en el array
                $POST_huespedes[$contador]['huespedes_email']=null;              
            }
            $nuevoHuesped->huespedes_nombre=$POST_huespedes[$contador]['huespedes_nombre'];
            $nuevoHuesped->huespedes_apellido=$POST_huespedes[$contador]['huespedes_apellido'];
            $nuevoHuesped->huespedes_email=$POST_huespedes[$contador]['huespedes_email'];
            $nuevoHuesped->huespedes_sexo=$POST_huespedes[$contador]['huespedes_sexo'];
            $nuevoHuesped->huespedes_tipoDocumento=$POST_huespedes[$contador]['huespedes_tipoDocumento'];
            $nuevoHuesped->huespedes_numeroDocumento=$POST_huespedes[$contador]['huespedes_numeroDocumento'];
            $nuevoHuesped->huespedes_nacionalidad=$POST_huespedes[$contador]['huespedes_nacionalidad'];
            $nuevoHuesped->huespedes_tipo=$POST_huespedes[$contador]['huespedes_tipo'];
            $nuevoHuesped->huespedes_fechaNacimiento=$POST_huespedes[$contador]['huespedes_fechaNacimiento'];
            $nuevoHuesped->huespedes_fechaExpiracion=$POST_huespedes[$contador]['huespedes_fechaExpiracion'];
            $nuevoHuesped->huespedes_fechaexpedicion=$POST_huespedes[$contador]['huespedes_fechaexpedicion'];
            $nuevoHuesped->huespedes_titular=$POST_huespedes[$contador]['huespedes_titular'];
            //$nuevoHuesped=Huespedes::create($POST_huespedes[$contador]);
            if ($POST_huespedes[$contador]['huespedes_tipo']=='a') {
                //--------------------------------------------------------------INSETAR FOTO DELANTERA
                $image_service_str = substr(
                    $POST_huespedes[$contador]['huespedes_fotoDelante']
                    , strpos($POST_huespedes[$contador]['huespedes_fotoDelante'], ",")+1
                );
                // Decodificar ese string y devolver los datos de la imagen        
                $image = base64_decode($image_service_str);  
                // $full=null;//---obtener la extension original dela imagen
                // preg_match("/^data:image\/(.*);base64/i",$POST_huespedes[$contador]['huespedes_fotoDelante'], $img_extension);
                //$extension=($full) ?  $img_extension[0] : $img_extension[1]; 
                $extension='jpg';
                //$img_name = 'algo'. time().'.'.$extension;  
                $img_name = $CheckinCreado->checkins_id.'_'.$nuevoHuesped->huespedes_numeroDocumento.'_D'.'.'.$extension;    
                Storage::disk('public')->put($img_name, $image); 
                //--------------------------------------------------------------INSETAR FOTO DELANTERA

                //---------------------------------------------------------------INSETAR FOTO TRASERA
                $image_service_str = substr(
                    $POST_huespedes[$contador]['huespedes_fotoAtras']
                    , strpos($POST_huespedes[$contador]['huespedes_fotoAtras'], ",")+1
                );     
                $image = base64_decode($image_service_str);  
                $extension='jpg';
                $img_name = $CheckinCreado->checkins_id.'_'.$nuevoHuesped->huespedes_numeroDocumento.'_A'.'.'.$extension;   
                Storage::disk('public')->put($img_name, $image);
                //----------------------------------------------------------------INSETAR FOTO TRASERA 

                //-------------------------------------------------------------INSETAR FIRMA
                $image_service_str = substr(
                    $POST_huespedes[$contador]['huespedes_firma']
                    , strpos($POST_huespedes[$contador]['huespedes_firma'], ",")+1
                );      
                $image = base64_decode($image_service_str);  
                $extension='jpg';
                $img_name = $CheckinCreado->checkins_id.'_'.$nuevoHuesped->huespedes_numeroDocumento.'_F'.'.'.$extension;    
                Storage::disk('public')->put($img_name, $image);     
                //------------------------------------------------------------INSETAR FIRMA            
            }else{
                //-----------------------------------INSETAR FOTO DELANTERA--------------------------
                $image_service_str = substr(
                    $POST_huespedes[$contador]['huespedes_fotoDelante']
                    , strpos($POST_huespedes[$contador]['huespedes_fotoDelante'], ",")+1
                );     
                $image = base64_decode($image_service_str);  
                $extension='jpg';
                $img_name = $CheckinCreado->checkins_id.'_'.$nuevoHuesped->huespedes_numeroDocumento.'_D'.'.'.$extension;    
                Storage::disk('public')->put($img_name, $image); 
                //--------------------------------------INSETAR FOTO TRASERA--------------------------
                $image_service_str = substr(
                    $POST_huespedes[$contador]['huespedes_fotoAtras']
                    , strpos($POST_huespedes[$contador]['huespedes_fotoAtras'], ",")+1
                );     
                $image = base64_decode($image_service_str);  
                $extension='jpg';
                $img_name = $CheckinCreado->checkins_id.'_'.$nuevoHuesped->huespedes_numeroDocumento.'_A'.'.'.$extension;   
                Storage::disk('public')->put($img_name, $image);                 
            }
            $CheckinCreado->Huespedes()->save($nuevoHuesped);
            //-------------------------------------------------------------------DATOS PARA EL COREEO
            if ($POST_huespedes[$contador]['huespedes_titular']=='1') {
                $enviarCorreoA=$POST_huespedes[$contador]['huespedes_email'];
                $enviarCorreoNombre=$POST_huespedes[$contador]['huespedes_nombre'].' '.$POST_huespedes[$contador]['huespedes_apellido'];
            }
            //--------------------------------------------------------------------DATOS PARA EL COREEO
            $contador++;  
            $todosLoshuespedes--;
        }
        //---------------------ENVIO DE CORREO AL TITULAR
        $DatosNecesarios = new \stdClass();
        $DatosNecesarios->nombreDelHotel = $CheckinCreado->Hotel['hoteles_nombre'];
        $DatosNecesarios->codigoDeReserva = $content['checkins_idreserva'];
        $DatosNecesarios->codigoDeCheckin = $CheckinCreado->checkins_id;
        $DatosNecesarios->emailDelTitular = $enviarCorreoA;
        $DatosNecesarios->fechaIngreso = $content['checkins_fechaEntradaReserva'];
        $DatosNecesarios->fechaSalida = $content['checkins_fechaSalidaReserva'];
        $DatosNecesarios->N_adultos = $content['checkins_adultos'];
        $DatosNecesarios->N_ninos = $content['checkins_ninos'];
        $DatosNecesarios->nombreDelTitular = $enviarCorreoNombre;
        Mail::to($enviarCorreoA)->send(new EnvioDeCorreos($DatosNecesarios));
        return [
            'estado' => true
            ,'contenido' => $CheckinCreado
        ];
    }

    public function buscarPorFecha($primeraFecha,$segundaFecha){
        $CheckinsEnElRangoDeFechas=Checkin::where(
            'checkins_fechaEntradaReserva','>=',$primeraFecha)
            ->Where('checkins_fechaSalidaReserva','<=',$segundaFecha)
            ->get();
        foreach ($CheckinsEnElRangoDeFechas as  $value) {
            $value->Huespedes;
            $value->Idioma;
        }
        return $CheckinsEnElRangoDeFechas;
    }

    public function buscarPorNombre($nombre){
        $HuespedesConEseNombre=Huespedes::where(
            'huespedes_nombre','=',$nombre)
            ->orWhere('huespedes_apellido','=',$nombre)
            ->get();
        $CheckinsConEseNombre=[];
        foreach (Checkin::all() as $value) {
            // return $value->huespedes[0]['huespedes_id'];
            foreach ($HuespedesConEseNombre as $value2) {
                // return $value2->huespedes_id;
                foreach ($value->huespedes as $value3) {
                    if($value3['huespedes_id'] == $value2->huespedes_id){
                        array_push($CheckinsConEseNombre ,$value2);  
                    }
                }
            }
        }
        return $CheckinsConEseNombre;        
    }
}
