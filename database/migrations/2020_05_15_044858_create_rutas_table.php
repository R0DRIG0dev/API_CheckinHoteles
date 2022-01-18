<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRutasTable extends Migration
{
    public function up()
    {
        Schema::create('rutas', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('rutas_id');
            $table->bigInteger('rutas_huesped')->unsigned()->nullable();
            $table->bigInteger('rutas_hotel')->unsigned()->nullable();
            $table->bigInteger('rutas_checkin')->unsigned()->nullable();
            $table->string('rutas_url',255);

            $table->foreign('rutas_huesped')->references('huespedes_id')->on('huespedes');
            $table->foreign('rutas_hotel')->references('hoteles_id')->on('hoteles');
            $table->foreign('rutas_checkin')->references('checkins_id')->on('checkins');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rutas');
    }
}
