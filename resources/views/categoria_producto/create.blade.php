@extends('layouts.app')

@section('title', 'Crear Categoría')

@section('content')
<div class="main-content">
    <h2 class="section-title">Nueva Categoría</h2>

    <form action="{{ route('categoria_producto.store') }}" method="POST">
        @csrf
        @include('categoria_producto.form')
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('categoria_producto.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
