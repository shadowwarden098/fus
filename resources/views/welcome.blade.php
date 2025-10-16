<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Bienvenidos a </title>

  <!-- Fuentes modernas -->
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
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      overflow: hidden;
      position: relative;
      animation: fadeIn 1.5s ease-in-out;
    }

    /* Fondo animado con partículas */
    .particles {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: 0;
    }

    .particle {
      position: absolute;
      width: 6px;
      height: 6px;
      background: rgba(0, 255, 255, 0.7);
      border-radius: 50%;
      animation: float 10s infinite ease-in-out;
    }

    @keyframes float {
      0% {
        transform: translateY(0) translateX(0);
        opacity: 1;
      }
      50% {
        transform: translateY(-200px) translateX(100px);
        opacity: 0.4;
      }
      100% {
        transform: translateY(0) translateX(0);
        opacity: 1;
      }
    }

    h1 {
      font-family: 'Orbitron', sans-serif;
      font-size: 3.5em;
      text-transform: uppercase;
      letter-spacing: 5px;
      text-align: center;
      color: #00eaff;
      text-shadow: 0 0 15px #00eaff, 0 0 30px #0077ff;
      margin-bottom: 50px;
      z-index: 2;
      animation: glowTitle 2s ease-in-out infinite alternate;
    }

    @keyframes glowTitle {
      from { text-shadow: 0 0 15px #00eaff, 0 0 30px #0077ff; }
      to { text-shadow: 0 0 30px #00ffff, 0 0 60px #1a73e8; }
    }

    a {
      position: relative;
      display: inline-block;
      margin: 12px;
      padding: 15px 40px;
      font-size: 1.3em;
      font-weight: 600;
      color: #fff;
      text-decoration: none;
      text-transform: uppercase;
      border: 2px solid transparent;
      border-image: linear-gradient(90deg, #00eaff, #0077ff);
      border-image-slice: 1;
      border-radius: 12px;
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(5px);
      box-shadow: 0 0 10px #00eaff33;
      overflow: hidden;
      z-index: 2;
      transition: all 0.4s ease;
      animation: slideUp 1s ease forwards;
    }

    a:nth-child(2) { animation-delay: 0.2s; }
    a:nth-child(3) { animation-delay: 0.4s; }
    a:nth-child(4) { animation-delay: 0.6s; }
    a:nth-child(5) { animation-delay: 0.8s; }
    a:nth-child(6) { animation-delay: 1s; }

    a::before {
      content: "";
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(120deg, transparent, rgba(0,255,255,0.3), transparent);
      transition: all 0.6s ease;
    }

    a:hover::before {
      left: 100%;
    }

    a:hover {
      color: #00eaff;
      transform: scale(1.1);
      box-shadow: 0 0 20px #00eaff, 0 0 40px #0077ff;
    }

    @keyframes slideUp {
      from { transform: translateY(50px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

  </style>
</head>
<body>
  <div class="particles">
    <!-- Partículas aleatorias -->
    <script>
      document.addEventListener("DOMContentLoaded", () => {
        const particlesContainer = document.querySelector(".particles");
        for (let i = 0; i < 40; i++) {
          const p = document.createElement("div");
          p.classList.add("particle");
          p.style.left = Math.random() * 100 + "vw";
          p.style.top = Math.random() * 100 + "vh";
          p.style.animationDuration = 5 + Math.random() * 10 + "s";
          particlesContainer.appendChild(p);
        }
      });
    </script>
  </div>

  <h1>Bienvenido al</h1>

  <a href="{{ route('senin') }}">Senin</a>
  <a href="{{ route('clan') }}">Clan</a>
  <a href="{{ route('bienvenidos') }}">Bienvenidos</a>
  <a href="{{ route('estudiantes.index') }}">Estudiantes</a>
  <a href="{{ route('dioses.index') }}">Dioses</a>
  <a href="{{ route('jugadores.index') }}">Jugadores</a>
</body>
</html>
