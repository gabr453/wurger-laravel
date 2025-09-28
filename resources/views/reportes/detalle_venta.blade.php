<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte Detalle de Ventas</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 6px; font-size: 12px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Reporte Detalle de Ventas</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
                <th>Descuento</th>
                <th>ID Venta</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detalleVentas as $detalle)
            <tr>
                <td>{{ $detalle->id_detalle_venta }}</td>
                <td>{{ $detalle->Cantidad_detalle_venta }}</td>
                <td>{{ $detalle->Precio_unitario }}</td>
                <td>{{ $detalle->Subtotal }}</td>
                <td>{{ $detalle->Descuento }}</td>
                <td>{{ $detalle->id_venta_FK }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
