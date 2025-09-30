@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('content')
<div class="main-content">
    <h2 class="section-title">Editar Cliente</h2>

    <form action="{{ route('cliente.update', $cliente->id_cliente) }}" method="POST">
        @csrf
        @method('PUT')
        @include('cliente.form', ['cliente' => $cliente])

    </form>
</div>
@endsection
