<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('idUsers', 11);
            $table->string('nickName')->unique();
            $table->string('contrasena');
            $table->string('imagen');
            $table->integer('activo');
            $table->string('apellido');
            $table->string('nombre');
            $table->string('email');
            $table->integer('Perfil_idPerfil');
            $table->foreign('Perfil_idPerfil')->references('idPerfil')->on('Perfil');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
