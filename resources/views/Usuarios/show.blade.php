@extends('layouts.app')

@section('title', 'Detalles del Usuario')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="fas fa-user-circle"></i> Detalles del Usuario</h4>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-light btn-sm">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>

                <div class="card-body bg-light">
                    <div class="text-center mb-4">
                        <i class="fas fa-user fa-5x text-primary mb-3"></i>
                        <h3 class="fw-bold">{{ $usuario->nombre }}</h3>
                        <span class="badge bg-{{ $usuario->rol == 'admin' ? 'danger' : 'secondary' }}">
                            {{ ucfirst($usuario->rol) }}
                        </span>
                    </div>

                    <hr>

                    <div class="px-3">
                        <p><strong><i class="fas fa-id-card"></i> ID:</strong> {{ $usuario->id }}</p>
                        <p><strong><i class="fas fa-envelope"></i> Correo:</strong> {{ $usuario->email }}</p>
                        <p><strong><i class="fas fa-calendar-alt"></i> Fecha de creación:</strong> {{ $usuario->created_at->format('d/m/Y H:i') }}</p>
                        <p><strong><i class="fas fa-edit"></i> Última actualización:</strong> {{ $usuario->updated_at->format('d/m/Y H:i') }}</p>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning text-dark fw-bold">
                            <i class="fas fa-edit"></i> Editar
                        </a>

                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?')" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger fw-bold">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="alert alert-info mt-4 shadow-sm">
                <i class="fas fa-info-circle"></i> Esta vista muestra los datos actuales del usuario registrado en el sistema.
            </div>
        </div>
    </div>
</div>
@endsection
