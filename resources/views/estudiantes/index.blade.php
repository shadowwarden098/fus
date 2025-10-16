<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hacker System | Estudiantes</title>

    <!-- Fuente futurista -->
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">

    <style>
        :root {
            --green: #00ff9f;
            --blue: #00e0ff;
            --pink: #ff00c8;
            --black: #000814;
            --glow-green: 0 0 10px #00ff9f, 0 0 20px #00ff9f, 0 0 40px #00ff9f;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Share Tech Mono', monospace;
            letter-spacing: 1px;
        }

        body {
            background: radial-gradient(circle at 30% 30%, #001220, #000814 90%);
            color: var(--green);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        /* Fondo Matrix animado */
        canvas#matrix {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            background: transparent;
        }

        /* Contenedor principal */
        .container {
            position: relative;
            z-index: 2;
            width: 90%;
            max-width: 900px;
            background: rgba(0, 15, 30, 0.7);
            border: 1px solid rgba(0, 255, 128, 0.3);
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(0, 255, 128, 0.4);
            backdrop-filter: blur(12px);
            animation: appear 1s ease-in-out;
        }

        @keyframes appear {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        /* Encabezado */
        header {
            padding: 25px;
            text-align: center;
            border-bottom: 1px solid rgba(0, 255, 128, 0.3);
        }

        header h1 {
            font-size: 2.5rem;
            color: var(--green);
            text-shadow: var(--glow-green);
            animation: glitch 3s infinite linear alternate-reverse;
        }

        @keyframes glitch {
            0% { text-shadow: 2px 0 var(--blue), -2px 0 var(--pink); }
            20% { text-shadow: -2px 0 var(--blue), 2px 0 var(--pink); }
            40% { text-shadow: 3px 0 var(--blue), -3px 0 var(--pink); }
            60% { text-shadow: -3px 0 var(--blue), 3px 0 var(--pink); }
            80% { text-shadow: 2px 0 var(--pink), -2px 0 var(--blue); }
            100% { text-shadow: -2px 0 var(--pink), 2px 0 var(--blue); }
        }

        header .header-subtitle {
            font-size: 1rem;
            color: var(--blue);
            margin-top: 10px;
            text-shadow: 0 0 10px var(--blue);
            animation: fadein 3s infinite alternate;
        }

        @keyframes fadein {
            from { opacity: 0.7; }
            to { opacity: 1; }
        }

        /* Contenido */
        .content {
            padding: 30px 40px;
            position: relative;
        }

        .alert {
            background: rgba(0, 255, 128, 0.1);
            border-left: 4px solid var(--green);
            padding: 10px 20px;
            border-radius: 10px;
            color: var(--green);
            margin-bottom: 20px;
            animation: glow 1.5s infinite alternate;
        }

        @keyframes glow {
            from { box-shadow: 0 0 5px var(--green); }
            to { box-shadow: 0 0 20px var(--green); }
        }

        /* Botón neon */
        .btn-primary {
            display: inline-block;
            padding: 12px 25px;
            border-radius: 8px;
            background: linear-gradient(90deg, var(--green), var(--blue));
            color: #000;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 25px;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: all 0.3s ease;
            box-shadow: 0 0 15px var(--green);
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, var(--blue), var(--pink));
            box-shadow: 0 0 25px var(--blue);
            transform: scale(1.08);
            color: #fff;
        }

        /* Tarjeta de estudiante */
        .student-card {
            background: rgba(0, 255, 128, 0.07);
            border: 1px solid rgba(0, 255, 128, 0.2);
            border-radius: 12px;
            padding: 20px 25px;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: 0.3s;
            position: relative;
            overflow: hidden;
        }

        .student-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, transparent, rgba(0, 255, 128, 0.2), transparent);
            transition: 0.8s;
        }

        .student-card:hover::before {
            left: 100%;
        }

        .student-card:hover {
            transform: scale(1.03);
            box-shadow: 0 0 20px rgba(0, 255, 128, 0.3);
        }

        .student-name {
            font-size: 1.3rem;
            color: var(--green);
            text-shadow: 0 0 10px var(--green);
        }

        .student-details {
            color: var(--blue);
            font-size: 0.9rem;
            margin-top: 5px;
        }

        .btn-danger {
            background: linear-gradient(90deg, #ff004c, #ff00c8);
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            font-weight: bold;
        }

        .btn-danger:hover {
            box-shadow: 0 0 20px var(--pink);
            transform: scale(1.1);
        }

        /* Estado vacío */
        .empty-state {
            text-align: center;
            color: #ccc;
            padding: 40px 0;
            font-size: 1.1rem;
        }

        .empty-state-icon {
            font-size: 3rem;
            margin-bottom: 10px;
            color: var(--blue);
            text-shadow: 0 0 10px var(--blue);
        }
    </style>
</head>

<body>
    <!-- Fondo matrix -->
    <canvas id="matrix"></canvas>

    <div class="container">
        <header>
            <h1>HACKER SYSTEM v4.0</h1>
            <p class="header-subtitle">[ Gestión avanzada de estudiantes en red ⚡ ]</p>
        </header>

        <div class="content">
            @if (session('success'))
                <div class="alert">{{ session('success') }}</div>
            @endif

            <a href="{{ route('estudiantes.create') }}" class="btn-primary">+ Nuevo Registro</a>

            @if ($estudiantes->isEmpty())
                <div class="empty-state">
                    <div class="empty-state-icon">🛰️</div>
                    <p>No hay estudiantes registrados en la base de datos.</p>
                </div>
            @else
                <ul class="student-list">
                    @foreach ($estudiantes as $estudiante)
                        <li class="student-card">
                            <div class="student-info">
                                <div class="student-name">{{ $estudiante->nombre }} {{ $estudiante->apellido }}</div>
                                <div class="student-details">DNI: {{ $estudiante->dni }}</div>
                            </div>
                            <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST" onsubmit="return confirm('¿Eliminar registro permanentemente?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger">Eliminar</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <script>
        // 🎥 Fondo Matrix dinámico
        const canvas = document.getElementById("matrix");
        const ctx = canvas.getContext("2d");

        canvas.height = window.innerHeight;
        canvas.width = window.innerWidth;

        const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%^&*()*&^%";
        const fontSize = 14;
        const columns = canvas.width / fontSize;
        const drops = [];

        for (let x = 0; x < columns; x++) drops[x] = 1;

        function draw() {
            ctx.fillStyle = "rgba(0, 0, 0, 0.05)";
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            ctx.fillStyle = "#00ff9f";
            ctx.font = fontSize + "px monospace";

            for (let i = 0; i < drops.length; i++) {
                const text = letters.charAt(Math.floor(Math.random() * letters.length));
                ctx.fillText(text, i * fontSize, drops[i] * fontSize);
                if (drops[i] * fontSize > canvas.height && Math.random() > 0.975) drops[i] = 0;
                drops[i]++;
            }
        }

        setInterval(draw, 35);
    </script>
</body>
</html>
