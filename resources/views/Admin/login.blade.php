<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrador</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #00111f;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background: rgba(0, 255, 255, 0.1);
            padding: 40px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 0 20px #00eaff33;
        }
        input {
            display: block;
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: none;
        }
        button {
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            background: #00eaff;
            color: #000;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background: #0077ff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Administrador</h2>
        <form method="POST" action="{{ route('admin.login.post') }}">

            @csrf
            <input type="email" name="email" placeholder="Correo" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
