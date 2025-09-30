@extends('layouts.app')

@section('title', 'Editar Detalle de Movimiento')

@section('content')
<div class="main-content">
    <h2 class="section-title">Editar Detalle</h2>

    <form action="{{ route('detalle_movimiento.update', $detalle->id_detalle_movimiento) }}" method="POST">
        @csrf
        @method('PUT')
        @include('detalle_movimiento.form', ['detalle' => $detalle])

    </form>
</div>
@endsection
