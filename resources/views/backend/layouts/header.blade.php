<div class="header">
    <div class="container-fluid">
      <div class="header_inner d-flex justify-content-between align-items-center">
        <div class="logo">
          <a href="{{ route('home')}}"><img src="{{ asset('assets/images/logo.png')}}" alt="Singhtek Logo" /></a>
        </div>
        <div class="d-flex align-items-center">
          <div class="notifications d-flex gap-3 px-3 align-items-center">
            <a href="javascript:void(0)"><i class="fa-regular fa-envelope"></i></a>
            <a href="javacript:void(0)"><img src="{{ asset('assets/images/ind_flag.svg')}}" alt="India" /></a>
            <a href="javacript:void(0)"><i class="fa-regular fa-bell"></i></a>
          </div>
          <a href="javascript:void(0)" class="d-flex align-items-center gap-3 profile_toggle">
            <div class="username">
              <div>USER 123</div>
              <div>admin</div> 
            </div>
            <div class="profile d-flex overflow-hidden rounded-5">
              <img src="{{ asset('assets/images/user.png')}}" alt="User" />
            </div>
            <i class="fa-solid fa-circle-chevron-down"></i>
          </a>
          <div class="menu">
            <ul>
              <li><a href="#"><i class="bi bi-person-fill"></i>&nbsp;Profile</a></li>
            
              <li><a href="#"><i class="bi bi-gear-fill"></i></i>&nbsp;Settings</a></li>
              <li><a href="#"><i class="bi bi-question-square-fill"></i>&nbsp;Help</a></li>
              <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right"></i>&nbsp;Sign Out</a></li>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>