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
                Checklist Task Details
            </div>
        </div>
        <div class="container-fluid">
            <div class="d-flex align-items-end my-4 gap-5">
                <div class="button mt-lg-5">
                    <a href="{{ route('add_cklist_task') }}" class="btn create_btn"><span>Create Checklist</span><img
                            src="{{asset('assets/images/create_btn.svg')}}" /></a>

                </div>
                
            </div>
            @if (session()->has('success'))
            <div class="alert alert-success text-center">
                {{ session()->get('success') }}
            </div>
        @endif
            <div class="wrapper mt-lg-5">
                <table class="display table table-bordered table-hover" id="example" cellspacing="0" width="100%">
                    <thead class="table_head">
                        <tr>
                            <th>So. No.</th>
                            <th>Task</th>
                            <th>Category</th>
                            <th>Assigned To</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="checklistView">
                        @foreach ($view as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                {{-- <td>{{ $item->event ? $item->event->event_name : 'No event assigned' }}</td> --}}
                                <td>{{ $item->task }}</td>
                                <td>{{ $item->category }}</td>
                                {{-- <td>{{ $item->teamMember->member_name }}</td> --}}
                                <td>{{ $item->teamMember ? $item->teamMember->member_name : '-' }}</td>
                                <td>{{ $item->due_date->format('m/d/Y') }}</td>
                                {{-- <td>
                                    {{ $item->priority == 0 ? 'low' : ($item->priority == 1 ? 'Normal' : 'High') }}
                                </td> --}}

                                <td>
                                    <select class="form-select status-dropdown" data-id="{{ $item->id }}"
                                        @if($item->status === 'paid') disabled @endif>
                                        <option value="pending" @if($item->status === 'Pending') selected @endif>Pending</option>
                                        <option value="overdue" @if($item->status === 'Overdue') selected @endif>Overdue</option>
                                        <option value="paid" @if($item->status === 'Paid') selected @endif>Paid</option>
                                    </select>
                                </td>
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


    <script>
        $(document).ready(function () {
            $('.status-dropdown').change(function () {
                let paymentId = $(this).data('id');
                let newStatus = $(this).val();
                Swal.fire({
                    title: "Are you sure?",
                    text: "Do you want to change the status to " + newStatus + "?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#28A745",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Update!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('update.checklist.status') }}",
                            type: "POST",
                            data: {
                                id: paymentId,
                                status: newStatus,
                                _token: "{{ csrf_token() }}"
                            },
                            success: function (response) {
                                if (response.success) {
                                    Swal.fire("Updated!", "Status has been updated successfully.", "success");
                                    // if (newStatus === "paid") {
                                    //     $("select[data-id='" + paymentId + "']").prop("disabled", true);
                                    // }
                                }else{
                                    alert(response.message);
                                    location.reload();
                                }
                            },
                            error: function () {
                                Swal.fire("Error!", "Something went wrong.", "error");
                            }
                        });
                    } else {
                        // Revert to previous selection if canceled
                        location.reload();
                    }
                });
            });
        });
    </script>

@endsection
