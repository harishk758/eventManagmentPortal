<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
// use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Booth;
use App\Models\Event;
use App\Models\Vendor;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BoothController extends Controller
{ 
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.booth.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = Event::all();
        return view('backend.booth.create', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     */

    
//      public function store(Request $request)
// {
//     $validatedData = $request->validate([
//         'booths' => 'required|array',
//         'booths.*.event_id' => 'required|exists:events,id',
//         'booths.*.booth_size' => 'required|numeric|max:255',
//         'booths.*.booth_area' => 'required|numeric',
//         'booths.*.booth_cost' => 'required|numeric',
//         'booths.*.booth_supervisor' => 'required|string|max:255',
//         'booths.*.booth_requirements' => 'nullable|string',
//         'booths.*.vendor.vendor_name' => 'required|string|max:255',
//         'booths.*.vendor.vendor_company' => 'required|string',
//         'booths.*.vendor.country_id' => 'required|integer|exists:countries,id',
//         'booths.*.vendor.vendor_email' => 'required|email|max:255',
//         'booths.*.vendor.vendor_address' => 'required|string|max:255',
//         'booths.*.vendor.vendor_city' => 'required|string|max:255',
//         'booths.*.vendor.vendor_description' => 'nullable|string',
//     ]);

//     DB::beginTransaction();

//     try {
//         foreach ($validatedData['booths'] as $boothData) {
//             $booth = new Booth();
//             $booth->event_id = $boothData['event_id'];
//             $booth->booth_size = $boothData['booth_size'];
//             $booth->booth_area = $boothData['booth_area'];
//             $booth->booth_cost = $boothData['booth_cost'];
//             $booth->booth_supervisor = $boothData['booth_supervisor'];
//             $booth->booth_requirements = $boothData['booth_requirements'] ?? null;
//             $booth->save();

//             $vendorData = $boothData['vendor'];
//             $vendor = new Vendor();
//             $vendor->booth_id = $booth->id;
//             $vendor->vendor_name = $vendorData['vendor_name'];
//             $vendor->vendor_company = $vendorData['vendor_company'];
//             $vendor->country_id = $vendorData['country_id'];
//             $vendor->vendor_email = $vendorData['vendor_email'];
//             $vendor->vendor_address = $vendorData['vendor_address'];
//             $vendor->vendor_city = $vendorData['vendor_city'];
//             $vendor->vendor_description = $vendorData['vendor_description'] ?? null;
//             $vendor->save();
//         }

//         DB::commit();

//         return redirect()->route('add_booth')->with('success', 'Booth details have been successfully stored.');
//     } catch (\Exception $e) {
//         DB::rollback();
//         return back()->with('error', $e->getMessage());
//     }
// }


    //  old code 
    public function store(Request $request)
    {
        // Validate the incoming data
        // dd($request->all());
        // $request->validate([
        //     'booths' => 'required|array', // Booths must be an array
        //     'booths.*.event_id' => 'required|exists:events,id', // Event ID should exist in the events table
        //     'booths.*.booth_size' => 'required|string', // Booth size is required and should be a string
        //     'booths.*.booth_area' => 'required|numeric', // Booth area should be numeric
        //     'booths.*.booth_cost' => 'required|numeric', // Booth cost should be numeric
        //     'booths.*.booth_supervisor' => 'required|string', // Booth supervisor should be a string
        //     'booths.*.booth_requirements' => 'nullable|string', // Booth requirements is optional
        //     'booths.*.vendor' => 'required|array', // Vendor must be an array for each booth
        //     'booths.*.vendor.*.vendor_name' => 'required|string', // Vendor name is required and should be a string
        //     'booths.*.vendor.*.vendor_company' => 'required|string', // Vendor company is required and should be a string
        //     'booths.*.vendor.*.country_id' => 'required|string', // Country ID is required (adjust based on how country_id is stored)
        //     'booths.*.vendor.*.vendor_email' => 'required|email', // Vendor email must be a valid email
        //     'booths.*.vendor.*.vendor_address' => 'required|string', // Vendor address is required and should be a string
        //     'booths.*.vendor.*.vendor_city' => 'required|string', // Vendor city is required and should be a string
        //     'booths.*.vendor.*.vendor_description' => 'nullable|string', // Vendor description is optional
        // ]);
        // dd('ok');
        // Begin transaction to ensure data integrity
        DB::beginTransaction();

        try {
           
            foreach ($request->booths as $key => $boothData) {
                $booth = new Booth();
                $booth->event_id = $boothData['event_id'];
                $booth->booth_size = $boothData['booth_size'];
                $booth->booth_area = $boothData['booth_area'];
                $booth->booth_cost = $boothData['booth_cost'];
                $booth->booth_supervisor = $boothData['booth_supervisor'];
                $booth->booth_requirements = $boothData['booth_requirements'] ?? null;
                $booth->save();
                $vendorData = $boothData['vendor'];
                $vendor = new Vendor();
                $vendor->booth_id = $booth->id;
                $vendor->vendor_name = $vendorData['vendor_name'];
                $vendor->vendor_company = $vendorData['vendor_company'];
                $vendor->country_id = $vendorData['country_id'];
                $vendor->vendor_email = $vendorData['vendor_email'];
                $vendor->vendor_address = $vendorData['vendor_address'];
                $vendor->vendor_city = $vendorData['vendor_city'];
                $vendor->vendor_description = $vendorData['vendor_description'] ?? null;
                $vendor->save();
            }
            DB::commit();

            return redirect()->route('add_booth')->with('success', 'Booth details have been successfully stored.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', $e->getMessage());
        }
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
