<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Nuevo Jugador</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --bg: #0f172a;
            --card: rgba(255, 255, 255, 0.08);
            --primary: #6366f1;
            --accent: #a855f7;
            --light: #f1f5f9;
            --error: #ef4444;
            --gradient: linear-gradient(135deg, #6366f1, #a855f7);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: radial-gradient(circle at top left, #1e1b4b, #0f172a);
            color: var(--light);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden;
        }

        /* Fondo animado en gradiente con blur */
        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 20% 20%, #6366f133, transparent 60%),
                        radial-gradient(circle at 80% 80%, #a855f733, transparent 60%);
            filter: blur(80px);
            animation: backgroundPulse 10s infinite alternate ease-in-out;
            z-index: -1;
        }

        @keyframes backgroundPulse {
            from { transform: scale(1); opacity: 0.7; }
            to { transform: scale(1.2); opacity: 1; }
        }

        .container {
            display: flex;
            flex-direction: column;
            width: 95%;
            max-width: 700px;
            background: var(--card);
            border-radius: 25px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(20px);
            padding: 40px;
            animation: fadeInUp 1s ease;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 {
            text-align: center;
            background: var(--gradient);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            font-size: 2rem;
            margin-bottom: 25px;
            letter-spacing: 1px;
            animation: glowText 3s infinite alternate;
        }

        @keyframes glowText {
            from { text-shadow: 0 0 8px #6366f1; }
            to { text-shadow: 0 0 18px #a855f7; }
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--light);
            opacity: 0.9;
        }

        input {
            width: 100%;
            padding: 14px 45px 14px 18px;
            border: none;
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 1rem;
            outline: none;
            transition: all 0.3s ease;
        }

        input::placeholder {
            color: #9ca3af;
        }

        input:focus {
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 10px #6366f1aa;
            transform: scale(1.02);
        }

        .input-icon {
            position: absolute;
            right: 18px;
            top: 43px;
            color: #94a3b8;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        input:focus + .input-icon {
            color: var(--accent);
        }

        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }

        .btn {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-weight: bold;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn i {
            font-size: 1.2rem;
        }

        .btn-submit {
            background: var(--gradient);
            color: white;
            box-shadow: 0 0 15px rgba(99,102,241,0.4);
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 25px rgba(168,85,247,0.7);
        }

        .btn-back {
            background: rgba(255,255,255,0.1);
            color: #e2e8f0;
            border: 1px solid rgba(255,255,255,0.15);
        }

        .btn-back:hover {
            background: rgba(255,255,255,0.2);
            color: var(--primary);
            transform: translateY(-3px);
        }

        /* Partículas sutiles */
        .particles {
            position: fixed;
            inset: 0;
            overflow: hidden;
            z-index: -1;
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.08);
            animation: float 18s infinite linear;
        }

        @keyframes float {
            0% { transform: translateY(0) rotate(0); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100vh) rotate(360deg); opacity: 0; }
        }

        @media (max-width: 600px) {
            .container { padding: 30px; }
            h1 { font-size: 1.6rem; }
        }
    </style>
</head>

<body>
    <div class="particles" id="particles"></div>

    <div class="container">
        <h1><i class="fas fa-futbol"></i> Registrar Nuevo Jugador</h1>

        <form action="{{ route('jugadores.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
                <div class="input-icon"><i class="fas fa-user"></i></div>
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" placeholder="Ingresa tu apellido" required>
                <div class="input-icon"><i class="fas fa-user-tag"></i></div>
            </div>

            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" id="edad" name="edad" placeholder="Ingresa tu edad" min="1" max="99" required>
                <div class="input-icon"><i class="fas fa-birthday-cake"></i></div>
            </div>

            <div class="form-group">
                <label for="rol">Rol:</label>
                <input type="text" id="rol" name="rol" placeholder="Ej: Delantero, Portero, etc.">
                <div class="input-icon"><i class="fas fa-star"></i></div>
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-save"></i> Guardar
                </button>
                <a href="{{ route('jugadores.index') }}" class="btn btn-back">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </form>
    </div>

    <script>
        // partículas decorativas flotantes
        document.addEventListener('DOMContentLoaded', () => {
            const particlesContainer = document.getElementById('particles');
            for (let i = 0; i < 25; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                const size = Math.random() * 20 + 5;
                const posX = Math.random() * 100;
                const delay = Math.random() * 15;
                const duration = Math.random() * 20 + 10;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${posX}%`;
                particle.style.animationDelay = `${delay}s`;
                particle.style.animationDuration = `${duration}s`;
                particlesContainer.appendChild(particle);
            }
        });


    </script>
</body>
</html>
