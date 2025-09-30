@extends('layouts.app')

@section('title', 'Promociones')

@section('content')
<h1 class="section-title">Lista de Promociones</h1>

<a href="{{ route('promocion.create') }}" class="btn btn-success mb-3">➕ Nueva Promoción</a>

{{-- Alertas --}}
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- Formulario de filtros --}}
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('promocion.index') }}" class="row g-3">
            <div class="col-md-3">
                <input type="text" name="nombre" value="{{ request('nombre') }}" class="form-control" placeholder="Nombre promoción">
            </div>
            <div class="col-md-3">
                <input type="text" name="producto" value="{{ request('producto') }}" class="form-control" placeholder="Producto">
            </div>
            <div class="col-md-2">
                <select name="estado" class="form-select">
                    <option value="">-- Estado --</option>
                    <option value="Activa" {{ request('estado')=='Activa' ? 'selected' : '' }}>Activa</option>
                    <option value="Inactiva" {{ request('estado')=='Inactiva' ? 'selected' : '' }}>Inactiva</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="date" name="fecha_inicio" value="{{ request('fecha_inicio') }}" class="form-control" placeholder="Desde">
            </div>
            <div class="col-md-2">
                <input type="date" name="fecha_fin" value="{{ request('fecha_fin') }}" class="form-control" placeholder="Hasta">
            </div>
            <div class="col-md-12 text-end">
                <button type="submit" class="btn btn-primary">🔍 Filtrar</button>
                <a href="{{ route('promocion.index') }}" class="btn btn-secondary">❌ Limpiar</a>
            </div>
        </form>
    </div>
</div>

{{-- Tabla --}}
<table class="table table-striped table-bordered">
    <thead class="table-dark">
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
                    <span class="badge {{ $prom->Estado_promocion == 'Activa' ? 'bg-success' : 'bg-danger' }}">
                        {{ $prom->Estado_promocion }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('promocion.edit', $prom->id_promocion) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                    <form action="{{ route('promocion.destroy', $prom->id_promocion) }}" 
                          method="POST" 
                          class="d-inline"
                          onsubmit="return confirm('¿Seguro deseas eliminar esta promoción?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">🗑️ Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">No hay promociones registradas.</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{-- Paginación --}}
<div class="d-flex justify-content-center">
    {{ $promociones->links() }}
</div>
@endsection
