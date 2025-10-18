<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Confirmación: Protocolo de Retención de Datos (V3.0)</title>
<!-- Fuentes de interfaz de usuario de alta tecnología -->
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
<style>
/* VARIABLES (TEMA HUD: VERDE, AMBAR, NEGRO) */
:root {
    --bg-deep-void: #000; /* Negro absoluto para simular oscuridad de fondo */
    --hud-green: #00ff66; /* Verde diagnóstico brillante */
    --hud-amber: #ffcc00; /* Ámbar/Amarillo para advertencias */
    --hud-red: #ff3333; /* Rojo para eliminación crítica */
    --panel-bg: rgba(0, 0, 0, 0.7); /* Panel semitransparente */
    --text-primary: #fff;
    --text-dim: #999;
    --shadow-green: 0 0 10px rgba(0, 255, 102, 0.6);
    --border-thickness: 2px;
}

/* RESET */
* { margin:0; padding:0; box-sizing:border-box; }
body {
    background-color: var(--bg-deep-void);
    font-family: 'Roboto Mono', monospace;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    color: var(--text-primary);
    padding: 20px;
    position: relative;
    overflow: hidden;
}

/* EFECTO DE FONDO: SCANLINES CLÁSICOS Y AMBIENTE */
body::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    /* Scanlines */
    background: repeating-linear-gradient(
        to bottom,
        transparent 0,
        transparent 1px,
        rgba(0, 0, 0, 0.5) 2px,
        rgba(0, 0, 0, 0.5) 3px
    );
    opacity: 0.1;
    z-index: 0;
    animation: flicker 15s linear infinite;
}

@keyframes flicker {
    0%, 100% { opacity: 0.1; }
    50% { opacity: 0.15; }
}

/* CONTENEDOR PRINCIPAL - EL HUD CENTRAL */
.container {
    background: var(--panel-bg);
    border: var(--border-thickness) solid var(--hud-green);
    box-shadow: var(--shadow-green);
    width: 95%;
    max-width: 650px;
    padding: 30px;
    position: relative;
    z-index: 10;
    clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%, 0 100%); /* Forma de caja */
    animation: hudBoot 1.5s ease-out forwards;
}

@keyframes hudBoot {
    0% { clip-path: polygon(50% 50%, 50% 50%, 50% 50%, 50% 50%, 50% 50%); opacity: 0; }
    100% { clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%, 0 100%); opacity: 1; }
}

/* HEADER - Título superior */
.header {
    text-align: left;
    font-family: 'Orbitron', sans-serif;
    font-size: 1.5rem;
    font-weight: 700;
    letter-spacing: 3px;
    color: var(--hud-green);
    text-shadow: 0 0 5px var(--hud-green);
    padding-bottom: 10px;
    margin-bottom: 25px;
    border-bottom: 1px solid var(--hud-green);
}

/* SUB-HEADER Y ESTADO CRÍTICO */
.status-bar {
    text-align: center;
    margin-bottom: 30px;
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--hud-red);
    text-shadow: 0 0 8px var(--hud-red);
    animation: criticalPulse 1s steps(1) infinite;
    padding: 10px;
    border: 1px dashed var(--hud-red);
}
@keyframes criticalPulse {
    0% { opacity: 0.8; }
    50% { opacity: 1; text-shadow: 0 0 10px var(--hud-red); }
    100% { opacity: 0.8; }
}

/* TEXTO DE CONFIRMACIÓN */
.confirm-text {
    text-align: center;
    font-size: 1rem;
    margin-bottom: 30px;
    color: var(--text-dim);
    line-height: 1.5;
}
.confirm-text strong { color: var(--hud-red); font-weight: 700; }

/* TARJETA DEL ESTUDIANTE - NUEVA ESTRUCTURA DE PANELES GRID */
.student-data-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 40px;
    padding: 15px;
    background: rgba(0, 0, 0, 0.4);
    border: 1px solid var(--hud-amber);
    box-shadow: 0 0 10px rgba(255, 204, 0, 0.2);
}

.data-panel {
    border: 1px solid rgba(255, 204, 0, 0.5);
    padding: 15px;
    background: rgba(15, 10, 0, 0.7);
    animation: dataPanelIn 0.5s ease forwards var(--delay);
    opacity: 0;
    position: relative;
    overflow: hidden;
}

