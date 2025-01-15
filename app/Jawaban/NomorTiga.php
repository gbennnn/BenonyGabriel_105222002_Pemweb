<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorTiga
{

	public function getData()
	{
		$data = Event::where('user_id', Auth::id())->get();
		return $data;
	}

	public function getSelectedData(Request $request)
	{
		$data = Event::where('id', $request->id)->where('user_id', Auth::id())->first();
		return response()->json($data);
	}

	public function update(Request $request)
	{
		$request->validate([
			'id' => 'required|exists:events,id',
			'name' => 'required|string|max:255',
			'start' => 'required|date',
			'end' => 'required|date|after_or_equal:start',
		]);

		$event = Event::where('id', $request->id)->where('user_id', Auth::id())->first();
		if ($event) {
			$event->update([
				'name' => $request->name,
				'start' => $request->start,
				'end' => $request->end,
			]);
		}

		return redirect()->route('event.home')->with('success', 'Jadwal berhasil diperbarui.');
	}

	public function delete(Request $request)
	{
		$request->validate(['id' => 'required|exists:events,id']);
		$event = Event::where('id', $request->id)->where('user_id', Auth::id())->first();

		if ($event) {
			$event->delete();
		}

		return redirect()->route('event.home')->with('success', 'Jadwal berhasil dihapus.');
	}
}
