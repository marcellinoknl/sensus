<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
      <div class="me-3">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
      </div>
      <div>
        <a class="navbar-brand brand-logo" href="/dashboard">
          <img src="{{asset('images/census.png')}}" alt="logo" style="width: 40px" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="/dashboard">
          <img src="images/logo-mini.svg" alt="logo" />
        </a>
      </div>
    </div>
    @include('layouts.horizontaltab')
  </nav>