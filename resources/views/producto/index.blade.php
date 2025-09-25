@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<h1>Lista de Productos</h1>

<a href="{{ route('producto.create') }}" class="btn btn-success">Nuevo Producto</a>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Stock</th>
            <th>Stock Mínimo</th>
            <th>Stock Máximo</th>
            <th>Precio Venta</th>
            <th>Estado</th>
            <th>Categoría</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
        <tr>
            <td>{{ $producto->id_producto }}</td>
            <td>{{ $producto->Nombre_producto }}</td>
            <td>{{ $producto->Stock_producto }}</td>
            <td>{{ $producto->Stock_min_producto }}</td>
            <td>{{ $producto->Stock_max_producto }}</td>
            <td>{{ $producto->Precio_venta }}</td>
            <td>{{ $producto->Estado_producto }}</td>
            <td>{{ $producto->categoria->Nombre_categoria ?? 'Sin categoría' }}</td>
            <td>
                <a href="{{ route('producto.edit', $producto->id_producto) }}" class="btn btn-primary">Editar</a>

                <!-- Botón Eliminar -->
                <form action="{{ route('producto.destroy', $producto->id_producto) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
