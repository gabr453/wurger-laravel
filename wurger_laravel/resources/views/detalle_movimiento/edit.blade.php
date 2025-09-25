@extends('layouts.app')

@section('title', 'Editar Detalle de Movimiento')

@section('content')
<div class="main-content">
    <h2 class="section-title">Editar Detalle</h2>

    <form action="{{ route('detalle_movimiento.update', $detalle->id_detalle_movimiento) }}" method="POST">
        @csrf
        @method('PUT')
        @include('detalle_movimiento.form', ['detalle' => $detalle])
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('detalle_movimiento.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
