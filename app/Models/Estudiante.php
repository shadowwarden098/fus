<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    // 📘 Nombre de la tabla (opcional si el nombre sigue la convención, pero lo dejamos por claridad)
    protected $table = 'estudiantes';

    // 🧾 Campos que se pueden asignar de forma masiva
    protected $fillable = [
        'codigo',
        'nombre',
        'apellido',
        'segundo_apellido',
        'direccion',
        'dni',
    ];
}
