@extends('layouts.app')

@section('title', 'Crear Nueva Cuenta')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="fas fa-plus-circle"></i> Crear Nueva Cuenta y Usuario</h4>
                    <a href="{{ route('cuentas.index') }}" class="btn btn-light btn-sm">
                        <i class="fas fa-arrow-left"></i> Volver
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
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
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
                                <i class="fas fa-undo"></i> Limpiar
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Crear Cuenta y Usuario
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Info adicional -->
            <div class="alert alert-info mt-4 shadow-sm">
                <i class="fas fa-info-circle"></i>
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
@endsection
