<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte Productos</title>
</head>
<body>
    <h1>Reporte de Productos</h1>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Stock</th>
                <th>Precio Venta</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id_producto }}</td>
                <td>{{ $producto->Nombre_producto }}</td>
                <td>{{ $producto->Stock_producto }}</td>
                <td>{{ $producto->Precio_venta }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
