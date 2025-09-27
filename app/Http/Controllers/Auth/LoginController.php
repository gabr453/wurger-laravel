<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // ✅ Validación del formulario
        $request->validate([
            'Email_usuario' => 'required|email',
            'Password_usuario' => 'required',
        ]);

        // ✅ Buscar usuario por correo
        $usuario = Usuario::where('Email_usuario', $request->Email_usuario)->first();

        if (!$usuario) {
            return back()->withErrors([
                'Email_usuario' => 'No existe un usuario con ese correo.'
            ]);
        }

        // ✅ Verificar contraseña
        if (!Hash::check($request->Password_usuario, $usuario->Password_usuario)) {
            return back()->withErrors([
                'Password_usuario' => 'La contraseña no coincide.'
            ]);
        }

        // ✅ Guardar en sesión
        session(['usuario' => $usuario]);

        // ✅ Redirigir según rol
        if ($usuario->rol === 'Admin') {
            return redirect()->route('dashboard'); // Asegúrate que exista esta ruta
        } else {
            return redirect()->route('dashboard_cliente'); // Y esta también
        }
    }

    public function logout()
    {
        session()->forget('usuario');
        return redirect()->route('login');
    }
}
