<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
//use App\Paises;
use App\Documentos;

class Huespedes extends Model
{
    protected $table='huespedes';
    public $timestamps = false;  
    protected $primaryKey = 'huespedes_id';

    protected $fillable=['huespedes_idreserva',
        'huespedes_nombre',
        'huespedes_apellido',
        'huespedes_email',
        'huespedes_sexo',
        'huespedes_tipoDocumento',
        'huespedes_numeroDocumento',
        'huespedes_nacionalidad',
        'huespedes_fechaNacimiento',
        'huespedes_fechaExpiracion',
        'huespedes_fechaexpedicion',
        'huespedes_titular'];

    // public function Pais(){
    //     return $this->belongsTo(Paises::class,'huespedes_nacionalidad');
    // }

    public function Documento(){
        return $this->belongsTo(Documentos::class,'huespedes_tipoDocumento');
    }
}
