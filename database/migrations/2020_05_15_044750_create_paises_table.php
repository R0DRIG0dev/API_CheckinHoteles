<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaisesTable extends Migration
{
    public function up()
    {
        Schema::create('paises', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('paises_id');
            $table->char('paises_iso',2)->nullable();
            $table->string('paises_nombre',255);
        });
    }

    public function down()
    {
        Schema::dropIfExists('paises');
    }
}
