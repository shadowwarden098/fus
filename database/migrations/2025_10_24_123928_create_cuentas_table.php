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
        Schema::create('cuentas', function (Blueprint $table) {
            // Llave primaria
            $table->id('idCuenta');

            // Estado de la cuenta
            $table->enum('estado', ['activa', 'inactiva'])->default('activa')->comment('Estado actual de la cuenta');

            // Relación con usuario
            $table->unsignedBigInteger('usuario_id')->unique()->comment('ID del usuario asociado');
            $table->foreign('usuario_id')
                  ->references('id')
                  ->on('usuarios')
                  ->onDelete('cascade');

            // Timestamps y soft deletes
            $table->timestamps(); // created_at y updated_at
            $table->softDeletes(); // Para eliminación lógica de la cuenta

            // Índices
            $table->index('estado');
        });
    }

    /**
     * Revierte la migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuentas');
    }
};
