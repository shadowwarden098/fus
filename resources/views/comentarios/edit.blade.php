@extends('layouts.app')

@section('title', 'Editar Comentario')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="fas fa-edit me-2"></i>
                        Editar Comentario
                    </h4>
                    <a href="{{ route('comentarios.index') }}" class="btn btn-light btn-sm">
                        <i class="fas fa-arrow-left me-1"></i> Volver
                    </a>
                </div>
                <div class="card-body">
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

                    <form action="{{ route('comentarios.update', $comentario) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
    <label class="form-label fw-bold">Usuario</label>
    <select name="idUsuario" class="form-select" required>
        @foreach($usuarios as $usuario)
            <option value="{{ $usuario->id }}" {{ $comentario->idUsuario == $usuario->id ? 'selected' : '' }}>
                {{ $usuario->nombre }}
            </option>
        @endforeach
    </select>
</div>
