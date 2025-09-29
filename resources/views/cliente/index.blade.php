@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
<h1 class="section-title">Lista de Clientes</h1>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<a href="{{ route('cliente.create') }}" class="btn btn-success">➕ Nuevo Cliente</a>

<table class="styled-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cli)
        <tr>
            <td>{{ $cli->id_cliente }}</td>
            <td>{{ $cli->Nom_cliente }}</td>
            <td>{{ $cli->Tel_cliente }}</td>
            <td>{{ $cli->Direc_cliente }}</td>
            <td>
                <a href="{{ route('cliente.edit', $cli->id_cliente) }}" class="btn btn-edit">✏️ Editar</a>
                
                <form action="{{ route('cliente.destroy', $cli->id_cliente) }}" 
                      method="POST" 
                      class="form-inline" 
                      onsubmit="return confirm('¿Desea eliminar este cliente?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete">🗑️ Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
