@extends('layouts.app')

@section('title', 'Unidades de Medida')

@section('content')
<div class="container mt-4">

    <h1 class="mb-4">Lista de Unidades de Medida</h1>

    <!-- ALERTAS -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('unidad_medida.create') }}" class="btn btn-success mb-3">➕ Nueva Unidad</a>

    <!-- FILTROS -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <form method="GET" action="{{ route('unidad_medida.index') }}">
                <div class="row g-3">
                    <div class="col-md-3">
                        <input type="text" 
                               name="nombre" 
                               class="form-control" 
                               placeholder="Buscar por nombre"
                               value="{{ request('nombre') }}">
                    </div>
                    <div class="col-md-2">
                        <input type="number" 
                               name="cantidad_min" 
                               class="form-control" 
                               placeholder="Cantidad mínima"
                               value="{{ request('cantidad_min') }}">
                    </div>
                    <div class="col-md-2">
                        <input type="number" 
                               name="cantidad_max" 
                               class="form-control" 
                               placeholder="Cantidad máxima"
                               value="{{ request('cantidad_max') }}">
                    </div>
                    <div class="col-md-3">
                        <select name="producto" class="form-select">
                            <option value="">-- Producto --</option>
                            @foreach($productos as $prod)
                                <option value="{{ $prod->id_producto }}" 
                                    {{ request('producto') == $prod->id_producto ? 'selected' : '' }}>
                                    {{ $prod->Nombre_producto }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 d-grid gap-2">
                        <button type="submit" class="btn btn-primary">🔍 Filtrar</button>
                        <a href="{{ route('unidad_medida.index') }}" class="btn btn-secondary">❌ Limpiar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- TABLA -->
    <table class="table table-hover table-bordered shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Producto</th>
                <th style="width: 200px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($unidades as $unidad)
                <tr>
                    <td>{{ $unidad->id_unidad }}</td>
                    <td>{{ $unidad->Nombre_unidad }}</td>
                    <td>{{ $unidad->Cantidad_unidad }}</td>
                    <td>{{ $unidad->producto->Nombre_producto ?? 'Sin producto' }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('unidad_medida.edit', $unidad->id_unidad) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
                        <form action="{{ route('unidad_medida.destroy', $unidad->id_unidad) }}" 
                              method="POST" 
                              onsubmit="return confirm('¿Estás seguro de eliminar esta unidad?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">🗑️ Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No se encontraron unidades</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
