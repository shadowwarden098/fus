<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ComentariosController extends Controller
{
    public function index()
    {
        $comentarios = Comentario::with(['usuario', 'respuestas'])->whereNull('idComentarioPadre')->get();
        return view('comentarios.index', compact('comentarios'));
    }

    public function create()
    {
        $usuarios = Usuario::all(); // Obtener todos los usuarios
        return view('comentarios.create', compact('usuarios')); // Pasar la lista de usuarios a la vista
    }

    public function store(Request $request)
    {
        $request->validate([
            'contenido' => 'required|string',
            'idUsuario' => 'required|exists:usuarios,id',
            'idComentarioPadre' => 'nullable|exists:comentarios,id',
        ]);

        Comentario::create([
            'contenido' => $request->contenido,
            'fecha' => now(),
            'idUsuario' => $request->idUsuario,
            'idComentarioPadre' => $request->idComentarioPadre,
        ]);

        return redirect()->route('comentarios.index')->with('success', 'Comentario creado con éxito.');
    }

    public function show(Comentario $comentario)
    {
        return view('comentarios.show', compact('comentario'));
    }

    public function edit(Comentario $comentario)
    {
        $usuarios = Usuario::all(); // Obtener todos los usuarios
        return view('comentarios.edit', compact('comentario', 'usuarios')); // Pasar la lista de usuarios a la vista
    }

    public function update(Request $request, Comentario $comentario)
    {
        $request->validate([
            'contenido' => 'required|string',
        ]);

        $comentario->update([
            'contenido' => $request->contenido,
        ]);

        return redirect()->route('comentarios.index')->with('success', 'Comentario actualizado con éxito.');
    }

    public function destroy(Comentario $comentario)
    {
        $comentario->delete();
        return redirect()->route('comentarios.index')->with('success', 'Comentario eliminado con éxito.');
    }

    public function responder(Comentario $comentario)
    {
        $usuarios = Usuario::all(); // Obtener todos los usuarios
        return view('comentarios.responder', compact('comentario', 'usuarios')); // Pasar la lista de usuarios a la vista
    }
}
