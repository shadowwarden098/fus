<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Estudiante - {{ $estudiante->nombre }} {{ $estudiante->apellido }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body { 
            font-family: 'Arial', sans-serif; 
            padding: 40px;
            background: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #4F46E5;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #4F46E5;
            font-size: 28px;
            margin-bottom: 5px;
        }
        .header p {
            color: #6B7280;
            font-size: 14px;
        }
        .info-section {
            margin: 20px 0;
        }
        .info-row {
            display: flex;
            padding: 12px;
            border-bottom: 1px solid #E5E7EB;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: bold;
            color: #374151;
            width: 150px;
            flex-shrink: 0;
        }
        .info-value {
            color: #6B7280;
            flex: 1;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            padding-top: 20px;
            border-top: 2px solid #E5E7EB;
            color: #9CA3AF;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>📋 Información del Estudiante</h1>
            <p>Registro generado el {{ date('d/m/Y H:i') }}</p>
        </div>

        <!-- Información del estudiante -->
        <div class="info-section">
            <div class="info-row">
                <div class="info-label">🆔 ID:</div>
                <div class="info-value">{{ $estudiante->id }}</div>
            </div>

            <div class="info-row">
                <div class="info-label">👤 Nombre:</div>
                <div class="info-value">{{ $estudiante->nombre }}</div>
            </div>

            <div class="info-row">
                <div class="info-label">👤 Apellido:</div>
                <div class="info-value">{{ $estudiante->apellido }}</div>
            </div>

            <div class="info-row">
                <div class="info-label">🪪 DNI:</div>
                <div class="info-value">{{ $estudiante->dni }}</div>
            </div>

            @if($estudiante->codigo)
            <div class="info-row">
                <div class="info-label">🔢 Código:</div>
                <div class="info-value">{{ $estudiante->codigo }}</div>
            </div>
            @endif

            @if($estudiante->email)
            <div class="info-row">
                <div class="info-label">📧 Email:</div>
                <div class="info-value">{{ $estudiante->email }}</div>
            </div>
            @endif

            @if($estudiante->telefono)
            <div class="info-row">
                <div class="info-label">📱 Teléfono:</div>
                <div class="info-value">{{ $estudiante->telefono }}</div>
            </div>
            @endif

            @if($estudiante->direccion)
            <div class="info-row">
                <div class="info-label">🏠 Dirección:</div>
                <div class="info-value">{{ $estudiante->direccion }}</div>
            </div>
            @endif

            @if($estudiante->fecha_nacimiento)
            <div class="info-row">
                <div class="info-label">🎂 Fecha de Nacimiento:</div>
                <div class="info-value">{{ \Carbon\Carbon::parse($estudiante->fecha_nacimiento)->format('d/m/Y') }}</div>
            </div>
            @endif

            <div class="info-row">
                <div class="info-label">📅 Fecha de Registro:</div>
                <div class="info-value">{{ $estudiante->created_at->format('d/m/Y H:i') }}</div>
            </div>

            @if($estudiante->updated_at != $estudiante->created_at)
            <div class="info-row">
                <div class="info-label">🔄 Última Actualización:</div>
                <div class="info-value">{{ $estudiante->updated_at->format('d/m/Y H:i') }}</div>
            </div>
            @endif
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Sistema de Gestión de Estudiantes - {{ config('app.name') }}</p>
            <p>Documento generado automáticamente</p>
        </div>
    </div>
</body>
</html>