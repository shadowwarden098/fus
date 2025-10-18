<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\view;
use App\Models\Estudiante;
use App\Models\Dios;
use App\Models\jugador;

use App\Http\Controllers\Estudiantes\EstudiantesController;
use App\Http\Controllers\Dioses\DiosesController;
use App\Http\Controllers\Jugadores\JugadoresController;


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
})->name('senin');

Route::get('/bienvenidos', function () {
    return view('bienvenidos');
})->name('bienvenidos');

Route::get('/clan', function () {
    return view('clan');
})->name('clan');


// 🧑‍🎓 RUTAS DE ESTUDIANTES
Route::get('/estudiantes/index', [EstudiantesController::class, 'index'])->name('estudiantes.index');
Route::get('/estudiantes/create', [EstudiantesController::class, 'create'])->name('estudiantes.create');
Route::post('/estudiantes', [EstudiantesController::class, 'store'])->name('estudiantes.store');

// 🔹 NUEVAS rutas para editar y actualizar estudiantes
Route::get('/estudiantes/{id}/edit', [EstudiantesController::class, 'edit'])->name('estudiantes.edit');
Route::put('/estudiantes/{id}', [EstudiantesController::class, 'update'])->name('estudiantes.update');

Route::delete('/estudiantes/{id}', [EstudiantesController::class, 'destroy'])->name('estudiantes.destroy');


// 🛐 RUTAS DE DIOSES
Route::get('/dioses/index', [DiosesController::class, 'index'])->name('dioses.index');
Route::get('/dioses/create', [DiosesController::class, 'create'])->name('dioses.create');
Route::post('/dioses', [DiosesController::class, 'store'])->name('dioses.store');
Route::get('/dioses/{id}/edit', [DiosesController::class, 'edit'])->name('dioses.edit');
Route::put('/dioses/{id}', [DiosesController::class, 'update'])->name('dioses.update');
Route::delete('/dioses/{id}', [DiosesController::class, 'destroy'])->name('dioses.destroy');


// 🎮 RUTAS DE JUGADORES
Route::get('/jugadores', [JugadoresController::class, 'index'])->name('jugadores.index');
Route::get('/jugadores/create', [JugadoresController::class, 'create'])->name('jugadores.create');
Route::post('/jugadores', [JugadoresController::class, 'store'])->name('jugadores.store');
Route::delete('/jugadores/{id}', [JugadoresController::class, 'destroy'])->name('jugadores.destroy');
