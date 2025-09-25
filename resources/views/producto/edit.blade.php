@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
<div class="main-content">
    <h2 class="section-title">Editar Producto</h2>

    <form action="{{ route('producto.update', $producto->id_producto) }}" method="POST">
        @csrf
        @method('PUT')
        @include('producto.form', ['producto' => $producto])
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('producto.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
