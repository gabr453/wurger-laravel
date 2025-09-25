@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<h2 class="section-title">Editar Usuario</h2>

<form action="{{ route('usuario.update', $usuario->id_usuario) }}" method="POST">
    @csrf
    @method('PUT')
    @include('usuario.form', ['usuario' => $usuario])
    <button type="submit" class="btn btn-success">Actualizar</button>
    <a href="{{ route('usuario.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
