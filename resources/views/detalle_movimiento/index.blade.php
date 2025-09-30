@extends('layouts.app')

@section('title', 'Detalle de Movimientos')

@section('content')
<div class="container">
    <h1 class="mb-4">📊 Detalle de Movimientos</h1>

    <!-- Botón nuevo -->
    <a href="{{ route('detalle_movimiento.create') }}" class="btn btn-success mb-3">➕ Nuevo Detalle</a>

    <!-- Formulario de Filtros -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('detalle_movimiento.index') }}">
                <div class="row g-3">
                    <div class="col-md-2">
                        <label for="cantidad_min" class="form-label">Cantidad mínima</label>
                        <input type="number" name="cantidad_min" id="cantidad_min" class="form-control" value="{{ request('cantidad_min') }}">
                    </div>
                    <div class="col-md-2">
                        <label for="cantidad_max" class="form-label">Cantidad máxima</label>
                        <input type="number" name="cantidad_max" id="cantidad_max" class="form-control" value="{{ request('cantidad_max') }}">
                    </div>
                    <div class="col-md-2">
                        <label for="tipo_movimiento" class="form-label">Tipo</label>
                        <select name="tipo_movimiento" id="tipo_movimiento" class="form-select">
                            <option value="">Todos</option>
                            <option value="Entrada" {{ request('tipo_movimiento') == 'Entrada' ? 'selected' : '' }}>Entrada</option>
                            <option value="Salida" {{ request('tipo_movimiento') == 'Salida' ? 'selected' : '' }}>Salida</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="fecha_desde" class="form-label">Fecha desde</label>
                        <input type="date" name="fecha_desde" id="fecha_desde" class="form-control" value="{{ request('fecha_desde') }}">
                    </div>
                    <div class="col-md-2">
                        <label for="fecha_hasta" class="form-label">Fecha hasta</label>
                        <input type="date" name="fecha_hasta" id="fecha_hasta" class="form-control" value="{{ request('fecha_hasta') }}">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary me-2">🔍 Filtrar</button>
                        <a href="{{ route('detalle_movimiento.index') }}" class="btn btn-secondary">❌ Limpiar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabla -->
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Cantidad</th>
                        <th>Movimiento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($detalles as $det)
                    <tr>
                        <td>{{ $det->id_detalle_movimiento }}</td>
                        <td>{{ $det->Cantidad_detalle_movimiento }}</td>
                        <td>{{ $det->movimiento->Tipo_movimiento ?? '' }} - {{ $det->movimiento->Fecha_movimiento ?? '' }}</td>
                        <td>
                            <a href="{{ route('detalle_movimiento.edit', $det->id_detalle_movimiento) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                            <form action="{{ route('detalle_movimiento.destroy', $det->id_detalle_movimiento) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Desea eliminar este detalle?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">🗑️ Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No se encontraron resultados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Paginación -->
            <div class="d-flex justify-content-center mt-3">
                {{ $detalles->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
