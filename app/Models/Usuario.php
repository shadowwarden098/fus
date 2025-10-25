<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    public $timestamps = true; // ← AGREGAR ESTA LÍNEA

    protected $fillable = ['nombre', 'email', 'password', 'rol'];

    protected $hidden = ['password'];

    // 🔁 Relación uno a uno: Un usuario tiene UNA cuenta
    public function cuenta()
    {
        return $this->hasOne(Cuenta::class, 'usuario_id', 'id');
    }

    // 🔒 Mutador para encriptar la contraseña automáticamente
    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = Hash::make($value);
        }
    }

    // ✅ Método para verificar si es administrador
    public function esAdmin()
    {
        return $this->rol === 'admin';
    }

    // ✅ Método para verificar si es jugador
    public function esJugador()
    {
        return $this->rol === 'jugador';
    }
}