@extends('backend.master')
@section('content')
    <div class="main_screen">
        <!-- COMMON CODE END -->
        <div class="container-fluid">

            <div class="d-flex align-items-end my-4 gap-5">
                <div class="button mt-lg-5">
                    <a href="{{ route('create.expenses') }}" class="btn create_btn"><span>Craete Expenses</span><img
                            src="{{asset('assets/images/create_btn.svg')}}" /></a>
                </div>
                <div class="col-md-2">
                <input type="text" placeholder="Search" />
            </div>
            </div>
            <div class="top_bar d-flex align-items-center">
                <a href="{{ route('expenses.main') }}" class="text-white">
                    <i class="bi bi-arrow-left-short">
                    </i>
                </a>
                <div class="page_heading text-center w-100">
                    Expenses Details
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
                            <th style="width: 9%">
                                <span>Event Name</span>
                            </th>
                            <th style="width: 9%">
                                <span>Expense Name</span>
                            </th>
                            <th style="width: 9%">
                                <span>Paid By</span>
                            </th>
                            <th style="width: 8%">
                                <span>Ammount</span>
                            </th>
                            <th style="width: 8%">
                                <span>Due Date</span>
                            </th>
                            <th style="width: 8%">
                                <span>Contact No.</span>
                            </th>
                            <th style="width: 8%">
                                <span>Category</span>
                            </th>
                            <th style="width: 8%">
                                <span>Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="checklistView">
                        @foreach ($expenses as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->event ? $item->event->event_name : 'No event assigned' }}</td>
                                <td>{{ $item->expense_name }}</td>
                                <td>{{ $item->paid_by }}</td>
                                <td>{{ $item->ammount }}</td>
                                <td>{{ $item->due_date->format('d/m/Y') }}</td>
                                <td>{{ $item->contact_number }}</td>
                                <td>{{ $item->category }}</td>
                                <td>
                                    <div class="actions d-flex gap-5">
                                        <a href="{{ route('edit.expenses', ['id' => $item->id, 'event_id' => $item->event_id]) }}" id="openModal"><img
                                                src="{{asset('assets/images/edit.svg')}}" alt="" />
                                        </a>
                                        <form action="{{ route('expenses.delete', $item->id) }}" method="POST"
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
