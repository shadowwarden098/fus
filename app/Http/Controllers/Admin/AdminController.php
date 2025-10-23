<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Mostrar el formulario de login del administrador
     */
    public function showLoginForm()
    {
        return view('admin.login'); // Crea esta vista en resources/views/admin/login.blade.php
    }

    /**
     * Manejar el login del administrador
     */
    public function login(Request $request)
    {
        // Validar los datos
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Intentar login usando el guard admin
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('cuentas.index'));
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con un administrador.',
        ])->onlyInput('email');
    }

    /**
     * Logout del administrador
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
