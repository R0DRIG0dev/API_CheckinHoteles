<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvioDeCorreos extends Mailable
{
    use Queueable, SerializesModels;

    public $AtributoObjeto;
    // public $algo='haloja';
    public function __construct($DatosNecesarios)
    {
        $this->AtributoObjeto=$DatosNecesarios;
        //$algo=$DatosNecesarios->nombreDelHotel;
    }

    public function build()
    {
        //$algo=$this->$algo;
        return $this->from('mercadobodegastestperu@gmail.com','Casona Plaza Hoteles')
                ->view('Email_CheckinRealizado')
                ->subject(strtoupper($this->AtributoObjeto->nombreDelHotel).' | ¡Check-in realizado!');
    }
}
