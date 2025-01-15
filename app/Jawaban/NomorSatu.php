<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NomorSatu
{

	public function auth(Request $request)
	{
		// Validasi input
		$request->validate([
			'email' => 'required|email',
			'password' => 'required|min:6',
		]);

		// Ambil kredensial dari request
		$credentials = $request->only('email', 'password');

		// Autentikasi user
		if (Auth::attempt($credentials)) {
			$request->session()->regenerate();
			return redirect()->route('event.home')->with('success', 'Login berhasil!');
		}

		// Jika login gagal
		return back()->withErrors([
			'email' => 'Email atau password salah.',
		]);
	}

	public function logout(Request $request)
	{
		Auth::logout();

		// Hapus session
		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect()->route('event.home')->with('success', 'Logout berhasil!');
	}
}
