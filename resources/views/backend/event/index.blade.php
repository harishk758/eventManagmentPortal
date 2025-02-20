@extends('backend.master')
@section('content')
    <div class="main_screen">
        <!-- COMMON CODE END -->
        <div class="container-fluid">
            <div class="d-flex align-items-end my-4 gap-5">
                <div class="button mt-lg-5">
                    <a href="{{ route('add_event') }}" class="btn create_btn"><span>Create Event</span><img
                            src="./assets/images/create_btn.svg" /></a>
                </div>
                {{-- <div class="col-md-2">
                    <input type="text" placeholder="Search" />
                </div> --}}
            </div>
            <div class="wrapper mt-lg-5">
                @if (session()->has('success'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('success') }}
                    </div>
                @endif

                {{-- <table class="table table-bordered table-hover" id="example" cellspacing="0" width="100%"> --}}
                <table id="example" class="display table table-bordered table-hover" style="width:100%">
                    <thead class="table_head">
                        <tr>
                            <th style="width:5%;">S No.</th>
                            <th style="width:20%;">Event Name</th>
                            <th style="width:8%;">Category</th>
                            <th style="width:8%;">Start Date</th>
                            <th style="width:8%;">End Date</th>
                            <th style="width:8%;">Creator Name</th>
                            <th style="width:12%;">Location Country</th>
                            <th style="width:8%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="event">
                        @foreach ($events as $key => $event)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $event->event_name }}</td>
                                <td>{{ $event->event_category }}</td>
                                <td>{{ date('d-m-Y', strtotime($event->start_date)) }}</td>
                                <td>{{ date('d-m-Y', strtotime($event->end_date)) }}</td>
                                <td>{{ $event->creator_name }}</td>
                                <td>{{ $event->country }}</td>
                                <td>
                                    <div class="actions d-flex gap-5">
                                        <a href="{{ route('event_edit', $event->id) }}"><img
                                                src="{{ asset('assets/images/edit.svg') }}" alt="Edit"></a>
                                        <form action="{{ route('event_delete', $event->id) }}" method="POST"
                                            style="display:inline;">    
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="border:none; background:none;"
                                                onclick="return confirm('Are you sure want to delete this record ?');  ">
                                                <img src="{{ asset('assets/images/delete.svg') }}" alt="Delete">
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
