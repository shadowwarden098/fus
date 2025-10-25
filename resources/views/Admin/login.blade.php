<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrador</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: radial-gradient(circle at center, #00111f 0%, #000814 100%);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            position: relative;
        }

        /* Partículas de fondo */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background: rgba(0, 255, 255, 0.8);
            animation: float 15s infinite linear;
        }

        @keyframes float {
            0% { transform: translateY(0) translateX(0); opacity: 1; }
            50% { transform: translateY(200px) translateX(100px); opacity: 0.5; }
            100% { transform: translateY(0) translateX(200px); opacity: 1; }
        }

        /* Caja de login */
        .login-box {
            background: rgba(0, 20, 40, 0.7);
            padding: 40px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 0 30px rgba(0, 234, 255, 0.3);
            max-width: 400px;
            width: 100%;
            border: 1px solid rgba(0, 234, 255, 0.5);
            position: relative;
            z-index: 2;
        }

        h2 {
            text-align: center;
            color: #00eaff;
            margin-bottom: 30px;
            font-family: 'Orbitron', sans-serif;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 2em;
            text-shadow: 0 0 10px rgba(0, 234, 255, 0.7);
        }

        /* Inputs y botones */
        input {
            display: block;
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid rgba(0, 234, 255, 0.5);
            box-sizing: border-box;
            background: rgba(0, 10, 30, 0.5);
            color: #fff;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #00eaff;
            box-shadow: 0 0 15px rgba(0, 234, 255, 0.7);
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.6);
            font-family: 'Poppins', sans-serif;
        }

        button {
            padding: 15px 20px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(90deg, #0077ff, #00eaff);
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            font-family: 'Orbitron', sans-serif;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1em;
            box-shadow: 0 0 10px rgba(0, 234, 255, 0.5);
        }

        button:hover {
            background: linear-gradient(90deg, #00eaff, #0077ff);
            transform: scale(1.02);
            box-shadow: 0 0 20px rgba(0, 234, 255, 0.8);
        }

        /* Caja de error */
        .error-box {
            background: rgba(255, 0, 0, 0.1);
            border: 2px solid #ff0000;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 25px;
            animation: shake 0.5s;
        }

        .error-title {
            color: #ff4444;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-family: 'Orbitron', sans-serif;
        }

        .error-message {
            color: #ffaaaa;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 10px;
            font-family: 'Poppins', sans-serif;
        }

        .warning-icon {
            font-size: 24px;
            animation: pulse 1s infinite;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        /* Efecto de neón en el título */
        @keyframes neonPulse {
            0% { text-shadow: 0 0 5px rgba(0, 234, 255, 0.5); }
            50% { text-shadow: 0 0 20px rgba(0, 234, 255, 0.9); }
            100% { text-shadow: 0 0 5px rgba(0, 234, 255, 0.5); }
        }

        h2 {
            animation: neonPulse 2s infinite;
        }
    </style>
</head>
<body>
    <!-- Partículas de fondo -->
    <div class="particles" id="particles"></div>

    <div class="login-box">
        <h2>🔒 Panel de Administrador</h2>

        @if($errors->any() || session('error'))
            <div class="error-box">
                <div class="error-title">
                    <span class="warning-icon">⚠️</span>
                    ¡ACCESO DENEGADO!
                </div>
                <div class="error-message">
                    <strong>¿Qué crees que estás haciendo?</strong><br><br>
                    Este panel es exclusivo para administradores autorizados.<br>
                    Las credenciales que ingresaste son incorrectas o no tienes los permisos necesarios.<br><br>

                    <strong>Advertencia:</strong> Los intentos de acceso no autorizados están siendo registrados.<br>
                    Si no eres un administrador, por favor retírate inmediatamente.<br><br>

                    <em style="color: #00eaff;">👮 Este incidente ha sido documentado.</em>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.post') }}">
            @csrf
            <input type="email"
                   name="email"
                   placeholder="📧 Correo de Administrador"
                   value="{{ old('email') }}"
                   required>

            <input type="password"
                   name="password"
                   placeholder="🔑 Contraseña Secreta"
                   required>

            <button type="submit">🚀 Iniciar Sesión</button>
        </form>
    </div>

    <!-- Script para generar partículas -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const particlesContainer = document.getElementById('particles');
            for (let i = 0; i < 50; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                particle.style.left = Math.random() * 100 + 'vw';
                particle.style.top = Math.random() * 100 + 'vh';
                particle.style.animationDuration = 10 + Math.random() * 20 + 's';
                particle.style.animationDelay = Math.random() * 5 + 's';
                particlesContainer.appendChild(particle);
            }
        });
    </script>
</body>
</html>
