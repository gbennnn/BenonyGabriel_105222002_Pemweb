<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NomorSatu
{

	public function auth(Request $request)
	{
		// Tuliskan code untuk proses login dengan menggunakan email/username dan password
		$request->validate([
			'username' => 'required',
			'password' => 'required'
		]);

		$username = $request->input('username');
		$password = $request->input('password');

		if (Auth::attempt(['username' => $username, 'password' => $password])) {
			return redirect()->route('event.home')->with('message', ['Login berhasil', 'success']);
		} else {
			return redirect()->back()->with('message', ['Username atau password salah', 'danger']);
		}
	}

	public function logout()
	{

		// Tuliskan code untuk menangani proses logout
		Auth::logout();
		return redirect()->route('event.home');
	}
}
