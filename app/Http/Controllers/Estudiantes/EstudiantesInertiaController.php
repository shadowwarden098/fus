<?php

namespace App\Http\Controllers\Estudiantes;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EstudiantesInertiaController extends Controller
{
    // 🔹 Listar estudiantes
    public function index()
    {
        $estudiantes = Estudiante::all();
        return Inertia::render('Estudiante/Index', [
            'estudiantes' => $estudiantes
        ]);
    }

    // 🔹 Formulario de creación
    public function create()
    {
        return Inertia::render('Estudiante/Create');
    }

    // 🔹 Guardar nuevo estudiante
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'segundo_apellido' => 'nullable|string|max:255',
            'dni' => 'required|string|max:20|unique:estudiantes',
            'codigo' => 'required|string|max:20|unique:estudiantes',
        ]);

        Estudiante::create($validated);

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante creado con éxito.');
    }

    // 🔹 Ver detalles del estudiante
    public function show($id)
    {
        $estudiante = Estudiante::findOrFail($id);

        return Inertia::render('Estudiante/Show', [
            'estudiante' => $estudiante
        ]);
    }

    // 🔹 Formulario de edición
    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);

        return Inertia::render('Estudiante/Edit', [
            'estudiante' => $estudiante
        ]);
    }

    // 🔹 Actualizar datos
    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'segundo_apellido' => 'nullable|string|max:255',
            'dni' => 'required|string|max:20|unique:estudiantes,dni,' . $estudiante->id,
            'codigo' => 'required|string|max:20|unique:estudiantes,codigo,' . $estudiante->id,
        ]);

        $estudiante->update($validated);

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado con éxito.');
    }

    // 🔹 Mostrar vista de eliminación
    public function delete($id)
    {
        $estudiante = Estudiante::findOrFail($id);

        return Inertia::render('Estudiante/Delete', [
            'estudiante' => $estudiante
        ]);
    }

    // 🔹 Eliminar estudiante definitivamente
    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado correctamente.');
    }
}
