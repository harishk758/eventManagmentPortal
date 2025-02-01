@extends('backend.master')
@section('content')
    <div class="main_screen">
        <!-- COMMON CODE END -->
        <div class="top_bar d-flex align-items-center">
            <a href="{{ route('event') }}" class="text-white">
                <i class="bi bi-arrow-left-short">
                </i>
            </a>
            <div class="page_heading text-center w-100">
                Event Details
            </div>
        </div>
        @if (session()->has('success'))
        <div class="alert alert-success text-center">
            {{ session()->get('success') }}
        </div>
    @endif
        <div class="event_form p-3">
            <div class="details">
                <form action="{{ route('event_store') }}" method="POST">
                    @csrf
                    <div class="page_title text-center my-md-4">
                        <span>Basic Detalis</span>
                    </div>

                    <div class="d-flex justify-content-between input_row">
                        <div class="text_field30">
                            <label for="eventName" class="form-label">Event Name <span>*</span></label>
                            <input type="text" id="eventName" placeholder="Enter Name" name="event_name">
                            @if ($errors->has('event_name'))
                                <div class="text-danger">
                                    {{ $errors->first('event_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="text_field20">
                            <label for="startDate" class="form-label">Start Date<span>*</span>
                            </label>
                            <input type="date" id="startDate" name="start_date">
                            @if ($errors->has('start_date'))
                                <div class="text-danger">
                                    {{ $errors->first('start_date') }}
                                </div>
                            @endif
                        </div>
                        <div class="text_field20">
                            <label for="endDate" class="form-label">End Date<span>*</span>
                            </label>
                            <input type="date" id="endDate" name="end_date">
                            @if ($errors->has('end_date'))
                                <div class="text-danger">
                                    {{ $errors->first('end_date') }}
                                </div>
                            @endif
                        </div>

                        <div class="text_field30">
                            <label for="country" class="form-label">Select Category
                            </label>
                            <Select id="country" class="" name="country">
                                <option value="" disabled selected>Select Category</option>
                                <option value="Promotion">Promotion</option>
                                <option value="Sales">Sales</option>
                                <option value="Technical">Technical</option>
                                <option value="Finetek">Finetek</option>
                                <option value="Insurance">Insurance</option>
                            </Select>
                            @if ($errors->has('country'))
                                <div class="text-danger">
                                    {{ $errors->first('country') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex justify-content-between input_row">
                        <div class="text_field30">
                            <label for="address" class="form-label">Event Address
                            </label>
                            <input type="text" id="address" placeholder="Enter Address" name="address">
                            @if ($errors->has('address'))
                                <div class="text-danger">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                        </div>
                        <div class="text_field20">
                            <label for="city" class="form-label">Enter City
                            </label>
                            <input type="city" id="city" placeholder="Enter City" name="city">
                            @if ($errors->has('city'))
                                <div class="text-danger">
                                    {{ $errors->first('city') }}
                                </div>
                            @endif
                        </div>
                        <div class="text_field20">
                            <label for="crename" class="form-label">Creator Name
                            </label>
                            <input type="text" id="crename" placeholder="Enter Name" name="creator_name">
                            @if ($errors->has('creator_name'))
                                <div class="text-danger">
                                    {{ $errors->first('creator_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="text_field30">
                            <label for="credesignation" class="form-label">Creator Desgination
                            </label>
                            <input type="text" id="credesignation" placeholder="Enter Designation"
                                name="creator_designation">
                            @if ($errors->has('creator_designation'))
                                <div class="text-danger">
                                    {{ $errors->first('creator_designation') }}
                                </div>
                            @endif
                        </div>


                    </div>
                    <div class="d-flex justify-content-between input_row">
                        <div class="text_field70">
                            <label for="eveDescription" class="form-label">Event Description
                            </label>
                            <input type="text" id="eveDescription" placeholder="Enter Description"
                                name="event_description">
                            @if ($errors->has('event_description'))
                                <div class="text-danger">
                                    {{ $errors->first('event_description') }}
                                </div>
                            @endif
                        </div>
                        <div class="text_field20">
                            <label for="eveCountry" class="form-label">Event Category
                            </label>
                            <input type="text" id="eveCountry" placeholder="Event Category" name="event_category">
                            @if ($errors->has('event_category'))
                                <div class="text-danger">
                                    {{ $errors->first('event_category') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="btn_grp d-flex justify-content-end">
                        {{-- <a class="btn btn-success ">Submit
                            Details</a> --}}
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

         {{-- <div class="event_form p-3">
            <div class="details">
               


                <form id="booth-form-container">
                    <div class="booth-form">
                        <div class="page_title text-center my-md-4 my-lg-2">
                            <span>Booth Details 1</span>
                        </div>
                
                        <div class="d-flex justify-content-between input_row">
                            <div class="text_field30">
                                <label for="boothsize1" class="form-label">Booth Size</label>
                                <input type="text" id="Boothsize1" placeholder="Enter Name">
                            </div>
                            <div class="text_field20">
                                <label for="bootharea1" class="form-label">Booth Area (mSq)</label>
                                <input type="text" id="bootharea1" placeholder="Booth Area">
                            </div>
                            <div class="text_field20">
                                <label for="boothcost1" class="form-label">Booth Cost / mSq</label>
                                <input type="text" id="boothcost1" placeholder="Booth Cost Per SqM">
                            </div>
                            <div class="text_field30">
                                <label for="boothsupervisor1" class="form-label">Booth Supervisor</label>
                                <input type="text" id="boothsupervisor1" placeholder="Enter Name">
                            </div>
                        </div>
                
                        <div class="d-flex justify-content-between input_row">
                            <div class="w-100">
                                <label for="boothreq1" class="form-label">Booth Requirements</label>
                                <input type="text" id="boothreq1" placeholder="Enter Booth Requirements">
                            </div>
                        </div>
                
                        <div class="d-flex justify-content-between input_row">
                            <div class="text_field30">
                                <label for="vendorname1" class="form-label">Vendor Name</label>
                                <input type="text" id="vendorname1" placeholder="Enter Vendor Name">
                            </div>
                            <div class="text_field30">
                                <label for="vendorcomp1" class="form-label">Vendor Company</label>
                                <input type="text" id="vendorcomp1" placeholder="Vendor Company">
                            </div>
                            <div class="text_field30">
                                <label for="vendorcountry1" class="form-label">Country</label>
                                <input type="text" id="vendorcountry1" placeholder="Enter Country">
                            </div>
                        </div>
                
                        <div class="d-flex justify-content-between input_row">
                            <div class="text_field30">
                                <label for="vendoremail1" class="form-label">Vendor Email</label>
                                <input type="email" id="vendoremail1" placeholder="Enter Email">
                            </div>
                            <div class="text_field30">
                                <label for="vendoraddress1" class="form-label">Vendor Address</label>
                                <input type="text" id="vendoraddress1" placeholder="Enter Address">
                            </div>
                            <div class="text_field30">
                                <label for="vendorcity1" class="form-label">Enter City</label>
                                <input type="text" id="vendorcity1" placeholder="Enter City Name">
                            </div>
                        </div>
                
                        <div class="d-flex justify-content-between input_row">
                            <div class="w-100">
                                <label for="vendordescription1" class="form-label">Vendor Description</label>
                                <input type="text" id="vendordescription1" placeholder="Enter Description">
                            </div>
                        </div>
                
                        <div class="btn-grp d-flex gap-3 justify-content-end">
                            <a href="javascript:void(0)" class="btn btn-success add-booth">Add Booth</a>
                            <a href="javascript:void(0)" type="submit" class="btn btn-primary">Submit Details</a>
                            <a href="javascript:void(0)" class="btn btn-danger remove-booth">Remove Booth</a>
                        </div>
                    </div>
                </form>
                
                
            </div>
        </div> --}}

    </div>
@endsection














<!-- form code -->
