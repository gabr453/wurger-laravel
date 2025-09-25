@extends('layouts.app')

@section('title', 'Editar Detalle de Venta')

@section('content')
<div class="main-content">
    <h2 class="section-title">Editar Detalle de Venta</h2>

    <form action="{{ route('detalle_venta.update', $detalle->id_detalle_venta) }}" method="POST">
        @csrf @method('PUT')
        @include('detalle_venta.form')
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('detalle_venta.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
