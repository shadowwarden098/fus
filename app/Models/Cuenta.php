<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Cuenta extends Model
{
    use HasFactory;

    protected $table = 'cuentas';          // Nombre de la tabla
    protected $primaryKey = 'idCuenta';    // Nombre de la columna PK
    public $timestamps = false;            // Desactivo timestamps porque usas 'fechaCreacion'

    // ✅ Campos editables
    protected $fillable = [
        'estado',
        'usuario_id',
        'fechaCreacion', // agregar para poder asignarla al crear
    ];

    // 🔁 Relaciones
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function progresos()
    {
        return $this->hasMany(Progreso::class);
    }

    // 🔹 Métodos personalizados
    public function activarCuenta()
    {
        $this->estado = 'activa';
        $this->save();
    }

    public function desactivarCuenta()
    {
        $this->estado = 'inactiva';
        $this->save();
    }

    public function estaActiva()
    {
        return $this->estado === 'activa';
    }

    public function estaInactiva()
    {
        return $this->estado === 'inactiva';
    }

    // 🔹 Scopes para filtrar cuentas por estado
    public function scopeActivas($query)
    {
        return $query->where('estado', 'activa');
    }

    public function scopeInactivas($query)
    {
        return $query->where('estado', 'inactiva');
    }

    // 🔹 Casts para fechas
    protected $casts = [
        'fechaCreacion' => 'datetime', // Esto asegura que puedas usar ->format() sin error
    ];

    // 🔹 Accesor para mostrar fecha de creación legible
    public function getFechaCreacionLegibleAttribute()
    {
        // Usar Carbon por si acaso
        return $this->fechaCreacion ? Carbon::parse($this->fechaCreacion)->format('d/m/Y H:i') : '';
    }
}
