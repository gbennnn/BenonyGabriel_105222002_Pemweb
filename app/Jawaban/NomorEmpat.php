<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorEmpat
{

	public function getJson()
	{
		$data = Event::all();
		return response()->json($data);
	}
}
