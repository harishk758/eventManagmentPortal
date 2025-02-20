<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booth;
use App\Models\Event;
use App\Models\EventTeamAssignment;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamAssignEventController extends Controller
{
    public function assignToEvent($teamMemberId)
    {

        $events = Event::all();
        $booths = Booth::all();
        $teamMember = TeamMember::findOrFail($teamMemberId);
        return view('backend.assign_team_event.add', compact('events', 'booths', 'teamMember'));
    }

    public function storeEventAssignment(Request $request)
    {
        // Validate data
        $validatedData = $request->validate([
            'member_id' => 'required|exists:team_members,id',
            'event' => 'required|exists:events,id',
            'booth' => 'required|array',
            'booth.*' => 'exists:booths,id',
            'description' => 'required',
        ]);

        // Assign team member to event
        EventTeamAssignment::create([
            'member_id' => $request->member_id,
            'event_id' => $request->event,
            'booth_id' => implode(',', $request->booth),
            'assign_team' => 1,
            'description' => $request->description,
        ]);

        return redirect()->route('team.index')->with('success', 'Team member successfully assigned to event.');
    }

    public function edit($assignment_id)
    {
        // Find the existing event team assignment by its ID
        $assignment = EventTeamAssignment::findOrFail($assignment_id);

        // Fetch all events and booths to populate the dropdowns
        $events = Event::all();
        $booths = Booth::where('event_id', $assignment->event_id)->get();

        // Return the view with the assignment, events, and booths data
        return view('backend.assign_team_event.edit', compact('assignment', 'events', 'booths'));
    }

    public function updateEventAssignment(Request $request, $assignment_id)
    {
        // Validate data
        $validatedData = $request->validate([
            'member_id' => 'required|exists:team_members,id',
            'event' => 'required|exists:events,id',
            'booth' => 'required|array',
            'booth.*' => 'exists:booths,id',
            'description' => 'required',
        ]);

        // Find the assignment record
        $assignment = EventTeamAssignment::findOrFail($assignment_id);

        // Update the assignment
        $assignment->update([
            'event_id' => $request->event,
            'booth_id' => implode(',', $request->booth), // Save booth IDs as comma-separated string
            'description' => $request->description,
        ]);

        return redirect()->route('team.index')->with('success', 'Team member assignment updated successfully.');
    }

    public function destroy($assignment_id)
    {
        
        $assignment = EventTeamAssignment::findOrFail($assignment_id);
        $assignment->delete();
        return redirect()->route('team.index')->with('success', 'Team assignment deleted successfully.');
    }
}
