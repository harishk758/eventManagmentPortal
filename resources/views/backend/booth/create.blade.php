@extends('backend.master')
@section('content')
    <style>
        .error {
            color: red;
        }
    </style>
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
                                <span>Booth Details</span>
                            </div>
                            <div class="row gap-y15 justify-content-between">
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Select Event</label>
                                    <select name="event_id" class="event_id">
                                        <option value="">Select Event</option>
                                        @foreach ($events as $event)
                                            <option value="{{ $event->id }}">{{ $event->event_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Booth Name</label>
                                    <input type="text" placeholder="Enter Name" name="booth_name" required>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Booth Size</label>
                                    <input type="text" placeholder="Enter Size" name="booth_size">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Booth Cost / mSq</label>
                                    <input type="text" placeholder="Booth Cost" name="booth_cost">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Booth Supervisor</label>
                                    <input type="text" placeholder="Enter Name" name="booth_supervisor">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Booth Requirements</label>
                                    <input type="text" placeholder="Enter Requirements" name="booth_requirements">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Vendor Name</label>
                                    <input type="text" placeholder="Vendor Name" name="vendor_name">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Vendor Company</label>
                                    <input type="text" placeholder="Vendor Company" name="vendor_company">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Country</label>
                                    <input type="text" placeholder="Country" name="country_id">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Vendor Email</label>
                                    <input type="email" placeholder="Vendor Email" name="vendor_email">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Vendor Address</label>
                                    <input type="text" placeholder="Vendor Address" name="vendor_address">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Vendor City</label>
                                    <input type="text" placeholder="Vendor City" name="vendor_city">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Booth Area (mSq)</label>
                                    <input type="text" placeholder="Booth Area" name="booth_area">
                                </div>
                                <div class="col-lg-8">
                                    <label class="form-label">Vendor Description</label>
                                    <textarea class="form-control" id="" rows="3" placeholder="Vendor Description" name="vendor_description"></textarea>
                                </div>

                            </div>
                            <div class="btn-grp d-flex gap-3 justify-content-start mt-4">
                                {{-- <button type="button" class="btn btn-success add-booth">Add Booth</button> --}}
                                <button type="submit" class="btn btn-primary">Submit Details</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('#booth-form-container').validate({
            rules: {
                booth_name: {
                    required: true,
                    minlength: 3,
                    maxlength: 20,
                    // regex: /^[^0-9]+$/,
                    notWhitespaceOnly: true,
                    noLeadingOrTrailingSpaces: true,
                    noSpecialCharsForExperience: true
                },
                event_id: {
                    required: true
                },
                booth_size: {
                    required: true,
                    noSpecialCharsForExperience: true
                    // notWhitespaceOnly: true,
                    // noLeadingOrTrailingSpaces: true,
                    // noSpecialCharsForExperience: true
                },
                booth_cost: {
                    required: true,
                    noSpecialCharsForExperience: true
                    // notWhitespaceOnly: true,
                    // noLeadingOrTrailingSpaces: true,
                    // noSpecialCharsForExperience: true
                },
                booth_supervisor: {
                    required: true,
                    noSpecialCharsForExperience: true
                    // notWhitespaceOnly: true,
                    // noLeadingOrTrailingSpaces: true,
                    // noSpecialCharsForExperience: true
                },
                booth_requirements: {
                    required: true,
                    noSpecialCharsForExperience: true
                },
                vendor_name: {
                    required: true,
                    noSpecialCharsForExperience: true
                },
                vendor_company: {
                    required: true,
                    noSpecialCharsForExperience: true
                },
                country_id: {
                    required: true,
                    noSpecialCharsForExperience: true
                },
                vendor_email: {
                    required: true
                },
                vendor_address: {
                    required: true
                },
                vendor_city: {
                    required: true
                },
                booth_area: {
                    required: true,
                    noSpecialCharsForExperience: true
                },
                booth_area: {
                    required: true,
                    noSpecialCharsForExperience: true
                },
                vendor_description: {
                    required: true,
                    noSpecialCharsForExperience: true
                }
            },
            messages: {
                booth_name: {
                    required: 'Booth name is required.',
                    minlength: 'Please enter at least 3 characters.',
                    maxlength: 'Maximum length is 20 characters.',
                    //   regex: 'Numbers are not allowed.'
                },
                event_id: {
                    required: 'Event is required'
                },
                booth_size: {
                    required: 'Booth Size is required',
                    noSpecialCharsForAddress: 'Special Chars Not Allow'
                },

                booth_cost: {
                    required: 'Booth Cose is required',
                    noSpecialCharsForAddress: 'Special Chars Not Allow'
                },
                booth_supervisor: {
                    required: 'Booth Supervisor is required',
                    noSpecialCharsForAddress: 'Special Chars Not Allow'
                },
                booth_requirements: {
                    required: 'Booth Requirements is required',
                    noSpecialCharsForAddress: 'Special Chars Not Allow'
                },
                booth_requirements: {
                    required: 'Booth Requirements is required',
                    noSpecialCharsForAddress: 'Special Chars Not Allow'
                },
                vendor_name: {
                    required: 'Vendor Name is required',
                    noSpecialCharsForAddress: 'Special Chars Not Allow'
                },
                vendor_company: {
                    required: 'Vendor Company is required',
                    noSpecialCharsForAddress: 'Special Chars Not Allow'
                },
                vendor_email: {
                    required: 'Vendor email is required'
                },
                vendor_address: {
                    required: 'Vendor address is required'
                },
                vendor_city: {
                    required: 'Vendor city is required'
                },
                booth_area: {
                    required: 'Booth Area is required'
                },
                vendor_description: {
                    required: 'Vendor Description is required'
                }
            }
        });
    </script>
@endsection
