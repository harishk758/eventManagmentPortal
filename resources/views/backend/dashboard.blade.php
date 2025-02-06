@extends('backend.master')
@section('content')
    <div class="main_screen">
        <!-- COMMON CODE END -->
        <div class="container-fluid">
            <div class="row justify-content-around my-2 gap-y15 pt-lg-5 pt-4">
                <div class="col-lg-3 col-md-6">
                    <div class="text-center dash_card d-flex justify-content-center align-items-center gap-5"
                        style="background-color: #fdb731">
                        {{-- <div class="box_icon">
                            <img src="./assets/images/upcomming.svg" alt="Past Events">
                        </div> --}}
                        <div>
                            <div class="event_time">Upcoming Events</div>
                            <div class="event_value">{{ $upcomingEvents }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="text-center dash_card d-flex justify-content-center align-items-center gap-5"
                        style="background-color: #f26b41">
                        {{-- <div class="box_icon">
                            <img src="./assets/images/running.svg" alt="Past Events">
                        </div> --}}
                        <div>
                            <div class="event_time">Running Events</div>
                            <div class="event_value">{{ $runningEvents }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="text-center dash_card d-flex justify-content-center align-items-center gap-5"
                        style="background-color: #a3ce4b">
                        {{-- <div class="box_icon">
                            <img src="./assets/images/event.svg" alt="Past Events">
                        </div> --}}
                        <div>
                            <div class="event_time">Total Past Events</div>
                            <div class="event_value">{{ $pastEvents }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="text-center dash_card d-flex justify-content-center align-items-center gap-5"
                        style="background-color: #44C8F5">
                        {{-- <div class="box_icon">
                            <img src="./assets/images/event.svg" alt="Past Events">
                        </div> --}}
                        <div>
                            <div class="event_time">Upcomming Expenses</div>
                            <div class="event_value d-flex gap-2"><span>INR</span>2600000 </div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- <div class="d-flex justify-content-lg-between align-items-center my-4">
                <div>
                    <input type="text" placeholder="Search" />
                </div>
                <div class="w-25">
                    <select name="category" id="category">
                        <option value="">Select Option</option>
                        <option value="1">Past</option>
                        <option value="2">Running</option>
                        <option value="3">Cancelled</option>
                        <option value="4">Upcomming</option>
                    </select>
                </div>
                <div class="d-lg-flex align-items-center input_field justify-content-lg-between gap-2 d-sm-none">
                    <input type="date" placeholder="dd-mm-yyyy" />
                    <span>To</span>
                    <input type="date" placeholder="dd-mm-yyyy" />
                </div>
                <div class="d-sm-none d-lg-block w-25">
                    <select name="city" id="city">
                        <option value="city1">Dubai</option>
                        <option value="city2">Jaipur</option>
                        <option value="city3">Delhi</option>
                    </select>
                </div>
            </div> --}}
            <div class="wrapper">
                <table class="table table-bordered table-hover" cellspacing="0" width="100%">
                    <thead class="table_head">
                        <tr>
                            <th style="width:5%;">S No.</th>
                            <th style="width:15%;">
                                <span>Event Name</span><i class="bi bi-chevron-down"></i>
                            </th>
                            <th style="width:9%;">
                                <span>Total Booths</span><i class="bi bi-chevron-down"></i>
                            </th>
                            <th style="width:8%;">
                                <span>Start Date</span><i class="bi bi-chevron-down"></i>
                            </th>
                            <th style="width:8%;">
                                <span>End Date</span><i class="bi bi-chevron-down"></i>
                            </th>
                            <th style="width:12%;">
                                <span>Location (Country)</span><i class="bi bi-chevron-down"></i>
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
                        @foreach ($all_event as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->event_name }}</td>
                                <td>{{ $item->booths_count }}</td> <!-- Total booths count -->
                                <td>{{ date('d/m/Y', strtotime($item->start_date)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($item->end_date)) }}</td>
                                <td>{{ $item->country }}</td>
                                <td>
                                    @php
                                        $today = \Carbon\Carbon::today();
                                        if ($item->end_date < $today) {
                                            echo 'Complete';
                                        } elseif ($item->start_date > $today) {
                                            echo 'Coming Soon';
                                        } else {
                                            echo 'Pending';
                                        }
                                    @endphp
                                </td>
                                <td>
                                    <div class="actions d-flex gap-5">
                                        <a href="Javascript:void(0)"><img src="./assets/images/eye.svg" alt=""></a>
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
