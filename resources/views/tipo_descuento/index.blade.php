@extends('layouts.app')

@section('title', 'Tipos de Descuento')

@section('content')
<div class="container mt-4">
  <h1 class="mb-4">Tipos de Descuento</h1>

  {{-- Botón nuevo --}}
  <div class="mb-3">
    <a href="{{ route('tipo_descuento.create') }}" class="btn btn-success">➕ Nuevo Tipo de Descuento</a>
  </div>

  {{-- Mensaje de éxito --}}
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  {{-- Filtros --}}
  <form method="GET" action="{{ route('tipo_descuento.index') }}" class="mb-4">
    <div class="row g-2">
      <div class="col-md-2">
        <input type="text" name="id_tipo_descuento" class="form-control" 
               placeholder="ID" value="{{ request('id_tipo_descuento') }}">
      </div>
      <div class="col-md-4">
        <input type="text" name="Nombre_tipo_descuento" class="form-control" 
               placeholder="Nombre" value="{{ request('Nombre_tipo_descuento') }}">
      </div>
      <div class="col-md-4">
        <select name="id_fp_FK" class="form-select">
          <option value="">-- Forma de Pago --</option>
          @foreach($formasPago as $fp)
            <option value="{{ $fp->id_fp }}" 
              {{ request('id_fp_FK') == $fp->id_fp ? 'selected' : '' }}>
              {{ $fp->Nombre_fp }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="col-md-2">
        <button type="submit" class="btn btn-primary w-100">Filtrar</button>
      </div>
    </div>
  </form>

  {{-- Tabla --}}
  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Forma de Pago Asociada</th>
          <th class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @forelse($tiposDescuento as $tipo)
          <tr>
            <td>{{ $tipo->id_tipo_descuento }}</td>
            <td>{{ $tipo->Nombre_tipo_descuento }}</td>
            <td>{{ $tipo->formaPago->Nombre_fp ?? 'N/A' }}</td>
            <td class="text-center">
              <a href="{{ route('tipo_descuento.edit', $tipo->id_tipo_descuento) }}" 
                 class="btn btn-warning btn-sm">✏️ Editar</a>
              
              <form action="{{ route('tipo_descuento.destroy', $tipo->id_tipo_descuento) }}" 
                    method="POST" 
                    class="d-inline"
                    onsubmit="return confirm('¿Seguro de eliminar este tipo de descuento?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">🗑️ Eliminar</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="text-center">No hay tipos de descuento registrados.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
