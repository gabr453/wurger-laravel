@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<div class="container mt-4">

    <h1 class="mb-4">Lista de Productos</h1>

    <!-- ALERTAS -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('producto.create') }}" class="btn btn-success mb-3">➕ Nuevo Producto</a>

    <!-- FILTROS -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <form method="GET" action="{{ route('producto.index') }}">
                <div class="row g-3">
                    <div class="col-md-3">
                        <input type="text" 
                               name="nombre" 
                               class="form-control" 
                               placeholder="Buscar por nombre"
                               value="{{ request('nombre') }}">
                    </div>
                    <div class="col-md-2">
                        <select name="estado" class="form-select">
                            <option value="">-- Estado --</option>
                            <option value="Activo" {{ request('estado')=='Activo' ? 'selected' : '' }}>Activo</option>
                            <option value="Inactivo" {{ request('estado')=='Inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="categoria" class="form-select">
                            <option value="">-- Categoría --</option>
                            @foreach($categorias as $cat)
                                <option value="{{ $cat->id_categoria }}" 
                                    {{ request('categoria')==$cat->id_categoria ? 'selected' : '' }}>
                                    {{ $cat->Nombre_categoria }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="stock_min" class="form-control" 
                               placeholder="Stock mínimo" value="{{ request('stock_min') }}">
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="stock_max" class="form-control" 
                               placeholder="Stock máximo" value="{{ request('stock_max') }}">
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="precio_min" class="form-control" 
                               placeholder="Precio mínimo" value="{{ request('precio_min') }}">
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="precio_max" class="form-control" 
                               placeholder="Precio máximo" value="{{ request('precio_max') }}">
                    </div>
                    <div class="col-md-2 d-grid gap-2">
                        <button type="submit" class="btn btn-primary">🔍 Filtrar</button>
                        <a href="{{ route('producto.index') }}" class="btn btn-secondary">❌ Limpiar</a>
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
                <th>Stock</th>
                <th>Stock Mínimo</th>
                <th>Stock Máximo</th>
                <th>Precio Venta</th>
                <th>Estado</th>
                <th>Categoría</th>
                <th style="width: 200px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($productos as $producto)
                <tr>
                    <td>{{ $producto->id_producto }}</td>
                    <td>{{ $producto->Nombre_producto }}</td>
                    <td>{{ $producto->Stock_producto }}</td>
                    <td>{{ $producto->Stock_min_producto }}</td>
                    <td>{{ $producto->Stock_max_producto }}</td>
                    <td>{{ $producto->Precio_venta }}</td>
                    <td>{{ $producto->Estado_producto }}</td>
                    <td>{{ $producto->categoria->Nombre_categoria ?? 'Sin categoría' }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('producto.edit', $producto->id_producto) }}" class="btn btn-sm btn-warning">✏️ Editar</a>

                        <form action="{{ route('producto.destroy', $producto->id_producto) }}" 
                              method="POST" 
                              onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">🗑️ Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">No se encontraron productos</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
