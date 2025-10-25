@extends('layouts.app')

@section('title', 'Responder Comentario')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="fas fa-reply me-2"></i>
                        Responder Comentario
                    </h4>
                    <a href="{{ route('comentarios.index') }}" class="btn btn-light btn-sm">
                        <i class="fas fa-arrow-left me-1"></i> Volver
                    </a>
                </div>
                <div class="card-body">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $comentario->usuario->nombre }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $comentario->fecha->format('d/m/Y H:i') }}</h6>
                            <p class="card-text">{{ $comentario->contenido }}</p>
                        </div>
                    </div>

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

                    <form action="{{ route('comentarios.guardar-respuesta', $comentario) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Respuesta</label>
                            <textarea name="contenido" class="form-control" rows="4" required>{{ old('contenido') }}</textarea>
                        </div>
                      <div class="mb-3">
    <label class="form-label fw-bold">Usuario</label>
    <select name="idUsuario" class="form-select" required>
        @foreach($usuarios as $usuario)
            <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
        @endforeach
    </select>
</div>

                        <input type="hidden" name="idComentarioPadre" value="{{ $comentario->id }}">
                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <button type="reset" class="btn btn-secondary">
                                <i class="fas fa-undo me-1"></i> Limpiar
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Enviar Respuesta
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
