@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
<h1 class="section-title">Lista de Usuarios</h1>

<a href="{{ route('usuario.create') }}" class="btn btn-add">➕ Nuevo Usuario</a>

{{-- Formulario de filtros --}}
<form method="GET" action="{{ route('usuario.index') }}" class="mb-3">
    <div class="row">
        <div class="col">
            <input type="text" name="nombre" value="{{ request('nombre') }}" class="form-control"
                   placeholder="Buscar por nombre">
        </div>
        <div class="col">
            <input type="text" name="cedula" value="{{ request('cedula') }}" class="form-control"
                   placeholder="Buscar por cédula">
        </div>
        <div class="col">
            <select name="rol" class="form-control">
                <option value="">-- Rol --</option>
                <option value="Admin" {{ request('rol') == 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="Usuario" {{ request('rol') == 'Usuario' ? 'selected' : '' }}>Usuario</option>
            </select>
        </div>
        <div class="col">
            <select name="estado" class="form-control">
                <option value="">-- Estado --</option>
                <option value="Activo" {{ request('estado') == 'Activo' ? 'selected' : '' }}>Activo</option>
                <option value="Inactivo" {{ request('estado') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary">🔍 Filtrar</button>
            <a href="{{ route('usuario.index') }}" class="btn btn-secondary">❌ Limpiar</a>
        </div>
    </div>
</form>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="styled-table">
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
        @forelse($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id_usuario }}</td>
                <td>{{ $usuario->Nom_usuario }}</td>
                <td>{{ $usuario->Apellido_usuario }}</td>
                <td>{{ $usuario->Cedula_usuario }}</td>
                <td>{{ $usuario->Email_usuario }}</td>
                <td>{{ $usuario->rol ?? 'N/A' }}</td>
                <td>
                    <span class="badge {{ $usuario->Estado_usuario == 'Activo' ? 'badge-success' : 'badge-danger' }}">
                        {{ $usuario->Estado_usuario }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('usuario.edit', $usuario->id_usuario) }}" class="btn btn-edit">✏️ Editar</a>
                    <form action="{{ route('usuario.destroy', $usuario->id_usuario) }}" 
                          method="POST" 
                          class="form-inline"
                          onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-delete">🗑️ Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8">No hay usuarios registrados.</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{-- Paginación con filtros --}}
<div class="mt-3">
    {{ $usuarios->appends(request()->query())->links() }}
</div>
@endsection
