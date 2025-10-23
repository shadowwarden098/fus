<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Estudiantes\EstudiantesController;
use App\Http\Controllers\Dioses\DiosesController;
use App\Http\Controllers\Jugadores\JugadoresController;
use App\Http\Controllers\Cuenta\CuentasController;
use App\Http\Controllers\Usuario\UsuariosController;
use App\Http\Controllers\Admin\AdminController;

// 🌍 Página principal
Route::get('/', fn() => view('welcome'))->name('home');

// 🗣️ Mensajes
Route::get('/hola', fn() => '"No importa cuánto sufras, nunca cambies quién eres."')->name('senin');
Route::get('/bienvenidos', fn() => view('bienvenidos'))->name('bienvenidos');
Route::get('/clan', fn() => view('clan'))->name('clan');

// 🧑‍🎓 Estudiantes
Route::prefix('estudiantes')->name('estudiantes.')->group(function() {
    Route::get('/', [EstudiantesController::class, 'index'])->name('index');
    Route::get('/create', [EstudiantesController::class, 'create'])->name('create');
    Route::post('/', [EstudiantesController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [EstudiantesController::class, 'edit'])->name('edit');
    Route::put('/{id}', [EstudiantesController::class, 'update'])->name('update');
    Route::get('/{id}/confirmar-eliminacion', [EstudiantesController::class, 'confirmarEliminacion'])->name('confirmarEliminacion');
    Route::delete('/{id}', [EstudiantesController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/delete', [EstudiantesController::class, 'delete'])->name('delete');
});

// 🛐 Dioses
Route::prefix('dioses')->name('dioses.')->group(function() {
    Route::get('/', [DiosesController::class, 'index'])->name('index');
    Route::get('/create', [DiosesController::class, 'create'])->name('create');
    Route::post('/', [DiosesController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [DiosesController::class, 'edit'])->name('edit');
    Route::put('/{id}', [DiosesController::class, 'update'])->name('update');
    Route::delete('/{id}', [DiosesController::class, 'destroy'])->name('destroy');
});

// 🎮 Jugadores
Route::prefix('jugadores')->name('jugadores.')->group(function() {
    Route::get('/', [JugadoresController::class, 'index'])->name('index');
    Route::get('/create', [JugadoresController::class, 'create'])->name('create');
    Route::post('/', [JugadoresController::class, 'store'])->name('store');
    Route::delete('/{id}', [JugadoresController::class, 'destroy'])->name('destroy');
});

// 💳 Cuentas (Administrador)
Route::prefix('cuentas')->name('cuentas.')->middleware('auth:admin')->group(function() {
    Route::get('/', [CuentasController::class, 'index'])->name('index');
    Route::get('/create', [CuentasController::class, 'create'])->name('create');
    Route::post('/', [CuentasController::class, 'store'])->name('store');
    Route::get('/{cuenta}', [CuentasController::class, 'show'])->name('show');
    Route::get('/{cuenta}/edit', [CuentasController::class, 'edit'])->name('edit');
    Route::put('/{cuenta}', [CuentasController::class, 'update'])->name('update');
    Route::delete('/{cuenta}', [CuentasController::class, 'destroy'])->name('destroy');

    // Activar / Desactivar AJAX
    Route::post('/{cuenta}/activar', [CuentasController::class, 'activarCuenta'])->name('activar');
    Route::post('/{cuenta}/desactivar', [CuentasController::class, 'desactivarCuenta'])->name('desactivar');

    Route::get('/buscar', [CuentasController::class, 'buscar'])->name('buscar');
    Route::get('/estadisticas', [CuentasController::class, 'estadisticas'])->name('estadisticas');

    // 🔹 Usuarios de una cuenta
    Route::get('/{cuenta}/usuarios', [UsuariosController::class, 'indexPorCuenta'])->name('usuarios.porCuenta');
});

// 👤 Usuarios (Solo crear jugador)
Route::prefix('usuarios')->name('usuarios.')->group(function() {
    Route::get('/create', [UsuariosController::class, 'create'])->name('create');
    Route::post('/', [UsuariosController::class, 'store'])->name('store');
});

// 🔑 Login y logout Administrador
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
