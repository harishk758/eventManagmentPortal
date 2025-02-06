@extends('backend.master')

@section('content')
    <div class="main_screen">

        <div class="top_bar d-flex align-items-center">
            <a href="javascript:window.history.back()" class="text-white">
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
                <form action="{{ route('event.storeAssignment') }}" method="POST">
                    <div class="row gap-y15">
                        @csrf
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="member_id" value="{{ $teamMember->id }}">
                                <label for="event_id">Event</label>
                                <select name="event" id="event_id" class="form-control">
                                    <option value="" selected disabled>Select Event</option>
                                    @foreach ($events as $event)
                                        <option value="{{ $event->id }}">{{ $event->event_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('event'))
                                    <div class="text-danger">
                                        {{ $errors->first('event') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="booth_id">Booth</label>
                                <select name="booth[]" id="booth_id" class="form-control booth_idss" multiple>
                                    <option value="" selected disabled>Select Booth</option>
                                </select>
                                @if ($errors->has('booth'))
                                    <div class="text-danger">
                                        {{ $errors->first('booth') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{-- <div class="form-group">
                        <label for="assign_team_role">Assign Team</label>
                        <input type="text" name="assign_team" class="form-control">
                    </div> --}}

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control"></textarea>
                        @if ($errors->has('description'))
                            <div class="text-danger">
                                {{ $errors->first('description') }}
                            </div>
                        @endif
                    </div>
                </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Assign to Event</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const boothSelect = document.querySelector(".booth_idss");
    
            function adjustHeight() {
                if (boothSelect.options.length > 1) {
                    boothSelect.style.height = "auto";
                } else {
                    boothSelect.style.height = "45px";
                }
            }
    
            boothSelect.addEventListener("change", adjustHeight);
    
            document.getElementById("event_id").addEventListener("change", function () {
                setTimeout(() => {
                    adjustHeight();
                }, 500);
            });
    
            adjustHeight();
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
