@extends('layouts.app')

@section('title', 'Gestión de Usuarios')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">
            <i class="fas fa-users"></i> Lista de Usuarios
        </h2>
        <div>
            <a href="{{ route('cuentas.index') }}" class="btn btn-outline-info me-2">
                <i class="fas fa-building"></i> Ver Cuentas
            </a>
            <a href="{{ route('usuarios.create') }}" class="btn btn-success">
                <i class="fas fa-user-plus"></i> Nuevo Usuario
            </a>
        </div>
    </div>

    <!-- Mensajes de éxito o error -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="fas fa-times-circle"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Tabla de usuarios -->
    <div class="card shadow-sm">
        <div class="card-body">
            @if($usuarios->isEmpty())
                <div class="text-center text-muted py-5">
                    <i class="fas fa-user-slash fa-3x mb-3"></i>
                    <p class="fs-5">No hay usuarios registrados.</p>
                    <a href="{{ route('usuarios.create') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-plus"></i> Crear primer usuario
                    </a>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Fecha Registro</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->id }}</td>
                                    <td>
                                        <strong>{{ $usuario->nombre }}</strong>
                                    </td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                        @if($usuario->rol == 'admin')
                                            <span class="badge bg-danger">
                                                <i class="fas fa-shield-alt"></i> Admin
                                            </span>
                                        @elseif($usuario->rol == 'usuario')
                                            <span class="badge bg-primary">
                                                <i class="fas fa-user"></i> Usuario
                                            </span>
                                        @else
                                            <span class="badge bg-info">
                                                <i class="fas fa-gamepad"></i> Jugador
                                            </span>
                                        @endif
                                    </td>
                                    <td>{{ $usuario->created_at ? $usuario->created_at->format('d/m/Y H:i') : '-' }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <!-- Ver -->
                                            <a href="{{ route('usuarios.show', $usuario->id) }}" 
                                               class="btn btn-sm btn-info" 
                                               title="Ver detalles">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <!-- Editar -->
                                            <a href="{{ route('usuarios.edit', $usuario->id) }}" 
                                               class="btn btn-sm btn-warning" 
                                               title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- Eliminar -->
                                            <button type="button" 
                                                    class="btn btn-sm btn-danger" 
                                                    title="Eliminar"
                                                    onclick="confirmarEliminacion({{ $usuario->id }}, '{{ $usuario->nombre }}')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>

                                        <!-- Formulario oculto para eliminar -->
                                        <form id="form-delete-{{ $usuario->id }}" 
                                              action="{{ route('usuarios.destroy', $usuario->id) }}" 
                                              method="POST" 
                                              style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $usuarios->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
    function confirmarEliminacion(id, nombre) {
        if (confirm(`¿Estás seguro de eliminar al usuario "${nombre}"?\n\nEsta acción no se puede deshacer.`)) {
            document.getElementById('form-delete-' + id).submit();
        }
    }
</script>
@endpush
@endsection