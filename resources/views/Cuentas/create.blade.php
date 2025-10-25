@extends('layouts.app')

@section('title', 'Crear Nueva Cuenta')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
    /* Fuente y colores base */
    body {
        font-family: 'Poppins', sans-serif;
        background: radial-gradient(circle at center, #00111f 0%, #000814 100%);
        color: #e0e0e0;
    }

    /* Estilo para el contenedor principal */
    .container {
        padding-top: 20px;
    }

    /* Tarjeta principal */
    .card {
        background: rgba(0, 10, 30, 0.8);
        border: 1px solid rgba(0, 234, 255, 0.3);
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0, 234, 255, 0.1);
        transition: all 0.3s ease;
    }

    .card-header {
        background: linear-gradient(90deg, #0077ff, #00eaff);
        border-radius: 15px 15px 0 0;
        padding: 15px 20px;
        border: none;
    }

    .card-header h4 {
        font-family: 'Orbitron', sans-serif;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #fff;
        margin: 0;
    }

    .card-body {
        padding: 30px;
        background: rgba(0, 5, 20, 0.6);
    }

    /* Botón de volver */
    .btn-light {
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }

    .btn-light:hover {
        background: rgba(255, 255, 255, 0.2);
        color: #00eaff;
    }

    /* Formulario */
    .form-label {
        font-family: 'Orbitron', sans-serif;
        color: #00eaff;
        font-size: 0.9em;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .form-control, .form-select {
        background: rgba(0, 10, 30, 0.5);
        border: 1px solid rgba(0, 234, 255, 0.3);
        color: #fff;
        border-radius: 5px;
        padding: 10px 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #00eaff;
        box-shadow: 0 0 10px rgba(0, 234, 255, 0.5);
        background: rgba(0, 15, 30, 0.6);
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }

    /* Alertas */
    .alert {
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
        border: none;
    }

    .alert-danger {
        background: rgba(220, 53, 69, 0.2);
        color: #ff6b6b;
        border-left: 4px solid #dc3545;
    }

    .alert-danger ul {
        margin-bottom: 0;
        padding-left: 20px;
    }

    .alert-info {
        background: rgba(0, 234, 255, 0.1);
        color: #00eaff;
        border-left: 4px solid #00eaff;
    }

    /* Botones del formulario */
    .btn {
        font-family: 'Orbitron', sans-serif;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 600;
        transition: all 0.3s ease;
        border-radius: 5px;
        padding: 10px 20px;
    }

    .btn-secondary {
        background: rgba(100, 100, 100, 0.5);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #fff;
    }

    .btn-secondary:hover {
        background: rgba(150, 150, 150, 0.7);
        color: #00eaff;
        transform: scale(1.02);
    }

    .btn-primary {
        background: linear-gradient(90deg, #0077ff, #00eaff);
        border: none;
        color: #fff;
        box-shadow: 0 0 10px rgba(0, 234, 255, 0.3);
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #00eaff, #0077ff);
        transform: scale(1.05);
        box-shadow: 0 0 15px rgba(0, 234, 255, 0.5);
    }

    /* Efecto de neón en los inputs */
    .form-control, .form-select {
        position: relative;
    }

    .form-control:focus, .form-select:focus {
        outline: none;
    }

    /* Botón de submit con efecto especial */
    button[type="submit"] {
        position: relative;
        overflow: hidden;
    }

    button[type="submit"]:after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: rgba(255, 255, 255, 0.1);
        transform: rotate(30deg);
        transition: all 0.5s ease;
    }

    button[type="submit"]:hover:after {
        left: 100%;
    }
</style>
@endpush

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="fas fa-plus-circle me-2"></i>
                        Crear Nueva Cuenta y Usuario
                    </h4>
                    <a href="{{ route('cuentas.index') }}" class="btn btn-light btn-sm">
                        <i class="fas fa-arrow-left me-1"></i> Volver
                    </a>
                </div>
                <div class="card-body">
                    <!-- Mostrar errores -->
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>¡Error!</strong> Revisa los campos:
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Formulario -->
                    <form action="{{ route('cuentas.store') }}" method="POST" id="formCrearCuenta">
                        @csrf
                        <!-- Campos del Usuario -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Contraseña</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Rol</label>
                            <select name="rol" class="form-select" required>
                                <option value="usuario" {{ old('rol') == 'usuario' ? 'selected' : '' }}>Usuario</option>
                                <option value="admin" {{ old('rol') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="jugador" {{ old('rol') == 'jugador' ? 'selected' : '' }}>Jugador</option>
                            </select>
                        </div>
                        <!-- Estado de la Cuenta -->
                        <div class="mb-3">
                            <label for="estado" class="form-label fw-bold">Estado de la Cuenta</label>
                            <select name="estado" id="estado" class="form-select" required>
                                <option value="activa" {{ old('estado') == 'activa' ? 'selected' : '' }}>Activa</option>
                                <option value="inactiva" {{ old('estado') == 'inactiva' ? 'selected' : '' }}>Inactiva</option>
                            </select>
                        </div>
                        <!-- Botones -->
                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <button type="reset" class="btn btn-secondary">
                                <i class="fas fa-undo me-1"></i> Limpiar
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Crear Cuenta y Usuario
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Info adicional -->
            <div class="alert alert-info mt-4 shadow-sm">
                <i class="fas fa-info-circle me-2"></i>
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

@push('scripts')
<script>
    // Validación del formulario
    document.getElementById('formCrearCuenta').addEventListener('submit', function(e) {
        const nombre = document.querySelector('input[name="nombre"]').value.trim();
        const email = document.querySelector('input[name="email"]').value.trim();
        const password = document.querySelector('input[name="password"]').value.trim();

        if(!nombre || !email || !password) {
            e.preventDefault();
            alert('Debes completar todos los campos del usuario para crear la cuenta.');
        }
    });

    // Efecto de sonido al hacer clic en los botones (opcional)
    document.querySelectorAll('button, .btn').forEach(button => {
        button.addEventListener('click', function() {
            const audio = new Audio('https://assets.mixkit.co/sfx/preview/mixkit-arcade-game-jump-coin-216.mp3');
            audio.volume = 0.3;
            audio.play();
        });
    });
</script>
@endpush
