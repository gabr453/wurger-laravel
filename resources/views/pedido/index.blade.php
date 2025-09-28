@extends('layouts.app')

@section('title', 'Pedidos')

@section('content')
<h1 class="section-title">Lista de Pedidos</h1>

<a href="{{ route('pedido.create') }}" class="btn btn-add">➕ Nuevo Pedido</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="styled-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Observaciones</th>
            <th>Estado</th>
            <th>Cliente</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->id_pedido }}</td>
                <td>{{ \Carbon\Carbon::parse($pedido->Fecha_pedido)->format('d/m/Y') }}</td>
                <td>{{ $pedido->Observaciones_devoluciones ?? 'N/A' }}</td>
                <td>
                    <span class="badge {{ $pedido->Estado_pedido == 'Activo' ? 'badge-success' : 'badge-danger' }}">
                        {{ $pedido->Estado_pedido }}
                    </span>
                </td>
                <td>{{ $pedido->cliente->Nom_cliente ?? 'Sin cliente' }}</td>
                <td>
                    <a href="{{ route('pedido.edit', $pedido->id_pedido) }}" class="btn btn-edit">✏️ Editar</a>

                    <form action="{{ route('pedido.destroy', $pedido->id_pedido) }}" 
                          method="POST" 
                          class="form-inline"
                          onsubmit="return confirm('¿Seguro de eliminar este pedido?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-delete">🗑️ Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No hay pedidos registrados.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
