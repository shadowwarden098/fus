<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deleted_records', function (Blueprint $table) {
            $table->id();
            $table->string('table_name'); // Nombre de la tabla afectada (ej: 'usuarios', 'cuentas')
            $table->unsignedBigInteger('record_id'); // ID del registro eliminado
            $table->json('record_data'); // Datos del registro eliminado (en formato JSON)
            $table->string('deleted_by')->nullable(); // Usuario que eliminó el registro (opcional)
            $table->timestamp('deleted_at'); // Fecha y hora de la eliminación
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deleted_records');
    }
};
