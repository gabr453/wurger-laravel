@extends('layouts.app')

@section('title', 'Unidades de Medida')

@section('content')
<h1 class="section-title">Lista de Unidades de Medida</h1>

<a href="{{ route('unidad_medida.create') }}" class="btn btn-success">➕ Nueva Unidad</a>

<table class="styled-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Producto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($unidades as $unidad)
        <tr>
            <td>{{ $unidad->id_unidad }}</td>
            <td>{{ $unidad->Nombre_unidad }}</td>
            <td>{{ $unidad->Cantidad_unidad }}</td>
            <td>{{ $unidad->producto->Nombre_producto ?? 'Sin producto' }}</td>
            <td>
                <a href="{{ route('unidad_medida.edit', $unidad->id_unidad) }}" class="btn btn-edit">✏️ Editar</a>
                <form action="{{ route('unidad_medida.destroy', $unidad->id_unidad) }}" 
                      method="POST" 
                      class="form-inline"
                      onsubmit="return confirm('¿Estás seguro de eliminar esta unidad?');">
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
