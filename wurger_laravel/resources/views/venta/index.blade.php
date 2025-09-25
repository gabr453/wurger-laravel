@extends('layouts.app')

@section('title', 'Ventas')

@section('content')
<div class="main-content">
    <h2 class="section-title">Listado de Ventas</h2>
    <a href="{{ route('venta.create') }}" class="btn btn-primary">Nueva Venta</a>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ventas as $venta)
                <tr>
                    <td>{{ $venta->id_venta }}</td>
                    <td>{{ $venta->Fecha_venta }}</td>
                    <td>{{ $venta->Estado_venta }}</td>
                    <td>{{ $venta->usuario->Nom_usuario ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('venta.edit', $venta->id_venta) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('venta.destroy', $venta->id_venta) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-delete btn-sm"
                                onclick="return confirm('¿Eliminar esta venta?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">No hay ventas registradas</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
