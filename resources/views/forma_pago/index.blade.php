@extends('layouts.app')

@section('title', 'Formas de Pago')

@section('content')
  <h1 class="section-title">Formas de Pago</h1>

  <a href="{{ route('forma_pago.create') }}" class="btn btn-add">➕ Nueva Forma de Pago</a>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="styled-table">
    <thead>
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
          <td>
            <a href="{{ route('forma_pago.edit', $fp->id_fp) }}" class="btn btn-edit">✏️ Editar</a>
            
            <form action="{{ route('forma_pago.destroy', $fp->id_fp) }}" 
                  method="POST" 
                  class="form-inline"
                  onsubmit="return confirm('¿Estás seguro de eliminar esta forma de pago?')">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-delete">🗑️ Eliminar</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="4">No hay formas de pago registradas.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection
