<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHuespedesTable extends Migration
{
    public function up()
    {
        Schema::create('huespedes', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('huespedes_id');
            $table->bigInteger('huespedes_idreserva')->unsigned();
            $table->string('huespedes_nombre',255);
            $table->string('huespedes_apellido',255);
            $table->string('huespedes_email',255)->nullable();
            $table->enum('huespedes_sexo',['m','f']);
            $table->bigInteger('huespedes_tipoDocumento')->unsigned();
            $table->Integer('huespedes_numeroDocumento')->unsigned();
            // $table->bigInteger('huespedes_nacionalidad')->unsigned();
            $table->string('huespedes_nacionalidad',255);
            $table->enum('huespedes_tipo',['n','a']);
            $table->date('huespedes_fechaNacimiento');
            $table->date('huespedes_fechaExpiracion');
            $table->date('huespedes_fechaexpedicion');
            $table->enum('huespedes_titular',['1','0']);

            $table->foreign('huespedes_idreserva')->references('checkins_id')->on('checkins');
            $table->foreign('huespedes_tipoDocumento')->references('documentos_id')->on('documentos');
            //$table->foreign('huespedes_nacionalidad')->references('paises_id')->on('paises');
        });
    }

    public function down()
    {
        Schema::dropIfExists('huespedes');
    }
}
