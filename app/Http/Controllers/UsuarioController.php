<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        $query = Usuario::query();

        // Filtros dinámicos
        if ($request->filled('nombre')) {
            $query->where('Nom_usuario', 'LIKE', '%' . $request->nombre . '%');
        }

        if ($request->filled('cedula')) {
            $query->where('Cedula_usuario', 'LIKE', '%' . $request->cedula . '%');
        }

        if ($request->filled('rol')) {
            $query->where('rol', $request->rol);
        }

        if ($request->filled('estado')) {
            $query->where('Estado_usuario', $request->estado);
        }

        // Paginación
        $usuarios = $query->orderBy('id_usuario', 'desc')->paginate(10);

        return view('usuario.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nom_usuario' => 'required|string|max:30',
            'Apellido_usuario' => 'nullable|string|max:30',
            'Cedula_usuario' => 'required|string|max:20|unique:usuario,Cedula_usuario',
            'Email_usuario' => 'required|string|email|max:50|unique:usuario,Email_usuario',
            'Password_usuario' => 'required|string|min:6',
            'rol' => 'required|in:Admin,Usuario',
            'Estado_usuario' => 'required|in:Activo,Inactivo',
        ]);

        Usuario::create([
            'Nom_usuario' => $request->Nom_usuario,
            'Apellido_usuario' => $request->Apellido_usuario,
            'Cedula_usuario' => $request->Cedula_usuario,
            'Email_usuario' => $request->Email_usuario,
            'Password_usuario' => bcrypt($request->Password_usuario),
            'rol' => $request->rol,
            'Estado_usuario' => $request->Estado_usuario,
        ]);

        return redirect()->route('usuario.index')->with('success', 'Usuario creado correctamente');
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuario.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'Nom_usuario' => 'required|string|max:30',
            'Apellido_usuario' => 'nullable|string|max:30',
            'Cedula_usuario' => 'required|string|max:20|unique:usuario,Cedula_usuario,' . $usuario->id_usuario . ',id_usuario',
            'Email_usuario' => 'required|string|email|max:50|unique:usuario,Email_usuario,' . $usuario->id_usuario . ',id_usuario',
            'rol' => 'required|in:Admin,Usuario',
            'Estado_usuario' => 'required|in:Activo,Inactivo',
        ]);

        $usuario->update([
            'Nom_usuario' => $request->Nom_usuario,
            'Apellido_usuario' => $request->Apellido_usuario,
            'Cedula_usuario' => $request->Cedula_usuario,
            'Email_usuario' => $request->Email_usuario,
            'rol' => $request->rol,
            'Estado_usuario' => $request->Estado_usuario,
        ]);

        return redirect()->route('usuario.index')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuario.index')->with('success', 'Usuario eliminado correctamente');
    }
}
