<?php

namespace App\Jawaban;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class NomorEmpat
{
	public function getJson()
	{
		$events = Event::with('user')->get();

		$data = $events->map(function ($event) {
			$categoryColors = [
				'success' => '#198754', // Hijau
				'danger' => '#dc3545', // Merah
				'warning' => '#ffc107', // Kuning
				'info' => '#0dcaf0'    // Biru Muda
			];

			$backgroundColor = $categoryColors[$event->category] ?? '#6c757d'; // Default abu-abu
			$borderColor = $backgroundColor;

			return [
				'id' => $event->id,
				'title' => $event->name . ' (' . $event->user->name . ')',
				'start' => Carbon::parse($event->start)->format('Y-m-d'),
				'end' => Carbon::parse($event->end)->addDay()->format('Y-m-d'),
				'backgroundColor' => $backgroundColor,
				'borderColor' => $borderColor,
				'textColor' => '#ffffff',
			];
		});

		return response()->json($data);
	}
}
