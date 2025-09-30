@extends('layouts.app')

@section('title', 'Crear Pedido')

@section('content')
<div class="main-content">
    <h2 class="section-title">Nuevo Pedido</h2>

    <form action="{{ route('pedido.store') }}" method="POST">
        @csrf
        @include('pedido.form')

    </form>
</div>
@endsection
