<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validar datos
        $request->validate([
            'Nom_usuario' => 'required|string|max:30',
            'Apellido_usuario' => 'nullable|string|max:30',
            'Email_usuario' => 'required|email|unique:usuario,Email_usuario',
            'Password_usuario' => 'required|min:6|confirmed', // confirmado -> necesita campo password_confirmation
        ]);

        // Crear usuario siempre como "Usuario"
        $usuario = Usuario::create([
            'Nom_usuario'       => $request->Nom_usuario,
            'Apellido_usuario'  => $request->Apellido_usuario,
            'Email_usuario'     => $request->Email_usuario,
            'Password_usuario'  => Hash::make($request->Password_usuario),
            'rol'               => 'Usuario', // 👈 todos se registran como usuario
        ]);

        // Guardar en sesión y redirigir
        session(['usuario' => $usuario]);

        return redirect()->route('dashboard_cliente')->with('success', 'Registro exitoso, bienvenido!');
    }
}
