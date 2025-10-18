<!DOCTYPE html>

<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SENATI | Registrar Estudiante</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --senati-blue: #003366;
      --accent-blue: #0074cc;
      --senati-dark: #001f3f;
      --senati-gray: #b0bec5;
      --light: #f1f5f9;
    }


* { margin: 0; padding: 0; box-sizing: border-box; font-family: "Poppins", sans-serif; }

body {
  background: linear-gradient(135deg, var(--senati-dark) 0%, var(--senati-blue) 60%, #002244 100%);
  color: var(--light);
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  overflow: hidden;
}

.container {
  background: rgba(255, 255, 255, 0.07);
  border-radius: 25px;
  padding: 40px;
  width: 95%;
  max-width: 700px;
  box-shadow: 0 15px 45px rgba(0, 0, 0, 0.5);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.1);
}

h1 {
  text-align: center;
  font-size: 2rem;
  font-weight: 700;
  color: var(--light);
  text-shadow: 0 0 10px rgba(0, 116, 204, 0.5);
  margin-bottom: 30px;
}

h1 i {
  color: var(--accent-blue);
  margin-right: 10px;
}

form { display: flex; flex-direction: column; gap: 20px; }

label {
  font-weight: 600;
  color: var(--light);
  display: block;
  margin-bottom: 6px;
}

input {
  width: 100%;
  padding: 12px 15px;
  border: none;
  border-radius: 12px;
  background: rgba(255, 255, 255, 0.12);
  color: var(--light);
  font-size: 1rem;
  transition: background 0.3s, transform 0.2s;
}

input:focus {
  background: rgba(255, 255, 255, 0.18);
  outline: none;
  transform: scale(1.02);
  border-left: 4px solid var(--accent-blue);
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
  font-weight: bold;
  font-size: 1rem;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.btn-submit {
  background: linear-gradient(135deg, var(--accent-blue), #3399ff);
  color: white;
  box-shadow: 0 8px 25px rgba(0, 116, 204, 0.4);
}

.btn-submit:hover {
  transform: translateY(-3px);
  box-shadow: 0 12px 35px rgba(0, 116, 204, 0.6);
}

.btn-back {
  background: rgba(255, 255, 255, 0.1);
  color: var(--light);
  border: 1px solid rgba(255, 255, 255, 0.2);
  text-decoration: none;
  text-align: center;
}

.btn-back:hover {
  background: rgba(0, 116, 204, 0.2);
  border-color: var(--accent-blue);
  color: #fff;
  transform: translateY(-3px);
}

  </style>
</head>

<body>
  <div class="container">
    <h1><i class="fas fa-user-graduate"></i> Registrar Nuevo Estudiante</h1>

<form action="{{ route('estudiantes.store') }}" method="POST">
  @csrf

  <div>
    <label for="codigo">Código del Estudiante:</label>
    <input type="text" id="codigo" name="codigo" placeholder="Ejemplo: EST001" required>
  </div>

  <div>
    <label for="nombre">Nombres:</label>
    <input type="text" id="nombre" name="nombre" placeholder="Ingresa los nombres del estudiante" required>
  </div>

  <div>
    <label for="apellido">Primer Apellido:</label>
    <input type="text" id="apellido" name="apellido" placeholder="Ingresa el primer apellido" required>
  </div>

  <div>
    <label for="segundo_apellido">Segundo Apellido:</label>
    <input type="text" id="segundo_apellido" name="segundo_apellido" placeholder="Ingresa el segundo apellido">
  </div>

  <div>
    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="direccion" placeholder="Ejemplo: Jr. Lima 123 - Huánuco">
  </div>

  <div>
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
