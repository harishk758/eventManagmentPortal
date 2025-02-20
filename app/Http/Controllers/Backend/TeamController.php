<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamMember;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $show = TeamMember::leftJoin('event_team_assignments', function ($join) {
            $join->on('team_members.id', '=', 'event_team_assignments.member_id')
                ->whereNull('event_team_assignments.deleted_at'); // Exclude soft deleted assignments
        })
            ->select('team_members.*', 'event_team_assignments.id as assignEventId', 'event_team_assignments.event_id')
            ->get();
        // dd($show);
        return view('backend.team.index', compact('show'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'member_name' => 'required|max:20',
            'designation' => 'required',
            'email' => 'required|email',
            'contact_number' => 'required|digits_between:10,15',
            'aadhaar_front' => 'required|image|max:2048',
            'aadhaar_back' => 'required|image|max:2048',
            'pancard' => 'required|image|max:2048',
        ]);

        $data = new TeamMember();
        $data->member_name = $validatedData['member_name'];
        $data->designation = $validatedData['designation'];
        $data->email = $validatedData['email'];
        $data->contact_number = $validatedData['contact_number'];

        if ($request->hasFile('aadhaar_front')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('aadhaar_front')->getClientOriginalExtension();
            $aadhaar_front = now()->timestamp . $randomize . '.' . $extension;
            $request->file('aadhaar_front')->move('upload_image/aadhaar_front/', $aadhaar_front);
            $data->aadhaar_front =  $aadhaar_front;
        }
        if ($request->hasFile('aadhaar_back')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('aadhaar_back')->getClientOriginalExtension();
            $aadhaar_back = now()->timestamp . $randomize . '.' . $extension;
            $request->file('aadhaar_back')->move('upload_image/aadhaar_back/', $aadhaar_back);
            $data->aadhaar_back =  $aadhaar_back;
        }
        if ($request->hasFile('pancard')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('pancard')->getClientOriginalExtension();
            $pancard = now()->timestamp . $randomize . '.' . $extension;
            $request->file('pancard')->move('upload_image/pancard/', $pancard);
            $data->pancard =  $pancard;
        }
        $data->save();
        return redirect()->route('team.index')->with('success', 'Success Full Data Submit');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teamMember = TeamMember::findOrFail($id);

        if ($teamMember) {
            return view('backend.team.edit', compact('teamMember'));
        } else {
            return redirect()->route('event');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'member_name' => 'required',
            'designation' => 'required',
            'contact_number' => 'required|digits_between:10,15',
            'aadhaar_front' => 'image|max:2048',
            'aadhaar_back' => 'image|max:2048',
            'pancard' => 'image|max:2048',
        ]);

        // Find the team member to update
        $data = TeamMember::findOrFail($id);
        $data->member_name = $validatedData['member_name'];
        $data->designation = $validatedData['designation'];
        $data->contact_number = $validatedData['contact_number'];

        if ($request->hasFile('aadhaar_front')) {
            // Delete the old file if exists
            if ($data->aadhaar_front) {
                unlink('upload_image/aadhaar_front/' . $data->aadhaar_front);
            }

            $randomize = rand(111111, 999999);
            $extension = $request->file('aadhaar_front')->getClientOriginalExtension();
            $aadhaar_front = now()->timestamp . $randomize . '.' . $extension;
            $request->file('aadhaar_front')->move('upload_image/aadhaar_front/', $aadhaar_front);
            $data->aadhaar_front = $aadhaar_front;
        }

        if ($request->hasFile('aadhaar_back')) {
            if ($data->aadhaar_back) {
                unlink('upload_image/aadhaar_back/' . $data->aadhaar_back);
            }

            $randomize = rand(111111, 999999);
            $extension = $request->file('aadhaar_back')->getClientOriginalExtension();
            $aadhaar_back = now()->timestamp . $randomize . '.' . $extension;
            $request->file('aadhaar_back')->move('upload_image/aadhaar_back/', $aadhaar_back);
            $data->aadhaar_back = $aadhaar_back;
        }

        if ($request->hasFile('pancard')) {
            if ($data->pancard) {
                unlink('upload_image/pancard/' . $data->pancard);
            }

            $randomize = rand(111111, 999999);
            $extension = $request->file('pancard')->getClientOriginalExtension();
            $pancard = now()->timestamp . $randomize . '.' . $extension;
            $request->file('pancard')->move('upload_image/pancard/', $pancard);
            $data->pancard = $pancard;
        }

        // Save the updated data
        $data->save();

        return redirect()->route('team.index')->with('success', 'Team member updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $team = TeamMember::find($id);
        if (!$team) {
            return redirect()->back()->with('error', 'Event not found.');
        }
        try {
            $team->delete();
            return redirect()->route('team.index')->with('success', 'Team deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the event.');
        }
    }
}
