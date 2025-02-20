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

        $events = Event::orderBy('created_at', 'desc')->get();

        return view('backend.event.index', compact('events'));
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
            'event_category' => $validatedData['event_category'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'address' => $validatedData['address'],
            'city' => $validatedData['city'],
            'country' => $validatedData['country'],
            'creator_name' => $validatedData['creator_name'],
            'creator_designation' => $validatedData['creator_designation'],
            'event_description' => $validatedData['event_description'],
        ]);

        return redirect()->route('event')->with('success', 'Event created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function edit(string $id)
    {
        $edit = Event::find($id);
        if (!$edit) {
            return redirect()->route('event')->with('error', 'Not Define events');
        }
        return view('backend.event.edit', compact('edit'));
    }


    public function update(Request $request, $id)
    {
        // dd($request->all());
        // Validate the incoming request data
        $validatedData = $request->validate([
            'event_name' => 'required|string|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
            'country' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'creator_name' => 'required|string',
            'creator_designation' => 'required|string',
            'event_description' => 'required|string',
            'event_category' => 'required|string',
        ]);

        // Find the event by its ID
        $event = Event::findOrFail($id);

        // Update the event with the validated data
        $event->update([
            'event_name' => $validatedData['event_name'],
            'event_category' => $validatedData['event_category'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'address' => $validatedData['address'],
            'city' => $validatedData['city'],
            'country' => $validatedData['country'],
            'creator_name' => $validatedData['creator_name'],
            'creator_designation' => $validatedData['creator_designation'],
            'event_description' => $validatedData['event_description'],
        ]);

        // Redirect back with a success message
        return redirect()->route('event')->with('success', 'Event updated successfully!');
    }


    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        if (!$event) {
            return redirect()->back()->with('error', 'Event not found.');
        }
        try {
            $event->delete();
            return redirect()->route('event.index')->with('success', 'Event deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the event.');
        }
    }
}
