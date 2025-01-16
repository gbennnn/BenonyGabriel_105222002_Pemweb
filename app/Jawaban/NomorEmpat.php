<?php

namespace App\Jawaban;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NomorEmpat
{

	public function getJson()
	{
		$userId = Auth::id(); // ID user yang sedang login
		$data = Event::all()->map(function ($event) use ($userId) {
			return [
				'id' => $event->id,
				'name' => $event->name . ' - ' . $event->user->name, // Gabungan nama jadwal dan nama user
				'start' => $event->start,
				'end' => $event->end,
				'color' => $event->user_id === $userId ? 'blue' : 'gray', // Warna berdasarkan user yang login
			];
		});

		return response()->json($data);
	}
}
