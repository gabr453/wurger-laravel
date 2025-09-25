@extends('layouts.app')

@section('title', 'Editar Proveedor')

@section('content')
<div class="main-content">
    <h2 class="section-title">Editar Proveedor</h2>

    <form action="{{ route('proveedor.update', $proveedor->id_proveedor) }}" method="POST">
        @csrf
        @method('PUT')
        @include('proveedor.form')
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('proveedor.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
