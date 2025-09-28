@extends('layouts.app')

@section('title', 'Detalles de Venta')

@section('content')
  <h1 class="section-title">Detalles de Venta</h1>

  <a href="{{ route('detalle_venta.create') }}" class="btn btn-add">➕ Nuevo Detalle</a>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="styled-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Cantidad</th>
        <th>Precio Unitario</th>
        <th>Subtotal</th>
        <th>Descuento</th>
        <th>Venta</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse($detalles as $detalle)
        <tr>
          <td>{{ $detalle->id_detalle_venta }}</td>
          <td>{{ $detalle->Cantidad_detalle_venta }}</td>
          <td>{{ $detalle->Precio_unitario }}</td>
          <td>{{ $detalle->Subtotal }}</td>
          <td>{{ $detalle->Descuento }}</td>
          <td>{{ $detalle->venta->id_venta ?? 'N/A' }}</td>
          <td>
            <a href="{{ route('detalle_venta.edit', $detalle->id_detalle_venta) }}" class="btn btn-edit">✏️ Editar</a>
            
            <form action="{{ route('detalle_venta.destroy', $detalle->id_detalle_venta) }}" 
                  method="POST" 
                  class="form-inline"
                  onsubmit="return confirm('¿Eliminar este detalle?')">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-delete">🗑️ Eliminar</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="7">No hay detalles de venta registrados.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection
