@extends('backend.master')
@section('content')
    <div class="main_screen">
        <div class="top_bar d-flex align-items-center">
            <a href="{{ route('expenses',$event_id) }}" class="text-white">
                <i class="bi bi-arrow-left-short"></i>
            </a>
            <div class="page_heading text-center w-100">
                Edit Expense Details
            </div>
        </div>
        
        @if (session()->has('success'))
            <div class="alert alert-success text-center">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="event_form p-3">
            <div class="details">
                <form action="{{ route('expenses.update', $expense->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="page_title text-center my-md-4">
                        <span>Edit Expense Details</span>
                    </div>

                    <div class="row gap-y15">
                        <div class="col-lg-4 col-md-6">
                            <label for="eventName" class="form-label">Event Name <span>*</span></label>
                            <select name="event_id" id="event_id" class="form-select">
                                <option value="">Select Event</option>
                                @foreach ($events as $event_view)
                                    <option value="{{ $event_view->id }}" {{ $event_view->id == $expense->event_id ? 'selected' : '' }}>
                                        {{ $event_view->event_name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('event_id'))
                                <div class="text-danger">
                                    {{ $errors->first('event_id') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <label for="expense_name" class="form-label">Expense Name</label>
                            <input id="expense_name" type="text" name="expense_name" value="{{ $expense->expense_name }}" placeholder="Enter Expense Name" required />
                            @if ($errors->has('expense_name'))
                                <div class="text-danger">
                                    {{ $errors->first('expense_name') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <label for="paid_by" class="form-label">Paid By</label>
                            <input type="text" id="paid_by" name="paid_by" value="{{ $expense->paid_by }}" placeholder="Enter Paid By" required />
                            @if ($errors->has('paid_by'))
                                <div class="text-danger">
                                    {{ $errors->first('paid_by') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="ammount" class="form-label">Amount</label>
                            <input type="number" id="ammount" name="ammount" value="{{ $expense->ammount }}" placeholder="Enter Amount" required />
                            @if ($errors->has('ammount'))
                                <div class="text-danger">
                                    {{ $errors->first('ammount') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <label for="due_date" class="form-label">Due Date</label>
                            <input type="date" id="due_date" name="due_date" value="{{ old('due_date', isset($expense->due_date) ? \Carbon\Carbon::parse($expense->due_date)->format('Y-m-d') : '') }}" />
                            @if ($errors->has('due_date'))
                                <div class="text-danger">
                                    {{ $errors->first('due_date') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <label for="contact_number" class="form-label">Contact No.</label>
                            <input type="text" id="contact_number" name="contact_number" value="{{ $expense->contact_number }}" placeholder="Enter Contact Number" />
                            @if ($errors->has('contact_number'))
                                <div class="text-danger">
                                    {{ $errors->first('contact_number') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" id="category" name="category" value="{{ $expense->category }}" placeholder="Enter Category" />
                            @if ($errors->has('category'))
                                <div class="text-danger">
                                    {{ $errors->first('category') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <label for="upload_img" class="form-label">Upload New Image (Optional)</label>
                            <input type="file" name="upload_img">
                            @if ($expense->upload_img)
                                <div class="mt-2">
                                    <img src="{{ asset('upload_image/expenses/' . $expense->upload_img) }}" width="100" alt="Current Image">
                                    <p>Current Image</p>
                                </div>
                            @endif
                            @if ($errors->has('upload_img'))
                                <div class="text-danger">
                                    {{ $errors->first('upload_img') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="expense_desgination" class="form-label">Expense Designation</label>
                            <textarea name="expense_desgination" class="form-control" id="expense_desgination" rows="3">{{ $expense->expense_desgination }}</textarea>
                            @if ($errors->has('expense_desgination'))
                                <div class="text-danger">
                                    {{ $errors->first('expense_desgination') }}
                                </div>
                            @endif
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
