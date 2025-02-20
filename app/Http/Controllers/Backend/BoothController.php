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
        $booth = Booth::with('event', 'vendors')->orderBy('created_at', 'desc')->get();

        return view('backend.booth.index', compact('booth'));
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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,id',
            'booth_name' => 'required|string|max:255',
            'booth_size' => 'nullable|string|max:50',
            'booth_area' => 'nullable',
            'booth_cost' => 'nullable',
            'booth_supervisor' => 'nullable|string|max:255',
            'booth_requirements' => 'nullable|string|max:500',
            'vendor_name' => 'required|string|max:255',
            'vendor_company' => 'nullable|string|max:255',
            'vendor_email' => 'nullable|email|max:255',
            'vendor_address' => 'nullable|string|max:500',
            'vendor_city' => 'nullable|string|max:100',
            'country_id' => 'nullable',
            'vendor_description' => 'nullable|string|max:500',
        ]);

        try {
            DB::beginTransaction();

            $booth = new Booth();
            $booth->event_id = $validatedData['event_id'];
            $booth->booth_name = $validatedData['booth_name'];
            $booth->booth_size = $validatedData['booth_size'];
            $booth->booth_area = $validatedData['booth_area'];
            $booth->booth_cost = $validatedData['booth_cost'];
            $booth->booth_supervisor = $validatedData['booth_supervisor'];
            $booth->booth_requirements = $validatedData['booth_requirements'];
            $booth->save(); // Save Booth and get ID

            // Store Vendor Data Linked to Booth
            $vendor = new Vendor();
            $vendor->booth_id = $booth->id;
            $vendor->vendor_name = $validatedData['vendor_name'];
            $vendor->vendor_company = $validatedData['vendor_company'];
            $vendor->vendor_email = $validatedData['vendor_email'];
            $vendor->vendor_address = $validatedData['vendor_address'];
            $vendor->vendor_city = $validatedData['vendor_city'];
            $vendor->country_id = $validatedData['country_id'];
            $vendor->vendor_description = $validatedData['vendor_description'];
            $vendor->save(); // Save Vendor

            DB::commit();

            return redirect()->route('booth')->with('success', 'Booth and Vendor details saved successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error: ' . $e->getMessage());
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
        $events = Event::all();

        $booth = Booth::find($id);

        if (!$booth) {
            return redirect()->route('booth')->with('error', 'बूथ नहीं मिला।');
        }
        $vendor = Vendor::where('booth_id', $booth->id)->first();

        return view('backend.booth.edit', compact('booth', 'events', 'vendor'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate input data
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,id',
            'booth_name' => 'required|string|max:255',
            'booth_size' => 'nullable|string|max:50',
            'booth_area' => 'nullable',
            'booth_cost' => 'nullable',
            'booth_supervisor' => 'nullable|string|max:255',
            'booth_requirements' => 'nullable|string|max:500',

            // Vendor Validation
            'vendor_name' => 'required|string|max:255',
            'vendor_company' => 'nullable|string|max:255',
            'vendor_email' => 'nullable|email|max:255',
            'vendor_address' => 'nullable|string|max:500',
            'vendor_city' => 'nullable|string|max:100',
            'country_id' => 'nullable',
            'vendor_description' => 'nullable|string|max:500',
        ]);

        try {
            DB::beginTransaction();

            // Find Booth and Update
            $booth = Booth::findOrFail($id);
            $booth->event_id = $validatedData['event_id'];
            $booth->booth_name = $validatedData['booth_name'];
            $booth->booth_size = $validatedData['booth_size'];
            $booth->booth_area = $validatedData['booth_area'];
            $booth->booth_cost = $validatedData['booth_cost'];
            $booth->booth_supervisor = $validatedData['booth_supervisor'];
            $booth->booth_requirements = $validatedData['booth_requirements'];
            $booth->save();

            // Find Vendor and Update
            $vendor = Vendor::where('booth_id', $booth->id)->first();
            if ($vendor) {
                $vendor->vendor_name = $validatedData['vendor_name'];
                $vendor->vendor_company = $validatedData['vendor_company'];
                $vendor->vendor_email = $validatedData['vendor_email'];
                $vendor->vendor_address = $validatedData['vendor_address'];
                $vendor->vendor_city = $validatedData['vendor_city'];
                $vendor->country_id = $validatedData['country_id'];
                $vendor->vendor_description = $validatedData['vendor_description'];
                $vendor->save();
            }

            DB::commit();

            return redirect()->route('booth')->with('success', 'Booth and Vendor details updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booth = Booth::find($id);

        if (!$booth) {
            return redirect()->route('booth')->with('error', 'Booth not found.');
        }

        $vendor = Vendor::where('booth_id', $booth->id)->first();

        if ($vendor) {
            $vendor->delete();
        }
        $booth->delete();
        return redirect()->route('booth')->with('success', 'Booth and associated vendor deleted successfully.');
    }


    // Fetch Booths based on Event ID
    public function getBooths($event_id)
    {
        $booths = Booth::where('event_id', $event_id)->get();

        return response()->json($booths);
    }

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
}
