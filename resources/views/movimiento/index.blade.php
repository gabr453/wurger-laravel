@extends('layouts.app')

@section('title', 'Movimientos')

@section('content')
<div class="container mt-4">
    <h1 class="h3 mb-4">📦 Lista de Movimientos</h1>

    <!-- MENSAJES -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- FORMULARIO DE FILTRO -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('movimiento.index') }}" class="row g-3">

                <!-- Tipo -->
                <div class="col-md-3">
                    <label class="form-label">Tipo</label>
                    <select name="Tipo_movimiento" class="form-select">
                        <option value="">-- Todos --</option>
                        <option value="Entrada" {{ request('Tipo_movimiento') == 'Entrada' ? 'selected' : '' }}>Entrada</option>
                        <option value="Salida" {{ request('Tipo_movimiento') == 'Salida' ? 'selected' : '' }}>Salida</option>
                    </select>
                </div>

                <!-- Producto -->
                <div class="col-md-3">
                    <label class="form-label">Producto</label>
                    <select name="id_producto_FK" class="form-select">
                        <option value="">-- Todos --</option>
                        @foreach($productos as $prod)
                            <option value="{{ $prod->id_producto }}" {{ request('id_producto_FK') == $prod->id_producto ? 'selected' : '' }}>
                                {{ $prod->Nombre_producto }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Fecha desde -->
                <div class="col-md-2">
                    <label class="form-label">Desde</label>
                    <input type="date" name="fecha_desde" class="form-control" value="{{ request('fecha_desde') }}">
                </div>

                <!-- Fecha hasta -->
                <div class="col-md-2">
                    <label class="form-label">Hasta</label>
                    <input type="date" name="fecha_hasta" class="form-control" value="{{ request('fecha_hasta') }}">
                </div>

                <!-- Descripción -->
                <div class="col-md-2">
                    <label class="form-label">Descripción</label>
                    <input type="text" name="descripcion" class="form-control" placeholder="Buscar..." value="{{ request('descripcion') }}">
                </div>

                <!-- Botones -->
                <div class="col-md-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2">🔎 Buscar</button>
                    <a href="{{ route('movimiento.index') }}" class="btn btn-secondary">❌ Limpiar</a>
                </div>
            </form>
        </div>
    </div>

    <!-- BOTÓN CREAR -->
    <div class="mb-3 text-end">
        <a href="{{ route('movimiento.create') }}" class="btn btn-success">➕ Nuevo Movimiento</a>
    </div>

    <!-- TABLA -->
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>Cantidad</th>
                            <th>Fecha</th>
                            <th>Descripción</th>
                            <th>Producto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($movimientos as $mov)
                        <tr>
                            <td>{{ $mov->id_movimiento }}</td>
                            <td>
                                <span class="badge {{ $mov->Tipo_movimiento == 'Entrada' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $mov->Tipo_movimiento }}
                                </span>
                            </td>
                            <td>{{ $mov->Cantidad_movimiento }}</td>
                            <td>{{ \Carbon\Carbon::parse($mov->Fecha_movimiento)->format('d/m/Y') }}</td>
                            <td>{{ $mov->Descripcion_movimiento ?? '-' }}</td>
                            <td>{{ $mov->producto->Nombre_producto ?? 'Sin producto' }}</td>
                            <td class="d-flex justify-content-center gap-2">
                                <a href="{{ route('movimiento.edit', $mov->id_movimiento) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                                <form action="{{ route('movimiento.destroy', $mov->id_movimiento) }}" method="POST" onsubmit="return confirm('¿Desea eliminar este movimiento?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">🗑️ Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-muted">No hay movimientos que coincidan con los filtros.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- PAGINACIÓN -->
            <div class="d-flex justify-content-center mt-3">
                {{ $movimientos->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
