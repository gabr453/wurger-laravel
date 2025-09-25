@extends('layouts.app')

@section('title', 'Crear Tipo de Descuento')

@section('content')
<div class="main-content">
    <h2 class="section-title">Nuevo Tipo de Descuento</h2>

    <form action="{{ route('tipo_descuento.store') }}" method="POST">
        @csrf
        @include('tipo_descuento.form')
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('tipo_descuento.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
