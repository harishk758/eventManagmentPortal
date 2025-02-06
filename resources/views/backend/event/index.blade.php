@extends('backend.master')
@section('content')
    <div class="main_screen">
        <!-- COMMON CODE END -->
        <div class="container-fluid">

            <div class="d-flex align-items-end my-4 gap-5">
                <div class="button mt-lg-5">
                    <a href="{{ route('add_event') }}" class="btn create_btn"><span>Craete Event</span><img
                            src="./assets/images/create_btn.svg" /></a>

                </div>
                <div class="col-md-2">
                    <input type="text" placeholder="Search" />
                </div>
            </div>
            <div class="wrapper mt-lg-5">
                {{-- <table class="table table-bordered table-hover" cellspacing="0" width="100%">
                    <thead class="table_head">
                        <tr>
                            <th style="width:5%;">S No.</th>
                            <th style="width:20%;">
                                <span>Name</span><i class="bi bi-chevron-down"></i>
                            </th>
                            <th style="width:9%;">
                                <span>Category</span><i class="bi bi-chevron-down"></i>
                            </th>
                            <th style="width:8%;">
                                <span>Start Date</span><i class="bi bi-chevron-down"></i>
                            </th>
                            <th style="width:8%;">
                                <span>End Date</span><i class="bi bi-chevron-down"></i>
                            </th>
                            <th style="width:12%;">
                                <span>Location (City)</span><i class="bi bi-chevron-down"></i>
                            </th>
                            <th style="width:8%;">
                                <span>Status</span><i class="bi bi-chevron-down"></i>
                            </th>
                            <th style="width:8%;">
                                <span>Actions</span><i class="bi bi-chevron-down"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="event">
                        <tr>
                            <td>1</td>
                            <td>Dubai Expo Awards 2025</td>
                            <td>Promotion</td>
                            <td>12-01-2025</td>
                            <td>20-01-2025</td>
                            <td>Dubai</td>
                            <td><Select>
                                    <option value="">Completed</option>
                                    <option value="1">Running</option>
                                    <option value="2">Upcomming</option>
                                    <option value="3">Cancelled</option>
                                </Select></td>
                            <td>
                                <div class="actions d-flex gap-5">
                                    <a href="Javascript:void(0)"><img src="./assets/images/delete.svg" alt=""></a>
                                    <a href="Javascript:void(0)"><img src="./assets/images/edit.svg" alt=""></a>
                                </div>
                            </td>
                        </tr>
                   </tbody>
                </table> --}}
                @if (session()->has('success'))
                <div class="alert alert-success text-center">
                    {{ session()->get('success') }}
                </div>
            @endif
               
                <table class="table table-bordered table-hover" cellspacing="0" width="100%">
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
                                    <a href="{{ route('event_edit',$event->id)}}"><img src="{{ asset('assets/images/edit.svg') }}" alt="Edit"></a>
                                    <form action="{{ route('event_delete', $event->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="border:none; background:none;" onclick="return confirm('Are you sure want to delete this record ?');  ">
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
            {{-- <nav class="pagination mx-auto mt-5">
                <a href="#" class="previous"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M18 10a.75.75 0 0 1-.75.75H4.66l2.1 1.95a.75.75 0 1 1-1.02 1.1l-3.5-3.25a.75.75 0 0 1 0-1.1l3.5-3.25a.75.75 0 1 1 1.02 1.1l-2.1 1.95h12.59A.75.75 0 0 1 18 10Z"
                            clip-rule="evenodd"></path>
                    </svg> Previous</a>
                <ul class="pages">
                    <li class="page"><a href="#" class="current" aria-current="page">1</a></li>
                    <li class="page"><a href="#">2</a></li>
                    <li class="page"><a href="#">3</a></li>
                    <li class="dots">&hellip;</li>
                    <li class="page"><a href="#">8</a></li>
                    <li class="page"><a href="#">9</a></li>
                    <li class="page"><a href="#">10</a></li>
                </ul>
                <a href="#" class="next">Next <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M18 10a.75.75 0 0 1-.75.75H4.66l2.1 1.95a.75.75 0 1 1-1.02 1.1l-3.5-3.25a.75.75 0 0 1 0-1.1l3.5-3.25a.75.75 0 1 1 1.02 1.1l-2.1 1.95h12.59A.75.75 0 0 1 18 10Z"
                            clip-rule="evenodd"></path>
                    </svg></a>
            </nav> --}}
        </div>
    </div>
@endsection
