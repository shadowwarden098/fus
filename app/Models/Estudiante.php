<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estudiante extends Model
{
    use HasFactory;

    // 📘 Nombre explícito de la tabla en la base de datos
    protected $table = 'estudiantes';

    // 🧾 Campos que se pueden asignar de forma masiva
    protected $fillable = [
        'codigo',            // Código del estudiante
        'nombre',            // Nombre
        'apellido',          // Primer apellido
        'segundo_apellido',  // Segundo apellido
        'direccion',         // Dirección
        'dni',               // Documento Nacional de Identidad
    ];
}
