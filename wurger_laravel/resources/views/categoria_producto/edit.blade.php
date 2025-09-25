@extends('layouts.app')

@section('title', 'Editar Categoría')

@section('content')
<div class="main-content">
    <h2 class="section-title">Editar Categoría</h2>

    <form action="{{ route('categoria_producto.update', $categoria->id_categoria) }}" method="POST">
        @csrf
        @method('PUT')
        @include('categoria_producto.form', ['categoria' => $categoria])
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('categoria_producto.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
