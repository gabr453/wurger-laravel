@extends('layouts.app')

@section('title', 'Formas de Pago')

@section('content')
<div class="main-content">
    <h2 class="section-title">Formas de Pago</h2>

    <div class="actions">
        <a href="{{ route('forma_pago.create') }}" class="btn btn-primary"> Nueva Forma de Pago</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Venta Asociada</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($formasPago as $fp)
                <tr>
                    <td>{{ $fp->id_fp }}</td>
                    <td>{{ $fp->Nombre_fp }}</td>
                    <td>{{ $fp->venta->id_venta ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('forma_pago.edit', $fp->id_fp) }}" class="btn btn-warning"> Editar</a>
                        <form action="{{ route('forma_pago.destroy', $fp->id_fp) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-delete"
                                    onclick="return confirm('¿Estás seguro de eliminar esta forma de pago?')"> Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay formas de pago registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
