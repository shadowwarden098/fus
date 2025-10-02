<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/wuenass', function () {
    return 'hola gente';
});

Route::get('/bienvenidos', function () {
    return view(view: 'bienvenidos');
});