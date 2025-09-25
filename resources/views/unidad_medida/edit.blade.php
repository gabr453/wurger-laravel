@extends('layouts.app')

@section('title', 'Editar Unidad de Medida')

@section('content')
<div class="main-content">
    <h2 class="section-title">Editar Unidad de Medida</h2>

    <form action="{{ route('unidad_medida.update', $unidad->id_unidad) }}" method="POST">
        @csrf
        @method('PUT')
        @include('unidad_medida.form', ['unidad' => $unidad])
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('unidad_medida.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
