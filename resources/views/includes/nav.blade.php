<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">IB</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview {{ request()->is('roles*', 'users*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> Authentication <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('roles/create') }}" class="nav-link {{ request()->is('roles/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Role Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('roles') }}" class="nav-link {{ request()->is('roles') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Role List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('users/create') }}" class="nav-link {{ request()->is('users/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('users') }}" class="nav-link {{ request()->is('users') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User List</p>
                </a>
              </li> 
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ request()->is('invoice-upload*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> Order <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('invoice-upload/create') }}" class="nav-link {{ request()->is('invoice-upload/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice upload</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('invoice-upload') }}" class="nav-link {{ request()->is('invoice-upload') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SC List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('pi-list') }}" class="nav-link {{ request()->is('pi-list') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PI List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('ci-list') }}" class="nav-link {{ request()->is('ci-list') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>CI List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ request()->is('bank*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> Master Data <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('banks') }}" class="nav-link {{ request()->is('banks') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banks List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('customer') }}" class="nav-link {{ request()->is('customer') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Importer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('destinations') }}" class="nav-link {{ request()->is('destinations') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Final Destination </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('load_places') }}" class="nav-link {{ request()->is('load_places') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loading Places </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('port-discharged') }}" class="nav-link {{ request()->is('port-discharged') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Port of Discharged</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('modes_of_carrying') }}" class="nav-link {{ request()->is('modes_of_carrying') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mode of Carrying</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('signature') }}" class="nav-link {{ request()->is('signature') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Signature</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
