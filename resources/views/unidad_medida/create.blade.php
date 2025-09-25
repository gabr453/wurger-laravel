@extends('layouts.app')

@section('title', 'Crear Unidad de Medida')

@section('content')
<div class="main-content">
    <h2 class="section-title">Nueva Unidad de Medida</h2>

    <form action="{{ route('unidad_medida.store') }}" method="POST">
        @csrf
        @include('unidad_medida.form')
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('unidad_medida.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
