<?php

namespace App\Http\Controllers\Cuenta;

use App\Http\Controllers\Controller;
use App\Models\Cuenta;
use App\Models\Usuario;
use Illuminate\Http\Request;

class CuentasController extends Controller
{
    /**
     * Lista de cuentas con filtros y paginación
     */
    public function index(Request $request)
    {
        $query = Cuenta::with('usuario');

        if ($estado = $request->estado) {
            $query->where('estado', $estado);
        }

        if ($buscar = $request->buscar) {
            $query->whereHas('usuario', fn($q) =>
                $q->where('nombre', 'like', "%{$buscar}%")
                  ->orWhere('email', 'like', "%{$buscar}%")
            );
        }

        $cuentas = $query->paginate(10)->withQueryString();

        return view('cuentas.index', compact('cuentas'));
    }

    /**
     * Formulario para crear cuenta y usuario
     */
    public function create()
    {
        return view('cuentas.create');
    }

    /**
     * Almacenar nuevo usuario y cuenta
     */
    public function store(Request $request)
    {
        $request->validate([
            // Datos de usuario
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:6',
            'rol' => 'required|string|in:usuario,admin,jugador',
            // Datos de cuenta
            'estado' => 'required|string|in:activa,inactiva',
        ]);

        // Crear usuario
        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => $request->password,
            'rol' => $request->rol,
        ]);

        // Crear cuenta asociada
        Cuenta::create([
            'usuario_id' => $usuario->id,
            'estado' => $request->estado,
            'fechaCreacion' => now(),
        ]);

        return redirect()->route('cuentas.index')
            ->with('success', 'Usuario y cuenta creados exitosamente.');
    }

    // Los métodos show, edit, update, destroy, activarCuenta, desactivarCuenta
    // se mantienen igual que tu versión actual
}
