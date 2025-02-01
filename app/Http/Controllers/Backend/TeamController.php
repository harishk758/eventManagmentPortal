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
        $show =  TeamMember::all();
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
        $aadhaar_front = now()->timestamp .$randomize . '.' . $extension;
        $request->file('aadhaar_front')->move('upload_image/aadhaar_front/', $aadhaar_front);
        $data->aadhaar_front =  $aadhaar_front;
    }
    if ($request->hasFile('aadhaar_back')) {
        $randomize = rand(111111, 999999);
        $extension = $request->file('aadhaar_back')->getClientOriginalExtension();
        $aadhaar_back = now()->timestamp .$randomize . '.' . $extension;
        $request->file('aadhaar_back')->move('upload_image/aadhaar_back/', $aadhaar_back);
        $data->aadhaar_back =  $aadhaar_back;
    }
    if ($request->hasFile('pancard')) {
        $randomize = rand(111111, 999999);
        $extension = $request->file('pancard')->getClientOriginalExtension();
        $pancard = now()->timestamp .$randomize . '.' . $extension;
        $request->file('pancard')->move('upload_image/pancard/', $pancard);
        $data->pancard =  $pancard;
    }
    
    $data->save();
    return redirect()->route('team.index')->with('success', 'सदस्य सफलतापूर्वक जोड़ा गया।');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    
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
