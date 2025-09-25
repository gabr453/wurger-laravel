@extends('layouts.app')

@section('title', 'Editar Promoción')

@section('content')
<h2>Editar Promoción</h2>
<form action="{{ route('promocion.update', $promocion->id_promocion) }}" method="POST">
    @csrf
    @method('PUT')
    @include('promocion.form')
    <button type="submit" class="btn btn-success">Actualizar</button>
    <a href="{{ route('promocion.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
