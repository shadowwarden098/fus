@extends('layouts.app')

@section('title', 'Gestión de Cuentas')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
    /* Fuente y colores base */
    body {
        font-family: 'Poppins', sans-serif;
        background: radial-gradient(circle at center, #00111f 0%, #000814 100%);
        color: #e0e0e0;
    }

    /* Estilo para los títulos */
    h2, h5, .card-title {
        font-family: 'Orbitron', sans-serif;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #00eaff;
    }

    /* Tarjetas de estadísticas */
    .card {
        background: rgba(0, 10, 30, 0.7);
        border: 1px solid rgba(0, 234, 255, 0.3);
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 234, 255, 0.1);
        transition: all 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 0 20px rgba(0, 234, 255, 0.3);
        transform: translateY(-5px);
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-size: 1.1em;
        margin-bottom: 15px;
        color: #00eaff;
    }

    .card h2 {
        font-size: 2.5em;
        margin: 0;
        color: #fff;
        text-shadow: 0 0 10px rgba(0, 234, 255, 0.5);
    }

    /* Botones personalizados */
    .btn {
        font-family: 'Orbitron', sans-serif;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 600;
        transition: all 0.3s ease;
        border-radius: 5px;
        padding: 8px 15px;
    }

    .btn-primary {
        background: linear-gradient(90deg, #0077ff, #00eaff);
        border: none;
        color: #fff;
        box-shadow: 0 0 10px rgba(0, 234, 255, 0.5);
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #00eaff, #0077ff);
        transform: scale(1.05);
        box-shadow: 0 0 15px rgba(0, 234, 255, 0.7);
    }

    .btn-outline-info {
        border: 1px solid #00eaff;
        color: #00eaff;
        background: transparent;
    }

    .btn-outline-info:hover {
        background: rgba(0, 234, 255, 0.2);
        color: #fff;
        border-color: #00eaff;
    }

    .btn-outline-success {
        border: 1px solid #28a745;
        color: #28a745;
        background: transparent;
    }

    .btn-outline-success:hover {
        background: rgba(40, 167, 69, 0.2);
        color: #fff;
        border-color: #28a745;
    }

    /* Tabla de cuentas */
    .table {
        background: rgba(0, 10, 30, 0.5);
        color: #fff;
    }

    .table thead th {
        background: rgba(0, 20, 40, 0.7);
        color: #00eaff;
        font-family: 'Orbitron', sans-serif;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-bottom: 1px solid rgba(0, 234, 255, 0.3);
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background: rgba(0, 15, 30, 0.3);
    }

    .table-hover tbody tr:hover {
        background: rgba(0, 234, 255, 0.1);
    }

    /* Badges */
    .badge {
        font-family: 'Orbitron', sans-serif;
        font-size: 0.8em;
        padding: 5px 10px;
        border-radius: 3px;
    }

    .badge.bg-info {
        background: linear-gradient(90deg, #17a2b8, #00eaff);
    }

    .badge.bg-success {
        background: linear-gradient(90deg, #28a745, #20c997);
    }

    .badge.bg-danger {
        background: linear-gradient(90deg, #dc3545, #ff6b6b);
    }

    .badge.bg-secondary {
        background: rgba(100, 100, 100, 0.5);
    }

    /* Botones de acciones */
    .btn-sm {
        font-size: 0.7em;
        padding: 5px 10px;
        margin: 2px;
    }

    .btn-info {
        background: linear-gradient(90deg, #17a2b8, #00eaff);
        border: none;
    }

    .btn-warning {
        background: linear-gradient(90deg, #ffc107, #fd7e14);
        border: none;
    }

    .btn-danger {
        background: linear-gradient(90deg, #dc3545, #ff6b6b);
        border: none;
    }

    .btn-secondary {
        background: rgba(100, 100, 100, 0.5);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    /* Alertas */
    .alert {
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 20px;
        border: none;
    }

    .alert-success {
        background: rgba(40, 167, 69, 0.2);
        color: #28a745;
        border-left: 4px solid #28a745;
    }

    .alert-info {
        background: rgba(0, 234, 255, 0.1);
        color: #00eaff;
        border-left: 4px solid #00eaff;
    }

    .alert-danger {
        background: rgba(220, 53, 69, 0.1);
        color: #dc3545;
        border-left: 4px solid #dc3545;
    }

    /* Paginación */
    .pagination .page-item.active .page-link {
        background: linear-gradient(90deg, #0077ff, #00eaff);
        border-color: #00eaff;
    }

    .pagination .page-link {
        color: #00eaff;
        background: transparent;
        border: 1px solid rgba(0, 234, 255, 0.3);
    }

    .pagination .page-link:hover {
        background: rgba(0, 234, 255, 0.1);
        color: #fff;
    }

    /* Efecto de neón en los bordes de los botones de acción */
    .btn-activar, .btn-desactivar {
        position: relative;
        overflow: hidden;
    }

    .btn-activar::after, .btn-desactivar::after {
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

    .btn-activar:hover::after, .btn-desactivar:hover::after {
        left: 100%;
    }
</style>
@endpush

@section('content')
<div class="container mt-4">
    <!-- Encabezado con botones -->
    <div class="row mb-4">
        <div class="col-md-8">
            <h2><i class="fas fa-gamepad me-2"></i> Gestión de Cuentas</h2>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('cuentas.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle me-1"></i> Nueva Cuenta
            </a>
            <a href="{{ route('cuentas.index') }}" class="btn btn-outline-info ms-2">
                <i class="fas fa-building me-1"></i> Ver Cuentas
            </a>
            <a href="{{ route('usuarios.index') }}" class="btn btn-outline-success ms-2">
                <i class="fas fa-users me-1"></i> Ver Usuarios
            </a>
        </div>
    </div>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Estadísticas -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Cuentas</h5>
                    <h2 class="text-primary">{{ $cuentas->total() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h5 class="card-title">Cuentas Activas</h5>
                    <h2 class="text-success">{{ $cuentas->where('estado', 'activa')->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center h-100">
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
            <h5 class="mb-0"><i class="fas fa-list me-2"></i> Lista de Cuentas</h5>
        </div>
        <div class="card-body">
            @if($cuentas->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
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
                                        @if($cuenta->usuario)
                                            <span class="badge bg-info">
                                                <i class="fas fa-user me-1"></i> {{ $cuenta->usuario->nombre }}
                                            </span>
                                            <br>
                                            <small class="text-muted">{{ $cuenta->usuario->email }}</small>
                                        @else
                                            <span class="badge bg-secondary">Sin usuario</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($cuenta->estado == 'activa')
                                            <span class="badge bg-success">Activa</span>
                                        @else
                                            <span class="badge bg-danger">Inactiva</span>
                                        @endif
                                    </td>
                                    <td>{{ $cuenta->created_at ? $cuenta->created_at->format('d/m/Y H:i') : '-' }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center align-items-center gap-1 flex-wrap">
                                            <!-- Ver usuario de la cuenta -->
                                            @if($cuenta->usuario)
                                                <a href="{{ route('usuarios.show', $cuenta->usuario->id) }}"
                                                   class="btn btn-sm btn-info mt-1"
                                                   title="Ver usuario">
                                                    <i class="fas fa-user"></i>
                                                </a>
                                            @endif
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
                <!-- Paginación -->
                <div class="d-flex justify-content-center mt-3">
                    {{ $cuentas->links() }}
                </div>
            @else
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle me-2"></i> No hay cuentas registradas aún.
                    <a href="{{ route('cuentas.create') }}" class="ms-2">Crear la primera cuenta</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

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
