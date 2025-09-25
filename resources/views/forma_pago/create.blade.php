@extends('layouts.app')

@section('title', 'Crear Forma de Pago')

@section('content')
<div class="main-content">
    <h2 class="section-title">Nueva Forma de Pago</h2>

    <form action="{{ route('forma_pago.store') }}" method="POST">
        @csrf
        @include('forma_pago.form')
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('forma_pago.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
