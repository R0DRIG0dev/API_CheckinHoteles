<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelesTable extends Migration
{
    public function up()
    {
        Schema::create('hoteles', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('hoteles_id');
            $table->string('hoteles_nombre',255);
            $table->string('hoteles_direccion',255);
            $table->string('hoteles_email',255);
            $table->bigInteger('hoteles_telefono')->unsigned();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hoteles');
    }
}
