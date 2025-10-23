<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    // 📋 Mostrar todos los usuarios
    public function index()
    {
        $usuarios = Usuario::orderBy('nombre')->paginate(10); // Paginación y orden alfabético
        return view('usuarios.index', compact('usuarios'));
    }

    // 🔹 Mostrar usuarios de una cuenta específica
    public function indexPorCuenta($cuentaId)
    {
        $usuarios = Usuario::where('idCuenta', $cuentaId)->orderBy('nombre')->paginate(10);
        return view('usuarios.index', compact('usuarios', 'cuentaId'));
    }

    // ➕ Formulario para crear usuario
    public function create()
    {
        return view('usuarios.create');
    }

    // 💾 Guardar nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:6',
            'rol' => 'required|string|in:admin,jugador',
            'idCuenta' => 'nullable|integer|exists:cuentas,idCuenta', // opcional para asignar a una cuenta
        ]);

        Usuario::create($request->only('nombre', 'email', 'rol', 'idCuenta') + [
            'password' => $request->password, // El mutador del modelo se encargará del hash
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    // 👀 Mostrar un usuario específico
    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    // ✏️ Formulario de edición
    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    // 🔄 Actualizar usuario
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $usuario->id,
            'rol' => 'required|string|in:admin,jugador',
            'password' => 'nullable|string|min:6',
            'idCuenta' => 'nullable|integer|exists:cuentas,idCuenta',
        ]);

        $usuario->fill($request->only('nombre', 'email', 'rol', 'idCuenta'));

        if ($request->filled('password')) {
            $usuario->password = $request->password; // Mutador en el modelo aplica hash
        }

        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    // 🗑️ Eliminar usuario
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
