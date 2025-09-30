@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
<div class="container mt-4">

    <h1 class="mb-4">Lista de Categorías</h1>

    <!-- Mensajes de alerta -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Botón Crear -->
    <a href="{{ route('categoria_producto.create') }}" class="btn btn-success mb-3">
        ➕ Nueva Categoría
    </a>

    <!-- Formulario de filtros -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <form method="GET" action="{{ route('categoria_producto.index') }}">
                <div class="row g-3">
                    <div class="col-md-4">
                        <input type="text" 
                               name="nombre" 
                               class="form-control" 
                               placeholder="Buscar por nombre"
                               value="{{ request('nombre') }}">
                    </div>
                    <div class="col-md-3">
                        <input type="number" 
                               name="cantidad_min" 
                               class="form-control" 
                               placeholder="Cantidad mínima"
                               value="{{ request('cantidad_min') }}">
                    </div>
                    <div class="col-md-3">
                        <input type="number" 
                               name="cantidad_max" 
                               class="form-control" 
                               placeholder="Cantidad máxima"
                               value="{{ request('cantidad_max') }}">
                    </div>
                    <div class="col-md-2 d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            🔍 Filtrar
                        </button>
                        <a href="{{ route('categoria_producto.index') }}" class="btn btn-secondary">
                            ❌ Limpiar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabla -->
    <table class="table table-hover table-bordered shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th style="width: 200px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id_categoria }}</td>
                    <td>{{ $categoria->Nombre_categoria }}</td>
                    <td>{{ $categoria->cantidad_categoria }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('categoria_producto.edit', $categoria->id_categoria) }}" 
                           class="btn btn-sm btn-warning">✏️ Editar</a>

                        <form action="{{ route('categoria_producto.destroy', $categoria->id_categoria) }}" 
                              method="POST" 
                              onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">🗑️ Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No se encontraron categorías</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