/* Efecto de borde dinámico en los paneles de datos */
.data-panel::before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 3px;
    background: linear-gradient(90deg, transparent, var(--hud-amber), transparent);
    animation: scanLineMove 4s linear infinite;
    opacity: 0.5;
}
@keyframes scanLineMove {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

@keyframes dataPanelIn {
    0% { opacity: 0; transform: scaleY(0.5); }
    100% { opacity: 1; transform: scaleY(1); }
}


.data-panel .label {
    display: block;
    font-size: 0.8rem;
    color: var(--hud-amber);
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 5px;
    border-bottom: 1px dashed rgba(255, 204, 0, 0.3);
    padding-bottom: 3px;
}

.data-panel .value {
    display: block;
    font-size: 1.2rem;
    color: var(--hud-green);
    font-family: 'Orbitron', sans-serif;
    text-shadow: 0 0 5px var(--hud-green);
}

/* INFO ADICIONAL (ADVERTENCIA) */
.info-text {
    text-align: center;
    color: var(--hud-amber);
    margin-bottom: 30px;
    font-size: 0.95rem;
    font-weight: 400;
}


/* BOTONES - Interacción de Alto Voltaje */
.actions {
    display: flex;
    justify-content: center;
    gap: 35px;
    flex-wrap: wrap;
    border-top: 1px dashed var(--hud-green);
    padding-top: 30px;
}

.btn {
    padding: 15px 35px;
    font-weight: 700;
    cursor: pointer;
    font-family: 'Orbitron', sans-serif;
    letter-spacing: 2px;
    transition: all 0.2s ease-in-out;
    border: var(--border-thickness) solid;
    color: var(--text-primary);
    position: relative;
    overflow: hidden;
    text-transform: uppercase;
    background: transparent;
    box-shadow: none;
    clip-path: polygon(5% 0, 100% 0, 95% 100%, 0 100%); /* Forma de chip angular */
}

/* Efecto de recarga de batería */
.btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 0;
    height: 100%;
    transition: width 0.3s ease;
    z-index: -1;
    opacity: 0.7;
}

.btn-delete {
    border-color: var(--hud-red);
    color: var(--hud-red);
}
.btn-delete::before {
    background: var(--hud-red);
}
.btn-delete:hover {
    color: var(--bg-deep-void);
    box-shadow: 0 0 15px var(--hud-red);
}
.btn-delete:hover::before {
    width: 100%;
}

.btn-cancel {
    border-color: var(--hud-green);
    color: var(--hud-green);
}
.btn-cancel::before {
    background: var(--hud-green);
}
.btn-cancel:hover {
    color: var(--bg-deep-void);
    box-shadow: 0 0 15px var(--hud-green);
}
.btn-cancel:hover::before {
    width: 100%;
}

@media (max-width: 600px) {
    .container {
        padding: 25px;
    }
    .header {
        font-size: 1.2rem;
        letter-spacing: 2px;
    }
    .student-data-grid {
        grid-template-columns: 1fr;
    }
    .btn {
        width: 100%;
        padding: 12px;
    }
}
</style>
</head>
<body>

<div class="container">
    <div class="header">DIAGNÓSTICO CRÍTICO V3.0</div>

    <div class="status-bar">ESTADO: INICIACIÓN DE PURGA (NIVEL 4)</div>

<p class="confirm-text">MÓDULO DE AUTORIZACIÓN: Se requiere la **CONFIRMACIÓN FINAL** para la eliminación permanente. El proceso está marcado como **IRREVERSIBLE**. Proceda con precaución.</p>

    <!-- NUEVA ESTRUCTURA DE DATOS: GRID DE PANELES -->
    <div class="student-data-grid">
        <!-- Panel 1: CÓDIGO -->
        <div class="data-panel" style="--delay: 0s;">
            <span class="label">ID DE REGISTRO</span>
            <span class="value">{{ $estudiante->codigo }}</span>
        </div>

        <!-- Panel 2: NOMBRE -->
        <div class="data-panel" style="--delay: 0.1s;">
            <span class="label">NOMBRE COMPLETO</span>
            <span class="value">{{ $estudiante->nombre }}</span>
        </div>
        
        <!-- Panel 3: APELLIDOS -->
        <div class="data-panel" style="--delay: 0.2s;">
            <span class="label">APELLIDO(S) ASIGNADO(S)</span>
            <span class="value">{{ $estudiante->apellido }} {{ $estudiante->segundo_apellido ?? '' }}</span>
        </div>
        
        <!-- Panel 4: DNI -->
        <div class="data-panel" style="--delay: 0.3s;">
            <span class="label">NÚMERO DE UNIDAD (DNI)</span>
            <span class="value">{{ $estudiante->dni }}</span>
        </div>
    </div>
    <!-- FIN NUEVA ESTRUCTURA -->

    <p class="info-text">ADVERTENCIA: La retención de datos está comprometida. Ejecutar la purga para mitigar riesgos. </p>

    <div class="actions">
        <!-- FORMULARIO DE LARAVEL (FUNCIONES INTACTAS) -->
        <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-delete">INICIAR PURGA</button>
        </form>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-cancel">MANTENER REGISTRO</a>
    </div>
</div>

</body>
</html>
