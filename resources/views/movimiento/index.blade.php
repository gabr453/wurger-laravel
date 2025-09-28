@extends('layouts.app')

@section('title', 'Movimientos')

@section('content')
<h1 class="section-title">Lista de Movimientos</h1>

<a href="{{ route('movimiento.create') }}" class="btn btn-success">➕ Nuevo Movimiento</a>

<table class="styled-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Cantidad</th>
            <th>Fecha</th>
            <th>Descripción</th>
            <th>Producto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($movimientos as $mov)
        <tr>
            <td>{{ $mov->id_movimiento }}</td>
            <td>{{ $mov->Tipo_movimiento }}</td>
            <td>{{ $mov->Cantidad_movimiento }}</td>
            <td>{{ $mov->Fecha_movimiento }}</td>
            <td>{{ $mov->Descripcion_movimiento }}</td>
            <td>{{ $mov->producto->Nombre_producto ?? 'Sin producto' }}</td>
            <td>
                <a href="{{ route('movimiento.edit', $mov->id_movimiento) }}" class="btn btn-edit">✏️ Editar</a>
                <form action="{{ route('movimiento.destroy', $mov->id_movimiento) }}" 
                      method="POST" 
                      class="form-inline"
                      onsubmit="return confirm('¿Desea eliminar este movimiento?');">
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
