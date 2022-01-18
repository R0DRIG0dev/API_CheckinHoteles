<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdiomasTable extends Migration
{
    public function up()
    {
        Schema::create('idiomas', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('idiomas_id');
            $table->string('idiomas_nombre',255);            
        });
    }

    public function down()
    {
        Schema::dropIfExists('idiomas');
    }
}
