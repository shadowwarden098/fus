<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dios extends Model
{
    use HasFactory;

    // Nombre explícito de la tabla
    protected $table = 'dioses';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'nombre',
      
        
    ];
}
