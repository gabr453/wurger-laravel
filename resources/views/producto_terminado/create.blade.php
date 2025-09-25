@extends('layouts.app')

@section('title', 'Crear Producto Terminado')

@section('content')
<div class="main-content">
    <h2 class="section-title">Nuevo Producto Terminado</h2>

    <form action="{{ route('producto_terminado.store') }}" method="POST">
        @csrf
        @include('producto_terminado.form')
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('producto_terminado.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
