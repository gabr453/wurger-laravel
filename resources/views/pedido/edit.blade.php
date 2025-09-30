@extends('layouts.app')

@section('title', 'Editar Pedido')

@section('content')
<div class="main-content">
    <h2 class="section-title">Editar Pedido</h2>

    <form action="{{ route('pedido.update', $pedido->id_pedido) }}" method="POST">
        @csrf
        @method('PUT')
        @include('pedido.form', ['pedido' => $pedido])
 
    </form>
</div>
@endsection
