@extends('layouts.app')

@section('title', 'Editar Cuenta')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">
                        <i class="fas fa-edit"></i> Editar Cuenta #{{ $cuenta->idCuenta }}
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Mostrar errores de validación -->
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>¡Error!</strong> Por favor corrige los siguientes errores:
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <!-- Información de la cuenta -->
                    <div class="alert alert-info mb-4">
                        <h6 class="alert-heading">
                            <i class="fas fa-info-circle"></i> Información Actual
                        </h6>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>ID de Cuenta:</strong> {{ $cuenta->idCuenta }}
                            </div>
                            <div class="col-md-6">
                                <strong>Fecha de Creación:</strong> 
                                {{ $cuenta->fechaCreacion->format('d/m/Y H:i') }}
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <strong>Estado Actual:</strong>
                                @if($cuenta->estado == 'activa')
                                    <span class="badge bg-success">Activa</span>
                                @else
                                    <span class="badge bg-danger">Inactiva</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <strong>Última Actualización:</strong> 
                                {{ $cuenta->updated_at->format('d/m/Y H:i') }}
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('cuentas.update', $cuenta->idCuenta) }}" 
                          method="POST" 
                          id="formEditarCuenta">
                        @csrf
                        @method('PUT')

                        <!-- Estado de la cuenta -->
                        <div class="mb-4">
                            <label for="estado" class="form-label fw-bold">
                                Cambiar Estado <span class="text-danger">*</span>
                            </label>
                            <select name="estado" 
                                    id="estado" 
                                    class="form-select @error('estado') is-invalid @enderror" 
                                    required>
                                <option value="">-- Selecciona un estado --</option>
                                <option value="activa" 
                                    {{ old('estado', $cuenta->estado) == 'activa' ? 'selected' : '' }}>
                                    Activa
                                </option>
                                <option value="inactiva" 
                                    {{ old('estado', $cuenta->estado) == 'inactiva' ? 'selected' : '' }}>
                                    Inactiva
                                </option>
                            </select>
                            @error('estado')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle"></i> 
                                Cambiar a "Inactiva" suspenderá el acceso al juego.
                            </small>
                        </div>

                        <!-- Vista previa del cambio -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">Vista Previa del Cambio:</label>
                            <div class="p-3 border rounded bg-light">
                                <div class="row align-items-center">
                                    <div class="col-md-5 text-center">
                                        <div class="mb-2">Estado Anterior</div>
                                        @if($cuenta->estado == 'activa')
                                            <span class="badge bg-success fs-5">
                                                <i class="fas fa-check-circle"></i> Activa
                                            </span>
                                        @else
                                            <span class="badge bg-danger fs-5">
                                                <i class="fas fa-ban"></i> Inactiva
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <i class="fas fa-arrow-right fa-2x text-muted"></i>
                                    </div>
                                    <div class="col-md-5 text-center">
                                        <div class="mb-2">Nuevo Estado</div>
                                        <span id="badgePreview" class="badge bg-secondary fs-5">
                                            Selecciona un estado
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Confirmación de cambios importantes -->
                        <div id="advertenciaDesactivar" class="alert alert-warning d-none">
                            <i class="fas fa-exclamation-triangle"></i>
                            <strong>¡Atención!</strong> Estás a punto de desactivar esta cuenta. 
                            El usuario no podrá acceder al juego hasta que vuelvas a activarla.
                        </div>

                        <!-- Botones de acción -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                            <a href="{{ route('cuentas.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                            <div class="d-flex gap-2">
                                <a href="{{ route('cuentas.show', $cuenta->idCuenta) }}" 
                                   class="btn btn-info">
                                    <i class="fas fa-eye"></i> Ver Detalles
                                </a>
                                <button type="submit" class="btn btn-warning" id="btnGuardar">
                                    <i class="fas fa-save"></i> Guardar Cambios
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Acciones adicionales -->
            <div class="card mt-4 border-danger">
                <div class="card-header bg-danger text-white">
                    <h6 class="mb-0">
                        <i class="fas fa-exclamation-triangle"></i> Zona de Peligro
                    </h6>
                </div>
                <div class="card-body">
                    <p class="mb-3">
                        <strong>Eliminar Cuenta:</strong> Esta acción no se puede deshacer. 
                        Se eliminará permanentemente la cuenta y toda su información asociada.
                    </p>
                    <form action="{{ route('cuentas.destroy', $cuenta->idCuenta) }}" 
                          method="POST" 
                          id="formEliminar">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Eliminar Cuenta Permanentemente
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    const estadoOriginal = '{{ $cuenta->estado }}';
    
    // Vista previa del estado seleccionado
    document.getElementById('estado').addEventListener('change', function() {
        const estado = this.value;
        const badge = document.getElementById('badgePreview');
        const advertencia = document.getElementById('advertenciaDesactivar');
        const btnGuardar = document.getElementById('btnGuardar');
        
        if(estado === 'activa') {
            badge.className = 'badge bg-success fs-5';
            badge.innerHTML = '<i class="fas fa-check-circle"></i> Activa';
            advertencia.classList.add('d-none');
        } else if(estado === 'inactiva') {
            badge.className = 'badge bg-danger fs-5';
            badge.innerHTML = '<i class="fas fa-ban"></i> Inactiva';
            
            // Mostrar advertencia solo si está cambiando de activa a inactiva
            if(estadoOriginal === 'activa') {
                advertencia.classList.remove('d-none');
            }
        } else {
            badge.className = 'badge bg-secondary fs-5';
            badge.textContent = 'Selecciona un estado';
            advertencia.classList.add('d-none');
        }
        
        // Cambiar color del botón según el estado
        if(estado !== estadoOriginal) {
            btnGuardar.classList.remove('btn-warning');
            btnGuardar.classList.add('btn-success');
            btnGuardar.innerHTML = '<i class="fas fa-save"></i> Guardar Cambios';
        } else {
            btnGuardar.classList.remove('btn-success');
            btnGuardar.classList.add('btn-warning');
            btnGuardar.innerHTML = '<i class="fas fa-save"></i> Sin Cambios';
        }
    });

    // Trigger inicial para mostrar el estado actual
    document.getElementById('estado').dispatchEvent(new Event('change'));

    // Confirmación al eliminar
    document.getElementById('formEliminar').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const confirmacion = confirm(
            '⚠️ ¿ESTÁS SEGURO?\n\n' +
            'Esta acción eliminará PERMANENTEMENTE la cuenta #{{ $cuenta->idCuenta }}.\n' +
            'Toda la información asociada se perderá y NO se puede recuperar.\n\n' +
            'Escribe "ELIMINAR" en el siguiente cuadro para confirmar.'
        );
        
        if(confirmacion) {
            const verificacion = prompt('Escribe "ELIMINAR" para confirmar:');
            if(verificacion === 'ELIMINAR') {
                this.submit();
            } else {
                alert('Eliminación cancelada. El texto no coincide.');
            }
        }
    });

    // Validación del formulario de edición
    document.getElementById('formEditarCuenta').addEventListener('submit', function(e) {
        const estado = document.getElementById('estado').value;
        
        if(!estado) {
            e.preventDefault();
            alert('Por favor selecciona un estado para la cuenta.');
            return false;
        }
        
        // Confirmación adicional para desactivación
        if(estado === 'inactiva' && estadoOriginal === 'activa') {
            const confirmar = confirm(
                '¿Confirmas que deseas DESACTIVAR esta cuenta?\n\n' +
                'El usuario no podrá acceder al juego.'
            );
            
            if(!confirmar) {
                e.preventDefault();
                return false;
            }
        }
    });
</script>
@endpush
@endsection