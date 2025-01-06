<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index'); // Pastikan file view 'login.blade.php' ada di folder resources/views
    }
    public function proses(Request $request)
{
    // Validasi hanya untuk memeriksa format input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ], [
        'email.required' => 'Email tidak boleh kosong',
        'email.email' => 'Format email salah',
        'password.required' => 'Isi password anda',
    ]);

    // Coba autentikasi dengan input yang sudah divalidasi
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect()->route('home');
    }
    
    return back()->withErrors([
        'email' => 'Ada kesalahan pada email atau password.',
    ])->onlyInput('email');
}
}
