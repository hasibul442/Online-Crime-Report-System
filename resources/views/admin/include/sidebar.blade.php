<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="{{ asset('admin/assets/images/faces/face1.jpg') }}" alt="profile">
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
            <span class="text-secondary text-small">{{ Auth::user()->user_type }}</span>
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/dashboard') }}">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
 @if (Auth::user()->user_type == "super_admin" )
      <li class="nav-item">
        <a class="nav-link" href="{{ route("users") }}">
          <span class="menu-title">User</span>
          <i class="mdi mdi-phone-classic menu-icon"></i>
        </a>
      </li>
       @endif
 @if (Auth::user()->user_type == "super_admin" )
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/hotlines') }}">
          <span class="menu-title">Hotline</span>
          <i class="mdi mdi-phone-classic menu-icon"></i>
        </a>
      </li>
       @endif
 @if (Auth::user()->user_type == "super_admin" )
      <li class="nav-item">
        <a class="nav-link" href="{{ route('police.division') }}">
          <span class="menu-title">Police Station</span>
          <i class="mdi mdi-phone-classic menu-icon"></i>
        </a>
      </li>
       @endif
      <li class="nav-item">
        <a class="nav-link" href="{{ route('wanted.list') }}">
          <span class="menu-title">Wanted Criminal</span>
          <i class="mdi mdi-phone-classic menu-icon"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#Complain" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Complain</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        </a>
        <div class="collapse" id="Complain">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('complain.list') }}">Pending Complain</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('allcomplain.list') }}">All Complain</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#gd" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">General Diary</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        </a>
        <div class="collapse" id="gd">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('gd.list') }}">Pending GD</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('allgd.list') }}">All GD</a></li>
          </ul>
        </div>
      </li>

    </ul>
  </nav>
