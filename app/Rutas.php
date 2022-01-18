<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Rutas extends Model
{
    protected $table='rutas';
    public $timestamps = false;  
    protected $primaryKey = 'rutas_id';

    protected $fillable = ['rutas_huesped'
    	,'rutas_hotel'
    	,'rutas_checkin'
    	,'rutas_url'
	];

	// public static function setImagen($foto, $actual=false){
	// 	if ($foto) {
	// 		if($actual){
	// 			Storage::disk('public')->delete("imagenes/$actual");
	// 		}
	// 		$imagenName=Str::random(20).'.jpg';
	// 		//$imagen=Image::make($foto)
	// 		Storage::disk('public')->put("imagenes/$imagenName",$foto->stream());
	// 		return $imagenName; 
	// 	}else{
	// 		return false; 
	// 	}
	// } 
}
