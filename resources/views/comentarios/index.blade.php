<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Comentarios</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #0b0d898c;
            color: #e0e0e0;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            background-color: #c21818ff;
            border: 1px solid #9d2a2aff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(193, 102, 6, 0.1);
        }

        .card-header {
            background-color: #230fd2ff;
            border-bottom: 1px solid #333;
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            background-color: #1e1e1e;
        }

        .comment-card {
            background-color: #252525;
            border: 1px solid #333;
            border-radius: 8px;
        }

        .reply-card {
            background-color: #2d2d2d;
            border-left: 3px solid #007bff;
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .text-muted {
            color: #888 !important;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            padding: 20px;
            color: #888;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row mb-4">
            <div class="col-md-8">
                <h2><i class="fas fa-comments me-2"></i> Gestión de Comentarios</h2>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('comentarios.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle me-1"></i> Nuevo Comentario
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-list me-2"></i> Lista de Comentarios</h5>
            </div>
            <div class="card-body">
                @if($comentarios->count() > 0)
                    @foreach($comentarios as $comentario)
                        <div class="card comment-card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h5 class="card-title">{{ $comentario->usuario->nombre }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $comentario->fecha->format('d/m/Y H:i') }}</h6>
                                    </div>
                                </div>
                                <p class="card-text">{{ $comentario->contenido }}</p>
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('comentarios.responder', $comentario) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-reply"></i> Responder
                                    </a>
                                    <a href="{{ route('comentarios.edit', $comentario) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <form action="{{ route('comentarios.destroy', $comentario) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este comentario?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                                @if($comentario->respuestas->count() > 0)
                                    <div class="mt-3 ms-4">
                                        @foreach($comentario->respuestas as $respuesta)
                                            <div class="card reply-card mb-2">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <h6 class="card-title">{{ $respuesta->usuario->nombre }}</h6>
                                                            <small class="text-muted">{{ $respuesta->fecha->format('d/m/Y H:i') }}</small>
                                                        </div>
                                                    </div>
                                                    <p class="card-text">{{ $respuesta->contenido }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-info text-center">
                        <i class="fas fa-info-circle me-2"></i> No hay comentarios registrados aún.
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="footer">
        © 2025 Sistema de Gestión de Comentarios | Desarrollado por Gabriel 💙
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
