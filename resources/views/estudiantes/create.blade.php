<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Nuevo Estudiante</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg: #0f172a;
            --card: rgba(255, 255, 255, 0.08);
            --primary: #6366f1;
            --accent: #a855f7;
            --light: #f1f5f9;
            --gradient: linear-gradient(135deg, #6366f1, #a855f7);
        }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: "Poppins", sans-serif; }
        body {
            background: radial-gradient(circle at top left, #1e1b4b, #0f172a);
            color: var(--light);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden;
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
        }
        form { display: flex; flex-direction: column; gap: 20px; }
        label { font-weight: 600; margin-bottom: 6px; display: block; }
        input {
            width: 100%;
            padding: 12px 15px;
            border: none;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 1rem;
        }
        input:focus { background: rgba(255, 255, 255, 0.15); outline: none; }
        .button-group { display: flex; gap: 15px; margin-top: 25px; }
        .btn {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-weight: bold;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-submit { background: var(--gradient); color: white; }
        .btn-back {
            background: rgba(255,255,255,0.1);
            color: #e2e8f0;
            border: 1px solid rgba(255,255,255,0.15);
            text-decoration: none;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1><i class="fas fa-user-graduate"></i> Registrar Nuevo Estudiante</h1>

        <form action="{{ route('estudiantes.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombres:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingresa los nombre del estudiante" required>
            </div>

            <div class="form-group">
                <label for="apellido">Apellidos:</label>
                <input type="text" id="apellido" name="apellido" placeholder="Ingresa los apellido del estudiante" required>
            </div>

            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" id="dni" name="dni" placeholder="Ingresa el DNI del estudiante" required maxlength="8">
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-save"></i> Guardar
                </button>
                <a href="{{ route('estudiantes.index') }}" class="btn btn-back">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </form>
    </div>
</body>
</html>
