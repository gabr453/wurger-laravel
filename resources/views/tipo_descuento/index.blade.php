@extends('layouts.app')

@section('title', 'Tipos de Descuento')

@section('content')
  <h1 class="section-title">Tipos de Descuento</h1>

  <a href="{{ route('tipo_descuento.create') }}" class="btn btn-add">➕ Nuevo Tipo de Descuento</a>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="styled-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Forma de Pago Asociada</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse($tiposDescuento as $tipo)
        <tr>
          <td>{{ $tipo->id_tipo_descuento }}</td>
          <td>{{ $tipo->Nombre_tipo_descuento }}</td>
          <td>{{ $tipo->formaPago->Nombre_fp ?? 'N/A' }}</td>
          <td>
            <a href="{{ route('tipo_descuento.edit', $tipo->id_tipo_descuento) }}" class="btn btn-edit">✏️ Editar</a>
            
            <form action="{{ route('tipo_descuento.destroy', $tipo->id_tipo_descuento) }}" 
                  method="POST" 
                  class="form-inline"
                  onsubmit="return confirm('¿Seguro de eliminar este tipo de descuento?')">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-delete">🗑️ Eliminar</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="4">No hay tipos de descuento registrados.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection
