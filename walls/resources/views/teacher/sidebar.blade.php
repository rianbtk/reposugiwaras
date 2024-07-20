<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light" style="font-size:140%;"> &nbsp;  TEACHER</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('lte/dist/img/teacher2.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          {{-- Python --}}
                <li class="nav-item">
                    <a href="{{URL::to('teacher/python/resultstudent')}}" class="nav-link">
                        <i class="nav-icon fas fa-trophy"></i>
                        <p>
                            Python Result
                        </p>
                    </a>
                </li>
                
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
