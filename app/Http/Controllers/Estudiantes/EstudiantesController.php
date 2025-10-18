<?php

namespace App\Http\Controllers\Estudiantes;

use App\Models\Estudiante;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    // 📋 Mostrar todos los estudiantes
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('estudiantes.index', compact('estudiantes'));
    }

    // ➕ Formulario de creación
    public function create()
    {
        return view('estudiantes.create');
    }

    // 💾 Guardar nuevo estudiante
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'codigo' => 'required|string|max:20|unique:estudiantes,codigo',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'segundo_apellido' => 'nullable|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'dni' => 'required|digits:8|unique:estudiantes,dni',
        ], [
            'codigo.required' => 'El código del estudiante es obligatorio.',
            'codigo.unique' => 'Este código ya está registrado.',
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El primer apellido es obligatorio.',
            'dni.required' => 'El DNI es obligatorio.',
            'dni.digits' => 'El DNI debe tener 8 dígitos.',
            'dni.unique' => 'Este DNI ya está registrado.',
        ]);

        Estudiante::create($validatedData);

        return redirect()->route('estudiantes.index')
                         ->with('success', 'Estudiante registrado correctamente.');
    }

    // ✏️ Formulario de edición
    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.edit', compact('estudiante'));
    }

    // 🔁 Actualizar datos del estudiante
    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::findOrFail($id);

        $validatedData = $request->validate([
            'codigo' => 'required|string|max:20|unique:estudiantes,codigo,' . $id,
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'segundo_apellido' => 'nullable|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'dni' => 'required|digits:8|unique:estudiantes,dni,' . $id,
        ], [
            'codigo.required' => 'El código del estudiante es obligatorio.',
            'codigo.unique' => 'Este código ya está registrado.',
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El primer apellido es obligatorio.',
            'dni.required' => 'El DNI es obligatorio.',
            'dni.digits' => 'El DNI debe tener 8 dígitos.',
            'dni.unique' => 'Este DNI ya está registrado.',
        ]);

        $estudiante->update($validatedData);

        return redirect()->route('estudiantes.index')
                         ->with('success', 'Estudiante actualizado correctamente.');
    }

    // ⚠️ Confirmar eliminación
    // ⚠️ Confirmar eliminación
public function confirmarEliminacion($id)
{
    $estudiante = Estudiante::findOrFail($id);
    return view('estudiantes.delete', compact('estudiante')); // <-- aquí cambias el nombre
}


    // ❌ Eliminar estudiante definitivamente
    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();

        return redirect()->route('estudiantes.index')
                         ->with('success', 'Estudiante eliminado correctamente.');
    }
}
