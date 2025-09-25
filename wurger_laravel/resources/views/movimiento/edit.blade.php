@extends('layouts.app')

@section('title', 'Editar Movimiento')

@section('content')
<div class="main-content">
    <h2 class="section-title">Editar Movimiento</h2>

    <form action="{{ route('movimiento.update', $movimiento->id_movimiento) }}" method="POST">
        @csrf
        @method('PUT')
        @include('movimiento.form', ['movimiento' => $movimiento])
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('movimiento.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
