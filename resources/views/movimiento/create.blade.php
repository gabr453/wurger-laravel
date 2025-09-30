@extends('layouts.app')

@section('title', 'Nuevo Movimiento')

@section('content')
<div class="main-content">
    <h2 class="section-title">Nuevo Movimiento</h2>

    <form action="{{ route('movimiento.store') }}" method="POST">
        @csrf
        @include('movimiento.form')

    </form>
</div>
@endsection
