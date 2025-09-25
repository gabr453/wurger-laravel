@extends('layouts.app')

@section('title', 'Editar Forma de Pago')

@section('content')
<div class="main-content">
    <h2 class="section-title">Editar Forma de Pago</h2>

    <form action="{{ route('forma_pago.update', $formaPago->id_fp) }}" method="POST">
        @csrf
        @method('PUT')
        @include('forma_pago.form', ['formaPago' => $formaPago])
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('forma_pago.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
