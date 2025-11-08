<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Estudiantes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #444;
            padding: 8px 10px;
            text-align: left;
        }
        th {
            background-color: #555;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Listado de Estudiantes</h2>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiantes as $est)
                <tr>
                    <td>{{ $est->codigo }}</td>
                    <td>{{ $est->dni }}</td>
                    <td>{{ $est->nombre }}</td>
                    <td>{{ $est->apellido }}</td>
                    <td>{{ $est->segundo_apellido }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>