<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::orderBy('nombre')->paginate(10);
        return view('usuarios.index', compact('usuarios'));
    }

    public function indexPorCuenta($cuentaId)
    {
        $usuarios = Usuario::where('idCuenta', $cuentaId)->orderBy('nombre')->paginate(10);
        return view('usuarios.index', compact('usuarios', 'cuentaId'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:6',
            'rol' => 'required|string|in:admin,jugador',
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => $request->password,
            'rol' => $request->rol,
        ]);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario creado exitosamente.');
    }

    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $id,
            'rol' => 'required|string|in:admin,jugador',
            'password' => 'nullable|string|min:6',
        ]);

        $data = [
            'nombre' => $request->nombre,
            'email' => $request->email,
            'rol' => $request->rol,
        ];

        if ($request->filled('password')) {
            $data['password'] = $request->password;
        }

        $usuario->update($data);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $usuario = Usuario::findOrFail($id);

            // Si tiene cuenta asociada, eliminarla primero
            if ($usuario->cuenta) {
                $usuario->cuenta->delete();
            }

            // Eliminar el usuario
            $usuario->delete();

            DB::commit();

            return redirect()->route('usuarios.index')
                ->with('success', 'Usuario eliminado correctamente.');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('usuarios.index')
                ->with('error', 'Error al eliminar el usuario: ' . $e->getMessage());
        }
    }
}