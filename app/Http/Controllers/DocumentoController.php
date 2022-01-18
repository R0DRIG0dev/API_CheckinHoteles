<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Documentos;

class DocumentoController extends Controller
{
    public function index()
    {
        return Documentos::all();
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $c= Documentos::find($id);
        if($c!= null){
            return $c;
        }else{
            return [
                'errores'  => "No existe un Documento con ese id"           
            ];
        }
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
