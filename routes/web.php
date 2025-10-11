<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\view;
use App\Models\Estudiante;
use App\Models\Dios;
use App\Http\Controllers\Estudiantes\EstudiantesController;
use App\Http\Controllers\Dioses\DiosesController;



Route::get('/', function () {
/*
$estudiante = new Estudiante();
$estudiante->nombres = 'gabriel';
$estudiante->pri_ape = 'pozo';
$estudiante->seg_ape = 'espinoza';
$estudiante->save();

return $estudiante;
*/

return view('welcome');
});

Route::get('/hola', function () {
    return '"No importa cuánto sufras, nunca cambies quién eres."';
})->name('senin' );


Route::get('/bienvenidos', function () {
    return view('bienvenidos');
})->name('bienvenidos');

Route::get('/clan', function () {
    return view('clan');
})->name('clan' );

Route::get('/estudiantes/index', [EstudiantesController::class, 'index'])->name('estudiantes.index');


Route::get('/dioses/index', [DiosesController::class, 'index'])->name('dioses.index');