@extends('layouts.app')

@section('title', 'Nuevo Detalle de Movimiento')

@section('content')
<div class="main-content">
    <h2 class="section-title">Nuevo Detalle</h2>

    <form action="{{ route('detalle_movimiento.store') }}" method="POST">
        @csrf
        @include('detalle_movimiento.form')
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('detalle_movimiento.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
