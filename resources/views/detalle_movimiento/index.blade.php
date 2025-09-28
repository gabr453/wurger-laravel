@extends('layouts.app')

@section('title', 'Detalle de Movimientos')

@section('content')
<h1 class="section-title">Detalle de Movimientos</h1>

<a href="{{ route('detalle_movimiento.create') }}" class="btn btn-success">➕ Nuevo Detalle</a>

<table class="styled-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cantidad</th>
            <th>Movimiento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($detalles as $det)
        <tr>
            <td>{{ $det->id_detalle_movimiento }}</td>
            <td>{{ $det->Cantidad_detalle_movimiento }}</td>
            <td>{{ $det->movimiento->Tipo_movimiento ?? '' }} - {{ $det->movimiento->Fecha_movimiento ?? '' }}</td>
            <td>
                <a href="{{ route('detalle_movimiento.edit', $det->id_detalle_movimiento) }}" class="btn btn-edit">✏️ Editar</a>
                
                <form action="{{ route('detalle_movimiento.destroy', $det->id_detalle_movimiento) }}" 
                      method="POST" 
                      class="form-inline" 
                      onsubmit="return confirm('¿Desea eliminar este detalle?');">
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
