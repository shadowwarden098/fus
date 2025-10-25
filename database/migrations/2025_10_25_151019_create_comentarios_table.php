<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->text('contenido');
            $table->dateTime('fecha');
            $table->unsignedBigInteger('idUsuario');
            $table->unsignedBigInteger('idComentarioPadre')->nullable();

            $table->foreign('idUsuario')->references('id')->on('usuarios');
            $table->foreign('idComentarioPadre')->references('id')->on('comentarios');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
};
