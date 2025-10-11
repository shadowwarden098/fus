<?php

namespace App\Http\Controllers\Estudiantes;
use App\Models\Estudiante;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    public function index(Request $request) {

        $estudiantes=Estudiante::get();

        return view('estudiantes.index', compact('estudiantes'));
    }
}
