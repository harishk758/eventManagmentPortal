@extends('backend.master')
@section('content')
    <div class="main_screen">
        <!-- COMMON CODE END -->
        <div class="container-fluid">

            <div class="d-flex align-items-center my-4 gap-5">
                <div class="button">
                    <a href="{{ route('team.create') }}" class="btn create_btn">
                        <span>Create Team</span>
                        <img src="{{ asset('assets/images/create_btn.svg') }} " />
                    </a>
                </div>
                <div class="col-md-2 button">
                    <input type="text" placeholder="Search" />
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
                            <th style="width:5%;">S No.</th>
                            <th style="width:15%;">
                                <span>Member Name</span>
                            </th>
                            <th style="width:12%;">
                                <span>Designation</span>
                            </th>
                            <th style="width:15%;">
                                <span>Email</span>
                            <th style="width:7%;">
                                <span>Contact No.</span>
                            </th>
                            <th style="width:11%;">
                                <span>Assign Action</span>
                            </th>
                            <th style="width:8%;">
                                <span>Assigned Status</span>
                            </th>
                            <th style="width:8%;">
                                <span>Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="team">
                        @foreach ($show as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->member_name }}</td>
                                <td>{{ $item->designation }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->contact_number }}</td>
                                <td>
                                    <div class="team_actions d-flex flex-wrap align-items-center">
                                        @if ($item->assignEventId == null)
                                            <a href="{{ route('event.assign', $item->id) }}"
                                                class="rounded px-2 py-1 d-flex border border-success align-items-center text-success justify-content-center"><span>Assign
                                                    To
                                                    Event</span><img src="{{ asset('assets/images/assign_team.svg') }}"></a>
                                        @else
                                                <a href="{{ route('event.editAssignment', $item->assignEventId) }}" class="d-flex me-2 text-warning border-warning border align-items-center px-2 py-1 rounded" id="openModal4">Edit <img src="./assets/images/team_edit.svg"></a>

                                            <form action="{{ route('event.deleteAssignment', $item->assignEventId) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="d-flex border-danger border px-2 py-1 rounded text-danger align-items-center"
                                                    onclick="return confirm('Are you sure you want to delete this event assignment?');"> Remove<img src="{{ asset('assets/images/team_remove.svg') }}"
                                                        alt="Delete Assignment">
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    @if ($item->assignEventId == null)
                                        <span class="badge bg-danger">Not Assigned</span>
                                    @else
                                        <span class="badge bg-success"> Assigned</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="actions d-flex gap-5">
                                        <a href="{{ route('team.edit', $item->id) }}" id="openModal2">
                                            <img src="{{ asset('assets/images/edit.svg') }}" alt="">
                                        </a>
                                        <form action="{{ route('team.destroy', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="border:none; background:none;"
                                                onclick="return confirm('Are you sure want to delete this record ?');">
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
