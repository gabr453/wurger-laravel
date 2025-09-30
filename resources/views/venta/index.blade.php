@extends('layouts.app')

@section('title', 'Ventas')

@section('content')
  <h1 class="section-title">Listado de Ventas</h1>

  <a href="{{ route('venta.create') }}" class="btn btn-success mb-3">➕ Nueva Venta</a>

  {{-- 🔎 Filtros de búsqueda --}}
  <form method="GET" action="{{ route('venta.index') }}" class="card p-3 mb-4">
    <div class="row g-3">
      <div class="col-md-3">
        <label for="fecha_desde" class="form-label">Fecha desde</label>
        <input type="date" name="fecha_desde" id="fecha_desde" 
               value="{{ request('fecha_desde') }}" class="form-control">
      </div>

      <div class="col-md-3">
        <label for="fecha_hasta" class="form-label">Fecha hasta</label>
        <input type="date" name="fecha_hasta" id="fecha_hasta" 
               value="{{ request('fecha_hasta') }}" class="form-control">
      </div>

      <div class="col-md-3">
        <label for="estado" class="form-label">Estado</label>
        <select name="estado" id="estado" class="form-select">
          <option value="">-- Todos --</option>
          <option value="Pendiente" {{ request('estado') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
          <option value="Pagada" {{ request('estado') == 'Pagada' ? 'selected' : '' }}>Pagada</option>
          <option value="Anulada" {{ request('estado') == 'Anulada' ? 'selected' : '' }}>Anulada</option>
        </select>
      </div>

      <div class="col-md-3">
        <label for="usuario" class="form-label">Usuario</label>
        <input type="text" name="usuario" id="usuario" 
               value="{{ request('usuario') }}" class="form-control" placeholder="Nombre de usuario">
      </div>
    </div>

    <div class="mt-3">
      <button type="submit" class="btn btn-primary">🔎 Buscar</button>
      <a href="{{ route('venta.index') }}" class="btn btn-secondary">❌ Limpiar</a>
    </div>
  </form>

  {{-- Tabla de resultados --}}
  @if(session('success'))
    <div class="alert alert-success mt-2">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Fecha</th>
        <th>Estado</th>
        <th>Usuario</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse($ventas as $venta)
        <tr>
          <td>{{ $venta->id_venta }}</td>
          <td>{{ $venta->Fecha_venta }}</td>
          <td>
            <span class="badge 
              @if($venta->Estado_venta == 'Pagada') bg-success 
              @elseif($venta->Estado_venta == 'Pendiente') bg-warning 
              @else bg-danger @endif">
              {{ $venta->Estado_venta }}
            </span>
          </td>
          <td>{{ $venta->usuario->Nom_usuario ?? 'N/A' }}</td>
          <td class="d-flex gap-2">
            <a href="{{ route('venta.edit', $venta->id_venta) }}" class="btn btn-sm btn-warning">✏️ Editar</a>

            <form action="{{ route('venta.destroy', $venta->id_venta) }}" 
                  method="POST" 
                  onsubmit="return confirm('¿Eliminar esta venta?')">
              @csrf 
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">🗑️ Eliminar</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="5" class="text-center">No hay ventas registradas</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection
