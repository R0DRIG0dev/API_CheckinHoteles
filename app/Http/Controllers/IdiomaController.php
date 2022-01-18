<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Idiomas;

class IdiomaController extends Controller
{
    public function index()
    {
        return Idiomas::all();
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $c= Idiomas::find($id);
        if($c!= null){
            return $c;
        }else{
            return [
                'errores'  => "No existe un idioma con ese id"           
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
