<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorDua
{

	public function submit(Request $request)
	{
		$request->validate([
			'name' => 'required|string|max:255',
			'start' => 'required|date',
			'end' => 'required|date|after_or_equal:start',
		]);

		Event::create([
			'user_id' => Auth::id(),
			'name' => $request->name,
			'start' => $request->start,
			'end' => $request->end,
		]);

		return redirect()->route('event.home')->with('success', 'Jadwal berhasil ditambahkan.');
	}
}
