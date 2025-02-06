
@extends('backend.master')
@section('content')

<div class="main_screen">
    <div class="container-fluid">
        <div class="d-flex align-items-center my-4 gap-5">
            <form class="w-100">
                <div class="col-md-4 button">
                    <input type="text" class="form-control" placeholder="Search" />
                </div>
            </form>
        </div>

        {{-- <!-- Modal -->
        <div class="modal" id="teamModal">
            <div class="modal-content event_form">
                <span class="close" id="closeModal"><i class="fa-solid fa-x"></i></span>
                <div class="page_title text-center my-md-4 my-lg-2">
                    <span>Team Member Details</span>
                </div>
                <form id="teamForm">
                    <div class="d-flex justify-content-between input_row">
                        <div class="form-group text_field50">
                            <label for="membername" class="form-label">Member Name</label>
                            <input id="membername" type="text" required />
                        </div>

                        <div class="form-group text_field50">
                            <label class="form-label" for="Designation">Designation</label>
                            <input type="text" id="Designation" required />
                        </div>
                    </div>
                    <div class="d-flex justify-content-between input_row">
                        <div class="form-group text_field30">
                            <label class="form-label" for="Email">Email</label>
                            <input type="text" id="Email" required />
                        </div>

                        <div class="form-group text_field30">
                            <label class="form-label" for="contact">Contact No.</label>
                            <input type="text" id="contact" required />
                        </div>
                        <div class="form-group text_field30">
                            <label class="form-label" for="contact">Contact No.</label>
                            <input type="text" id="contact" required />
                        </div>
                    </div>
                    <div class="d-flex justify-content-between input_row">
                        <div class="text_field30">
                            <label for="aadharfront" class="form-label">Aadhar Front</label>
                            <input id="aadharfront" type="file" />
                        </div>

                        <div class="form-group text_field70">
                            <label class="form-label" for="Designation">Designation</label>
                            <input type="text" id="Designation" required />
                        </div>
                    </div>
                    <div class="d-flex justify-content-between input_row align-items-center">

                        <div class="btn"><a type="submit" class="btn btn-primary">Submit</a></div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal" id="teamModal2">
            <div class="modal-content event_form">
                <span class="close" id="closeModal2"><i class="fa-solid fa-x"></i></span>
                <div class="page_title text-center my-md-4 my-lg-2">
                    <span>Team Member Details</span>
                </div>
                <form id="teamForm">
                    <div class="d-flex justify-content-between input_row">
                        <div class="form-group text_field50">
                            <label for="membername" class="form-label">Member Name</label>
                            <input id="membername" type="text" required />
                        </div>

                        <div class="form-group text_field50">
                            <label class="form-label" for="Designation">Designation</label>
                            <input type="text" id="Designation" required />
                        </div>
                    </div>
                    <div class="d-flex justify-content-between input_row">
                        <div class="form-group text_field30">
                            <label class="form-label" for="Email">Email</label>
                            <input type="text" id="Email" required />
                        </div>

                        <div class="form-group text_field30">
                            <label class="form-label" for="contact">Contact No.</label>
                            <input type="text" id="contact" required />
                        </div>
                        <div class="form-group text_field30">
                            <label class="form-label" for="contact">Contact No.</label>
                            <input type="text" id="contact" required />
                        </div>
                    </div>
                    <div class="d-flex justify-content-between input_row">
                        <div class="text_field30">
                            <label for="aadharfront" class="form-label">Aadhar Front</label>
                            <input id="aadharfront" type="file" />
                        </div>

                        <div class="form-group text_field70">
                            <label class="form-label" for="Designation">Designation</label>
                            <input type="text" id="Designation" required />
                        </div>
                    </div>
                    <div class="d-flex justify-content-between input_row align-items-center">

                        <div class="btn"><a type="submit" class="btn btn-primary">Submit</a></div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal" id="teamModal3">
            <div class="modal-content event_form">
                <span class="close" id="closeModal3"><i class="fa-solid fa-x"></i></span>
                <div class="page_title text-center my-md-4 my-lg-2">
                    <span>Team Member Details</span>
                </div>
                <form id="teamForm">
                    <div class="d-flex justify-content-between input_row">
                        <div class="form-group text_field50">
                            <label for="membername" class="form-label">Member Name</label>
                            <input id="membername" type="text" required />
                        </div>

                        <div class="form-group text_field50">
                            <label class="form-label" for="Designation">Designation</label>
                            <input type="text" id="Designation" required />
                        </div>
                    </div>
                    <div class="d-flex justify-content-between input_row">
                        <div class="form-group text_field30">
                            <label class="form-label" for="Email">Email</label>
                            <input type="text" id="Email" required />
                        </div>

                        <div class="form-group text_field30">
                            <label class="form-label" for="contact">Contact No.</label>
                            <input type="text" id="contact" required />
                        </div>
                        <div class="form-group text_field30">
                            <label class="form-label" for="contact">Contact No.</label>
                            <input type="text" id="contact" required />
                        </div>
                    </div>
                    <div class="d-flex justify-content-between input_row">
                        <div class="text_field30">
                            <label for="aadharfront" class="form-label">Aadhar Front</label>
                            <input id="aadharfront" type="file" />
                        </div>

                        <div class="form-group text_field70">
                            <label class="form-label" for="Designation">Designation</label>
                            <input type="text" id="Designation" required />
                        </div>
                    </div>
                    <div class="d-flex justify-content-between input_row align-items-center">

                        <div class="btn"><a type="submit" class="btn btn-primary">Submit</a></div>
                    </div>
                </form>
            </div>
        </div> --}}

        <div class="wrapper mt-lg-5">
            <table class="table table-bordered table-hover" cellspacing="0" width="100%">
                <thead class="table_head">
                    <tr>
                        <th style="width: 5%">S No.</th>
                        <th style="width: 15%">Event Name</th>

                        <th style="width: 7%">Total Tasks</th>
                        <th style="width: 11%">Team Members</th>
                        <th style="width: 8%">Status</th>
                        <th style="width: 12%" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="checklist">
                    @foreach($checklists as $key => $item)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$item['event_name']}}</td>

                        <td>{{$item['total_tasks']}}</td>
                        <td>{{$item['total_team_members']}}</td>
                        <td>{{$item['status']}}</td>
                        <td>
                            <div class="actions d-flex justify-content-around"> 
                                <a href="{{ route('checklist_task',$item['event_id'])}}"><img src="{{asset('assets/images/eye.svg')}}" alt="" /></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    {{-- <tr>
                        <td>1</td>
                        <td>Akshay Jain</td>

                        <td>15</td>
                        <td>12</td>
                        <td>Assigned</td>
                        <td class="">
                            <a href="{{ route('add_cklist_task')}}" id="openModal3"
                                class="d-flex gap-5 actions openModal justify-content-center"
                                style="color: #128807"><span>Create</span><img
                                    src="{{asset('assets/images/checklist_create.svg')}}" />
                            </a>
                        </td>
                    </tr> --}}
                    {{-- <td>
                        <div class="actions d-flex justify-content-around"> 
                            <a href="{{ route('checklist_task')}}"><img src="{{asset('assets/images/eye.svg')}}" alt="" /></a>
                        </div>
                    </td> --}}
                    <!-- More rows follow ... -->
                </tbody>
            </table>
        </div>
        {{-- <nav class="pagination mx-auto mt-5">
            <a href="#" class="previous">
                <!-- SVG icon for previous -->
            </a>
            <ul class="pages">
                <li class="page">
                    <a href="#" class="current" aria-current="page">1</a>
                </li>
                <li class="page"><a href="#">2</a></li>
                <li class="page"><a href="#">3</a></li>
                <li class="dots">&hellip;</li>
                <li class="page"><a href="#">8</a></li>
                <li class="page"><a href="#">9</a></li>
                <li class="page"><a href="#">10</a></li>
            </ul>
            <a href="#" class="next">
                <!-- SVG icon for next -->
            </a>
        </nav> --}}
    </div>
</div>


@endsection