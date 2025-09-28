<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte Promociones</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 6px; font-size: 12px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Reporte Promociones</h2>
    <table>
        <thead>
            <tr>
                <th>ID Promoción</th>
                <th>Nombre</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Cantidad Uso</th>
                <th>Estado</th>
                <th>Descripción</th>
                <th>ID Producto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promociones as $promocion)
            <tr>
                <td>{{ $promocion->id_promocion }}</td>
                <td>{{ $promocion->Nombre_promocion }}</td>
                <td>{{ $promocion->Inicio_promocion }}</td>
                <td>{{ $promocion->Fin_promocion }}</td>
                <td>{{ $promocion->Cantidad_us_promocion }}</td>
                <td>{{ $promocion->Estado_promocion }}</td>
                <td>{{ $promocion->Descripcion_promocion }}</td>
                <td>{{ $promocion->id_producto_FK }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
