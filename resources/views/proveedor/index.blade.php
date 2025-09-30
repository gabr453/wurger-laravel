@extends('layouts.app')

@section('title', 'Proveedores')

@section('content')
<div class="container mt-4">
  <h1 class="mb-4">Lista de Proveedores</h1>

  {{-- Botón nuevo --}}
  <div class="mb-3">
    <a href="{{ route('proveedor.create') }}" class="btn btn-success">➕ Nuevo Proveedor</a>
  </div>

  {{-- Mensaje de éxito --}}
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  {{-- Filtros --}}
  <form method="GET" action="{{ route('proveedor.index') }}" class="mb-4">
    <div class="row g-2">
      <div class="col-md-2">
        <input type="text" name="id_proveedor" class="form-control"
               placeholder="ID" value="{{ request('id_proveedor') }}">
      </div>
      <div class="col-md-3">
        <input type="text" name="Nom_proveedor" class="form-control"
               placeholder="Nombre" value="{{ request('Nom_proveedor') }}">
      </div>
      <div class="col-md-3">
        <input type="text" name="Tel_proveedor" class="form-control"
               placeholder="Teléfono" value="{{ request('Tel_proveedor') }}">
      </div>
      <div class="col-md-3">
        <input type="text" name="Email_proveedor" class="form-control"
               placeholder="Email" value="{{ request('Email_proveedor') }}">
      </div>
    </div>

    <div class="row g-2 mt-2">
      <div class="col-md-3">
        <input type="text" name="Direccion_proveedor" class="form-control"
               placeholder="Dirección" value="{{ request('Direccion_proveedor') }}">
      </div>
      <div class="col-md-3">
        <select name="Estado_proveedor" class="form-select">
          <option value="">-- Estado --</option>
          <option value="Activo" {{ request('Estado_proveedor') == 'Activo' ? 'selected' : '' }}>Activo</option>
          <option value="Inactivo" {{ request('Estado_proveedor') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
        </select>
      </div>
      <div class="col-md-3">
        <input type="text" name="Nom_usuario" class="form-control"
               placeholder="Usuario Responsable" value="{{ request('Nom_usuario') }}">
      </div>
      <div class="col-md-3">
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
          <th>Teléfono</th>
          <th>Email</th>
          <th>Dirección</th>
          <th>Estado</th>
          <th>Usuario Responsable</th>
          <th class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @forelse($proveedores as $prov)
          <tr>
            <td>{{ $prov->id_proveedor }}</td>
            <td>{{ $prov->Nom_proveedor }}</td>
            <td>{{ $prov->Tel_proveedor }}</td>
            <td>{{ $prov->Email_proveedor }}</td>
            <td>{{ $prov->Direccion_proveedor }}</td>
            <td>
              <span class="badge {{ $prov->Estado_proveedor == 'Activo' ? 'bg-success' : 'bg-danger' }}">
                {{ $prov->Estado_proveedor }}
              </span>
            </td>
            <td>{{ $prov->usuario->Nom_usuario ?? 'N/A' }}</td>
            <td class="text-center">
              <a href="{{ route('proveedor.edit', $prov->id_proveedor) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
              <form action="{{ route('proveedor.destroy', $prov->id_proveedor) }}"
                    method="POST"
                    class="d-inline"
                    onsubmit="return confirm('¿Deseas eliminar este proveedor?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">🗑️ Eliminar</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="8" class="text-center">No hay proveedores registrados.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
