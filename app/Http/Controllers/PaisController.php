<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Paises;

class PaisController extends Controller
{
    public function index()
    {
        return Paises::all();
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $c= Paises::find($id);
        if($c!= null){
            return $c;
        }else{
            return [
                'errores'  => "No existe un pais con ese id"           
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
