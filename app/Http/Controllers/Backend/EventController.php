<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('backend.event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'event_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'country' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'creator_name' => 'required|string',
            'creator_designation' => 'required|string',
            'event_description' => 'required|string',
            'event_category' => 'required|string',
        ]);

        Event::create([
            'event_name' => $validatedData['event_name'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'country' => $validatedData['country'],
            'address' => $validatedData['address'],
            'city' => $validatedData['city'],
            'creator_name' => $validatedData['creator_name'],
            'creator_designation' => $validatedData['creator_designation'],
            'event_description' => $validatedData['event_description'],
            'event_category' => $validatedData['event_category']
        ]);

        return redirect()->route('event')->with('success', 'Event created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
