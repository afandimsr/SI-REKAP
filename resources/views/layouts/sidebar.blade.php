<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-info elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link navbar-info navbar-dark elevation-1">
    <img src="{{asset("img/semarangkota.png")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
      <span class="brand-text font-weight-light ">SI REKAP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{asset("img/user_profile/".Auth::user()->profil."")}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">{{Auth::user()->name}}</a>
        <small><a href="#" class="d-block">{{Auth::user()->nip}}</a></small>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
          <li class="nav-item">
            @if(Auth::user()->is_admin == 1)
            <a href="{{route('admin.home')}}" class="nav-link active">
            @else
            <a href="{{route('home')}}" class="nav-link active">
            @endif

              <i class="far fa-circle nav-icon"></i>
              <p>Dashboard </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{route('admin.myprofile')}}" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          @if(Auth::user()->is_admin== 1)
          <li class="nav-item">
            <a href="{{route('admin.users.index')}}" class="nav-link">
              <i class="nav-icon fa fa-user-friends"></i>
              <p>
                User Management
              </p>
            </a>
          </li>
          @endif

          <li class="nav-item">
          <a href="{{route("admin.pelaporan.index")}}" class="nav-link">
              <i class="nav-icon fa fa-database"></i>
              <p>
                Data Pelaporan
              </p>
            </a>
          </li>
          @if(Auth::user()->is_admin == 1)
          <li class="nav-item">
          <a href="{{route('admin.cetak.index')}}" class="nav-link">
              <i class="nav-icon fa fa-print"></i>
              <p>
                Cetak Laporan
              </p>
            </a>
          </li>
          @endif

          <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                <i class="nav-icon fa fa-sign-out-alt"></i><p>
                    {{ __('Logout') }}
                </p>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
