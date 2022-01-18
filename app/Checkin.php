<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Huespedes;
use App\Idiomas;
use App\Hoteles;

class Checkin extends Model
{
    protected $table='checkins';
    public $timestamps = false;  
    protected $primaryKey = 'checkins_id';

    protected $fillable=['checkins_fechaEntradaReserva',
        'checkins_fechaSalidaReserva',
        'checkins_fechaIngresoCheckin',
        'checkins_adultos',
        'checkins_ninos',
        'checkins_idreserva',
        'checkins_idHotel',
        'checkins_idioma'];

    public function Huespedes(){
        return $this->hasMany(Huespedes::class,'huespedes_idreserva');
    }

    public function Idioma(){
        return $this->belongsTo(Idiomas::class,'checkins_idioma');
    }

    public function Hotel(){
        return $this->belongsTo(Hoteles::class,'checkins_idHotel');
    }
}
