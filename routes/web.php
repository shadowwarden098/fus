<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\view;
use App\Models\Estudiante;
Route::get('/', function () {

    $estudiante = new Estudiante();
    $estudiante->nombres = 'gabriel';
    $estudiante->pri_ape = 'pozo';
    $estudiante->seg_ape = 'espinoza';
    $estudiante->save();

    return $estudiante;











    //return 'aqui trabajere con la tabla estudiantes' ;
});

Route::get('/hola', function () {
    return '';
})->name('senin' );


Route::get('/bienvenidos', function () {
    return view('bienvenidos');
})->name('bienvenidos');

Route::get('/clan', function () {
    return view('clan');
})->name('clan' );
