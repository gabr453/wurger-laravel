@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('content')
<div class="main-content">
    <h2 class="section-title">Editar Cliente</h2>

    <form action="{{ route('cliente.update', $cliente->id_cliente) }}" method="POST">
        @csrf
        @method('PUT')
        @include('cliente.form', ['cliente' => $cliente])
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('cliente.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
