<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Bienvenidos</title>
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
      text-align: center;
      padding: 20px;
      cursor: url('https://cur.cursors-4u.net/symbols/sym-1/sym46.ani'), auto;
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
    /* Título con efecto de neón y glitch */
    h1 {
      font-family: 'Orbitron', sans-serif;
      font-size: 3.5em;
      text-transform: uppercase;
      letter-spacing: 8px;
      color: #00eaff;
      text-shadow: 0 0 10px #00eaff, 0 0 20px #0077ff, 0 0 30px #00eaff;
      margin-bottom: 50px;
      position: relative;
      animation: glowTitle 2s ease-in-out infinite alternate, glitch 3s infinite;
      z-index: 2;
    }
    @keyframes glitch {
      0% { transform: skew(0deg); }
      10% { transform: skew(2deg); }
      20% { transform: skew(-1deg); }
      30% { transform: skew(1deg); }
      40% { transform: skew(-2deg); }
      50% { transform: skew(0deg); }
      100% { transform: skew(0deg); }
    }
    @keyframes glowTitle {
      from { text-shadow: 0 0 10px #00eaff, 0 0 20px #0077ff; }
      to { text-shadow: 0 0 20px #00ffff, 0 0 40px #1a73e8, 0 0 60px #00eaff; }
    }
    /* Botones con estilo Spiderverse y efectos de sonido */
    .button-wrapper {
      position: relative;
      transform-style: preserve-3d;
      transition: transform 0.2s ease;
      margin: 15px;
      display: inline-block;
      z-index: 2;
    }
    .spiderverse-button {
      position: relative;
      padding: 15px 30px;
      font-size: 1.2em;
      font-weight: 900;
      border: none;
      border-radius: 50px;
      cursor: pointer;
      background: #fff;
      color: #000;
      text-transform: uppercase;
      letter-spacing: 2px;
      transform-style: preserve-3d;
      transition: all 0.15s ease;
      font-family: 'Orbitron', sans-serif;
      text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
      z-index: 2;
    }
    .glitch-layers {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }
    .glitch-layer {
      position: absolute;
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #fff;
      border-radius: 50px;
      opacity: 0;
      transition: all 0.15s ease;
      font-family: 'Orbitron', sans-serif;
      font-size: 1.2em;
      font-weight: 900;
      text-transform: uppercase;
      letter-spacing: 2px;
    }
    .layer-1 {
      color: #0ff;
      transform-origin: center;
    }
    .layer-2 {
      color: #f0f;
      transform-origin: center;
    }
    .button-wrapper:hover .layer-1 {
      opacity: 1;
      animation: glitchLayer1 0.4s steps(2) infinite;
    }
    .button-wrapper:hover .layer-2 {
      opacity: 1;
      animation: glitchLayer2 0.4s steps(2) infinite;
    }
    .button-wrapper:hover .spiderverse-button {
      animation: buttonGlitch 0.3s steps(2) infinite;
      box-shadow: 0 0 20px rgba(255, 255, 255, 0.5), 0 0 30px rgba(0, 255, 255, 0.5), 0 0 40px rgba(255, 0, 255, 0.5);
    }
    .noise {
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: repeating-radial-gradient(circle at 50% 50%, transparent 0, rgba(0, 0, 0, 0.1) 1px, transparent 2px);
      pointer-events: none;
      opacity: 0;
      transition: opacity 0.3s;
      animation: noise 0.2s steps(2) infinite;
    }
    .button-wrapper:hover .noise {
      opacity: 1;
    }
    @keyframes buttonGlitch {
      0% { transform: translate(0) scale(1.05); }
      25% { transform: translate(-5px, 3px) scale(1.07) skew(-3deg); }
      50% { transform: translate(5px, -3px) scale(1.05) skew(3deg); }
      75% { transform: translate(-3px, -3px) scale(1.08) skew(-2deg); }
      100% { transform: translate(0) scale(1.05); }
    }
    @keyframes glitchLayer1 {
      0% { transform: translate(-5px, -3px) scale(1.05) skew(-5deg); clip-path: polygon(0 15%, 100% 15%, 100% 45%, 0 45%); }
      25% { transform: translate(5px, 3px) scale(1.08) skew(5deg); clip-path: polygon(0 25%, 100% 25%, 100% 55%, 0 55%); }
      50% { transform: translate(-3px, 3px) scale(0.98) skew(-3deg); clip-path: polygon(0 10%, 100% 10%, 100% 40%, 0 40%); }
      75% { transform: translate(3px, -3px) scale(1.1) skew(3deg); clip-path: polygon(0 35%, 100% 35%, 100% 65%, 0 65%); }
      100% { transform: translate(-5px, -3px) scale(1.05) skew(-5deg); clip-path: polygon(0 15%, 100% 15%, 100% 45%, 0 45%); }
    }
    @keyframes glitchLayer2 {
      0% { transform: translate(5px, 3px) scale(1.05) skew(5deg); clip-path: polygon(0 45%, 100% 45%, 100% 75%, 0 75%); }
      25% { transform: translate(-5px, -3px) scale(1.08) skew(-5deg); clip-path: polygon(0 55%, 100% 55%, 100% 85%, 0 85%); }
      50% { transform: translate(3px, -3px) scale(0.98) skew(3deg); clip-path: polygon(0 40%, 100% 40%, 100% 70%, 0 70%); }
      75% { transform: translate(-3px, 3px) scale(1.1) skew(-3deg); clip-path: polygon(0 65%, 100% 65%, 100% 95%, 0 95%); }
      100% { transform: translate(5px, 3px) scale(1.05) skew(5deg); clip-path: polygon(0 45%, 100% 45%, 100% 75%, 0 75%); }
    }
    @keyframes noise {
      0% { transform: translate(0, 0); }
      10% { transform: translate(-3%, -3%); }
      20% { transform: translate(5%, 3%); }
      30% { transform: translate(-3%, 5%); }
      40% { transform: translate(8%, -3%); }
      50% { transform: translate(-5%, 8%); }
      60% { transform: translate(3%, -5%); }
      70% { transform: translate(-8%, 3%); }
      80% { transform: translate(5%, 5%); }
      90% { transform: translate(-3%, 8%); }
      100% { transform: translate(0, 0); }
    }
    .glitch-slice {
      position: absolute;
      width: 120%;
      height: 3px;
      background: #fff;
      opacity: 0;
      animation: slice 2s linear infinite;
    }
    @keyframes slice {
      0% { top: -10%; opacity: 0; }
      1% { opacity: 0.8; }
      3% { opacity: 0; }
      100% { top: 110%; }
    }
    /* CSS del astronauta y las estrellas */
    @keyframes snow {
      0% { opacity: 0; transform: translateY(0px); }
      20% { opacity: 1; }
      100% { opacity: 1; transform: translateY(650px); }
    }
    @keyframes astronaut {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    .box-of-star1, .box-of-star2, .box-of-star3, .box-of-star4 {
      width: 100%;
      position: absolute;
      z-index: 1;
      left: 0;
      top: 0;
      transform: translateY(0px);
      height: 700px;
    }
    .box-of-star1 { animation: snow 5s linear infinite; }
    .box-of-star2 { animation: snow 5s -1.64s linear infinite; }
    .box-of-star3 { animation: snow 5s -2.30s linear infinite; }
    .box-of-star4 { animation: snow 5s -3.30s linear infinite; }
    .star {
      width: 3px;
      height: 3px;
      border-radius: 50%;
      background-color: #FFF;
      position: absolute;
      z-index: 1;
      opacity: 0.7;
    }
    .star:before {
      content: "";
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background-color: #FFF;
      position: absolute;
      z-index: 1;
      top: 80px;
      left: 70px;
      opacity: .7;
    }
    .star:after {
      content: "";
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background-color: #FFF;
      position: absolute;
      z-index: 1;
      top: 8px;
      left: 170px;
      opacity: .9;
    }
    .star-position1 { top: 30px; left: 20px; }
    .star-position2 { top: 110px; left: 250px; }
    .star-position3 { top: 60px; left: 570px; }
    .star-position4 { top: 120px; left: 900px; }
    .star-position5 { top: 20px; left: 1120px; }
    .star-position6 { top: 90px; left: 1280px; }
    .star-position7 { top: 30px; left: 1480px; }
    .astronaut {
      width: 250px;
      height: 300px;
      position: absolute;
      z-index: 1;
      top: calc(50% - 150px);
      left: calc(50% - 125px);
      animation: astronaut 20s linear infinite;
    }
    .schoolbag {
      width: 100px;
      height: 150px;
      position: absolute;
      z-index: 1;
      top: calc(50% - 75px);
      left: calc(50% - 50px);
      background-color: #94b7ca;
      border-radius: 50px 50px 0 0 / 30px 30px 0 0;
    }
    .head {
      width: 97px;
      height: 80px;
      position: absolute;
      z-index: 3;
      background: -webkit-linear-gradient(left, #e3e8eb 0%, #e3e8eb 50%, #fbfdfa 50%, #fbfdfa 100%);
      border-radius: 50%;
      top: 34px;
      left: calc(50% - 47.5px);
    }
    .head:after {
      content: "";
      width: 60px;
      height: 50px;
      position: absolute;
      top: calc(50% - 25px);
      left: calc(50% - 30px);
      background: -webkit-linear-gradient(top, #15aece 0%, #15aece 50%, #0391bf 50%, #0391bf 100%);
      border-radius: 15px;
    }
    .head:before {
      content: "";
      width: 12px;
      height: 25px;
      position: absolute;
      top: calc(50% - 12.5px);
      left: -4px;
      background-color: #618095;
      border-radius: 5px;
      box-shadow: 92px 0px 0px #618095;
    }
    .body {
      width: 85px;
      height: 100px;
      position: absolute;
      z-index: 2;
      background-color: #fffbff;
      border-radius: 40px / 20px;
      top: 105px;
      left: calc(50% - 41px);
      background: -webkit-linear-gradient(left, #e3e8eb 0%, #e3e8eb 50%, #fbfdfa 50%, #fbfdfa 100%);
    }
    .panel {
      width: 60px;
      height: 40px;
      position: absolute;
      top: 20px;
      left: calc(50% - 30px);
      background-color: #b7cceb;
    }
    .panel:before {
      content: "";
      width: 30px;
      height: 5px;
      position: absolute;
      top: 9px;
      left: 7px;
      background-color: #fbfdfa;
      box-shadow: 0px 9px 0px #fbfdfa, 0px 18px 0px #fbfdfa;
    }
    .panel:after {
      content: "";
      width: 8px;
      height: 8px;
      position: absolute;
      top: 9px;
      right: 7px;
      background-color: #fbfdfa;
      border-radius: 50%;
      box-shadow: 0px 14px 0px 2px #fbfdfa;
    }
    .arm {
      width: 80px;
      height: 30px;
      position: absolute;
      top: 121px;
      z-index: 2;
    }
    .arm-left {
      left: 30px;
      background-color: #e3e8eb;
      border-radius: 0 0 0 39px;
    }
    .arm-right {
      right: 30px;
      background-color: #fbfdfa;
      border-radius: 0 0 39px 0;
    }
    .arm-left:before,
    .arm-right:before {
      content: "";
      width: 30px;
      height: 70px;
      position: absolute;
      top: -40px;
    }
    .arm-left:before {
      border-radius: 50px 50px 0px 120px / 50px 50px 0 110px;
      left: 0;
      background-color: #e3e8eb;
    }
    .arm-right:before {
      border-radius: 50px 50px 120px 0 / 50px 50px 110px 0;
      right: 0;
      background-color: #fbfdfa;
    }
    .arm-left:after,
    .arm-right:after {
      content: "";
      width: 30px;
      height: 10px;
      position: absolute;
      top: -24px;
    }
    .arm-left:after {
      background-color: #6e91a4;
      left: 0;
    }
    .arm-right:after {
      right: 0;
      background-color: #b6d2e0;
    }
    .leg {
      width: 30px;
      height: 40px;
      position: absolute;
      z-index: 2;
      bottom: 70px;
    }
    .leg-left {
      left: 76px;
      background-color: #e3e8eb;
      transform: rotate(20deg);
    }
    .leg-right {
      right: 73px;
      background-color: #fbfdfa;
      transform: rotate(-20deg);
    }
    .leg-left:before,
    .leg-right:before {
      content: "";
      width: 50px;
      height: 25px;
      position: absolute;
      bottom: -26px;
    }
    .leg-left:before {
      left: -20px;
      background-color: #e3e8eb;
      border-radius: 30px 0 0 0;
      border-bottom: 10px solid #6d96ac;
    }
    .leg-right:before {
      right: -20px;
      background-color: #fbfdfa;
      border-radius: 0 30px 0 0;
      border-bottom: 10px solid #b0cfe4;
    }
    /* Barra de vida (opcional) */
    .game-ui {
      position: absolute;
      top: 20px;
      left: 20px;
      z-index: 100;
    }
    .health-bar {
      width: 200px;
      height: 20px;
      background: #333;
      border-radius: 10px;
      overflow: hidden;
    }
    .health-fill {
      height: 100%;
      background: linear-gradient(to right, #ff0000, #ffcc00);
      transition: width 0.3s;
      width: 100%;
    }
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    /* Estilos para la sección de comentarios */
    .comments-section {
      position: relative;
      z-index: 2;
      width: 80%;
      max-width: 800px;
      margin: 50px auto 0;
      padding: 20px;
      background: rgba(0, 10, 30, 0.7);
      border: 1px solid rgba(0, 234, 255, 0.3);
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0, 234, 255, 0.1);
    }

    .comments-title {
      text-align: center;
      margin-bottom: 20px;
      font-family: 'Orbitron', sans-serif;
      font-size: 1.8rem;
      text-transform: uppercase;
      letter-spacing: 2px;
      color: #00eaff;
      text-shadow: 0 0 5px #00eaff;
    }

    .comment-form {
      margin-bottom: 30px;
      padding: 20px;
      background: rgba(0, 5, 20, 0.5);
      border-radius: 10px;
    }

    .comment-form textarea {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid rgba(0, 234, 255, 0.3);
      background: rgba(0, 10, 30, 0.5);
      color: #fff;
      resize: vertical;
      min-height: 100px;
      font-family: 'Poppins', sans-serif;
    }

    .comment-form button {
      background: linear-gradient(90deg, #0077ff, #00eaff);
      border: none;
      color: #fff;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      font-family: 'Orbitron', sans-serif;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-top: 10px;
      transition: all 0.3s ease;
    }

    .comment-form button:hover {
      transform: scale(1.05);
      box-shadow: 0 0 15px rgba(0, 234, 255, 0.5);
    }

    .comment-card {
      background: rgba(0, 15, 30, 0.5);
      border: 1px solid rgba(0, 234, 255, 0.3);
      border-radius: 10px;
      margin-bottom: 20px;
      padding: 20px;
    }

    .comment-header {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
    }

    .comment-author {
      font-family: 'Orbitron', sans-serif;
      color: #00eaff;
      font-size: 1.1rem;
    }

    .comment-date {
      color: #aaa;
      font-size: 0.9rem;
    }

    .comment-content {
      margin: 15px 0;
      line-height: 1.6;
    }

    .reply-card {
      background: rgba(0, 20, 40, 0.5);
      border-left: 3px solid #00eaff;
      border-radius: 8px;
      margin: 10px 0 10px 30px;
      padding: 15px;
    }

    .reply-form {
      margin-top: 15px;
      padding: 15px;
      background: rgba(0, 5, 20, 0.5);
      border-radius: 8px;
      display: none;
    }

    .reply-button {
      background: linear-gradient(90deg, #17a2b8, #00eaff);
      border: none;
      color: #fff;
      padding: 5px 15px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 0.8rem;
      font-family: 'Orbitron', sans-serif;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
  </style>
</head>
<body>
  <!-- Fondo de estrellas y astronauta -->
  <div class="box-of-star1">
    <div class="star star-position1"></div>
    <div class="star star-position2"></div>
    <div class="star star-position3"></div>
    <div class="star star-position4"></div>
    <div class="star star-position5"></div>
    <div class="star star-position6"></div>
    <div class="star star-position7"></div>
  </div>
  <div class="box-of-star2">
    <div class="star star-position1"></div>
    <div class="star star-position2"></div>
    <div class="star star-position3"></div>
    <div class="star star-position4"></div>
    <div class="star star-position5"></div>
    <div class="star star-position6"></div>
    <div class="star star-position7"></div>
  </div>
  <div class="box-of-star3">
    <div class="star star-position1"></div>
    <div class="star star-position2"></div>
    <div class="star star-position3"></div>
    <div class="star star-position4"></div>
    <div class="star star-position5"></div>
    <div class="star star-position6"></div>
    <div class="star star-position7"></div>
  </div>
  <div class="box-of-star4">
    <div class="star star-position1"></div>
    <div class="star star-position2"></div>
    <div class="star star-position3"></div>
    <div class="star star-position4"></div>
    <div class="star star-position5"></div>
    <div class="star star-position6"></div>
    <div class="star star-position7"></div>
  </div>
  <div data-js="astro" class="astronaut">
    <div class="head"></div>
    <div class="arm arm-left"></div>
    <div class="arm arm-right"></div>
    <div class="body">
      <div class="panel"></div>
    </div>
    <div class="leg leg-left"></div>
    <div class="leg leg-right"></div>
    <div class="schoolbag"></div>
  </div>

  <!-- Partículas originales -->
  <div class="particles"></div>

  <!-- Barra de vida (opcional) -->
  <div class="game-ui">
    <div class="health-bar">
      <div class="health-fill"></div>
    </div>
  </div>

  <!-- Contenido principal -->
  <h1>Bienvenido al mejor juego creado en SENATI</h1>

  <!-- Botones con estilo Spiderverse -->
  <div class="button-wrapper">
    <a href="{{ route('usuarios.create') }}" class="spiderverse-button">
      Registrar Jugador
      <div class="glitch-layers">
        <div class="glitch-layer layer-1">Registrar Jugador</div>
        <div class="glitch-layer layer-2">Registrar Jugador</div>
      </div>
      <div class="noise"></div>
      <div class="glitch-slice"></div>
    </a>
  </div>
  <div class="button-wrapper">
    <a href="{{ route('admin.login') }}" class="spiderverse-button">
      Iniciar Sesión Administrador
      <div class="glitch-layers">
        <div class="glitch-layer layer-1">Iniciar Sesión Administrador</div>
        <div class="glitch-layer layer-2">Iniciar Sesión Administrador</div>
      </div>
      <div class="noise"></div>
      <div class="glitch-slice"></div>
    </a>
  </div>

  <!-- Sección de comentarios -->
  <div class="comments-section">
    <h2 class="comments-title">Comentarios</h2>

    <!-- Formulario para nuevo comentario -->
    <div class="comment-form">
      <form action="{{ route('comentarios.store') }}" method="POST">
        @csrf
        <input type="hidden" name="idUsuario" value="1"> <!-- Cambia esto según tu lógica de autenticación -->
        <textarea name="contenido" placeholder="Escribe tu comentario aquí..." required></textarea>
        <button type="submit">Publicar Comentario</button>
      </form>
    </div>

    <!-- Lista de comentarios -->
    @if(isset($comentarios) && $comentarios->count() > 0)
      @foreach($comentarios as $comentario)
        <div class="comment-card">
          <div class="comment-header">
            <div>
              <span class="comment-author">{{ $comentario->usuario->nombre ?? 'Usuario desconocido' }}</span>
              <span class="comment-date">{{ $comentario->fecha->format('d/m/Y H:i') }}</span>
            </div>
          </div>
          <div class="comment-content">
            <p>{{ $comentario->contenido }}</p>
          </div>
          <div class="comment-actions">
            <button class="reply-button" onclick="toggleReplyForm({{ $comentario->id }})">Responder</button>
          </div>

          <!-- Formulario de respuesta (oculto por defecto) -->
          <div class="reply-form" id="reply-form-{{ $comentario->id }}">
            <form action="{{ route('comentarios.guardar-respuesta') }}" method="POST">
              @csrf
              <input type="hidden" name="idComentarioPadre" value="{{ $comentario->id }}">
              <input type="hidden" name="idUsuario" value="1"> <!-- Cambia esto según tu lógica de autenticación -->
              <textarea name="contenido" placeholder="Escribe tu respuesta aquí..." required></textarea>
              <button type="submit">Publicar Respuesta</button>
            </form>
          </div>

          <!-- Respuestas -->
          @if($comentario->respuestas->count() > 0)
            @foreach($comentario->respuestas as $respuesta)
              <div class="reply-card">
                <div class="comment-header">
                  <div>
                    <span class="comment-author">{{ $respuesta->usuario->nombre ?? 'Usuario desconocido' }}</span>
                    <span class="comment-date">{{ $respuesta->fecha->format('d/m/Y H:i') }}</span>
                  </div>
                </div>
                <div class="comment-content">
                  <p>{{ $respuesta->contenido }}</p>
                </div>
              </div>
            @endforeach
          @endif
        </div>
      @endforeach
    @else
      <div class="alert alert-info text-center" style="background: rgba(0, 234, 255, 0.1); color: #00eaff; padding: 15px; border-radius: 8px;">
        <i class="fas fa-info-circle me-2"></i> No hay comentarios aún. Sé el primero en comentar.
      </div>
    @endif
  </div>

  <!-- Script de partículas -->
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

    // Sonido al pasar el mouse por los botones
    function playSound() {
      const audio = new Audio('https://assets.mixkit.co/sfx/preview/mixkit-arcade-game-jump-coin-216.mp3');
      audio.play();
    }

    document.querySelectorAll('.spiderverse-button').forEach(button => {
      button.addEventListener('mouseenter', playSound);
    });

    // Función para mostrar/ocultar el formulario de respuesta
    function toggleReplyForm(commentId) {
      const replyForm = document.getElementById(`reply-form-${commentId}`);
      if (replyForm.style.display === 'block') {
        replyForm.style.display = 'none';
      } else {
        replyForm.style.display = 'block';
      }
    }
  </script>
</body>
</html>
