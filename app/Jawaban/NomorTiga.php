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
		$event = Event::find($request->id);

		if ($event && $event->user_id == Auth::id()) {
			$event->name = $request->nama;
			$event->start = $request->start;
			$event->end = $request->end;
			$event->save();

			return redirect()->route('event.home')->with('message', ['Event berhasil diupdate', 'success']);
		}

		return redirect()->route('event.home')->with('message', ['Event gagal diupdate', 'danger']);
	}

	public function delete(Request $request)
	{
		// Tuliskan code menghapus 1 jadwal
		$event = Event::find($request->id);

		if ($event && $event->user_id == Auth::id()) {
			$event->delete();
			return redirect()->route('event.home')->with('message', ['Event berhasil dihapus', 'success']);
		}

		return redirect()->route('event.home')->with('message', ['Event gagal dihapus', 'danger']);
	}
}
