@extends('layouts.app')

@section('title', 'Crear Proveedor')

@section('content')
<div class="main-content">
    <h2 class="section-title">Nuevo Proveedor</h2>

    <form action="{{ route('proveedor.store') }}" method="POST">
        @csrf
        @include('proveedor.form')
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('proveedor.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
