@extends('layouts.app')

@section('title', 'Editar Movimiento')

@section('content')
<div class="main-content">
    <h2 class="section-title">Editar Movimiento</h2>

    <form action="{{ route('movimiento.update', $movimiento->id_movimiento) }}" method="POST">
        @csrf
        @method('PUT')
        @include('movimiento.form', ['movimiento' => $movimiento])

    </form>
</div>
@endsection
