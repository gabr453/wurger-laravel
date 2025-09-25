@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
<h2 class="section-title">Nuevo Usuario</h2>

<form action="{{ route('usuario.store') }}" method="POST">
    @csrf
    @include('usuario.form')
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('usuario.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
