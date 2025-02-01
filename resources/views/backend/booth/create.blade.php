{{-- @extends('backend.master')
@section('content')
    <div class="main_screen">
        <!-- COMMON CODE END -->
        <div class="top_bar d-flex align-items-center">
            <a href="{{ route('booth') }}" class="text-white">
                <i class="bi bi-arrow-left-short">
                </i>
            </a>
            <div class="page_heading text-center w-100">
                Booth Details
            </div>
        </div>

        <div class="event_form p-3">
            <div class="details">
                <form action="{{ route('booth_store') }}" method="POST" id="booth-form-container">
                    @csrf
                        <div class="booth-form">
                            <div class="page_title text-center my-md-4 my-lg-2">
                                <span>Booth Details 1</span>
                            </div>
                            <div class="d-flex justify-content-between input_row">
                                <div class="text_field30">
                                    <label for="boothsize1" class="form-label">Select Event</label>
                                    <select name="event_id" id="event_id">
                                        <option value="">Select Event</option>
                                        @foreach ($events as $event)
                                            <option value="{{ $event->id }}">{{ $event->event_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text_field30">
                                    <label for="boothsize1" class="form-label">Booth Size</label>
                                    <input type="text" id="Boothsize1" placeholder="Enter Name"
                                        name="booths[booth_size]">
                                </div>
                                <div class="text_field30">
                                    <label for="bootharea1" class="form-label">Booth Area (mSq)</label>
                                    <input type="text" id="bootharea1" placeholder="Booth Area"
                                        name="booths[booth_area]">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between input_row">
                                <div class="text_field30">
                                    <label for="boothcost1" class="form-label">Booth Cost / mSq</label>
                                    <input type="text" id="boothcost1" placeholder="Booth Cost Per SqM"
                                        name="booths[booth_cost]">
                                </div>
                                <div class="text_field30">
                                    <label for="boothsupervisor1" class="form-label">Booth Supervisor</label>
                                    <input type="text" id="boothsupervisor1" placeholder="Enter Name"
                                        name="booths[booth_supervisor]">
                                </div>

                                <div class="text_field30">
                                    <label for="boothreq1" class="form-label">Booth Requirements</label>
                                    <input type="text" id="boothreq1" placeholder="Enter Booth Requirements"
                                        name="booths[booth_requirements]">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between input_row">
                                <div class="text_field30">
                                    <label for="vendorname1" class="form-label">Vendor Name</label>
                                    <input type="text" id="vendorname1" placeholder="Enter Vendor Name"
                                        name="vendors[vendor_name]">
                                </div>
                                <div class="text_field30">
                                    <label for="vendorcomp1" class="form-label">Vendor Company</label>
                                    <input type="text" id="vendorcomp1" placeholder="Vendor Company"
                                        name="vendors[vendor_company]">
                                </div>
                                <div class="text_field30">
                                    <label for="vendorcountry1" class="form-label">Country</label>
                                    <input type="text" id="vendorcountry1" placeholder="Enter Country"
                                        name="vendors[country_id]">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between input_row">
                                <div class="text_field30">
                                    <label for="vendoremail1" class="form-label">Vendor Email</label>
                                    <input type="email" id="vendoremail1" placeholder="Enter Email"
                                        name="vendors[vendor_email]">
                                </div>
                                <div class="text_field30">
                                    <label for="vendoraddress1" class="form-label">Vendor Address</label>
                                    <input type="text" id="vendoraddress1" placeholder="Enter Address"
                                        name="vendors[vendor_address]">
                                </div>
                                <div class="text_field30">
                                    <label for="vendorcity1" class="form-label">Vendor City</label>
                                    <input type="text" id="vendorcity1" placeholder="Enter City Name"
                                        name="vendors[vendor_city]">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between input_row">
                                <div class="w-100">
                                    <label for="vendordescription1" class="form-label">Vendor Description</label>
                                    <input type="text" id="vendordescription1" placeholder="Enter Description"
                                        name="vendors[vendor_description]">
                                </div>
                            </div>
                            <div class="btn-grp d-flex gap-3 justify-content-end">
                                <a href="javascript:void(0)" class="btn btn-success add-booth">Add Booth</a>
                                <button type="submit" class="btn btn-primary">Submit Details</button>
                                <a href="javascript:void(0)" class="btn btn-danger remove-booth">Remove Booth</a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection --}}

@extends('backend.master')
@section('content')
    <div class="main_screen">
        <div class="top_bar d-flex align-items-center">
            <a href="{{ route('booth') }}" class="text-white">
                <i class="bi bi-arrow-left-short"></i>
            </a>
            <div class="page_heading text-center w-100">
                Booth Details
            </div>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success text-center">
                {{ session()->get('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        <div class="event_form p-3">
            <div class="details">
                <form action="{{ route('booth_store') }}" method="POST" id="booth-form-container">
                    @csrf
                    <div id="booth-wrapper">
                        <div class="booth-form" data-index="0">
                            <div class="page_title text-center my-md-4 my-lg-2">
                                <span>Booth Details 1</span>
                            </div>
                            <div class="d-flex justify-content-between input_row">
                                <div class="text_field30">
                                    <label class="form-label">Select Event</label>
                                    <select name="booths[0][event_id]" class="event_id">
                                        <option value="">Select Event</option>
                                        @foreach ($events as $event)
                                            <option value="{{ $event->id }}">{{ $event->event_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text_field30">
                                    <label class="form-label">Booth Size</label>
                                    <input type="text" placeholder="Enter Size" name="booths[0][booth_size]" required>
                                </div>
                                <div class="text_field30">
                                    <label class="form-label">Booth Area (mSq)</label>
                                    <input type="text" placeholder="Booth Area" name="booths[0][booth_area]">
                                    
                                </div>
                            </div>
                            <div class="d-flex justify-content-between input_row">
                                <div class="text_field30">
                                    <label class="form-label">Booth Cost / mSq</label>
                                    <input type="text" placeholder="Booth Cost" name="booths[0][booth_cost]">
                                </div>
                                <div class="text_field30">
                                    <label class="form-label">Booth Supervisor</label>
                                    <input type="text" placeholder="Enter Name" name="booths[0][booth_supervisor]">
                                </div>
                                <div class="text_field30">
                                    <label class="form-label">Booth Requirements</label>
                                    <input type="text" placeholder="Enter Requirements"
                                        name="booths[0][booth_requirements]">
                                </div>
                            </div>

                            <!-- Vendor Details -->
                            <div class="d-flex justify-content-between input_row">
                                <div class="text_field30">
                                    <label class="form-label">Vendor Name</label>
                                    <input type="text" placeholder="Vendor Name" name="booths[0][vendor][vendor_name]">
                                </div>
                                <div class="text_field30">
                                    <label class="form-label">Vendor Company</label>
                                    <input type="text" placeholder="Vendor Company"
                                        name="booths[0][vendor][vendor_company]">
                                </div>
                                <div class="text_field30">
                                    <label class="form-label">Country</label>
                                    <input type="text" placeholder="Country" name="booths[0][vendor][country_id]">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between input_row">
                                <div class="text_field30">
                                    <label class="form-label">Vendor Email</label>
                                    <input type="email" placeholder="Vendor Email" name="booths[0][vendor][vendor_email]">
                                </div>
                                <div class="text_field30">
                                    <label class="form-label">Vendor Address</label>
                                    <input type="text" placeholder="Vendor Address"
                                        name="booths[0][vendor][vendor_address]">
                                </div>
                                <div class="text_field30">
                                    <label class="form-label">Vendor City</label>
                                    <input type="text" placeholder="Vendor City" name="booths[0][vendor][vendor_city]">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between input_row">
                                <div class="w-100">
                                    <label class="form-label">Vendor Description</label>
                                    <input type="text" placeholder="Vendor Description"
                                        name="booths[0][vendor][vendor_description]">
                                </div>
                            </div>

                            <div class="btn-grp d-flex gap-3 justify-content-end">
                                <button type="button" class="btn btn-success add-booth">Add Booth</button>
                                <button type="submit" class="btn btn-primary">Submit Details</button>
                                <button type="button" class="btn btn-danger remove-booth" style="display: none;">Remove
                                    Booth</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
