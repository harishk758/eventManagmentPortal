@extends('backend.master')
@section('content')
    <div class="main_screen">
        <!-- COMMON CODE END -->
        <div class="top_bar d-flex align-items-center">
            <a href="{{ route('expenses.main') }}" class="text-white">
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
                <form action="{{ route('store.expenses') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="page_title text-center my-md-4">
                        <span>Expense Detalis</span>
                    </div>

                    <div class="row gap-y15">
                        <div class="col-lg-4 col-md-6">
                            <label for="eventName" class="form-label">Event Name <span>*</span></label>
                            <select name="event_id" id="event_id" class="form-select">
                                <option value="">Select Event</option>
                                @foreach ($event as $event_view)
                                    <option value="{{ $event_view->id }}">{{ $event_view->event_name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('event_name'))
                                <div class="text-danger">
                                    {{ $errors->first('event_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="membername" class="form-label">Expense Name</label>
                            <input id="membername" type="text" name="expense_name" placeholder="Enter Expense Name"
                                required />
                            @if ($errors->has('expense_name'))
                                <div class="text-danger">
                                    {{ $errors->first('expense_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label" for="paidby">Paid By</label>
                            <input type="text" id="paidby" name="paid_by" placeholder="Enter Paid By" required />
                            @if ($errors->has('paid_by'))
                                <div class="text-danger">
                                    {{ $errors->first('paid_by') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label" for="paidby">Ammount</label>
                            <input type="number" id="paidby" name="ammount" placeholder="Enter Ammount" required />
                            @if ($errors->has('ammount'))
                                <div class="text-danger">
                                    {{ $errors->first('ammount') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="due_date" class="form-label">Due Date</label>
                            <input type="date" id="due_date" placeholder="Enter Address" name="due_date">
                            @if ($errors->has('due_date'))
                                <div class="text-danger">
                                    {{ $errors->first('due_date') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="contact_number" class="form-label">Contact No.
                            </label>
                            <input type="text" id="contact_number" placeholder="Enter Contact Number" name="contact_number">
                            @if ($errors->has('contact_number'))
                                <div class="text-danger">
                                    {{ $errors->first('contact_number') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <label for="category" class="form-label">Category
                            </label>
                            <input type="text" id="category" placeholder="Enter Category" name="category">
                            @if ($errors->has('category'))
                                <div class="text-danger">
                                    {{ $errors->first('category') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="eveCountry" class="form-label">Upload Image
                            </label>
                            <input type="file" name="upload_img">
                            @if ($errors->has('country'))
                                <div class="text-danger">
                                    {{ $errors->first('country') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="credesignation" class="form-label">Expense Desgination
                            </label>
                                <textarea name="expense_desgination" class="form-control" id="" cols="" rows="3"></textarea>
                            @if ($errors->has('expense_desgination'))
                                <div class="text-danger">
                                    {{ $errors->first('expense_desgination') }}
                                </div>
                            @endif
                        </div>
                        
                    </div>
                    <div class="btn_grp d-flex justify-content-end">
                        {{-- <a class="btn btn-success ">Submit
                            Details</a> --}}
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection














<!-- form code -->
