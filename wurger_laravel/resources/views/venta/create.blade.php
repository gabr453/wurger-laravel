@extends('layouts.app')

@section('title', 'Registrar Venta')

@section('content')
<div class="main-content">
    <h2 class="section-title">Registrar Venta</h2>

    <form action="{{ route('venta.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Fecha de Venta</label>
            <input type="date" name="Fecha_venta" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Estado</label>
            <select name="Estado_venta" class="form-control" required>
                <option value="Pendiente">Pendiente</option>
                <option value="Pagada">Pagada</option>
                <option value="Anulada">Anulada</option>
            </select>
        </div>

        <div class="form-group">
            <label>Usuario</label>
            <select name="id_usuario_FK" class="form-control" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id_usuario }}">{{ $usuario->Nom_usuario }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('venta.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
