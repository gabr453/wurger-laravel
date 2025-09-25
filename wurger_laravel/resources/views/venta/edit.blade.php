@extends('layouts.app')

@section('title', 'Editar Venta')

@section('content')
<div class="main-content">
    <h2 class="section-title">Editar Venta</h2>

    <form action="{{ route('venta.update', $venta->id_venta) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group">
            <label>Fecha de Venta</label>
            <input type="date" name="Fecha_venta" value="{{ $venta->Fecha_venta }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Estado</label>
            <select name="Estado_venta" class="form-control" required>
                <option value="Pendiente" {{ $venta->Estado_venta == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="Pagada" {{ $venta->Estado_venta == 'Pagada' ? 'selected' : '' }}>Pagada</option>
                <option value="Anulada" {{ $venta->Estado_venta == 'Anulada' ? 'selected' : '' }}>Anulada</option>
            </select>
        </div>

        <div class="form-group">
            <label>Usuario</label>
            <select name="id_usuario_FK" class="form-control" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id_usuario }}" {{ $venta->id_usuario_FK == $usuario->id_usuario ? 'selected' : '' }}>
                        {{ $usuario->Nom_usuario }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('venta.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
