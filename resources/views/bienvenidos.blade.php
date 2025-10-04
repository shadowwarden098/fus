<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Dragón en Código</title>
  <style>
    body {
      margin: 0;
      height: 100vh;
      background: #000;
      overflow: hidden;
      font-family: Arial, sans-serif;
    }

    h1, h2 {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      white-space: nowrap;
      animation: vibrar 0.3s infinite alternate, cambioColor 3s infinite alternate;
      z-index: 2;
    }

    h1 {
      top: 30%;
      font-size: 2.2rem;
    }

    h2 {
      top: 50%;
      font-size: 1.6rem;
    }

    @keyframes vibrar {
      from { transform: translateX(-50%) translateY(-1px); }
      to { transform: translateX(-50%) translateY(1px); }
    }

    @keyframes cambioColor {
      0%   { color: red;   text-shadow: 0 0 10px red; }
      50%  { color: lime;  text-shadow: 0 0 10px lime; }
      100% { color: cyan;  text-shadow: 0 0 10px cyan; }
    }

    /* DRAGÓN HECHO CON CÓDIGO */
    .dragon {
      position: absolute;
      width: 60px;
      height: 60px;
      z-index: 1;
      transition: top 0.5s ease, left 0.5s ease;
    }

    .head, .body, .tail, .wing {
      position: absolute;
      background: green;
      border-radius: 3px;
    }

    .head {
      width: 20px;
      height: 20px;
      top: 0;
      left: 20px;
      background: darkgreen;
    }

    .body {
      width: 20px;
      height: 30px;
      top: 20px;
      left: 20px;
      background: green;
    }

    .tail {
      width: 10px;
      height: 20px;
      top: 30px;
      left: 5px;
      background: limegreen;
    }

    .wing {
      width: 25px;
      height: 10px;
      top: 10px;
      left: 0px;
      background: lightgreen;
      transform: rotate(-20deg);
      animation: aleteo 0.5s infinite alternate ease-in-out;
    }

    @keyframes aleteo {
      0%   { transform: rotate(-20deg); }
      100% { transform: rotate(-5deg); }
    }
  </style>
</head>
<body>
  <h1 id="titulo1">Hitachi Uchiha / Sakura Haruno / Minato Namikaze</h1>
  <h2 id="titulo2">manuel es gay</h2>

  <!-- Dragón hecho con divs -->
  <div id="dragon" class="dragon">
    <div class="head"></div>
    <div class="body"></div>
    <div class="tail"></div>
    <div class="wing"></div>
  </div>

  <script>
    const dragon = document.getElementById('dragon');
    const titulo1 = document.getElementById('titulo1');
    const titulo2 = document.getElementById('titulo2');

    // Función para mover el dragón al hacer clic
    document.addEventListener('click', (e) => {
      const x = e.clientX;
      const y = e.clientY;
      dragon.style.left = `${x - 30}px`; // Centrar el dragón
      dragon.style.top = `${y - 30}px`;
    });

    // Hacer que los textos se escapen del cursor
    function escapar(el) {
      const maxX = window.innerWidth - el.offsetWidth;
      const maxY = window.innerHeight - el.offsetHeight;
      const randX = Math.random() * maxX;
      const randY = Math.random() * maxY;
      el.style.left = `${randX}px`;
      el.style.top = `${randY}px`;
    }

    [titulo1, titulo2].forEach(el => {
      el.addEventListener('mouseenter', () => escapar(el));
    });
  </script>
</body>
</html>
