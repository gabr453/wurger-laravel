@extends('layouts.app')

@section('title', 'Nuevo Cliente')

@section('content')
<div class="main-content">
    <h2 class="section-title">Nuevo Cliente</h2>

    <form action="{{ route('cliente.store') }}" method="POST">
        @csrf
        @include('cliente.form')
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('cliente.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
