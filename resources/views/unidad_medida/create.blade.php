@extends('layouts.app')

@section('title', 'Crear Unidad de Medida')

@section('content')
<div class="main-content">
    <h2 class="section-title">Nueva Unidad de Medida</h2>

    <form action="{{ route('unidad_medida.store') }}" method="POST">
        @csrf
        @include('unidad_medida.form')

    </form>
</div>
@endsection
