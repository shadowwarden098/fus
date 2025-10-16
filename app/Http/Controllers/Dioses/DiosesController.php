<?php

namespace App\Http\Controllers\Dioses;

use App\Models\Dios;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiosesController extends Controller
{
    // 📋 Mostrar todos los dioses
    public function index()
    {
        $dioses = Dios::all();
        return view('dioses.index', compact('dioses'));
    }

    // ➕ Formulario de creación
    public function create()
    {
        return view('dioses.create');
    }

    // 💾 Guardar nuevo dios
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
        
            
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
           
           
        ]);

        Dios::create($validatedData);

        return redirect()->route('dioses.index')
                         ->with('success', 'Dios registrado correctamente.');
    }

    // ✏️ Formulario de edición
    public function edit($id)
    {
        $dios = Dios::findOrFail($id);
        return view('dioses.edit', compact('dios'));
    }

    // 🔄 Actualizar dios
    public function update(Request $request, $id)
    {
        $dios = Dios::findOrFail($id);

        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            
            
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            
            
        ]);

        $dios->update($validatedData);

        return redirect()->route('dioses.index')
                         ->with('success', 'Dios actualizado correctamente.');
    }

    // ❌ Eliminar dios
    public function destroy($id)
    {
        $dios = Dios::findOrFail($id);
        $dios->delete();

        return redirect()->route('dioses.index')
                         ->with('success', 'Dios eliminado correctamente.');
    }
}
