@extends('layouts.app')

@section('title', 'Crear Producto')

@section('content')
<div class="main-content">
    <h2 class="section-title">Nuevo Producto</h2>

    <form action="{{ route('producto.store') }}" method="POST">
        @csrf
        @include('producto.form')
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('producto.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
