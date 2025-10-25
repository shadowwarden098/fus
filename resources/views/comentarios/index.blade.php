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
    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: radial-gradient(circle at center, #00111f 0%, #000814 100%);
            color: #e0e0e0;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h2 {
            font-family: 'Orbitron', sans-serif;
            color: #00eaff;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .card {
            background: rgba(0, 10, 30, 0.7);
            border: 1px solid rgba(0, 234, 255, 0.3);
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 234, 255, 0.1);
        }

        .card-header {
            background: linear-gradient(90deg, #0077ff, #00eaff);
            border-radius: 15px 15px 0 0;
            padding: 15px 20px;
            border: none;
        }

        .card-header h5 {
            color: #fff;
            font-family: 'Orbitron', sans-serif;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0;
        }

        .card-body {
            padding: 20px;
            background: rgba(16, 56, 176, 0.6);
        }

        .comment-card {
            background: rgba(52, 224, 115, 0.5);
            border: 1px solid rgba(0, 234, 255, 0.3);
            border-radius: 10px;
        }

        .reply-card {
            background: rgba(15, 99, 183, 0.5);
            border-left: 3px solid #00eaff;
            border-radius: 8px;
        }

        .btn-primary {
            background: linear-gradient(90deg, #0077ff, #00eaff);
            border: none;
            color: #fff;
            font-family: 'Orbitron', sans-serif;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #00eaff, #0077ff);
            transform: scale(1.02);
            box-shadow: 0 0 15px rgba(0, 234, 255, 0.5);
        }

        .btn-info {
            background: linear-gradient(90deg, #17a2b8, #00eaff);
            border: none;
            color: #fff;
        }

        .btn-info:hover {
            transform: scale(1.02);
            box-shadow: 0 0 10px rgba(0, 234, 255, 0.5);
        }

        .btn-warning {
            background: linear-gradient(90deg, #ffc107, #fd7e14);
            border: none;
            color: #000;
        }

        .btn-warning:hover {
            transform: scale(1.02);
            box-shadow: 0 0 10px rgba(255, 193, 7, 0.5);
        }

        .btn-danger {
            background: linear-gradient(90deg, #dc3545, #ff6b6b);
            border: none;
            color: #fff;
        }

        .btn-danger:hover {
            transform: scale(1.02);
            box-shadow: 0 0 10px rgba(220, 53, 69, 0.5);
        }

        .text-muted {
            color: #aaa !important;
        }

        .alert {
            border-radius: 8px;
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

        .footer {
            text-align: center;
            margin-top: 40px;
            padding: 20px;
            color: #888;
            font-size: 0.9em;
        }

        .card-title {
            color: #00eaff;
            font-family: 'Orbitron', sans-serif;
        }

        .card-subtitle {
            color: #aaa;
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
