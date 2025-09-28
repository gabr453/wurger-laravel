<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte PDF</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 5px; }
    </style>
</head>
<body>
    <h1>Reporte de Ventas</h1>

    <table>
        <thead>
            <tr>
                <th>ID Venta</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Cliente</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $venta)
                <tr>
                    <td>{{ $venta->id_venta }}</td>
                    <td>{{ $venta->Fecha_venta }}</td>
                    <td>{{ $venta->Estado_venta }}</td>
                    <td>{{ $venta->usuario->Nom_usuario ?? 'N/A' }}</td>
                    <td>{{ number_format($venta->detalleVenta->sum(fn($d) => $d->Subtotal - $d->Descuento), 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
