@extends('layouts.app')

@section('title', 'Crear Promoción')

@section('content')
<h2>Nueva Promoción</h2>
<form action="{{ route('promocion.store') }}" method="POST">
    @csrf
    @include('promocion.form')
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('promocion.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
