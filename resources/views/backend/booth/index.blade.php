@extends('backend.master')
@section('content')
    <div class="main_screen">
        <div class="container-fluid">
            <div class="d-flex align-items-end my-4 gap-5">
                <div class="button mt-lg-5">
                    <a href="{{ route('add_booth') }}" class="btn create_btn"><span>Craete Booth</span><img
                            src="./assets/images/create_btn.svg" /></a>

                </div>
                {{-- <div class="col-md-2">
                    <input type="text" placeholder="Search" />
                </div> --}}
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
                            <th style="width:10%;">
                                <span>Event Name</span>
                            </th>
                            <th style="width:9%;">
                                <span>Booth Name</span>
                            </th>
                            <th style="width:8%;">
                                <span>Booth Cost</span>
                            </th>
                            <th style="width:8%;">
                                <span>Booth Supervisor</span>
                            </th>
                            <th style="width:12%;">
                                <span>Booth Requirements</span>
                            </th>
                            <th style="width:8%;">
                                <span>Vendor Name</span>
                            </th>
                            <th style="width:8%;">
                                <span>Vendor Company </span>
                            </th>
                            <th style="width:8%;">
                                <span>Country</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="event">
                        @foreach ($booth as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->event ? $item->event->event_name : 'No event assigned' }}</td>
                            <td>{{ $item->booth_name}}</td>
                            <td>{{ $item->booth_cost}}</td>
                            <td>{{ $item->booth_supervisor}}</td>
                            <td>{{ $item->booth_requirements}}</td>
                            <td>{{$item->vendor->vendor_name ?? 'Not Assigned' }}</td>
                            <td>
                                {{$item->vendor->vendor_company ?? 'Not company' }}
                            </td>
                            <td>
                                <div class="actions d-flex gap-5">
                                    <a href="{{ route('booth.edit', $item->id) }}">
                                        <img src="./assets/images/edit.svg" alt="Edit">
                                    </a>
                            
                                    <!-- Delete Form -->
                                    <form action="{{ route('booth.delete', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this booth and vendor?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="border: none; background: none;">
                                            <img src="./assets/images/delete.svg" alt="Delete">
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
