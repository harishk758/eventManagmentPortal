@extends('backend.master')
@section('content')
<div class="main_screen">
    <!-- COMMON CODE END -->
    <div class="container-fluid">
        <div class="row justify-content-around my-2">
            <div class="col-md-3">
                <div class="text-center dash_card d-flex justify-content-center align-items-center gap-5"
                    style="background-color: #fdb731">
                    <div class="box_icon">
                        <img src="./assets/images/upcomming.svg" alt="Past Events">
                    </div>
                    <div>
                        <div class="event_time">Upcoming Events</div>
                        <div class="event_value">16</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center dash_card d-flex justify-content-center align-items-center gap-5"
                    style="background-color: #f26b41">
                    <div class="box_icon">
                        <img src="./assets/images/running.svg" alt="Past Events">
                    </div>
                    <div>
                        <div class="event_time">Running Events</div>
                        <div class="event_value">1</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">

                <div class="text-center dash_card d-flex justify-content-center align-items-center gap-5"
                    style="background-color: #a3ce4b">
                    <div class="box_icon">
                        <img src="./assets/images/event.svg" alt="Past Events">
                    </div>
                    <div>
                        <div class="event_time">Total Past Events</div>
                        <div class="event_value">12</div>
                    </div>
                </div>
            </div>

        </div>
        <div class="d-flex justify-content-lg-between align-items-center my-4">
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
        </div>
        <div class="wrapper">
            <table class="table table-bordered table-hover" cellspacing="0" width="100%">
                <thead class="table_head">
                    <tr>
                        <th style="width:5%;">S No.</th>
                        <th style="width:20%;">
                            <span>Name</span><i class="bi bi-chevron-down"></i>
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
                        <td>2</td>
                        <td>12-01-2025</td>
                        <td>20-01-2025</td>
                        <td>Dubai</td>
                        <td>Complete</td>
                        <td>
                            <div class="actions d-flex gap-5">
                                <a href="Javascript:void(0)"><img src="./assets/images/eye.svg" alt=""></a>
                                <a href="Javascript:void(0)"><img src="./assets/images/dowload.svg"
                                        alt=""></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Event Names</td>
                        <td>Total Booth</td>
                        <td>Start Date</td>
                        <td>End Date</td>
                        <td>Location</td>
                        <td>Status</td>
                        <td>
                            <div class="actions d-flex gap-5">
                                <a href="Javascript:void(0)"><img src="./assets/images/eye.svg"
                                        alt=""></a>
                                <a href="Javascript:void(0)"><img src="./assets/images/dowload.svg"
                                        alt=""></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Event Name</td>
                        <td>Total Booth</td>
                        <td>Start Date</td>
                        <td>End Date</td>
                        <td>Location</td>
                        <td>Status</td>
                        <td>
                            <div class="actions d-flex gap-5">
                                <a href="Javascript:void(0)"><img src="./assets/images/eye.svg"
                                        alt=""></a>
                                <a href="Javascript:void(0)"><img src="./assets/images/dowload.svg"
                                        alt=""></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Event Name</td>
                        <td>Total Booth</td>
                        <td>Start Date</td>
                        <td>End Date</td>
                        <td>Location</td>
                        <td>Status</td>
                        <td>
                            <div class="actions d-flex gap-5">
                                <a href="Javascript:void(0)"><img src="./assets/images/eye.svg"
                                        alt=""></a>
                                <a href="Javascript:void(0)"><img src="./assets/images/dowload.svg"
                                        alt=""></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Event Name</td>
                        <td>Total Booth</td>
                        <td>Start Date</td>
                        <td>End Date</td>
                        <td>Location</td>
                        <td>Status</td>
                        <td>
                            <div class="actions d-flex gap-5">
                                <a href="Javascript:void(0)"><img src="./assets/images/eye.svg"
                                        alt=""></a>
                                <a href="Javascript:void(0)"><img src="./assets/images/dowload.svg"
                                        alt=""></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Event Name</td>
                        <td>Total Booth</td>
                        <td>Start Date</td>
                        <td>End Date</td>
                        <td>Location</td>
                        <td>End Date</td>
                        <td>
                            <div class="actions d-flex gap-5">
                                <a href="Javascript:void(0)"><img src="./assets/images/eye.svg"
                                        alt=""></a>
                                <a href="Javascript:void(0)"><img src="./assets/images/dowload.svg"
                                        alt=""></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Event Name</td>
                        <td>Total Booth</td>
                        <td>Start Date</td>
                        <td>End Date</td>
                        <td>Location</td>
                        <td>End Date</td>
                        <td>
                            <div class="actions d-flex gap-5">
                                <a href="Javascript:void(0)"><img src="./assets/images/eye.svg"
                                        alt=""></a>
                                <a href="Javascript:void(0)"><img src="./assets/images/dowload.svg"
                                        alt=""></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Event Name</td>
                        <td>Total Booth</td>
                        <td>Start Date</td>
                        <td>End Date</td>
                        <td>Location</td>
                        <td>End Date</td>
                        <td>
                            <div class="actions d-flex gap-5">
                                <a href="Javascript:void(0)"><img src="./assets/images/eye.svg"
                                        alt=""></a>
                                <a href="Javascript:void(0)"><img src="./assets/images/dowload.svg"
                                        alt=""></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Event Name</td>
                        <td>Total Booth</td>
                        <td>Start Date</td>
                        <td>End Date</td>
                        <td>Location</td>
                        <td>End Date</td>
                        <td>
                            <div class="actions d-flex gap-5">
                                <a href="Javascript:void(0)"><img src="./assets/images/eye.svg"
                                        alt=""></a>
                                <a href="Javascript:void(0)"><img src="./assets/images/dowload.svg"
                                        alt=""></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Event Name</td>
                        <td>Total Booth</td>
                        <td>Start Date</td>
                        <td>End Date</td>
                        <td>Location</td>
                        <td>End Date</td>
                        <td>
                            <div class="actions d-flex gap-5">
                                <a href="Javascript:void(0)"><img src="./assets/images/eye.svg"
                                        alt=""></a>
                                <a href="Javascript:void(0)"><img src="./assets/images/dowload.svg"
                                        alt=""></a>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <nav class="pagination mx-auto mt-5">
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
        </nav>
    </div>
</div>
@endsection