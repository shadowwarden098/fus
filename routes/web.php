<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Estudiantes\EstudiantesInertiaController;
use App\Http\Controllers\Cuenta\CuentasController;
use App\Http\Controllers\Estudiantes\EstudianteReportePdfController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🏠 Página de bienvenida
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// 📊 Dashboard (solo usuarios autenticados)
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 👤 Perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Gestión de Cuentas
Route::resource('cuentas', CuentasController::class);

/// Gestión de Estudiantes (Inertia + PDF)
Route::prefix('estudiantes')->group(function () {
    // ⚠️ IMPORTANTE: Rutas PDF PRIMERO (antes de las dinámicas)
    
    // 🧾 PDF general (DEBE ir antes de /{id})
    Route::get('/pdf', [EstudianteReportePdfController::class, 'index'])->name('estudiantes.pdf');
    
    // 🧾 PDF individual - crear
    Route::get('/create', [EstudiantesInertiaController::class, 'create'])->name('estudiantes.create');
    
    // 🧾 Rutas Inertia estándar
    Route::get('/', [EstudiantesInertiaController::class, 'index'])->name('estudiantes.index');
    Route::post('/', [EstudiantesInertiaController::class, 'store'])->name('estudiantes.store');
    
    // ⚠️ Rutas dinámicas {id} AL FINAL
    Route::get('/{id}', [EstudiantesInertiaController::class, 'show'])->name('estudiantes.show');
    Route::get('/{id}/edit', [EstudiantesInertiaController::class, 'edit'])->name('estudiantes.edit');
    Route::put('/{id}', [EstudiantesInertiaController::class, 'update'])->name('estudiantes.update');
    Route::get('/{id}/delete', [EstudiantesInertiaController::class, 'delete'])->name('estudiantes.delete');
    Route::delete('/{id}', [EstudiantesInertiaController::class, 'destroy'])->name('estudiantes.destroy');
    
    // PDF individual (con {id} específico)
    Route::get('/{id}/pdf', [EstudianteReportePdfController::class, 'ver'])->name('estudiantes.pdf.ver');
    Route::get('/{id}/pdf/descargar', [EstudianteReportePdfController::class, 'descargar'])->name('estudiantes.pdf.descargar');
});

// Autenticación
require __DIR__ . '/auth.php';
