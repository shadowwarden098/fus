<!DOCTYPE html>

<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SENATI | Sistema de Gestión Estudiantil</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --senati-blue: #003366;
      --senati-dark: #001f3f;
      --senati-light: #f1f5f9;
      --senati-gray: #b0bec5;
      --senati-bg: #002244;
      --accent-blue: #0074cc;
    }


* { margin: 0; padding: 0; box-sizing: border-box; }

body {
  background: linear-gradient(135deg, var(--senati-dark) 0%, var(--senati-blue) 60%, var(--senati-bg) 100%);
  font-family: 'Roboto', sans-serif;
  color: var(--senati-light);
  min-height: 100vh;
  overflow-x: hidden;
  position: relative;
}

.pattern-bg {
  position: fixed; top: 0; left: 0;
  width: 100%; height: 100%;
  opacity: 0.05;
  background-image: repeating-linear-gradient(
    45deg,
    transparent,
    transparent 35px,
    rgba(255, 255, 255, 0.08) 35px,
    rgba(255, 255, 255, 0.08) 36px
  );
  z-index: 1;
}

.container { position: relative; z-index: 2; max-width: 1400px; margin: 0 auto; padding: 30px 20px; }

/* ENCABEZADO */
.header-main {
  background: linear-gradient(135deg, var(--senati-blue), var(--senati-dark));
  border-radius: 25px;
  padding: 40px 50px;
  margin-bottom: 40px;
  box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
  border: 3px solid var(--accent-blue);
  position: relative;
}

.logo-section { display: flex; align-items: center; gap: 25px; margin-bottom: 15px; }

.logo-emblem {
  width: 90px; height: 90px;
  background: linear-gradient(135deg, var(--accent-blue), var(--senati-gray));
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 2.5rem; font-weight: 900;
  box-shadow: 0 0 40px rgba(0, 116, 204, 0.6);
  border: 4px solid rgba(255, 255, 255, 0.15);
  animation: rotateLogo 18s linear infinite;
}

@keyframes rotateLogo { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }

.logo-text {
  font-family: 'Montserrat', sans-serif;
  font-size: 3.5rem; font-weight: 800;
  color: #ffffff;
  letter-spacing: 3px;
  text-shadow: 2px 2px 0 var(--accent-blue), 5px 5px 20px rgba(0, 116, 204, 0.4);
}

.institution-name {
  font-size: 1.1rem; color: var(--senati-gray); font-weight: 300;
  letter-spacing: 2px; margin-left: 115px;
}

.tagline { font-size: 1rem; color: var(--accent-blue); font-weight: 500; margin-left: 115px; margin-top: 5px; }

/* BARRA DE CONTROL */
.control-bar {
  background: rgba(255, 255, 255, 0.95);
  border-radius: 20px;
  padding: 30px 40px;
  margin-bottom: 50px;
  display: flex; justify-content: space-between; align-items: center;
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
  border-left: 6px solid var(--accent-blue);
}

.btn-new-student {
  padding: 16px 40px;
  background: linear-gradient(135deg, var(--accent-blue), #3399ff);
  color: #fff; border: none; border-radius: 15px;
  font-size: 1.1rem; font-weight: 700;
  cursor: pointer; text-transform: uppercase;
  text-decoration: none;
  box-shadow: 0 8px 25px rgba(0, 116, 204, 0.4);
  transition: all 0.3s ease;
}

.btn-new-student:hover { transform: translateY(-3px); box-shadow: 0 12px 35px rgba(0, 116, 204, 0.6); }

/* TARJETAS DE ESTUDIANTES */
.students-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(450px, 1fr));
  gap: 30px;
  list-style: none;
}

.student-card {
  background: rgba(255, 255, 255, 0.98);
  border-radius: 20px;
  padding: 30px;
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
  border-left: 6px solid var(--accent-blue);
  transition: all 0.4s;
}

.student-card:hover {
  transform: translateY(-8px) scale(1.02);
  box-shadow: 0 20px 60px rgba(0, 116, 204, 0.25);
}

.card-header { display: flex; align-items: center; gap: 20px; margin-bottom: 25px; }

