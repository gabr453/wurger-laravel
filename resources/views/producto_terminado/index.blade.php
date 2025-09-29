@extends('layouts.app')

@section('title', 'Productos Terminados')

@section('content')
<div class="main-content">
    <h1 class="section-title">Lista de Productos Terminados</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('producto_terminado.create') }}" class="btn btn-add">➕ Nuevo Producto Terminado</a>

    <table class="styled-table">
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
                <th>Fecha Ingreso</th>
                <th>Producto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos_terminados as $producto)
                <tr>
                    <td>{{ $producto->id_producto_terminado }}</td>
                    <td>{{ $producto->Nombre_producto_terminado }}</td>
                    <td>{{ $producto->Descripcion_producto_terminado }}</td>
                    <td>{{ $producto->Categoria_producto_terminado }}</td>
                    <td>{{ $producto->Costo_producto_terminado }}</td>
                    <td>{{ $producto->Precio_producto_terminado }}</td>
                    <td>{{ $producto->Stock_actual_producto_terminado }}</td>
                    <td>{{ $producto->Stock_min_producto_terminado }}</td>
                    <td>{{ $producto->Estado_producto_terminado }}</td>
                    <td>{{ $producto->Fecha_ingreso_producto_terminado }}</td>
                    <td>{{ $producto->producto->Nombre_producto ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('producto_terminado.edit', $producto) }}" class="btn btn-edit">✏️ Editar</a>

                        <form action="{{ route('producto_terminado.destroy', $producto) }}" method="POST" style="display:inline-block;"
                              onsubmit="return confirm('¿Estás seguro de eliminar este producto terminado?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">🗑️ Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
