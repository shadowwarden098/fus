@extends('layouts.app')

@section('title', 'Crear Nueva Cuenta')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4" style="background: rgba(0, 10, 30, 0.8); border: 1px solid #00eaff;">
                <div class="card-header bg-primary text-white" style="background: linear-gradient(90deg, #0077ff, #00eaff);">
                    <h4 class="mb-0 text-center">
                        <i class="fas fa-plus-circle"></i>
                        <span style="font-family: 'Orbitron', sans-serif; text-transform: uppercase; letter-spacing: 2px;">
                            Crear Nueva Cuenta y Usuario
                        </span>
                    </h4>
                </div>
                <div class="card-body" style="background: rgba(0, 5, 20, 0.7);">
                    <!-- Mostrar errores -->
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background: rgba(255, 0, 0, 0.2); border: 1px solid #ff0000; color: #ffcccc;">
                            <strong>¡Error!</strong> Revisa los campos:
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" style="filter: invert(1);"></button>
                        </div>
                    @endif

                    <!-- Formulario -->
                    <form action="{{ route('cuentas.store') }}" method="POST" id="formCrearCuenta">
                        @csrf
                        <!-- Campos del Usuario -->
                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #00eaff; font-family: 'Orbitron', sans-serif;">Nombre</label>
                            <input type="text" name="nombre" class="form-control" style="background: rgba(0, 10, 30, 0.5); border: 1px solid #00eaff; color: #fff;" value="{{ old('nombre') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #00eaff; font-family: 'Orbitron', sans-serif;">Email</label>
                            <input type="email" name="email" class="form-control" style="background: rgba(0, 10, 30, 0.5); border: 1px solid #00eaff; color: #fff;" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #00eaff; font-family: 'Orbitron', sans-serif;">Contraseña</label>
                            <input type="password" name="password" class="form-control" style="background: rgba(0, 10, 30, 0.5); border: 1px solid #00eaff; color: #fff;" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #00eaff; font-family: 'Orbitron', sans-serif;">Rol</label>
                            <select name="rol" class="form-select" style="background: rgba(0, 10, 30, 0.5); border: 1px solid #00eaff; color: #fff;" required>
                                <option value="jugador" selected>Jugador</option>
                            </select>
                            <small class="text-muted" style="color: #aaa !important;">Los nuevos usuarios serán registrados como Jugador</small>
                        </div>
                        <!-- Estado de la Cuenta -->
                        <div class="mb-3">
                            <label for="estado" class="form-label fw-bold" style="color: #00eaff; font-family: 'Orbitron', sans-serif;">Estado de la Cuenta</label>
                            <select name="estado" id="estado" class="form-select" style="background: rgba(0, 10, 30, 0.5); border: 1px solid #00eaff; color: #fff;" required>
                                <option value="activa" {{ old('estado') == 'activa' ? 'selected' : '' }}>Activa</option>
                                <option value="inactiva" {{ old('estado') == 'inactiva' ? 'selected' : '' }}>Inactiva</option>
                            </select>
                        </div>
                        <!-- Botones -->
                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <button type="reset" class="btn btn-secondary" style="background: rgba(100, 100, 100, 0.5); border: 1px solid #555; color: #fff;">
                                <i class="fas fa-undo"></i> Limpiar
                            </button>
                            <button type="submit" class="btn btn-primary" style="background: linear-gradient(90deg, #0077ff, #00eaff); border: none; color: #fff; font-family: 'Orbitron', sans-serif; text-transform: uppercase; letter-spacing: 1px;">
                                <i class="fas fa-save"></i> Crear Cuenta y Usuario
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Info adicional -->
            <div class="alert alert-info mt-4 shadow-sm" style="background: rgba(0, 100, 200, 0.2); border: 1px solid #00eaff; color: #ccf;">
                <i class="fas fa-info-circle" style="color: #00eaff;"></i>
                <strong>Información:</strong><br>
                - La fecha de creación de la cuenta se establecerá automáticamente.<br>
                - El ID de la cuenta se asignará automáticamente.<br>
                - Podrás editar el estado de la cuenta después de crearla.<br>
                <br>
                <strong>Consejos:</strong><br>
                - Cuenta Activa: Permite al jugador acceder y jugar.<br>
                - Cuenta Inactiva: Suspende temporalmente el acceso al juego.<br>
                - Puedes cambiar el estado de la cuenta en cualquier momento desde el panel de gestión.
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
<style>
    /* Ocultar el menú de navegación en esta página */
    nav, .navbar, header, .navbar-nav {
        display: none !important;
    }

    body {
        padding-top: 0 !important;
        background: radial-gradient(circle at center, #00111f 0%, #000814 100%);
        color: #fff;
        font-family: 'Poppins', sans-serif;
    }

    /* Efecto de neón en los inputs al enfocar */
    input:focus, select:focus, textarea:focus {
        box-shadow: 0 0 10px #00eaff;
        border-color: #00eaff;
        outline: none;
    }

    /* Animación para el botón de submit */
    button[type="submit"] {
        transition: all 0.3s ease;
    }

    button[type="submit"]:hover {
        transform: scale(1.05);
        box-shadow: 0 0 15px #00eaff;
    }
</style>
@endpush

@push('scripts')
<script>
    document.getElementById('formCrearCuenta').addEventListener('submit', function(e) {
        const nombre = document.querySelector('input[name="nombre"]').value.trim();
        const email = document.querySelector('input[name="email"]').value.trim();
        const password = document.querySelector('input[name="password"]').value.trim();
        if(!nombre || !email || !password){
            e.preventDefault();
            alert('Debes completar todos los campos del usuario para crear la cuenta.');
        }
    });
</script>
@endpush
