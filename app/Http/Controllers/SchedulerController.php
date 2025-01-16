<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Jawaban\NomorDua;
use App\Jawaban\NomorTiga;
use App\Jawaban\NomorEmpat;
use Illuminate\Http\Request;

class SchedulerController extends Controller
{
    public function home()
    {

        $nomorTiga = new NomorTiga();
        $events = $nomorTiga->getData();

        return view('home.index', compact('events'));
    }

    public function submit(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            // 'category' => 'required|string',
        ]);

        Event::create([
            'user_id' => auth()->id(), // Ensure the user is authenticated
            'name' => $request->input('name'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
            // 'category' => $request->input('category'),
        ]);

        return redirect()->route('event.home')->with('success', 'Event created successfully.');
    }

    public function getJson()
    {

        $nomorEmpat = new NomorEmpat();
        return $nomorEmpat->getJson();
    }

    public function getSelectedData(Request $request)
    {

        $nomorTiga = new NomorTiga();
        return $nomorTiga->getSelectedData($request);
    }

    public function update(Request $request)
    {

        $nomorTiga = new NomorTiga();
        return $nomorTiga->update($request);
    }

    public function delete(Request $request)
    {

        $nomorTiga = new NomorTiga();
        return $nomorTiga->delete($request);
    }
}
