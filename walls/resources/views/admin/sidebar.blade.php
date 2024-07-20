<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light" style="font-size:140%;"> &nbsp;  ADMIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('lte/dist/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Administrator</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
                    <a href="{{URL::to('/admin/python/topic')}}" class="nav-link">
                        <i class="nav-icon fab fa-python"></i>
                        <p>
                            Python Learning
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('/admin/python/percobaan')}}" class="nav-link">
                        <i class="nav-icon fab fa-python"></i>
                        <p>
                            Python Percobaan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
          <a href="{{URL::to('admin/resetpassword')}}" class="nav-link">
            <i class="nav-icon fas fa-key"></i>
            <p>
              Reset Password

            </p>
          </a>
        </li>
        
	</ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
