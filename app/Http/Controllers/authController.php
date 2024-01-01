<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class authController extends Controller
{
  public function showRegistrationForm()
  {
    return view('auth.register');
  }

  public function postregister(Request $request)
  {
    // Validasi input
    $request->validate([
      'name' => 'required|string|max:255',
      'username' => 'required|string|max:255',
      'password' => 'required|string|min:8'
    ]);

    // Buat pengguna baru
    $user = User::create([
      'name' => $request->name,
      'username' => $request->username,
      'password' => bcrypt($request->password)
    ]);

    return redirect('/register')->with('success', 'Registrasi berhasil! Silakan login.');
  }

  public function showLoginForm()
  {
    return view('auth.login');
  }

  public function postlogin(Request $request)
  {
    // Validasi input
    $request->validate([
      'username' => 'required|string',
      'password' => 'required|string',
    ]);
    // Proses login
    $credentials = $request->only('username', 'password');
    if (Auth::attempt($credentials)) {
      // Jika login berhasil, redirect ke halaman dashboard atau halaman lain yang diinginkan
      return redirect('/dashboard');
    }

    // Jika login gagal, kembalikan ke halaman login dengan pesan error
    return redirect('/login')->with('error', 'Username atau password salah');
  }
  public function logout(){
    Auth::logout();
    return redirect('login');
}
}
