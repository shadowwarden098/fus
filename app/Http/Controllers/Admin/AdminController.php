<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    /**
     * Mostrar el formulario de login del administrador
     */
    public function showLoginForm()
    {
        return view('admin.login');
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

        // 🚨 REGISTRAR INTENTO FALLIDO (para el drama)
        Log::warning('Intento de acceso no autorizado al panel de administrador', [
            'email' => $request->email,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'timestamp' => now(),
        ]);

        // Regresar con el sermón completo
        return back()
            ->withErrors([
                'email' => 'Las credenciales no coinciden con un administrador autorizado.',
            ])
            ->onlyInput('email')
            ->with('error', 'Intento de acceso no autorizado detectado y registrado');
    }

    /**
     * Logout del administrador
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
            ->with('success', 'Sesión cerrada correctamente');
    }
}