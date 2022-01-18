<?php
namespace App\Http\Controllers;
use App\Huespedes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class HuespedController extends Controller
{
    public function index()
    {
        $TodalaData = Huespedes::all();
        foreach ($TodalaData as  $value) {
            //$value->Pais;
            $value->Documento;
        }
        return $TodalaData;
    }

    public function store(Request $request)
    {
        $content=json_decode($request->getContent(),true);
        $validator = \Validator::make($content,[
            'huespedes_idreserva'       => 'required|integer|exists:checkins,checkins_id',
            'huespedes_nombre'          => 'required|string',
            'huespedes_apellido'        => 'required|string',
            'huespedes_email'           => 'required|email',
            'huespedes_sexo'            => ['required','string',Rule::in(['m', 'f'])],
            'huespedes_tipoDocumento'   => 'required|integer|exists:documentos,documentos_id',
            'huespedes_numeroDocumento' => 'required|integer',
            'huespedes_nacionalidad'    => 'required|string',
            'huespedes_fechaNacimiento' => 'required|date',
            'huespedes_fechaExpiracion' => 'required|date',
            'huespedes_fechaexpedicion' => 'required|date',
            // 'huespedes_fotoDelante'     => 'required|image',
            //'huespedes_fotoAtras'       => 'required|image',
            //'huespedes_fotoFirma'       => 'required|image',
            'huespedes_titular'         => ['required','string',Rule::in(['0', '1'])]
        ]);
        if ($validator->fails()) {
            return [
                'estado' => false,
                'errores'  => $validator->errors()->all()
            ];
        }
        $HuespedCreado=Huespedes::create($content);
        // $fotoDelante = $content['huespedes_nombre']."_documentoDelante.jpg";
        //$fotoAtras = $content['huespedes_nombre']."_documentoAtras.jpg";
        //$fotoFirma = $content['huespedes_nombre']."_documentoFirma.jpg";
        // $request->file('huespedes_fotoDelante')->move(public_path("/"),$fotoDelante);
        // $photoUrl = url('/'.$fotoDelante);
        return [
            'estado' => true
            ,'contenido'    => $HuespedCreado
            //,'contenido' => $CheckinParaActualizar
        ];
    }

    public function show($id)
    {
        $c= Huespedes::find($id);
        if($c!= null){
            return $c;
        }else{
            return [
                'errores'  => "No existe un huésped con ese id"           
            ];
        }
    }

    public function update(Request $request, $id)
    {
        $HuespedParaActualizar = Huespedes::find($id);
        if($HuespedParaActualizar != null){
            //$validator = \Validator::make($request->all(), $rules);
            $validator = \Validator::make(json_decode($request->getContent(),true),[
                'huespedes_idreserva'       => 'integer|exists:checkins,checkins_id',
                'huespedes_nombre'          => 'string',
                'huespedes_apellido'        => 'string',
                'huespedes_email'           => 'email',
                'huespedes_sexo'            => ['string',Rule::in(['m', 'f'])],
                'huespedes_tipoDocumento'   => 'integer|exists:documentos,documentos_id',
                'huespedes_numeroDocumento' => 'integer',
                'huespedes_nacionalidad'    => 'integer|exists:paises,paises_id',
                'huespedes_fechaNacimiento' => 'date',
                'huespedes_fechaExpiracion' => 'date',
                'huespedes_fechaexpedicion' => 'date',
                'huespedes_titular'         => ['string',Rule::in(['0', '1'])]
            ]);
            if ($validator->fails()) {
                return [
                    'estado' => false,
                    'errores'  => $validator->errors()->all()
                ];
            }
            //$CheckinParaActualizar->update($request->all());
            $HuespedParaActualizar->update(json_decode($request->getContent(),true));
            return [
                    'estado' => true,
                    'contenido'  => $HuespedParaActualizar
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
        $HuespedParaBorrar = Huespedes::find($id);      
        if($HuespedParaBorrar != null){
            $HuespedParaBorrar->delete();
            return [
                'estado' => true,
                'contenido'  => "Se borro el registro"
            ];
        }else{
            return [
                'estado' => false,
                'errores'  => "No existe un huésped con ese id"           
            ];
        }
    }
}
