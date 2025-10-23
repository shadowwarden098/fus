@extends('layouts.app')

@section('title', 'Gestión de Cuentas')

@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2>Gestión de Cuentas</h2>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('cuentas.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nueva Cuenta
            </a>
            <!-- Cambiado a cuentas.index -->
            <a href="{{ route('cuentas.index') }}" class="btn btn-outline-info ms-2">
                <i class="fas fa-users"></i> Ver Cuentas
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Estadísticas -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Cuentas</h5>
                    <h2 class="text-primary">{{ $cuentas->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Cuentas Activas</h5>
                    <h2 class="text-success">{{ $cuentas->where('estado', 'activa')->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Cuentas Inactivas</h5>
                    <h2 class="text-danger">{{ $cuentas->where('estado', 'inactiva')->count() }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla de Cuentas -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Lista de Cuentas</h5>
        </div>
        <div class="card-body">
            @if($cuentas->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Estado</th>
                                <th>Fecha de Creación</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cuentas as $cuenta)
                                <tr>
                                    <td>{{ $cuenta->idCuenta }}</td>
                                    <td>
                                        @if($cuenta->estado == 'activa')
                                            <span class="badge bg-success">Activa</span>
                                        @else
                                            <span class="badge bg-danger">Inactiva</span>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($cuenta->fechaCreacion)->format('d/m/Y H:i') }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center align-items-center gap-1 flex-wrap">
                                            <!-- Eliminado el enlace a usuarios.index -->

                                            <!-- Ver detalles de la cuenta -->
                                            <a href="{{ route('cuentas.show', $cuenta->idCuenta) }}" 
                                               class="btn btn-sm btn-info mt-1" 
                                               title="Ver detalles">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <!-- Editar -->
                                            <a href="{{ route('cuentas.edit', $cuenta->idCuenta) }}" 
                                               class="btn btn-sm btn-warning mt-1" 
                                               title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- Activar / Desactivar -->
                                            @if($cuenta->estado == 'activa')
                                                <button type="button" 
                                                        class="btn btn-sm btn-secondary btn-desactivar mt-1" 
                                                        data-id="{{ $cuenta->idCuenta }}"
                                                        title="Desactivar">
                                                    <i class="fas fa-ban"></i>
                                                </button>
                                            @else
                                                <button type="button" 
                                                        class="btn btn-sm btn-success btn-activar mt-1" 
                                                        data-id="{{ $cuenta->idCuenta }}"
                                                        title="Activar">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            @endif

                                            <!-- Eliminar -->
                                            <form action="{{ route('cuentas.destroy', $cuenta->idCuenta) }}" 
                                                  method="POST" 
                                                  onsubmit="return confirm('¿Estás seguro de eliminar esta cuenta?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-sm btn-danger mt-1" 
                                                        title="Eliminar">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle"></i> No hay cuentas registradas aún.
                    <a href="{{ route('cuentas.create') }}">Crear la primera cuenta</a>
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Activar cuenta
    document.querySelectorAll('.btn-activar').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            
            fetch(`/cuentas/${id}/activar`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    location.reload();
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

    // Desactivar cuenta
    document.querySelectorAll('.btn-desactivar').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            
            if(confirm('¿Deseas desactivar esta cuenta?')) {
                fetch(`/cuentas/${id}/desactivar`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        location.reload();
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });
    });
</script>
@endpush
@endsection
