@extends('layouts.app')

@section('title', 'Editar Producto Terminado')

@section('content')
<div class="main-content">
    <h2 class="section-title">Editar Producto Terminado</h2>

    <form action="{{ route('producto_terminado.update', $producto_terminado->id_producto_terminado) }}" method="POST">
        @csrf
        @method('PUT')

        @include('producto_terminado.form', ['producto_terminado' => $producto_terminado])

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('producto_terminado.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
