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
                <form action="{{ route('event_update', $edit->id) }}" method="POST" >
                    @csrf
                    @method('POST')
                    <div class="page_title text-center my-md-4">
                        <span>Edit Basic Detalis</span>
                    </div>
                    @php
                    use Illuminate\Support\Carbon;
                @endphp
                    <div class="row justify-content-between gap-y15">
                        <div class="col-lg-4 col-md-6">
                            <label for="eventName" class="form-label">Event Name <span>*</span></label>
                            <input type="text" id="eventName" placeholder="Enter Name" name="event_name" value="{{ $edit->event_name}}">
                            @if ($errors->has('event_name'))
                                <div class="text-danger">
                                    {{ $errors->first('event_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="startDate" class="form-label">Start Date<span>*</span>
                            </label>
                            <input type="date" id="startDate" name="start_date" value="{{ old('start_date', Carbon::parse($edit->start_date)->format('Y-m-d')) }}">
                            @if ($errors->has('start_date'))
                                <div class="text-danger">
                                    {{ $errors->first('start_date') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="endDate" class="form-label">End Date<span>*</span></label>
                            <input type="date" id="endDate" name="end_date" value="{{ old('end_date', isset($edit->end_date) ? Carbon::parse($edit->end_date)->format('Y-m-d') : '') }}">
                            @if ($errors->has('end_date'))
                                <div class="text-danger">
                                    {{ $errors->first('end_date') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="event_category" class="form-label">Select Category
                            </label>
                            <Select id="event_category" name="event_category">
                                <option value="" disabled >Select Category</option>
                                <option value="Promotion"{{ $edit->event_category == 'Promotion' ? 'selected' : '' }}>Promotion</option>
                                <option value="Sales"{{ $edit->event_category == 'Sales' ? 'selected' : '' }}>Sales</option>
                                <option value="Technical" {{ $edit->event_category == 'Technical' ? 'selected' : '' }}>Technical</option>
                                <option value="Finetek" {{ $edit->event_category == 'Finetek' ? 'selected' : '' }}>Finetek</option>
                                <option value="Insurance"{{ $edit->event_category == 'Insurance' ? 'selected' : '' }}>Insurance</option>
                            </Select>
                            @if ($errors->has('event_category'))
                                <div class="text-danger">
                                    {{ $errors->first('event_category') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="address" class="form-label">Event Address
                            </label>
                            <input type="text" id="address" placeholder="Enter Address" name="address" value="{{ $edit->address }}">
                            @if ($errors->has('address'))
                                <div class="text-danger">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="city" class="form-label">Enter City
                            </label>
                            <input type="city" id="city" placeholder="Enter City" name="city" value="{{ $edit->city}}">
                            @if ($errors->has('city'))
                                <div class="text-danger">
                                    {{ $errors->first('city') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="crename" class="form-label">Creator Name
                            </label>
                            <input type="text" id="crename" placeholder="Enter Name" name="creator_name" value="{{ $edit->creator_name }}">
                            @if ($errors->has('creator_name'))
                                <div class="text-danger">
                                    {{ $errors->first('creator_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="credesignation" class="form-label">Creator Desgination
                            </label>
                            <input type="text" id="credesignation" placeholder="Enter Designation"
                                name="creator_designation" value="{{ $edit->creator_designation}}">
                            @if ($errors->has('creator_designation'))
                                <div class="text-danger">
                                    {{ $errors->first('creator_designation') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="eveCountry" class="form-label">Event Country
                            </label>
                            <input type="text" id="country" placeholder="Event Country" name="country" value="{{ $edit->country }}">
                            @if ($errors->has('country'))
                                <div class="text-danger">
                                    {{ $errors->first('country') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="eveDescription" class="form-label">Event Description</label>
                            <textarea class="form-control" type="text" id="eveDescription" placeholder="Enter Description" name="event_description" rows="3">{{ $edit->event_description}}</textarea>
                            @if ($errors->has('event_description'))
                                <div class="text-danger">
                                    {{ $errors->first('event_description') }}
                                </div>
                            @endif
                    </div>
                    <div class="btn_grp mt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
