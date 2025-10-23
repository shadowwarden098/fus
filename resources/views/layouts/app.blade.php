<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestión de Cuentas')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Iconos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        body {
            background: linear-gradient(135deg, #1f2937, #111827);
            color: #f9fafb;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
        }

        nav.navbar {
            background: rgba(31, 41, 55, 0.9);
            backdrop-filter: blur(6px);
        }

        .navbar-brand {
            font-weight: 600;
            color: #00d4ff !important;
            letter-spacing: 0.5px;
        }

        .nav-link {
            color: #e5e7eb !important;
            transition: 0.3s;
        }

        .nav-link:hover {
            color: #00d4ff !important;
        }

        .container-content {
            background: rgba(255, 255, 255, 0.05);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 0 25px rgba(0, 212, 255, 0.1);
            margin-top: 2rem;
        }

        .alert {
            border-radius: 0.6rem;
        }

        footer {
            text-align: center;
            padding: 1.5rem 0;
            color: #9ca3af;
            margin-top: 3rem;
        }
    </style>

    @stack('styles')
</head>
<body>

    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-shield-check"></i> Sistema de Cuentas
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('cuentas.index') }}" class="nav-link"><i class="bi bi-person-badge"></i> Cuentas</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('cuentas.create') }}" class="nav-link"><i class="bi bi-plus-circle"></i> Nueva Cuenta</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="bi bi-gear"></i> Configuración</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container container-content">
        <!-- Mensajes de sesión -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('info'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <i class="bi bi-info-circle"></i> {{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Pie de página -->
    <footer>
        © {{ date('Y') }} Sistema de Gestión de Cuentas | Desarrollado por Gabriel 💙
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
