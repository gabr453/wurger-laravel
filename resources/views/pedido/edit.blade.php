@extends('layouts.app')

@section('title', 'Editar Pedido')

@section('content')
<div class="main-content">
    <h2 class="section-title">Editar Pedido</h2>

    <form action="{{ route('pedido.update', $pedido->id_pedido) }}" method="POST">
        @csrf
        @method('PUT')
        @include('pedido.form', ['pedido' => $pedido])
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('pedido.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
