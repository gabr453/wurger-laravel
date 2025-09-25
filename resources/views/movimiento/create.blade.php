@extends('layouts.app')

@section('title', 'Nuevo Movimiento')

@section('content')
<div class="main-content">
    <h2 class="section-title">Nuevo Movimiento</h2>

    <form action="{{ route('movimiento.store') }}" method="POST">
        @csrf
        @include('movimiento.form')
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('movimiento.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
