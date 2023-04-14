  <!-- Navbar -->
  <nav class=" navbar navbar-expand navbar-primary navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('top.site') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('top.total') }}" class="nav-link">Chi Tiết</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('logout') }}" class="nav-link text-white">Logout <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
    </ul>
  </nav>
