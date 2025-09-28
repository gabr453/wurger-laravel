@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<h1 class="section-title">Lista de Productos</h1>

<!-- ALERTAS -->
@if(session('success'))
    <div class="alert alert-success" style="padding:10px; margin-bottom:15px; background-color:#d4edda; color:#155724; border-radius:5px;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger" style="padding:10px; margin-bottom:15px; background-color:#f8d7da; color:#721c24; border-radius:5px;">
        {{ session('error') }}
    </div>
@endif

<a href="{{ route('producto.create') }}" class="btn btn-success">➕ Nuevo Producto</a>

<table class="styled-table">
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
                <a href="{{ route('producto.edit', $producto->id_producto) }}" class="btn btn-edit">✏️ Editar</a>

                <!-- Botón Eliminar -->
                <form action="{{ route('producto.destroy', $producto->id_producto) }}" 
                      method="POST" 
                      class="form-inline"
                      onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete">🗑️ Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
