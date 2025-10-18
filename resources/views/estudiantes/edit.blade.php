<!DOCTYPE html>

<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SENATI | Editar Estudiante</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --senati-blue: #003366;
      --senati-lightblue: #0074cc;
      --senati-dark: #001f3f;
      --senati-gray: #d0d7e2;
      --text-dark: #0f172a;
    }


* { margin: 0; padding: 0; box-sizing: border-box; }

body {
  background: linear-gradient(135deg, #001f3f 0%, #003366 50%, #004b91 100%);
  font-family: 'Roboto', sans-serif;
  color: var(--senati-gray);
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 40px 20px;
  position: relative;
}

.edit-container {
  background: rgba(255, 255, 255, 0.97);
  border-radius: 25px;
  padding: 40px 50px;
  max-width: 650px;
  width: 100%;
  box-shadow: 0 15px 50px rgba(0, 0, 0, 0.4);
  border-left: 6px solid var(--senati-lightblue);
  position: relative;
  overflow: hidden;
  animation: fadeIn 0.6s ease;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-40px); }
  to { opacity: 1; transform: translateY(0); }
}

.edit-container::before {
  content: "";
  position: absolute;
  top: -25%;
  right: -20%;
  width: 300px;
  height: 300px;
  background: radial-gradient(circle, rgba(0,116,204,0.15), transparent 70%);
  border-radius: 50%;
}

h1 {
  font-family: 'Montserrat', sans-serif;
  font-size: 2.2rem;
  color: var(--senati-blue);
  text-align: center;
  margin-bottom: 25px;
  font-weight: 800;
  position: relative;
  z-index: 2;
  letter-spacing: 1px;
}

p {
  text-align: center;
  color: #6b7280;
  margin-bottom: 35px;
  font-size: 1rem;
}

form {
  display: flex;
  flex-direction: column;
  gap: 18px;
  position: relative;
  z-index: 2;
}

label {
  color: var(--senati-blue);
  font-weight: 600;
  font-size: 0.95rem;
  margin-bottom: 5px;
}

input {
  padding: 12px 15px;
  border-radius: 10px;
  border: 2px solid var(--senati-blue);
  font-size: 1rem;
  color: var(--text-dark);
  outline: none;
  transition: all 0.3s;
  width: 100%;
  background-color: #f8fafc;
}

input:focus {
  border-color: var(--senati-lightblue);
  box-shadow: 0 0 10px rgba(0,116,204,0.3);
  background-color: #ffffff;
}

.form-actions {
  display: flex;
  justify-content: space-between;
  margin-top: 25px;
}

.btn {
  flex: 1;
  padding: 14px;
  font-weight: 700;
  text-transform: uppercase;
  border: none;
  border-radius: 12px;
  cursor: pointer;
  font-size: 1rem;
  transition: all 0.3s ease;
}

.btn-save {
  background: linear-gradient(135deg, var(--senati-lightblue), #3399ff);
  color: #fff;
  margin-right: 10px;
  box-shadow: 0 8px 25px rgba(0, 116, 204, 0.3);
}

.btn-save:hover {
  transform: translateY(-3px);
  box-shadow: 0 12px 35px rgba(0, 116, 204, 0.5);
}

.btn-cancel {
  background: #e5e7eb;
  color: var(--senati-blue);
}

.btn-cancel:hover {
  background: var(--senati-blue);
  color: #fff;
  transform: translateY(-3px);
}

.footer {
  width: 100%;
  position: absolute;
  bottom: 10px;
  left: 0;
  text-align: center;
  color: rgba(255,255,255,0.8);
  font-size: 0.95rem;
  letter-spacing: 0.5px;
}


  </style>
</head>
<body>
  <div class="edit-container">
    <h1>✏️ Editar Estudiante</h1>
    <p>Actualiza los datos personales del estudiante.</p>


<form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST">
  @csrf
  @method('PUT')

  <div>
    <label for="codigo">Código del Estudiante:</label>
    <input type="text" id="codigo" name="codigo" value="{{ old('codigo', $estudiante->codigo) }}" required>
  </div>

  <div>
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $estudiante->nombre) }}" required>
  </div>

  <div>
    <label for="apellido">Primer Apellido:</label>
    <input type="text" id="apellido" name="apellido" value="{{ old('apellido', $estudiante->apellido) }}" required>
  </div>

  <div>
    <label for="segundo_apellido">Segundo Apellido:</label>
    <input type="text" id="segundo_apellido" name="segundo_apellido" value="{{ old('segundo_apellido', $estudiante->segundo_apellido) }}" required>
  </div>

  <div>
    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="direccion" value="{{ old('direccion', $estudiante->direccion) }}" required>
  </div>

  <div>
    <label for="dni">DNI:</label>
    <input type="text" id="dni" name="dni" value="{{ old('dni', $estudiante->dni) }}" maxlength="8" required>
  </div>

  <div class="form-actions">
    <button type="submit" class="btn btn-save">💾 Guardar Cambios</button>
    <a href="{{ route('estudiantes.index') }}" class="btn btn-cancel">⬅️ Volver</a>
  </div>
</form>


  </div>

  <div class="footer">
    © 2024 SENATI - Sistema de Gestión Estudiantil
  </div>
</body>
</html>
