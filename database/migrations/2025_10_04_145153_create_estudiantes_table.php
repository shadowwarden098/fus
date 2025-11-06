<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 50)->unique();           // Código único del estudiante
            $table->string('nombre', 255);                    // Nombre
            $table->string('apellido', 255);                  // Primer apellido
            $table->string('segundo_apellido', 255)->nullable(); // Segundo apellido opcional
            $table->string('direccion', 255)->nullable();     // Dirección opcional
            $table->string('dni', 20)->unique();              // DNI único
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
