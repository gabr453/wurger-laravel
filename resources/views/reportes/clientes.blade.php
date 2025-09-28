<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte Clientes</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 6px; font-size: 12px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Reporte Clientes</h2>
    <table>
        <thead>
            <tr>
                <th>ID Cliente</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Dirección</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->id_cliente }}</td>
                <td>{{ $cliente->Nom_cliente }}</td>
                <td>{{ $cliente->Tel_cliente }}</td>
                <td>{{ $cliente->Direc_cliente }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
