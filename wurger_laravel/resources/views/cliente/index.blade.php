@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
<h1>Lista de Clientes</h1>

<a href="{{ route('cliente.create') }}" class="btn btn-success">Nuevo Cliente</a>

<table border="1" cellpadding="8" cellspacing="0">
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
                <a href="{{ route('cliente.edit', $cli->id_cliente) }}" class="btn btn-edit">Editar</a>
                <form action="{{ route('cliente.destroy', $cli->id_cliente) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Desea eliminar este cliente?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
