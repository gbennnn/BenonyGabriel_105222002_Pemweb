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
		// $data = Event::all();
		// return response()->json($data);


		$events = Event::with('user')->get();

		$data = $events->map(function ($event) {
			return [
				'id' => $event->id,
				'title' => $event->name . ' (' . $event->user->name . ')',
				'start' => Carbon::parse($event->start)->format('Y-m-d'),
				'end' => Carbon::parse($event->end)->addDay()->format('Y-m-d'),
				'backgroundColor' => $event->user_id === Auth::id() ? '#0d6efd' : '#6c757d',
				'borderColor' => $event->user_id === Auth::id() ? '#0d6efd' : '#6c757d',
				'textColor' => '#ffffff'
			];
		});

		return response()->json($data);
	}
}
