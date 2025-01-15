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
			'email' => 'required',
			'password' => 'required'
		]);

		$email = $request->input('email');
		$password = $request->input('password');

		if (Auth::attempt(['email' => $email, 'password' => $password])) {
			return redirect()->route('event.home')->with('message', ['Login berhasil', 'success']);
		} else {
			return redirect()->back()->with('message', ['email atau password salah', 'danger']);
		}
	}

	public function logout()
	{

		// Tuliskan code untuk menangani proses logout
		Auth::logout();
		return redirect()->route('welcome');
	}
}
