<?php

namespace App\Http\Controllers\Cuenta;

use App\Http\Controllers\Controller;
use App\Models\Cuenta;
use App\Models\Usuario;
use Illuminate\Http\Request;

class CuentasController extends Controller
{
    public function index(Request $request)
    {
        // Solo cargar 'usuario' (relación uno a uno)
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

    public function create()
    {
        return view('cuentas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:6',
            'rol' => 'required|string|in:usuario,admin,jugador',
            'estado' => 'required|string|in:activa,inactiva',
        ]);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'rol' => $request->rol,
        ]);

        Cuenta::create([
            'usuario_id' => $usuario->id,
            'estado' => $request->estado,
        ]);

        return redirect()->route('cuentas.index')
            ->with('success', 'Usuario y cuenta creados exitosamente.');
    }

    public function show(Cuenta $cuenta)
    {
        $cuenta->load(['usuario', 'progresos']);
        return view('cuentas.show', compact('cuenta'));
    }

    public function edit(Cuenta $cuenta)
    {
        return view('cuentas.edit', compact('cuenta'));
    }

    public function update(Request $request, Cuenta $cuenta)
    {
        $request->validate([
            'estado' => 'required|string|in:activa,inactiva',
        ]);

        $cuenta->update([
            'estado' => $request->estado,
        ]);

        return redirect()->route('cuentas.index')
            ->with('success', 'Cuenta actualizada exitosamente.');
    }

    public function destroy(Cuenta $cuenta)
    {
        $cuenta->delete();

        return redirect()->route('cuentas.index')
            ->with('success', 'Cuenta eliminada exitosamente.');
    }

    public function activarCuenta(Cuenta $cuenta)
    {
        $cuenta->activarCuenta();

        return response()->json([
            'success' => true,
            'message' => 'Cuenta activada exitosamente.'
        ]);
    }

    public function desactivarCuenta(Cuenta $cuenta)
    {
        $cuenta->desactivarCuenta();

        return response()->json([
            'success' => true,
            'message' => 'Cuenta desactivada exitosamente.'
        ]);
    }

    public function buscar(Request $request)
    {
        $query = Cuenta::with('usuario');

        if ($buscar = $request->q) {
            $query->whereHas('usuario', fn($q) =>
                $q->where('nombre', 'like', "%{$buscar}%")
                  ->orWhere('email', 'like', "%{$buscar}%")
            );
        }

        $cuentas = $query->get();

        return response()->json($cuentas);
    }

    public function estadisticas()
    {
        $stats = [
            'total' => Cuenta::count(),
            'activas' => Cuenta::activas()->count(),
            'inactivas' => Cuenta::inactivas()->count(),
            'usuarios_totales' => Usuario::count(),
        ];

        return view('cuentas.estadisticas', compact('stats'));
    }
}