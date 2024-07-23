
  <!-- Navbar -->
  <nav class=" navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">

      <div class="navbar">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <a href="{{URL::to('home')}}" class="navbar-brand">
          <img src="{{asset('AdminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: ." width="40" height="25">
          <span class="brand-text font-weight-light">Walls</span>
          </a>
          <li class="">
          <a href="{{URL::to('/admin/python/topic')}}" class="nav-link">
                        <p>
                            Python Learning
                        </p>
                    </a>
          </li>
          <li class="">
          <a href="{{URL::to('/admin/python/percobaan')}}" class="nav-link">
                        <p>
                            Python Percobaan
                        </p>
                    </a>
          </li>
          <li class="">
          <a href="{{URL::to('admin/resetpassword')}}" class="nav-link">
            <p>
              Reset Password

            </p>
          </a>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user">  {{ Auth::user()->name }}</i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <!-- <a href="#" class="dropdown-item"> -->
            <a href="{{URL::to('home')}}" class="nav-link dropdown-item">Home</a>
            </a>
            <div class="dropdown-divider"></div>
            <!-- <a href="#" class="dropdown-item"> -->
            <a href="{{ route('logout')}}" class="nav-link dropdown-item"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            </a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
