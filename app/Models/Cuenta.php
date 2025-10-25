<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Cuenta extends Model
{
    use HasFactory; // ⚠️ QUITAR SoftDeletes

    protected $table = 'cuentas';
    protected $primaryKey = 'idCuenta';

    protected $fillable = [
        'estado',
        'usuario_id',
    ];

    // 🔁 Relación uno a uno: Una cuenta pertenece a UN usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }

    public function progresos()
    {
        return $this->hasMany(Progreso::class, 'idCuenta', 'idCuenta');
    }

    // Métodos personalizados
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

    public function scopeActivas($query)
    {
        return $query->where('estado', 'activa');
    }

    public function scopeInactivas($query)
    {
        return $query->where('estado', 'inactiva');
    }

    protected $casts = [
        'fechaCreacion' => 'datetime',
    ];
}