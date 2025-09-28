@extends('layouts.app')

@section('title', 'Proveedores')

@section('content')
<h1 class="section-title">Lista de Proveedores</h1>

<a href="{{ route('proveedor.create') }}" class="btn btn-add">➕ Nuevo Proveedor</a>

<table class="styled-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Dirección</th>
            <th>Estado</th>
            <th>Usuario Responsable</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($proveedores as $prov)
        <tr>
            <td>{{ $prov->id_proveedor }}</td>
            <td>{{ $prov->Nom_proveedor }}</td>
            <td>{{ $prov->Tel_proveedor }}</td>
            <td>{{ $prov->Email_proveedor }}</td>
            <td>{{ $prov->Direccion_proveedor }}</td>
            <td>{{ $prov->Estado_proveedor }}</td>
            <td>{{ $prov->usuario->Nom_usuario ?? 'N/A' }}</td>
            <td>
                <a href="{{ route('proveedor.edit', $prov->id_proveedor) }}" class="btn btn-edit">✏️ Editar</a>
                <form action="{{ route('proveedor.destroy', $prov->id_proveedor) }}" 
                      method="POST" 
                      class="form-inline"
                      onsubmit="return confirm('¿Deseas eliminar este proveedor?');">
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
