@extends('layouts.app')

@section('title', 'Formas de Pago')

@section('content')
  <h1 class="section-title">Formas de Pago</h1>

  <a href="{{ route('forma_pago.create') }}" class="btn btn-add mb-3">➕ Nueva Forma de Pago</a>

  {{-- 🔎 Formulario de Filtros --}}
  <form method="GET" action="{{ route('forma_pago.index') }}" class="card p-3 mb-4">
    <div class="row g-3">
      <div class="col-md-4">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" 
               value="{{ request('nombre') }}" class="form-control" placeholder="Buscar por nombre">
      </div>
      <div class="col-md-4">
        <label for="venta" class="form-label">Venta Asociada</label>
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
      <a href="{{ route('forma_pago.index') }}" class="btn btn-secondary">❌ Limpiar</a>
    </div>
  </form>

  {{-- Mensaje de éxito --}}
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  {{-- Tabla de resultados --}}
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Venta Asociada</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse($formasPago as $fp)
        <tr>
          <td>{{ $fp->id_fp }}</td>
          <td>{{ $fp->Nombre_fp }}</td>
          <td>{{ $fp->venta->id_venta ?? 'N/A' }}</td>
          <td class="d-flex gap-2">
            <a href="{{ route('forma_pago.edit', $fp->id_fp) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
            
            <form action="{{ route('forma_pago.destroy', $fp->id_fp) }}" 
                  method="POST" 
                  onsubmit="return confirm('¿Estás seguro de eliminar esta forma de pago?')">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">🗑️ Eliminar</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="4" class="text-center">No hay formas de pago registradas.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection
