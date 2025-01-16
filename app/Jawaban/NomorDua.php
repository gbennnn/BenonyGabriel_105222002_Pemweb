<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorDua
{

	public function submit(Request $request)
	{
		// Tuliskan code untuk menyimpan data Jadwal 

		$request->validate([
			'nama' => 'required|string|max:255',
			'start' => 'required|date',
			'end' => 'required|date|after_or_equal:start',
			'category' => 'required|string',
		]);

		$event = new Event();
		$event->user_id = Auth::id();
		$event->name = $request->nama;
		$event->start = $request->start;
		$event->end = $request->end;
		$event->category = $request->category;
		$event->save();

		if ($event->save()) {
			return redirect()->route('event.home')->with('message', ['Jadwal berhasil ditambahkan', 'success']);
		} else {
			return redirect()->route('event.home')->with('message', ['Jadwal gagal ditambahkan', 'danger']);
		}
	}
}
