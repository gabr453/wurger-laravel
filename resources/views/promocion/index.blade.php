@extends('layouts.app')

@section('title', 'Promociones')

@section('content')
<h1>Lista de Promociones</h1>
<a href="{{ route('promocion.create') }}" class="btn"> Nueva Promoción</a>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Producto</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($promociones as $prom)
        <tr>
            <td>{{ $prom->id_promocion }}</td>
            <td>{{ $prom->Nombre_promocion }}</td>
            <td>{{ $prom->producto->Nombre_producto ?? 'N/A' }}</td>
            <td>{{ $prom->Inicio_promocion }}</td>
            <td>{{ $prom->Fin_promocion }}</td>
            <td>{{ $prom->Estado_promocion }}</td>
            <td>
                <a href="{{ route('promocion.edit', $prom->id_promocion) }}">Editar</a>
                <form action="{{ route('promocion.destroy', $prom->id_promocion) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn-delete">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
