@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
<h1>Lista de Usuarios</h1>

<a href="{{ route('usuario.create') }}" class="btn">Nuevo Usuario</a>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cédula</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->id_usuario }}</td>
            <td>{{ $usuario->Nom_usuario }}</td>
            <td>{{ $usuario->Apellido_usuario }}</td>
            <td>{{ $usuario->Cedula_usuario }}</td>
            <td>{{ $usuario->Email_usuario }}</td>
            <td>{{ $usuario->rol }}</td>
            <td>{{ $usuario->Estado_usuario }}</td>
            <td>
                <a href="{{ route('usuario.edit', $usuario->id_usuario) }}" class="btn">Editar</a>
                <form action="{{ route('usuario.destroy', $usuario->id_usuario) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
