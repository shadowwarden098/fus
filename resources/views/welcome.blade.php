<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Bienvenidos</title>

  <!-- Fuente moderna y elegante -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      background: linear-gradient(135deg, #dfe9f3 0%, #ffffff 100%);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      font-family: 'Poppins', sans-serif;
      animation: fadeIn 1s ease-out;
    }

    h1 {
      color: #333;
      font-size: 2.5em;
      margin-bottom: 30px;
    }

    a {
      display: inline-block;
      margin: 15px 0;
      text-decoration: none;
      color: #1a73e8;
      font-size: 1.5em;
      font-weight: 600;
      padding: 10px 20px;
      border-radius: 8px;
      transition: all 0.3s ease;
      background-color: white;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      animation: slideUp 0.6s ease forwards;
      opacity: 0;
    }

    a:nth-child(2) { animation-delay: 0.2s; }
    a:nth-child(3) { animation-delay: 0.4s; }
    a:nth-child(4) { animation-delay: 0.6s; }

    a:hover {
      color: #0d47a1;
      transform: scale(1.05);
      box-shadow: 0 6px 14px rgba(0, 0, 0, 0.2);
      animation: pulse 0.4s ease-in-out;
    }

    /* Animación de entrada */
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    @keyframes slideUp {
      from {
        transform: translateY(20px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.1); }
      100% { transform: scale(1); }
    }
  </style>
</head>
<body>
  <h1>Bienvenido al Sitio</h1>
  <a href="{{ route('senin') }}">senin</a>
  <a href="{{ route('clan') }}">clan</a>
  <a href="{{ route('bienvenidos') }}">bienvenidos</a>
  <a href="{{ route('estudiantes.index') }}">estudiantes</a>
</body>
</html>
