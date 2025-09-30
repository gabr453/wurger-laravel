@extends('layouts.app')

@section('title', 'Crear Forma de Pago')

@section('content')
<div class="main-content">
    <h2 class="section-title">Nueva Forma de Pago</h2>

    <form action="{{ route('forma_pago.store') }}" method="POST">
        @csrf
        @include('forma_pago.form')

    </form>
</div>
@endsection
