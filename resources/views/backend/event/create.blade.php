@extends('backend.master')
@section('content')
    <style>
        .error {
            color: red;
        }
    </style>
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
                <form action="{{ route('event_store') }}" method="POST" id="event_form">
                    @csrf
                    <div class="page_title text-center my-md-4">
                        <span>Basic Detalis</span>
                    </div>
                    <div class="row justify-content-between gap-y15">
                        <div class="col-lg-4 col-md-6">
                            <label for="eventName" class="form-label">Event Name <span>*</span></label>
                            <input type="text" id="eventName" placeholder="Enter Name" name="event_name">
                            @if ($errors->has('event_name'))
                                <div class="text-danger">
                                    {{ $errors->first('event_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="start_date" class="form-label">Start Date<span>*</span>
                            </label>
                            <input type="date" id="start_date" name="start_date" min="2018-01-01" max="2027-12-31"
                                onkeydown="return false" onchange="validateDates()">
                            @if ($errors->has('start_date'))
                                <div class="text-danger">
                                    {{ $errors->first('start_date') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="end_date" class="form-label">End Date<span>*</span>
                            </label>
                            <input type="date" id="end_date" name="end_date" min="2018-01-01" max="2027-12-31"
                                onkeydown="return false" onchange="validateDates()">
                            @if ($errors->has('end_date'))
                                <div class="text-danger">
                                    {{ $errors->first('end_date') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="event_category" class="form-label">Select Category <span>*</span>
                            </label>
                            <Select id="event_category" class="" name="event_category">
                                <option value="" disabled selected>Select Category</option>
                                <option value="Promotion">Promotion</option>
                                <option value="Sales">Sales</option>
                                <option value="Technical">Technical</option>
                                <option value="Finetek">Finetek</option>
                                <option value="Insurance">Insurance</option>
                            </Select>
                            @if ($errors->has('event_category'))
                                <div class="text-danger">
                                    {{ $errors->first('event_category') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="address" class="form-label">Event Address <span>*</span>
                            </label>
                            <input type="text" id="address" placeholder="Enter Address" name="address">
                            @if ($errors->has('address'))
                                <div class="text-danger">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="city" class="form-label">Enter City <span>*</span>
                            </label>
                            <input type="city" id="city" placeholder="Enter City" name="city">
                            @if ($errors->has('city'))
                                <div class="text-danger">
                                    {{ $errors->first('city') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="crename" class="form-label">Creator Name <span>*</span>
                            </label>
                            <input type="text" id="crename" placeholder="Enter Name" name="creator_name">
                            @if ($errors->has('creator_name'))
                                <div class="text-danger">
                                    {{ $errors->first('creator_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="credesignation" class="form-label">Creator Desgination <span>*</span>
                            </label>
                            <input type="text" id="credesignation" placeholder="Enter Designation"
                                name="creator_designation">
                            @if ($errors->has('creator_designation'))
                                <div class="text-danger">
                                    {{ $errors->first('creator_designation') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
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
                        <div class="col-lg-4 col-md-6">
                            <label for="eveCountry" class="form-label">Event Country
                            </label>
                            <input type="text" id="country" placeholder="Event Country" name="country">
                            @if ($errors->has('country'))
                                <div class="text-danger">
                                    {{ $errors->first('country') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="btn_grp d-flex justify-content-start mt-4">
                        {{-- <a class="btn btn-success ">Submit
                        Details</a> --}}
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('#event_form').validate({
            rules: {
                event_name: {
                    required: true,
                    minlength: 3,
                    maxlength: 20,
                    //   regex: /^[^0-9]+$/,
                    notWhitespaceOnly: true,
                    //   noLeadingOrTrailingSpaces: true,
                    noSpecialCharsForExperience: true
                },
                event_category: {
                    required: true
                },
                city: {
                    required: true,
                    notWhitespaceOnly: true,
                    noLeadingOrTrailingSpaces: true
                },
                email: {
                    required: true,
                    email: true
                },
                creator_name: {
                    required: true,
                    regex: /^[6-9]\d{9}$/,
                    notWhitespaceOnly: true,
                    noLeadingOrTrailingSpaces: true
                },
                creator_designation: {
                    required: true,
                    regex: /^[6-9]\d{9}$/,
                    notWhitespaceOnly: true,
                    noLeadingOrTrailingSpaces: true
                },
                event_description: {
                    required: true,
                    regex: /^[6-9]\d{9}$/,
                    notWhitespaceOnly: true,
                    noLeadingOrTrailingSpaces: true
                },
                country: {
                    required: true,
                    notWhitespaceOnly: true,
                    noSpecialCharsForAddress: true,
                },
                address: {
                    required: true,
                    notWhitespaceOnly: true,
                    noSpecialCharsForAddress: true,
                    // noLeadingOrTrailingSpaces: true
                },
                start_date: {
                    required: true,
                },
                end_date: {
                    required: true,
                }
            },
            messages: {
                event_name: {
                    required: 'Event name is required.',
                    minlength: 'Please enter at least 3 characters.',
                    maxlength: 'Maximum length is 20 characters.',
                    //   regex: 'Numbers are not allowed.'
                },
                event_category: {
                    required: 'Category is required.'
                },
                city: {
                    required: 'City is required.',
                },
                email: {
                    required: 'Email is required.',
                    email: 'Please enter a valid email address.'
                },
                creator_name: {
                    required: 'Creator name is required.',
                    number: 'Contact Number Should be Number Type'
                },
                creator_designation: {
                    required: 'Creator designation is required.',
                    number: 'Contact Number Should be Number Type'
                },
                event_description: {
                    required: 'Event description is required.',
                    number: 'Contact Number Should be Number Type'
                },
                country: {
                    required: 'Country is required.'
                },
                address: {
                    required: 'Address is required.',
                    noSpecialCharsForAddress: 'Address cannot contain special characters.'
                },
                start_date: {
                    required: 'Start date is required.'
                },
                end_date: {
                    required: 'End date is required.'
                },
            }
        });


        function validateDates() {
            let startDate = document.getElementById('start_date').value;
            let endDate = document.getElementById('end_date').value;
            if (startDate && endDate) {
                if (new Date(endDate) < new Date(startDate)) {
                    alert('End date should not be before start date.');
                    document.getElementById('end_date').value = '';
                    // document.getElementById('end_date').value = '';
                    return false;
                }
            }
            return true;
        }
    </script>
@endsection
