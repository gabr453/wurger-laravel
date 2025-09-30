@extends('layouts.app')

@section('title', 'Detalles de Venta')

@section('content')
  <h1 class="section-title">Detalles de Venta</h1>

  <a href="{{ route('detalle_venta.create') }}" class="btn btn-success mb-3">➕ Nuevo Detalle</a>

  {{-- 🔎 Formulario de filtros --}}
  <form method="GET" action="{{ route('detalle_venta.index') }}" class="card p-3 mb-4">
    <div class="row g-3">
      <div class="col-md-3">
        <label for="cantidad_min" class="form-label">Cantidad mínima</label>
        <input type="number" name="cantidad_min" id="cantidad_min" 
               value="{{ request('cantidad_min') }}" class="form-control">
      </div>
      <div class="col-md-3">
        <label for="cantidad_max" class="form-label">Cantidad máxima</label>
        <input type="number" name="cantidad_max" id="cantidad_max" 
               value="{{ request('cantidad_max') }}" class="form-control">
      </div>
      <div class="col-md-3">
        <label for="precio_min" class="form-label">Precio mínimo</label>
        <input type="number" step="0.01" name="precio_min" id="precio_min" 
               value="{{ request('precio_min') }}" class="form-control">
      </div>
      <div class="col-md-3">
        <label for="precio_max" class="form-label">Precio máximo</label>
        <input type="number" step="0.01" name="precio_max" id="precio_max" 
               value="{{ request('precio_max') }}" class="form-control">
      </div>
      <div class="col-md-3">
        <label for="venta" class="form-label">Venta</label>
        <select name="venta" id="venta" class="form-select">
          <option value="">-- Todas --</option>
          @foreach($ventas as $venta)
            <option value="{{ $venta->id_venta }}" 
              {{ request('venta') == $venta->id_venta ? 'selected' : '' }}>
              Venta #{{ $venta->id_venta }}
            </option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="mt-3">
      <button type="submit" class="btn btn-primary">🔎 Buscar</button>
      <a href="{{ route('detalle_venta.index') }}" class="btn btn-secondary">❌ Limpiar</a>
    </div>
  </form>

  {{-- Tabla de resultados --}}
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
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
          <td class="d-flex gap-2">
            <a href="{{ route('detalle_venta.edit', $detalle->id_detalle_venta) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
            
            <form action="{{ route('detalle_venta.destroy', $detalle->id_detalle_venta) }}" 
                  method="POST" 
                  onsubmit="return confirm('¿Eliminar este detalle?')">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">🗑️ Eliminar</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="7" class="text-center">No hay detalles de venta registrados.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection
