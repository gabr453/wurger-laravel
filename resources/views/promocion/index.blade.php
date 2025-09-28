@extends('layouts.app')

@section('title', 'Promociones')

@section('content')
<h1 class="section-title">Lista de Promociones</h1>

<a href="{{ route('promocion.create') }}" class="btn btn-add">➕ Nueva Promoción</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="styled-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Producto</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($promociones as $prom)
            <tr>
                <td>{{ $prom->id_promocion }}</td>
                <td>{{ $prom->Nombre_promocion }}</td>
                <td>{{ $prom->producto->Nombre_producto ?? 'N/A' }}</td>
                <td>{{ \Carbon\Carbon::parse($prom->Inicio_promocion)->format('d/m/Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($prom->Fin_promocion)->format('d/m/Y') }}</td>
                <td>
                    <span class="badge {{ $prom->Estado_promocion == 'Activa' ? 'badge-success' : 'badge-danger' }}">
                        {{ $prom->Estado_promocion }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('promocion.edit', $prom->id_promocion) }}" class="btn btn-edit">✏️ Editar</a>

                    <form action="{{ route('promocion.destroy', $prom->id_promocion) }}" 
                          method="POST" 
                          class="form-inline"
                          onsubmit="return confirm('¿Estás seguro de eliminar esta promoción?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-delete">🗑️ Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">No hay promociones registradas.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
