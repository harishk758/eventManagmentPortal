
@extends('backend.master')
@section('content')

<div class="main_screen">
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
       
        <div class="wrapper mt-lg-5">
            <table class="display table table-bordered table-hover" id="example" cellspacing="0" width="100%">
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
    </div>
</div>


@endsection