<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    // 👇 Nombre explícito de la tabla
    protected $table = 'estudiantes';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
    ];
}