.student-avatar {
  width: 85px; height: 85px; border-radius: 50%;
  background: linear-gradient(135deg, var(--senati-blue), var(--accent-blue));
  display: flex; align-items: center; justify-content: center;
  font-size: 2rem; font-weight: 800; color: #fff;
  font-family: 'Montserrat', sans-serif;
}

.student-info h3 { font-size: 1.5rem; color: var(--senati-blue); font-weight: 700; }
.student-code { color: var(--accent-blue); font-weight: 600; }

.actions-footer { display: flex; gap: 10px; margin-top: 20px; }

.btn-edit, .btn-delete {
  flex: 1;
  padding: 12px;
  border-radius: 10px;
  font-weight: 700;
  text-transform: uppercase;
  font-size: 0.9rem;
  cursor: pointer;
  transition: all 0.3s;
}

.btn-edit {
  background: transparent;
  border: 2px solid var(--accent-blue);
  color: var(--accent-blue);
}

.btn-edit:hover {
  background: var(--accent-blue);
  color: #fff;
  transform: translateY(-2px);
}

.btn-delete {
  background: transparent;
  border: 2px solid #b91c1c;
  color: #b91c1c;
}

.btn-delete:hover {
  background: #b91c1c;
  color: #fff;
  transform: translateY(-2px);
}

.footer {
  text-align: center;
  padding: 40px 20px;
  margin-top: 60px;
  color: rgba(255, 255, 255, 0.6);
  font-size: 0.9rem;
}


  </style>
</head>
<body>
  <div class="pattern-bg"></div>

  <div class="container">
    <header class="header-main">
      <div class="logo-section">
        <div class="logo-emblem">⚙</div>
        <h1 class="logo-text">SENATI</h1>
      </div>
      <p class="institution-name">SERVICIO NACIONAL DE ADIESTRAMIENTO EN TRABAJO INDUSTRIAL</p>
      <p class="tagline">Sistema de Gestión Estudiantil | Excelencia y Tecnología para el Futuro</p>
    </header>

<div class="control-bar">
  <a href="{{ route('estudiantes.create') }}" class="btn-new-student">➕ Nuevo Estudiante</a>
  <div class="stats-panel">
    <div class="stat-card">
      <div class="stat-number">{{ $estudiantes->count() }}</div>
      <div class="stat-label">Estudiantes Registrados</div>
    </div>
  </div>
</div>

@if ($estudiantes->isEmpty())
  <div class="empty-state" style="text-align:center; padding:60px;">
    <div class="empty-icon" style="font-size:3rem;">🎓</div>
    <p class="empty-text" style="font-size:1.3rem; font-weight:600; margin-top:10px;">No hay estudiantes registrados</p>
    <p class="empty-subtext" style="color: var(--senati-gray); margin-top:5px;">Comienza agregando el primer estudiante al sistema</p>
  </div>
@else
  <ul class="students-grid">
    @foreach ($estudiantes as $estudiante)
    <li class="student-card">
      <div class="card-header">
        <div class="student-avatar">{{ strtoupper(substr($estudiante->nombre, 0, 1)) }}</div>
        <div class="student-info">
          <h3>{{ $estudiante->nombre }} {{ $estudiante->apellido }}</h3>
          <div class="student-code">Código: {{ $estudiante->codigo ?? '—' }}</div>
          <div class="student-code">DNI: {{ $estudiante->dni }}</div>
        </div>
      </div>

      <div class="details-grid">
        <div class="detail-item">
          <div class="detail-label">Dirección</div>
          <div class="detail-value">{{ $estudiante->direccion ?? 'No registrada' }}</div>
        </div>
      </div>

      <div class="actions-footer">
        <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn-edit">✏️ Editar</a>
        <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este estudiante?')">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn-delete">🗑️ Eliminar</button>
        </form>
      </div>
    </li>
    @endforeach
  </ul>
@endif

<footer class="footer">
  <p>© 2025 SENATI - Sistema de Gestión Estudiantil | Desarrollado con pasión por la tecnología</p>
</footer>


  </div>
</body>
</html>
