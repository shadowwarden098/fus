<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta la migración.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('nombre', 255)->index(); // Nombre del usuario con índice para búsquedas
            $table->string('email', 255)->unique(); // Correo electrónico único
            $table->string('password', 255); // Contraseña encriptada
            $table->string('rol', 50)->default('usuario'); // Rol del usuario
            $table->timestamps(); // created_at y updated_at
            $table->softDeletes(); // Para poder eliminar usuarios de forma lógica
        });
    }

    /**
     * Revierte la migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
