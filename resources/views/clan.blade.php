<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Animaciones Épicas</title>
  <style>
    body {
      margin: 0;
      height: 100vh;
      background: radial-gradient(circle at center, #000, #02040a 80%);
      overflow: hidden;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    /* Fondo dinámico con galaxias, destellos y estrellas fugaces */
    body::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 300%;
      height: 300%;
      background: radial-gradient(circle, #02040a, #000), url('https://www.transparenttextures.com/patterns/galaxy.png');
      background-size: cover;
      animation: galaxiaMovimiento 50s linear infinite, destellos 5s infinite alternate;
      z-index: 0;
    }

    @keyframes galaxiaMovimiento {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    @keyframes destellos {
      0% { opacity: 0.8; }
      100% { opacity: 1; }
    }

    /* Título principal */
    h1 {
      font-size: 5rem;
      text-transform: uppercase;
      color: white;
      text-shadow: 0 0 20px #fff, 0 0 30px #ff0080, 0 0 40px #ff0080;
      animation: cambioColor 3s infinite, pulso 2s infinite;
      cursor: pointer;
      z-index: 2;
    }

    h1:hover {
      animation: supernova 1s forwards;
    }

    @keyframes cambioColor {
      0% { color: #ff0080; text-shadow: 0 0 20px #ff0080, 0 0 40px #ff0080; }
      50% { color: #00ffcc; text-shadow: 0 0 30px #00ffcc, 0 0 60px #00ffcc; }
      100% { color: #ff0080; text-shadow: 0 0 20px #ff0080, 0 0 40px #ff0080; }
    }

    @keyframes pulso {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.1); }
    }

    @keyframes supernova {
      0% { transform: scale(1); opacity: 1; }
      100% { transform: scale(3); opacity: 0; }
    }

    /* Subtítulo */
    h2 {
      font-size: 3rem;
      color: white;
      text-shadow: 0 0 10px #fff, 0 0 20px #ff0000, 0 0 30px #ff0000;
      animation: chispaElectrica 2s infinite alternate;
      z-index: 2;
    }

    h2:hover {
      animation: explosionElectrica 0.5s infinite;
    }

    @keyframes chispaElectrica {
      0% { text-shadow: 0 0 10px #ff0000, 0 0 20px #ff0000; }
      50% { text-shadow: 0 0 30px #00ff00, 0 0 60px #00ff00; }
      100% { text-shadow: 0 0 10px #ff0000, 0 0 20px #ff0000; }
    }

    @keyframes explosionElectrica {
      0% { text-shadow: 0 0 50px #ffff00, 0 0 100px #ffff00; }
      100% { text-shadow: 0 0 10px #ff0000, 0 0 20px #ff0000; }
    }

    /* Partículas flotantes */
    .particles {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      pointer-events: none;
    }

    .particle {
      position: absolute;
      width: 8px;
      height: 8px;
      background: rgba(255, 255, 255, 0.8);
      border-radius: 50%;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
      animation: movimientoAleatorio 5s infinite ease-in-out, parpadeo 2s infinite ease-in-out;
    }

    @keyframes movimientoAleatorio {
      0% { transform: translate(0, 0); }
      25% { transform: translate(50px, -50px); }
      50% { transform: translate(-50px, 50px); }
      75% { transform: translate(50px, 50px); }
      100% { transform: translate(-50px, -50px); }
    }

    @keyframes parpadeo {
      0%, 100% { opacity: 0.5; }
      50% { opacity: 1; }
    }

    /* Rastro de texto */
    .trail {
      position: absolute;
      font-size: 1.5rem;
      color: white;
      text-shadow: 0 0 10px #fff, 0 0 20px #ff0080;
      animation: desvanecer 1s ease-out forwards;
      pointer-events: none;
    }

    @keyframes desvanecer {
      0% { opacity: 1; }
      100% { opacity: 0; }
    }

    /* Ondas expansivas */
    .wave {
      position: absolute;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0));
      animation: ondaExpandir 1.5s ease-out forwards;
      pointer-events: none;
    }

    @keyframes ondaExpandir {
      0% { transform: scale(0.5); opacity: 1; }
      100% { transform: scale(10); opacity: 0; }
    }
  </style>
</head>
<body>
  <h1 id="titulo1">Senin / Gojo / Riomenn</h1>
  <h2 id="titulo2">Gojo fue hecho puré</h2>

  <div class="particles" id="particles"></div>

  <script>
    // Generar partículas flotantes
    const particlesContainer = document.getElementById('particles');
    const numParticles = 200;

    for (let i = 0; i < numParticles; i++) {
      const particle = document.createElement('div');
      particle.classList.add('particle');
      particle.style.left = Math.random() * 100 + 'vw';
      particle.style.top = Math.random() * 100 + 'vh';
      particle.style.animationDuration = Math.random() * 10 + 5 + 's';
      particle.style.animationDelay = Math.random() * 5 + 's';
      particle.style.width = Math.random() * 8 + 4 + 'px';
      particle.style.height = particle.style.width;
      particle.style.background = `rgba(${Math.random() * 255}, ${Math.random() * 255}, ${Math.random() * 255}, 0.8)`;
      particlesContainer.appendChild(particle);
    }

    // Rastro de texto que sigue al cursor
    window.addEventListener('mousemove', (e) => {
      const trail = document.createElement('div');
      trail.classList.add('trail');
      trail.style.left = e.clientX + 'px';
      trail.style.top = e.clientY + 'px';
      trail.textContent = '✨';
      document.body.appendChild(trail);
      setTimeout(() => trail.remove(), 1000);
    });

    // Explosión de partículas y ondas expansivas al hacer clic
    window.addEventListener('click', (e) => {
      const wave = document.createElement('div');
      wave.classList.add('wave');
      wave.style.left = e.clientX + 'px';
      wave.style.top = e.clientY + 'px';
      document.body.appendChild(wave);
      setTimeout(() => wave.remove(), 1500);

      for (let i = 0; i < 40; i++) {
        const explosion = document.createElement('div');
        explosion.classList.add('explosion');
        explosion.style.left = e.clientX + 'px';
        explosion.style.top = e.clientY + 'px';
        explosion.style.transform = `translate(${Math.random() * 100 - 50}px, ${Math.random() * 100 - 50}px)`;
        explosion.style.background = `rgba(${Math.random() * 255}, ${Math.random() * 255}, ${Math.random() * 255}, 0.8)`;
        document.body.appendChild(explosion);
        setTimeout(() => explosion.remove(), 1000);
      }
    });
  </script>
</body>
</html>
