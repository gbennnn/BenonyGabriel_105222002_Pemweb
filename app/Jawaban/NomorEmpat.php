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
		$userId = Auth::id();
		$data = Event::with('user')->get()->map(function ($event) use ($userId) {
			return [
				'id' => $event->id,
				'title' => $event->name . ' - ' . $event->user->name,
				'start' => $event->start,
				'end' => $event->end,
				'color' => $event->user_id == $userId ? 'blue' : 'gray',
			];
		});

		return response()->json($data);
	}
}
