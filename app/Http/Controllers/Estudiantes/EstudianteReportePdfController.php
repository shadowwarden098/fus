<?php

namespace App\Http\Controllers\Estudiantes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Estudiante;

class EstudianteReportePdfController extends Controller
{
    /**
     * PDF general (todos los estudiantes)
     */
    public function index(Request $request)
    {
        $estudiantes = Estudiante::all();
        $pdf = Pdf::loadView('estudiantes.pdf_general', compact('estudiantes'))
                  ->setPaper('a4', 'portrait');

        if ($request->has('descargar')) {
            return $pdf->download('listado_estudiantes.pdf');
        }

        return $pdf->stream('listado_estudiantes.pdf');
    }

    /**
     * PDF individual para ver en navegador
     */
    public function ver($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $pdf = Pdf::loadView('estudiantes.pdf_individual', compact('estudiante'))
                  ->setPaper('a4', 'portrait');

        return $pdf->stream("Estudiante_{$estudiante->id}.pdf");
    }

    /**
     * PDF individual para descargar
     */
    public function descargar($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $pdf = Pdf::loadView('estudiantes.pdf_individual', compact('estudiante'))
                  ->setPaper('a4', 'portrait');

        return $pdf->download("Estudiante_{$estudiante->id}.pdf");
    }
}
