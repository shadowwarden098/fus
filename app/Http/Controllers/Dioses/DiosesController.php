<?php

namespace App\Http\Controllers\Dioses;

use App\Http\Controllers\Controller;
use App\Models\Dios;
use Illuminate\Http\Request;

class DiosesController extends Controller
{
    public function index()
    {
        $dioses = Dios::all();
        return view('dioses.index', compact('dioses'));
    }
}
