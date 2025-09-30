@extends('layouts.app')

@section('title', 'Crear Tipo de Descuento')

@section('content')
<div class="main-content">
    <h2 class="section-title">Nuevo Tipo de Descuento</h2>

    <form action="{{ route('tipo_descuento.store') }}" method="POST">
        @csrf
        @include('tipo_descuento.form')

    </form>
</div>
@endsection
