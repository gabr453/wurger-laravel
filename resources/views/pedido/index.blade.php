@extends('layouts.app')

@section('title', 'Pedidos')

@section('content')
<div class="container">
    <h1 class="mb-4">📦 Lista de Pedidos</h1>

    <a href="{{ route('pedido.create') }}" class="btn btn-success mb-3">➕ Nuevo Pedido</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- 🔍 Filtros -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('pedido.index') }}">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="cliente" class="form-label">Cliente</label>
                        <input type="text" name="cliente" id="cliente" class="form-control" placeholder="Nombre cliente" value="{{ request('cliente') }}">
                    </div>
                    <div class="col-md-2">
                        <label for="estado" class="form-label">Estado</label>
                        <select name="estado" id="estado" class="form-select">
                            <option value="">Todos</option>
                            <option value="Pendiente" {{ request('estado') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="Entregado" {{ request('estado') == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                            <option value="Cancelado" {{ request('estado') == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
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
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary me-2">🔍 Filtrar</button>
                        <a href="{{ route('pedido.index') }}" class="btn btn-secondary">❌ Limpiar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- 📋 Tabla -->
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Observaciones</th>
                        <th>Estado</th>
                        <th>Cliente</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->id_pedido }}</td>
                            <td>{{ \Carbon\Carbon::parse($pedido->Fecha_pedido)->format('d/m/Y') }}</td>
                            <td>{{ $pedido->Observaciones_devoluciones ?? 'N/A' }}</td>
                            <td>
                                <span class="badge {{ $pedido->Estado_pedido == 'Entregado' ? 'bg-success' : ($pedido->Estado_pedido == 'Pendiente' ? 'bg-warning text-dark' : 'bg-danger') }}">
                                    {{ $pedido->Estado_pedido }}
                                </span>
                            </td>
                            <td>{{ $pedido->cliente->Nom_cliente ?? 'Sin cliente' }}</td>
                            <td>
                                <a href="{{ route('pedido.edit', $pedido->id_pedido) }}" class="btn btn-warning btn-sm">✏️ Editar</a>

                                <form action="{{ route('pedido.destroy', $pedido->id_pedido) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('¿Seguro de eliminar este pedido?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">🗑️ Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay pedidos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- 📌 Paginación -->
            <div class="d-flex justify-content-center mt-3">
                {{ $pedidos->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
