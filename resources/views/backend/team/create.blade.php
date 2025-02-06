@extends('backend.master')
@section('content')
    <div class="main_screen">
        <!-- COMMON CODE END -->
        <div class="top_bar d-flex align-items-center">
            <a href="{{ route('team.index') }}" class="text-white">
                <i class="bi bi-arrow-left-short">
                </i>
            </a>
            <div class="page_heading text-center w-100">
                Team Create
            </div>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success text-center">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="event_form p-3">
            <div class="details">
                <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="page_title text-center my-md-4">
                        <span>Basic Detalis</span>
                    </div>

                    <div class="row gap-y15">
                        <div class="col-lg-4 col-md-6">
                            <div class="">
                                <label for="member_name" class="form-label">Member Name <span>*</span></label>
                                <input type="text" id="member_name" placeholder="Member Name" name="member_name">
                                @if ($errors->has('member_name'))
                                    <div class="text-danger">
                                        {{ $errors->first('member_name') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="">
                                <label for="designation" class="form-label">Designation <span>*</span></label>
                                <input type="text" id="designation" placeholder="Enter Designation" name="designation">
                                @if ($errors->has('designation'))
                                    <div class="text-danger">
                                        {{ $errors->first('designation') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="">
                                <label for="email" class="form-label">Email
                                </label>
                                <input type="email" id="email" placeholder="Enter Email" name="email">
                                @if ($errors->has('email'))
                                    <div class="text-danger">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="">
                                <label for="contact_number" class="form-label">Contact No.
                                </label>
                                <input type="contact_number" id="contact_number" placeholder="Enter Contact Number"
                                    name="contact_number">
                                @if ($errors->has('contact_number'))
                                    <div class="text-danger">
                                        {{ $errors->first('contact_number') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="">
                                <label for="aadhaar_front" class="form-label">Aadhar Front
                                </label>
                                <input type="file" id="aadhaar_front" name="aadhaar_front">
                                @if ($errors->has('aadhaar_front'))
                                    <div class="text-danger">
                                        {{ $errors->first('aadhaar_front') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="">
                                <label for="aadhaar_back" class="form-label">Aadhar Back
                                </label>
                                <input type="file" id="aadhaar_back" name="aadhaar_back">
                                @if ($errors->has('aadhaar_back'))
                                    <div class="text-danger">
                                        {{ $errors->first('aadhaar_back') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="">
                                <label for="pancard" class="form-label">Pan Card </label>
                                <input type="file" id="pancard" name="pancard">
                                @if ($errors->has('pancard'))
                                    <div class="text-danger">
                                        {{ $errors->first('pancard') }}
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="d-flex justify-content-between input_row">

                        
                    </div>
                    <div class="btn_grp d-flex justify-content-end">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
@endsection
