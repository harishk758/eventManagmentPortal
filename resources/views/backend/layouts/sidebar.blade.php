<div class="sidebar">
  <div class="sidebar_list">
    <ul>
      <li class="list_item">
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}" id="tab">
          <img src="{{ asset('assets/images/dashboard.svg') }}" alt="Dashboard" />
          <span>DashBoard</span>
        </a>
      </li>
      <li class="list_item">
        <a href="{{ route('event') }}" class="{{ request()->routeIs('event') ? 'active' : '' }}" id="tab"> 
          <img src="{{ asset('assets/images/event.svg') }}" alt="Events" />
          <span>Event</span>
        </a>
      </li>
      <li class="list_item">
        <a href="{{ route('booth') }}" class="{{ request()->routeIs('booth') ? 'active' : '' }}" id="tab">
          <img src="{{ asset('assets/images/booth.svg') }}" alt="Events" />
          <span>Event Booth</span>
        </a>
      </li>
      <li class="list_item">
        <a href="{{ route('team.index') }}" class="{{ request()->routeIs('team.index') ? 'active' : '' }}" id="tab">
          <img src="{{ asset('assets/images/team.svg') }}" alt="Team" />
          <span>Team</span>
        </a>
      </li>
      <li class="list_item">
        <a href="{{ route('checklist_task.main') }}" class="{{ request()->routeIs('checklist_task.main') ? 'active' : '' }}" id="tab">
          <img src="{{ asset('assets/images/checklist.svg') }}" alt="Checklist" />
          <span>Checklist</span>
        </a>
      </li>
      <li class="list_item">
        <a href="{{ route('expenses.main') }}" class="{{ request()->routeIs('expenses.main') ? 'active' : '' }}" id="tab">
          <img src="{{ asset('assets/images/expense.svg') }}" alt="Expenses" />
          <span>Expenses</span>
        </a>
      </li>
    </ul>
  </div>
</div>




{{-- <div class="sidebar">
    <div class="sidebar_list">
      <ul>
        <li class="list_item" style="border: none">
          <a href="javascript:void(0)" class="active" id="tab">
            <img src="./assets/images/dashboard.svg" alt="Dashboard" />
            <span>DashBoard</span></a>
        </li>
        <li class="list_item">
          <a href="{{ route('event')}}" id="tab" class=""><img src="./assets/images/event.svg" alt="Evnets" />
            <span>Event</span></a>
        </li>
        <li class="list_item">
          <a href="javascript:void(0)" id="tab" class="">
            <img src="./assets/images/team.svg" alt="Team" /> <span>Team</span></a>
        </li>
        <li class="list_item">
          <a href="javascript:void(0)" id="tab" class=""><img src="./assets/images/checklist.svg" alt="checklist" />
            <span>Checklist</span></a>
        </li>
        <li class="list_item">
          <a href="javascript:void(0)" id="tab" class=""><img src="./assets/images/expense.svg" alt="expense" />
            <span>Expenses</span>
            </a>
        </li>
      </ul>
    </div>
  </div> --}}