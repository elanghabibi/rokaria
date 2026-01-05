<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function loginForm() {
        return view('auth.login');
    }

    public function login (Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home')->with('success', 'Masuk berhasil!');
        };

        return back()->withErrors([
            'email' => 'Email atau password salah!'
        ])->onlyInput('email');
    }

    public function registerForm() {
        return view('auth.register');
    }

    public function register (Request $request) {
        $validated = $request->validate([
            'username' => 'required|min:6|max:50',
            'name' => 'required|min:6|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $validated['role'] = 'user';
        User::create($validated);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silahkan Masuk');
    }

    public function logout (Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }   
}
