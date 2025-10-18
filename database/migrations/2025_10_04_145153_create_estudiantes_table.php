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
            $table->string('codigo', 20)->unique();          // 🆕 Código único del estudiante
            $table->string('nombre');                        // Nombre
            $table->string('apellido');                      // Primer apellido
            $table->string('segundo_apellido')->nullable();  // 🆕 Segundo apellido (opcional)
            $table->string('direccion')->nullable();         // 🆕 Dirección (opcional)
            $table->string('dni')->unique();                 // DNI único
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
