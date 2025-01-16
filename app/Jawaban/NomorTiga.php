<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorTiga
{
	public function getData()
	{
		// Tuliskan code mengambil semua data jadwal user, simpan di variabel $data
		$data = Event::where('user_id', Auth::id())->get();
		return $data;
	}

	public function getSelectedData(Request $request)
	{
		// Tuliskan code mengambil 1 data jadwal user dengan id jadwal, simpan di variabel $data
		$data = Event::find($request->id);
		return response()->json($data);

		if ($data) {
			return response()->json($data);
		}
		return response()->json(['error' => 'Data not found'], 404);
	}

	public function update(Request $request)
	{
		// Tuliskan code mengupdate 1 jadwal
		$request->validate([
			'id' => 'required|exists:events,id',
			'name' => 'required|string|max:255',
			'start' => 'required|date',
			'end' => 'required|date|after_or_equal:start',
		]);

		$event = Event::find($request->id);

		if ($event && $event->user_id == Auth::id()) {
			$event->name = $request->name;
			$event->start = $request->start;
			$event->end = $request->end;
			$event->save();

			return redirect()->route('event.home')->with('message', ['Jadwal berhasil diupdate', 'success']);
		}

		return redirect()->route('event.home')->with('message', ['Jadwal gagal diupdate', 'danger']);
	}

	public function delete(Request $request)
	{
		// Tuliskan code menghapus 1 jadwal
		$event = Event::find($request->id);

		if ($event && $event->user_id == Auth::id()) {
			$event->delete();
			return redirect()->route('event.home')->with('message', ['Jadwal berhasil dihapus', 'success']);
		}

		return redirect()->route('event.home')->with('message', ['Jadwal gagal dihapus', 'danger']);
	}
}
