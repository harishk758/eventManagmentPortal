@extends('backend.master')
@section('content')
    <div class="main_screen">
        <!-- COMMON CODE END -->
        <div class="top_bar d-flex align-items-center">
            <a href="{{ route('checklist_task.main') }}" class="text-white">
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
                <form action="{{ route('cklist_task_store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="page_title text-center my-md-4">
                        <span>Enter Checklist Task</span>
                    </div>

                    <div class="row gap-y15">
                        <div class="col-lg-4 col-md-6">
                            <label for="task" class="form-label">Event<span>*</span></label>
                            <select name="event_id" id="event_id" class="form-select">
                                <option value="">Select Event</option>
                                @foreach ($events as $event_view)
                                    <option value="{{ $event_view->id }}">{{ $event_view->event_name }}</option>
                                @endforeach
                            </select>
                            
                            @if ($errors->has('event_id'))
                                <div class="text-danger">
                                    {{ $errors->first('event_id') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="task" class="form-label">Task<span>*</span></label>
                            <input type="text" id="eventName" placeholder="Enter Task Name" name="task">
                            @if ($errors->has('task'))
                                <div class="text-danger">
                                    {{ $errors->first('task') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="category" class="form-label">Category<span>*</span>
                            </label>
                            <input type="text" id="category" name="category" placeholder="Enter Category Name">
                            @if ($errors->has('category'))
                                <div class="text-danger">
                                    {{ $errors->first('category') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="duedate" class="form-label">Due Date<span>*</span>
                            </label>
                            <input type="date" id="duedate" name="due_date">
                            @if ($errors->has('due_date'))
                                <div class="text-danger">
                                    {{ $errors->first('due_date') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="event_category" class="form-label">Assign To</label>
                            <select name="member_id" id="member_id" class="form-select">
                                <option value="">Select Member</option>
                                @foreach ($members as $name)
                                    <option value="{{ $name->id }}">{{ $name->member_name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('member_id'))
                                <div class="text-danger">
                                    {{ $errors->first('member_id') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="address" class="form-label">Priority</label>
                            <select name="priority" id="priority" class="form-select">
                                <option value="">Select Priority</option>
                                <option value="0">Low</option>
                                <option value="1">Normal</option>
                                <option value="2">High</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="upload_img" class="form-label">Attach Files</label>
                            <input type="file" id="upload_img"  name="upload_img">
                            @if ($errors->has('upload_img'))
                                <div class="text-danger">
                                    {{ $errors->first('upload_img') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="task_description" class="form-label">Task Description</label>
                            <textarea class="form-control" name="task_description" id="task_description" rows="3" placeholder="Enter Task Description"></textarea>
                        </div>
                        
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
