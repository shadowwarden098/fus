<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentarios';

    protected $fillable = [
        'contenido',
        'fecha',
        'idUsuario',
        'idComentarioPadre'
    ];

    protected $casts = [
        'fecha' => 'datetime',
    ];

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

    // Relación con el modelo Cuenta (si es necesario)
    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class);
    }

    // Relación para comentarios hijos (respuestas)
    public function respuestas()
    {
        return $this->hasMany(Comentario::class, 'idComentarioPadre');
    }

    // Relación para el comentario padre (si es una respuesta)
    public function comentarioPadre()
    {
        return $this->belongsTo(Comentario::class, 'idComentarioPadre');
    }
}
