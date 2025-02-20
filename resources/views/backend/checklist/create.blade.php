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
            <a href="{{ route('checklist_task.main') }}" class="text-white">
                <i class="bi bi-arrow-left-short">
                </i>
            </a>
            <div class="page_heading text-center w-100">
                Checklist Details
            </div>
        </div>
        @if (session()->has('success'))
        <div class="alert alert-success text-center">
            {{ session()->get('success') }}
        </div>
    @endif
        <div class="event_form p-3">
            <div class="details">
                <form action="{{ route('cklist_task_store') }}" method="POST" enctype="multipart/form-data" id="cklist_task_form">
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
                            <label for="task" class="form-label">Booth<span>*</span></label>
                            <select name="booth_id" id="booth_id" class="form-control booth_idss">
                                <option value="" selected disabled>Select Booth</option>
                            </select>
                            @if ($errors->has('booth_id'))
                                <div class="text-danger">
                                    {{ $errors->first('booth_id') }}
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
                            <input type="file" id="upload_img"  name="upload_img" accept=".jpg, .jpeg, .png">
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

    <script>
        $('#cklist_task_form').validate({
            rules: {
                event_id: {
                    required: true
                },
                task: {
                    required: true,
                    minlength: 3,
                    maxlength: 20,
                    notWhitespaceOnly: true,
                    noSpecialCharsForExperience: true
                },
                category: { 
                    required: true,
                    minlength: 3,
                    maxlength: 20,
                    notWhitespaceOnly: true,
                    noSpecialCharsForExperience: true
                },
                due_date: {
                    required: true
                },
                member_id: {
                    required: true
                },
                priority: {
                    required: true,
                },
                upload_img: {
                    required: true,
                },
                task_description: {
                    required: true,
                }
                
            },
            messages: {
                event_id: {
                    required: 'Event name is required.'    
                },
                task: {
                    required: 'Task is required.',
                    minlength: 'Please enter at least 3 characters.',
                    maxlength: 'Maximum length is 20 characters.',
                    regex: 'Numbers are not allowed.'
                },
                category: {
                    required: 'Category is required.',
                    minlength: 'Please enter at least 3 characters.',
                    maxlength: 'Maximum length is 20 characters.',
                    regex: 'Numbers are not allowed.'
                },
                due_date: {
                    required: 'Date is required.'
                },
                member_id: {
                    required: 'Select Member is required.'
                },
                priority: {
                    required: 'Priority is required.'
                },
                upload_img: {
                    required: 'Plz select attach image'
                },
                task_description: {
                    required: 'Description is Requires'
                }
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#event_id').on('change', function() {
                var event_id = $(this).val();
                if (event_id) {
                    $.ajax({
                        url: "{{ url('/get-booths') }}/" + event_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#booth_id').empty().append(
                                '<option value="">Select Booth(s)</option>');
                            $.each(data, function(key, booth) {
                                $('#booth_id').append('<option value="' + booth.id +
                                    '">' + booth.booth_name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#booth_id').empty().append('<option value="">Select Booth(s)</option>');
                }
            });
        });
    </script>
@endsection
