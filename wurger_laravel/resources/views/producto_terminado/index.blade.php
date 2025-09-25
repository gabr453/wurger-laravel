@extends('layouts.app')

@section('title', 'Productos Terminados')

@section('content')
<h1>Lista de Productos Terminados</h1>

<a href="{{ route('producto_terminado.create') }}" class="btn btn-success">Nuevo Producto Terminado</a>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Categoría</th>
            <th>Costo</th>
            <th>Precio</th>
            <th>Stock Actual</th>
            <th>Stock Mínimo</th>
            <th>Estado</th>
            <th>Producto Base</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos_terminados as $pt)
        <tr>
            <td>{{ $pt->id_producto_terminado }}</td>
            <td>{{ $pt->Nombre_producto_terminado }}</td>
            <td>{{ $pt->Descripcion_producto_terminado }}</td>
            <td>{{ $pt->Categoria_producto_terminado }}</td>
            <td>{{ $pt->Costo_producto_terminado }}</td>
            <td>{{ $pt->Precio_producto_terminado }}</td>
            <td>{{ $pt->Stock_actual_producto_terminado }}</td>
            <td>{{ $pt->Stock_min_producto_terminado }}</td>
            <td>{{ $pt->Estado_producto_terminado }}</td>
            <td>{{ $pt->producto->Nombre_producto ?? 'Sin producto base' }}</td>
            <td>
                <a href="{{ route('producto_terminado.edit', $pt->id_producto_terminado) }}" class="btn btn-primary">Editar</a>
                <form action="{{ route('producto_terminado.destroy', $pt->id_producto_terminado) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Seguro de eliminar este producto terminado?');">
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
