@extends('layouts.app')

@section('title', 'Nuevo Cliente')

@section('content')
<div class="main-content">
    <h2 class="section-title">Nuevo Cliente</h2>

    <form action="{{ route('cliente.store') }}" method="POST">
        @csrf
        @include('cliente.form')

    </form>
</div>
@endsection
