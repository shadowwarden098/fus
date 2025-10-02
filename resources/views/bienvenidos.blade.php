<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Animaciones Nivel Dios</title>
    <style>
        body {
            background-color: #000;
            color: white;
            font-family: 'Arial', sans-serif;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            position: relative;
        }

        .animado {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            font-size: 2rem;
            color: red;
            text-shadow: 0 0 10px red, 0 0 20px red;
            animation: moverTodo 4s infinite ease-in-out;
            transition: all 0.2s ease;
        }

        .animado2 {
            color: blue;
            text-shadow: 0 0 10px blue, 0 0 20px blue;
            font-size: 1.5rem;
            animation-delay: 1s;
        }

        @keyframes moverTodo {
            0% {
                transform: translate(-50%, -50%) translate(0, 0) scale(1) rotate(0deg);
            }
            25% {
                transform: translate(-50%, -50%) translate(100px, 0) scale(1.2) rotate(10deg);
            }
            50% {
                transform: translate(-50%, -50%) translate(100px, 100px) scale(1) rotate(0deg);
            }
            75% {
                transform: translate(-50%, -50%) translate(0, 100px) scale(0.8) rotate(-10deg);
            }
            100% {
                transform: translate(-50%, -50%) translate(0, 0) scale(1) rotate(0deg);
            }
        }

        .cambia-color {
            animation: cambioColor 2s infinite alternate;
        }

        @keyframes cambioColor {
            0% { color: red; text-shadow: 0 0 10px red; }
            50% { color: lime; text-shadow: 0 0 10px lime; }
            100% { color: cyan; text-shadow: 0 0 10px cyan; }
        }
    </style>
</head>
<body>
    <h1 id="titulo1" class="animado cambia-color">
        Hitachi Uchiha / Sakura Haruno / Minato Namikaze
    </h1>
    <h2 id="titulo2" class="animado animado2 cambia-color">
        manuel es gay 
    </h2>

    <script>
        const titulo1 = document.getElementById('titulo1');
        const titulo2 = document.getElementById('titulo2');

        function escapar(elemento) {
            const maxX = window.innerWidth - elemento.offsetWidth;
            const maxY = window.innerHeight - elemento.offsetHeight;
            const randomX = Math.floor(Math.random() * maxX);
            const randomY = Math.floor(Math.random() * maxY);

            elemento.style.left = `${randomX}px`;
            elemento.style.top = `${randomY}px`;
        }

        [titulo1, titulo2].forEach(el => {
            el.addEventListener('mouseenter', () => escapar(el));
        });
    </script>
</body>
</html>
