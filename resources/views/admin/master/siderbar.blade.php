 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="https://www.pngfind.com/pngs/m/470-4703547_icon-user-icon-hd-png-download.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">
          Admin
{{--          {{ Auth::user()->name }}--}}
      </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
            <a href="#" class="nav-link {{ Request::is('top') ? 'active' : '' }} ">
              <i class="nav-icon fas fa-home"></i>
              <p>
              Home
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ Request::is('user') ? 'active' : '' }} ">
              <i class="nav-icon fas fa-users"></i>
              <p>
              Quản lý người dùng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.create') }}" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Thêm người dùng
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Danh sách nguời dùng</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ Request::is('top') ? '' : '' }} ">
              <i class="nav-icon fas fa-clock"></i>
              <p>
              Quản lý chấm công
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>
                  Tổng thể
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Chi tiết thành viên</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ route('setting.index') }}" class="nav-link {{ Request::is('setting') ? 'active' : '' }} ">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
              Cài đặt
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
