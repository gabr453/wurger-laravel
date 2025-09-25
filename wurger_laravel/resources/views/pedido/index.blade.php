@extends('layouts.app')

@section('title', 'Pedidos')

@section('content')
  <h1>Lista de Pedidos</h1>

  <a href="{{ route('pedido.create') }}" class="btn">Nuevo Pedido</a>

  <table border="1" cellpadding="8" cellspacing="0">
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
      @foreach ($pedidos as $pedido)
        <tr>
          <td>{{ $pedido->id_pedido }}</td>
          <td>{{ $pedido->Fecha_pedido }}</td>
          <td>{{ $pedido->Observaciones_devoluciones }}</td>
          <td>{{ $pedido->Estado_pedido }}</td>
          <td>{{ $pedido->cliente->Nom_cliente ?? 'Sin cliente' }}</td>
          <td>
            <a href="{{ route('pedido.edit', $pedido->id_pedido) }}" class="btn">Editar</a>
            <form action="{{ route('pedido.destroy', $pedido->id_pedido) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Seguro de eliminar este pedido?');">
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
