@extends('layouts.app')

@section('title', 'Editar Promoción')

@section('content')
<h2>Editar Promoción</h2>
<form action="{{ route('promocion.update', $promocion->id_promocion) }}" method="POST">
    @csrf
    @method('PUT')
    @include('promocion.form')

</form>
@endsection
