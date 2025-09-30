@extends('layouts.app')

@section('title', 'Nuevo Detalle de Venta')

@section('content')
<div class="main-content">
    <h2 class="section-title">Nuevo Detalle de Venta</h2>

    <form action="{{ route('detalle_venta.store') }}" method="POST">
        @csrf
        @include('detalle_venta.form')

    </form>
</div>
@endsection
