<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login'); // tu vista de login
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'Email_usuario' => 'required|email',
            'Password_usuario' => 'required'
        ]);

        // intentar login
        if (Auth::attempt([
            'Email_usuario' => $credentials['Email_usuario'],
            'Password_usuario' => $credentials['Password_usuario']
        ])) {
            $request->session()->regenerate();

            // redirección según rol
            if (Auth::user()->rol === 'Admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('usuario.dashboard');
            }
        }

        return back()->withErrors([
            'Email_usuario' => 'Credenciales incorrectas',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
