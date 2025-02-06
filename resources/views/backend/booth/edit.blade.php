@extends('backend.master')

@section('content')
    <div class="main_screen">
        <div class="top_bar d-flex align-items-center">
            <a href="{{ route('booth') }}" class="text-white">
                <i class="bi bi-arrow-left-short"></i>
            </a>
            <div class="page_heading text-center w-100">
                Edit Booth Details
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
                <form action="{{ route('booth_update', $booth->id) }}" method="POST">
                    @csrf

                    <div id="booth-wrapper">
                        <div class="booth-form">
                            <div class="page_title text-center my-md-4 my-lg-2">
                                <span>Booth Details</span>
                            </div>

                            <div class="row gap-y15 justify-content-between">
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Select Event</label>
                                    <select name="event_id" class="event_id">
                                        <option value="">Select Event</option>
                                        @foreach ($events as $event)
                                            <option value="{{ $event->id }}" {{ $booth->event_id == $event->id ? 'selected' : '' }}>
                                                {{ $event->event_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Booth Name</label>
                                    <input type="text" name="booth_name" value="{{ $booth->booth_name }}" required>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Booth Size</label>
                                    <input type="text" name="booth_size" value="{{ $booth->booth_size }}" required>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Booth Area (m²)</label>
                                    <input type="text" name="booth_area" value="{{ $booth->booth_area }}">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Booth Cost / m²</label>
                                    <input type="text" name="booth_cost" value="{{ $booth->booth_cost }}">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Booth Supervisor</label>
                                    <input type="text" name="booth_supervisor" value="{{ $booth->booth_supervisor }}">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Booth Requirements</label>
                                    <input type="text" name="booth_requirements" value="{{ $booth->booth_requirements }}">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Vendor Name</label>
                                    <input type="text" name="vendor_name" value="{{ $vendor->vendor_name }}">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Vendor Company</label>
                                    <input type="text" name="vendor_company" value="{{ $vendor->vendor_company }}">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Country</label>
                                    <input type="text" name="country_id" value="{{ $vendor->country_id }}">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Vendor Email</label>
                                    <input type="email" name="vendor_email" value="{{ $vendor->vendor_email }}">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Vendor Address</label>
                                    <input type="text" name="vendor_address" value="{{ $vendor->vendor_address }}">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label">Vendor City</label>
                                    <input type="text" name="vendor_city" value="{{ $vendor->vendor_city }}">
                                </div>
                                <div class="col-lg-8">
                                    <label class="form-label">Vendor Description</label>
                                    <textarea class="form-control"  name="vendor_description" rows="3">{{ $vendor->vendor_description }}</textarea>
                                </div>
                            </div>

                            <div class="btn-grp d-flex gap-3 mt-4 justify-content-start">
                                <button type="submit" class="btn btn-primary">Update Details</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

