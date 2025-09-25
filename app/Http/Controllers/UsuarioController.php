<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // Mostrar lista de usuarios
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuario.index', compact('usuarios'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('usuario.create');
    }

    // Guardar nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'Nom_usuario' => 'required|max:30',
            'Apellido_usuario' => 'nullable|max:30',
            'Cedula_usuario' => 'nullable|max:20|unique:usuario',
            'Email_usuario' => 'nullable|email|unique:usuario',
            'Tel_usuario' => 'nullable|max:20',
            'Salario_usuario' => 'nullable|numeric|min:0',
            'Fecha_ingreso_usuario' => 'nullable|date',
            'Fecha_nac_usuario' => 'nullable|date',
            'Sexo_usuario' => 'nullable|in:M,F,Otro',
            'Estado_usuario' => 'nullable|in:Activo,Inactivo',
            'rol' => 'nullable|in:Usuario,Admin',
            'Password_usuario' => 'required|min:6',
        ]);

        // Guardar usuario con password hasheada
        Usuario::create([
            'Nom_usuario' => $request->Nom_usuario,
            'Apellido_usuario' => $request->Apellido_usuario,
            'Cedula_usuario' => $request->Cedula_usuario,
            'Email_usuario' => $request->Email_usuario,
            'Tel_usuario' => $request->Tel_usuario,
            'Salario_usuario' => $request->Salario_usuario,
            'Fecha_ingreso_usuario' => $request->Fecha_ingreso_usuario,
            'Fecha_nac_usuario' => $request->Fecha_nac_usuario,
            'Sexo_usuario' => $request->Sexo_usuario,
            'Estado_usuario' => $request->Estado_usuario ?? 'Activo',
            'rol' => $request->rol ?? 'Usuario',
            'Password_usuario' => Hash::make($request->Password_usuario),
        ]);

        return redirect()->route('usuario.index')->with('success', 'Usuario creado correctamente.');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuario.edit', compact('usuario'));
    }

    // Actualizar usuario
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'Nom_usuario' => 'required|max:30',
            'Apellido_usuario' => 'nullable|max:30',
            'Cedula_usuario' => 'nullable|max:20|unique:usuario,Cedula_usuario,'.$usuario->id_usuario.',id_usuario',
            'Email_usuario' => 'nullable|email|unique:usuario,Email_usuario,'.$usuario->id_usuario.',id_usuario',
            'Tel_usuario' => 'nullable|max:20',
            'Salario_usuario' => 'nullable|numeric|min:0',
            'Fecha_ingreso_usuario' => 'nullable|date',
            'Fecha_nac_usuario' => 'nullable|date',
            'Sexo_usuario' => 'nullable|in:M,F,Otro',
            'Estado_usuario' => 'nullable|in:Activo,Inactivo',
            'rol' => 'nullable|in:Usuario,Admin',
            'Password_usuario' => 'nullable|min:6',
        ]);

        $usuario->Nom_usuario = $request->Nom_usuario;
        $usuario->Apellido_usuario = $request->Apellido_usuario;
        $usuario->Cedula_usuario = $request->Cedula_usuario;
        $usuario->Email_usuario = $request->Email_usuario;
        $usuario->Tel_usuario = $request->Tel_usuario;
        $usuario->Salario_usuario = $request->Salario_usuario;
        $usuario->Fecha_ingreso_usuario = $request->Fecha_ingreso_usuario;
        $usuario->Fecha_nac_usuario = $request->Fecha_nac_usuario;
        $usuario->Sexo_usuario = $request->Sexo_usuario;
        $usuario->Estado_usuario = $request->Estado_usuario ?? 'Activo';
        $usuario->rol = $request->rol ?? 'Usuario';

        // Solo actualizar la contraseña si se ingresó
        if ($request->Password_usuario) {
            $usuario->Password_usuario = Hash::make($request->Password_usuario);
        }

        $usuario->save();

        return redirect()->route('usuario.index')->with('success', 'Usuario actualizado correctamente.');
    }

    // Eliminar usuario
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuario.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
