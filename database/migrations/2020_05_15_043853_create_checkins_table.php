<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckinsTable extends Migration
{
    public function up()
    {
        Schema::create('checkins', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('checkins_id');
            $table->date('checkins_fechaEntradaReserva');
            $table->date('checkins_fechaSalidaReserva');
            $table->dateTime('checkins_fechaIngresoCheckin')->default(date("Y-m-d H:i:s"));
            $table->Integer('checkins_adultos');
            $table->Integer('checkins_ninos')->nullable();
            $table->string('checkins_idreserva',255);
            $table->bigInteger('checkins_idHotel')->unsigned();
            $table->bigInteger('checkins_idioma')->unsigned();

            $table->foreign('checkins_idHotel')->references('hoteles_id')->on('hoteles');
            $table->foreign('checkins_idioma')->references('idiomas_id')->on('idiomas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('checkins');
    }
}
