@extends('layouts.app')

@section('title', 'Crear Promoción')

@section('content')
<h2>Nueva Promoción</h2>
<form action="{{ route('promocion.store') }}" method="POST">
    @csrf
    @include('promocion.form')

</form>
@endsection
