<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('usuario_id');
            $table->string('usuarios_usuario')->unique();
            $table->string('usuarios_contrasena')->unique();
            $table->enum('usuarios_tipo',['s','a']);//superAdministrados ,administrador
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
