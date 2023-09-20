<div class="navbar-menu-wrapper d-flex align-items-top"> 
    <ul class="navbar-nav">
      <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">

        <h1 class="welcome-text">Hi, <span class="text-black fw-bold">{{ Auth::user()->full_name }}</span></h1>
        <h3 class="welcome-sub-text">Ingin Melakukan Census?</h3>
      </li>
    </ul>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item dropdown d-none d-lg-block user-dropdown">
        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="Profile image"> </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <div class="dropdown-header text-center">
            <img class="img-md rounded-circle" src="images/faces/face8.jpg" alt="Profile image">
            <p class="mb-1 mt-3 font-weight-semibold">{{Auth::user()->full_name}}</p>
            <p class="fw-light text-muted mb-0">{{Auth::user()->email}}</p>
          </div>
          <form action="{{ route('logout') }}" method="POST" id="logout-form">
            @csrf
            <a class="dropdown-item" href="#" onclick="document.getElementById('logout-form').submit();">
              <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Log Out
          </a>
      </form>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>