@extends('layouts.app')

@section('title', 'Tipos de Descuento')

@section('content')
<div class="main-content">
    <h2 class="section-title">Tipos de Descuento</h2>
    <a href="{{ route('tipo_descuento.create') }}" class="btn btn-primary"> Nuevo Tipo de Descuento</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Forma de Pago Asociada</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tiposDescuento as $tipo)
                <tr>
                    <td>{{ $tipo->id_tipo_descuento }}</td>
                    <td>{{ $tipo->Nombre_tipo_descuento }}</td>
                    <td>{{ $tipo->formaPago->Nombre_fp ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('tipo_descuento.edit', $tipo->id_tipo_descuento) }}" class="btn btn-warning"> Editar</a>
                        <form action="{{ route('tipo_descuento.destroy', $tipo->id_tipo_descuento) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-delete"
                                onclick="return confirm('¿Seguro de eliminar este tipo de descuento?')"> Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay tipos de descuento registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
