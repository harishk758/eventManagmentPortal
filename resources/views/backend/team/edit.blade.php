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
                Team Update
            </div>
        </div>
        @if (session()->has('success'))
        <div class="alert alert-success text-center">
            {{ session()->get('success') }}
        </div>
    @endif
        <div class="event_form p-3">
            <div class="details">
                <form action="{{ route('team.update', $teamMember->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="page_title text-center my-md-4">
                        <span>Edit Team Detalis</span>
                    </div>

                    <div class="row gap-y15">
                        <div class="col-lg-4 col-md-6">
                            <label for="member_name" class="form-label">Member Name <span>*</span></label>
                            <input type="text" id="member_name" placeholder="Member Name" value="{{$teamMember->member_name}}" name="member_name">
                            @if ($errors->has('member_name'))
                                <div class="text-danger">
                                    {{ $errors->first('member_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="designation" class="form-label">Designation <span>*</span></label>
                            <input type="text" id="designation" placeholder="Enter Designation" name="designation" value="{{$teamMember->designation}}">
                            @if ($errors->has('designation'))
                                <div class="text-danger">
                                    {{ $errors->first('designation') }}
                                </div>
                            @endif
                        </div>

                        {{-- <div class="col-lg-4 col-md-6">
                            <label for="event_category" class="form-label">Select Category
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
                        </div> --}}
                        <div class="col-lg-4 col-md-6">
                            <label for="email" class="form-label">Email
                            </label>
                            <input type="email" id="email" placeholder="Enter Email" disabled value="{{$teamMember->email}}" name="email" >
                            @if ($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="contact_number" class="form-label">Contact No.
                            </label>
                            <input type="contact_number" id="contact_number" placeholder="Enter Contact Number" value="{{$teamMember->contact_number}}" name="contact_number">
                            @if ($errors->has('contact_number'))
                                <div class="text-danger">
                                    {{ $errors->first('contact_number') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="aadhaar_front" class="form-label">Aadhar Front
                            </label>
                            <input type="file" id="aadhaar_front"  name="aadhaar_front">
                            <div class="mt-1">
                                <img src="{{asset('upload_image/aadhaar_front/'. $teamMember->aadhaar_front)}}" class="img-fluid" width="60" height="60" alt="aadhaar_front.{{$teamMember->id}}">
                            </div>
                            @if ($errors->has('aadhaar_front'))
                                <div class="text-danger">
                                    {{ $errors->first('aadhaar_front') }}
                                </div>
                            @endif
                    </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="aadhaar_back" class="form-label">Aadhar Back
                            </label>
                            <input type="file" id="aadhaar_back"
                                name="aadhaar_back">
                                <div class="mt-1">
                                    <img src="{{asset('upload_image/aadhaar_back/'. $teamMember->aadhaar_back)}}" class="img-fluid" width="60" height="60" alt="aadhar_back.{{$teamMember->id}}">
                            </div>
                            @if ($errors->has('aadhaar_back'))
                                <div class="text-danger">
                                    {{ $errors->first('aadhaar_back') }}
                                </div>
                            @endif
                    </div>
                        
                        <div class="col-lg-4 col-md-6">
                            <label for="pancard" class="form-label">Pan Card
                            </label>
                            <input type="file" id="pancard"  name="pancard">
                            <div class="mt-1">
                                <img src="{{asset('upload_image/pancard/'. $teamMember->pancard)}}" width="60" height="60" alt="pancard.{{$teamMember->id}}">
                            </div>
                            @if ($errors->has('pancard'))
                                <div class="text-danger">
                                    {{ $errors->first('pancard') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="btn_grp d-flex justify-content-end">
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection


