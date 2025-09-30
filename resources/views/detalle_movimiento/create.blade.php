@extends('layouts.app')

@section('title', 'Nuevo Detalle de Movimiento')

@section('content')
<div class="main-content">
    <h2 class="section-title">Nuevo Detalle</h2>

    <form action="{{ route('detalle_movimiento.store') }}" method="POST">
        @csrf
        @include('detalle_movimiento.form')
      
    </form>
</div>
@endsection
