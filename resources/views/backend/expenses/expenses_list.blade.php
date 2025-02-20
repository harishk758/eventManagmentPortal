@extends('backend.master')
@section('content')


<style>
  .tab-btn {
      cursor: pointer;
      transition: all 0.3s ease-in-out;
      padding: 5px 10px;
      border-radius: 5px;
  }
  
  /* Hover Effect */
  .tab-btn:hover {
      background-color: black !important;
      color: white !important;
  }
  
  /* Active Tab Styling */
  .tab-btn.active {
      border: 2px solid white;
  }
</style>
<div class="main_screen">
    <div class="container-fluid">
      <div class="row justify-content-around gap-y15 pt-lg-5 pt-4">
        <div class="col-md-4">
            <div class="text-center dash_card d-flex flex-column align-items-center p-3 rounded-3" style="background-color: #FDB731;">
                <div class="event_time fw-bold text-white">Total Expenses</div>
                <div class="event_value d-flex gap-2 text-white fs-4"><span>INR</span>{{ number_format($totalExpenses) }}</div>
            </div>
        </div>
        <!-- Last Event Expenses -->
        <div class="col-md-4">
            <div class="text-center dash_card d-flex flex-column align-items-center p-3 rounded-3" style="background-color: #F26B41;">
                <div class="event_time fw-bold text-white">Last Event Expenses</div>
                <div class="event_value d-flex gap-2 text-white fs-4"><span>INR</span> {{ number_format($lastEventExpenses) }}</div>
            </div>
        </div>
        <div class="col-md-4">
          <div class="text-center dash_card d-flex flex-column align-items-center p-3 rounded-3 position-relative" style="background-color: #A3CE4B;">
              <!-- Tab Buttons with Hover -->
              <div class="d-flex gap-2 position-absolute top-0 start-50 translate-middle-x">
                  <span class="badge tab-btn bg-warning text-dark active mt-2" data-target="week">Last Week</span>
                  <span class="badge tab-btn bg-orange text-dark mt-2" data-target="month">Last Month</span>
                  <span class="badge tab-btn bg-success text-dark mt-2" data-target="year">Last Year</span>
              </div>
              <!-- Tab Content -->
              <div class="event_value d-flex gap-2 text-white fs-4 mt-4 tab-content" id="week"><span>INR</span>{{ number_format($lastWeekExpenses) }}</div>
              <div class="event_value d-flex gap-2 text-white fs-4 mt-4 tab-content d-none" id="month"><span>INR</span>{{ number_format($lastMonthExpenses) }}</div>
              <div class="event_value d-flex gap-2 text-white fs-4 mt-4 tab-content d-none" id="year"><span>INR</span> {{ number_format($lastYearExpenses) }}</div>
          </div>
      </div>

      <div class="wrapper">
        <table class="display table table-bordered table-hover" id="example" cellspacing="0" width="100%">
          <thead class="table_head">
            <tr>
              <th style="width: 5%;">S No.</th>
              <th style="width: 20%;">Name</th>
              <th style="width: 9%;">Total Booths</th>
              <th style="width: 8%;">Start Date</th>
              <th style="width: 8%;">End Date</th>
              <th style="width: 12%;">Total Expenses</th>
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
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
        let tabs = document.querySelectorAll(".tab-btn");
        let contents = document.querySelectorAll(".tab-content");
        tabs.forEach(tab => {
            tab.addEventListener("click", function () {
                // Remove active class from all tabs
                tabs.forEach(t => t.classList.remove("active"));

                // Hide all tab contents
                contents.forEach(content => content.classList.add("d-none"));

                // Show selected content
                let target = this.getAttribute("data-target");
                document.getElementById(target).classList.remove("d-none");

                // Add active class to clicked tab
                this.classList.add("active");
            });
        });
    });
</script>


  @endsection