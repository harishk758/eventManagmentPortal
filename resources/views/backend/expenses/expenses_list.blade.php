@extends('backend.master')
@section('content')


<div class="main_screen">
    <div class="container-fluid">
      
      <div class="row justify-content-around gap-y15 pt-lg-5 pt-4">
        <div class="col-md-3">
          <div class="text-center dash_card d-flex justify-content-center align-items-center gap-y15" style="background-color: #FDB731">
          
            <div>
              <div class="event_time">Total Expenses</div>
              <div class="event_value d-flex gap-3"><span>INR</span>1600000 </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="text-center dash_card d-flex justify-content-center align-items-center gap-5" style="background-color: #F26B41">
            
            <div>
                <div class="event_time">Last Event Expenses</div>
                <div class="event_value d-flex gap-3"><span>INR</span>900000
                 </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="text-center dash_card d-flex justify-content-center align-items-center gap-5" style="background-color: #A3CE4B">
           
            <div>
                <div class="event_time">Total Expenses</div>
                <div class="event_value d-flex gap-3"><span>INR</span>1600000 </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="text-center dash_card d-flex justify-content-center align-items-center gap-5" style="background-color: #44C8F5">
           
            <div>
                <div class="event_time">Upcomming Expenses</div>
                <div class="event_value d-flex gap-3"><span>INR</span>2600000 </div>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex gap-5 align-items-center my-4">
        <div>
          <input type="text" placeholder="Search" />
        </div>
      </div>
      <div class="wrapper">
        <table class="table table-bordered table-hover" cellspacing="0" width="100%">
          <thead class="table_head">
            <tr>
              <th style="width: 5%;">S No.</th>
              <th style="width: 20%;">Name</th>
              <th style="width: 9%;">Total Booths</th>
              <th style="width: 8%;">Start Date</th>
              <th style="width: 8%;">End Date</th>
              <th style="width: 12%;">Total Expenses</th>
              <th style="width: 8%;">Status</th>
              <th style="width: 8%;">Actions</th>
            </tr>
          </thead>
          <tbody id="expenses">
            @foreach ($expenses as $key => $item)
            <tr>
              <td>{{$key + 1}}</td>
              <td>{{$item['event_name']}}</td>
              <td>{{$item['total_booths']}}</td>
              <td>{{date('d-M-y',strtotime($item['start_date']))}}</td>
              <td>{{date('d-M-y',strtotime($item['end_date']))}}</td>
              <td>₹{{ number_format($item['total_expense'], 2) }}</td>
              <td>{{$item['status']}}</td>
              <td>
                <div class="actions d-flex gap-5">
                  <a href="{{route('expenses',$item['event_id'])}}"><img src="{{asset('assets/images/eye.svg')}}" alt="View"></a>
                  {{-- <a href="javascript:void(0)"><img src="{{asset('assets/images/dowload.svg')}}" alt="Download"></a> --}}
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{-- <nav class="pagination mx-auto mt-5">
        <a href="#" class="previous">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M18 10a.75.75 0 0 1-.75.75H4.66l2.1 1.95a.75.75 0 1 1-1.02 1.1l-3.5-3.25a.75.75 0 0 1 0-1.1l3.5-3.25a.75.75 0 1 1 1.02 1.1l-2.1 1.95h12.59A.75.75 0 0 1 18 10Z" clip-rule="evenodd"></path>
          </svg>
          Previous
        </a>
        <ul class="pages">
          <li class="page"><a href="#" class="current" aria-current="page">1</a></li>
          <li class="page"><a href="#">2</a></li>
          <li class="page"><a href="#">3</a></li>
          <li class="dots">&hellip;</li>
          <li class="page"><a href="#">8</a></li>
          <li class="page"><a href="#">9</a></li>
          <li class="page"><a href="#">10</a></li>
        </ul>
        <a href="#" class="next">
          Next
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M18 10a.75.75 0 0 1-.75.75H4.66l2.1 1.95a.75.75 0 1 1-1.02 1.1l-3.5-3.25a.75.75 0 0 1 0-1.1l3.5-3.25a.75.75 0 1 1 1.02 1.1l-2.1 1.95h12.59A.75.75 0 0 1 18 10Z" clip-rule="evenodd"></path>
          </svg>
        </a>
      </nav> --}}
    </div>
  </div>

  @endsection