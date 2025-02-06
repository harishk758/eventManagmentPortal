@extends('backend.master')
@section('content')
    <div class="main_screen">
        <!-- COMMON CODE END -->
        <div class="container-fluid">

            <div class="d-flex align-items-end my-4 gap-5">
                <div class="button mt-lg-5">
                    <a href="{{ route('add_cklist_task') }}" class="btn create_btn"><span>Create Checklist</span><img
                            src="{{asset('assets/images/create_btn.svg')}}" /></a>

                </div>
                <div class="col-md-2">
                <input type="text" placeholder="Search" />
            </div>
            </div>
            <div class="top_bar d-flex align-items-center">
                <a href="{{ route('checklist_task.main') }}" class="text-white">
                    <i class="bi bi-arrow-left-short">
                    </i>
                </a>
                <div class="page_heading text-center w-100">
                    Checklist Task Details
                </div>
            </div>
            @if (session()->has('success'))
            <div class="alert alert-success text-center">
                {{ session()->get('success') }}
            </div>
        @endif
            <div class="wrapper mt-lg-5">
                <table class="table table-bordered table-hover" cellspacing="0" width="100%">
                    <thead class="table_head">
                        <tr>
                            <th style="width: 5%">S No.</th>
                            {{-- <th style="width: 9%">
                                <span>Event Name</span>
                            </th> --}}
                            <th style="width: 9%">
                                <span>Task</span>
                            </th>
                            <th style="width: 9%">
                                <span>Category</span>
                            </th>
                            <th style="width: 8%">
                                <span>Assigned To</span>
                            </th>
                            <th style="width: 8%">
                                <span>Due Date</span>
                            </th>
                            {{-- <th style="width: 8%">
                                <span>Completed</span>
                            </th> --}}
                            <th style="width: 8%">
                                <span>Priority</span>
                            </th>
                            <th style="width: 8%">
                                <span>Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="checklistView">
                        @foreach ($view as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                {{-- <td>{{ $item->event ? $item->event->event_name : 'No event assigned' }}</td> --}}
                                <td>{{ $item->task }}</td>
                                <td>{{ $item->category }}</td>
                                <td>{{ $item->teamMember->member_name }}</td>
                                <td>{{ $item->due_date->format('m/d/Y') }}</td>
                                <td>
                                    {{ $item->priority == 0 ? 'low' : ($item->priority == 1 ? 'Normal' : 'High') }}
                                </td>

                                {{-- <td>
                                </td> --}}
                                <td>
                                    <div class="actions d-flex gap-5">
                                        <a href="{{ route('cklist_task_edit', ['id' => $item->id, 'event_id' => $item->event_id]) }}"
                                            id="openModal"><img src="{{ asset('assets/images/edit.svg') }}"
                                                alt="" />
                                        </a>
                                        <form action="{{ route('cklist_task_delete', $item->id) }}" method="POST"
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
