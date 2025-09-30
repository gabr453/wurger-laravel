@extends('layouts.app')

@section('title', 'Editar Tipo de Descuento')

@section('content')
<div class="main-content">
    <h2 class="section-title">Editar Tipo de Descuento</h2>

    <form action="{{ route('tipo_descuento.update', $tipoDescuento->id_tipo_descuento) }}" method="POST">
        @csrf
        @method('PUT')
        @include('tipo_descuento.form', ['tipoDescuento' => $tipoDescuento])

    </form>
</div>
@endsection
