<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugadores</title>
    <style>
        :root {
            --primary: #00b4d8;
            --secondary: #0077b6;
            --accent: #ff006e;
            --success: #80ed99;
            --light: #f0f4f8;
            --dark: #1b263b;
            --bg-gradient: linear-gradient(135deg, #001233, #023e8a);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: var(--bg-gradient);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            overflow-x: hidden;
            color: var(--light);
            position: relative;
        }

        /* Fondo animado con blur */
        body::before {
            content: "";
            position: absolute;
            top: -20%;
            left: -20%;
            width: 140%;
            height: 140%;
            background: radial-gradient(circle at 20% 30%, #00b4d844, transparent 70%),
                        radial-gradient(circle at 80% 70%, #ff006e33, transparent 70%);
            filter: blur(120px);
            animation: bgMove 15s infinite alternate ease-in-out;
            z-index: 0;
        }

        @keyframes bgMove {
            from { transform: translateY(0) rotate(0deg); }
            to { transform: translateY(-30px) rotate(2deg); }
        }

        .container {
            max-width: 900px;
            width: 100%;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4);
            overflow: hidden;
            z-index: 2;
            animation: fadeUp 0.9s ease-out;
        }

        header {
            background: rgba(255, 255, 255, 0.1);
            color: var(--light);
            padding: 40px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            position: relative;
            overflow: hidden;
        }

        header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            animation: glow 2s infinite alternate ease-in-out;
        }

        header .header-subtitle {
            font-size: 1.1rem;
            opacity: 0.85;
        }

        @keyframes glow {
            from { text-shadow: 0 0 5px #00b4d8, 0 0 10px #00b4d8; }
            to { text-shadow: 0 0 15px #90e0ef, 0 0 25px #00b4d8; }
        }

        .content {
            padding: 30px 40px;
        }

        .alert {
            background: rgba(128, 237, 153, 0.2);
            color: #d4edda;
            border-left: 5px solid var(--success);
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 500;
            animation: slideIn 0.6s ease;
        }

        .btn-primary {
            display: inline-block;
            padding: 12px 28px;
            border-radius: 50px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-bottom: 30px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, rgba(255,255,255,0.4), transparent);
            transition: 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 15px var(--primary);
        }

        .player-list {
            list-style: none;
        }

        .player-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            padding: 20px 25px;
            margin-bottom: 15px;
            border-left: 4px solid var(--primary);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            animation: fadeUp 0.6s ease forwards;
        }

        .player-card:hover {
            transform: translateY(-5px);
            border-left: 4px solid var(--accent);
            background: rgba(255, 255, 255, 0.15);
        }

        .player-info {
            flex: 1;
        }

        .player-name {
            font-weight: 600;
            font-size: 1.3rem;
            color: var(--success);
        }

        .player-details {
            display: flex;
            gap: 15px;
            color: #cbd5e1;
            font-size: 0.95rem;
            margin-top: 5px;
        }

        .btn-danger {
            background: linear-gradient(135deg, #ff416c, #ff4b2b);
            color: #fff;
            border: none;
            padding: 8px 18px;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            transform: scale(1.1);
            box-shadow: 0 0 15px #ff416c;
        }

        .empty-state {
            text-align: center;
            color: #b0b8c1;
            padding: 40px 0;
        }

        .empty-state-icon {
            font-size: 3rem;
            margin-bottom: 10px;
            opacity: 0.8;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @media (max-width: 768px) {
            .player-card { flex-direction: column; align-items: flex-start; }
            .btn-primary { width: 100%; text-align: center; }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Lista de Jugadores</h1>
            <p class="header-subtitle">Gestiona tu equipo con estilo y energía ⚡</p>
        </header>

        <div class="content">
            {{-- ✅ Mensaje de éxito --}}
            @if (session('success'))
                <div class="alert">{{ session('success') }}</div>
            @endif

            {{-- ➕ Enlace para crear nuevo jugador --}}
            <a href="{{ route('jugadores.create') }}" class="btn-primary">Nuevo jugador</a>

            {{-- 📋 Lista de jugadores --}}
            @if ($jugadores->isEmpty())
                <div class="empty-state">
                    <div class="empty-state-icon">😢</div>
                    <p>No hay jugadores registrados.</p>
                </div>
            @else
                <ul class="player-list">
                    @foreach ($jugadores as $jugador)
                        <li class="player-card">
                            <div class="player-info">
                                <div class="player-name">{{ $jugador->nombre }} {{ $jugador->apellido }}</div>
                                <div class="player-details">
                                    <span>{{ $jugador->rol ?? 'Sin rol' }}</span>
                                    <span>Edad: {{ $jugador->edad }}</span>
                                </div>
                            </div>
                            <div class="player-actions">
                                <form action="{{ route('jugadores.destroy', $jugador->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</body>
</html>
