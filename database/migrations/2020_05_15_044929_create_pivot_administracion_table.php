<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotAdministracionTable extends Migration
{
    public function up()
    {
        Schema::create('PivotAdministracion', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('administracion_id');
            $table->bigInteger('administracion_usuario')->unsigned();
            $table->bigInteger('administracion_hotel')->unsigned();

            $table->foreign('administracion_usuario')->references('usuario_id')->on('usuarios');
            $table->foreign('administracion_hotel')->references('hoteles_id')->on('hoteles');
        });
    }

    public function down()
    {
        Schema::dropIfExists('PivotAdministracion');
    }
}
