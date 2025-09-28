@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
  <h1 class="section-title">Lista de Categorías</h1>

  <a href="{{ route('categoria_producto.create') }}" class="btn btn-add">➕ Nueva Categoría</a>

  <table class="styled-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categorias as $categoria)
        <tr>
          <td>{{ $categoria->id_categoria }}</td>
          <td>{{ $categoria->Nombre_categoria }}</td>
          <td>{{ $categoria->cantidad_categoria }}</td>
          <td>
            <a href="{{ route('categoria_producto.edit', $categoria->id_categoria) }}" class="btn btn-edit">✏️ Editar</a>

            <!-- Botón Eliminar -->
            <form action="{{ route('categoria_producto.destroy', $categoria->id_categoria) }}" 
                  method="POST" 
                  class="form-inline"
                  onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?');">
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
