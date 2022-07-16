<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center mt-3 mb-3 ml-3" href="/">
    <div class="sidebar-brand-icon">
      <img src={{asset('image/admin/logo/forshell.png')}} alt="" width="150">
    </div>
    <div class="sidebar-brand-text mx-3">

    </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item @yield('dashboard')">
    <a class="nav-link" href="/admin-foresell/dashboard">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item @yield('main-active')">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#main" aria-expanded="true" aria-controls="main">
      <i class="fas fa-fw fa-folder"></i>
      <span>Menu</span>
    </a>
    <div id="main" class="collapse @yield('main')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item @yield('users')" href="/admin-foresell/list/users">Users</a>
        <a class="collapse-item @yield('toko')" href="/admin-foresell/list/toko">Toko</a>
        <a class="collapse-item @yield('category')" href="/admin-foresell/list/category">Category</a>
        <a class="collapse-item @yield('payment')" href="/admin-foresell/list/payment">Payment</a>
        <a class="collapse-item @yield('couriers')" href="/admin-foresell/list/couriers">Couriers</a>
        <a class="collapse-item @yield('orders')" href="/admin-foresell/list/orders">Orders</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Pages Collapse Payment -->
  <li class="nav-item @yield('payment-active')">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#banner" aria-expanded="true" aria-controls="banner">
      <i class="fas fa-fw fa-folder"></i>
      <span>Promotion Banner</span>
    </a>
    <div id="banner" class="collapse @yield('banner')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item @yield('bannerStore')" href="/admin-foresell/list/banner-store">Store</a>
        <a class="collapse-item @yield('bannerCategory')" href="/admin-foresell/list/banner-category">Category</a>
      </div>
    </div>
  </li>

  {{--
  <!-- Daftar -->
  <li class="nav-item @yield('daftar-active')">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#daftar" aria-expanded="true" aria-controls="daftar">
      <i class="fas fa-fw fa-folder"></i>
      <span>Daftar</span>
    </a>
    <div id="daftar" class="collapse @yield('daftar')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item @yield('cBank')" href="{{ route('bank.create') }}">Bank</a>
        <a class="collapse-item @yield('cKurir')" href="{{ route('kurir.create') }}">Kurir</a>
      </div>
    </div>
  </li> --}}


  <!-- ORDER -->
  {{-- <li class="nav-item @yield('orders-active')">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#orders" aria-expanded="true" aria-controls="orders">
      <i class="fas fa-fw fa-folder"></i>
      <span>Orders</span>
    </a>
    <div id="orders" class="collapse @yield('orders')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item @yield('payment')" href="/orders-payment-status">Payment Status</a>
        <a class="collapse-item @yield('ship')" href="/orders-ship-status">Ship Status</a>
      </div>
    </div>
  </li> --}}

  <!-- Nav Item - Utilities Collapse Menu -->
  {{-- <li class="nav-item @yield('pengaturan-active')">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengaturan" aria-expanded="true" aria-controls="pengaturan">
      <i class="fas fa-fw fa-wrench"></i>
      <span>Pengaturan</span>
    </a>
    <div id="pengaturan" class="collapse @yield('pengaturan')" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item @yield('logo')" href="/logo">Logo</a>
        <a class="collapse-item" href="/footer">Footer</a>
        <a class="collapse-item @yield('tentang')" href="/tentang">Tentang Kami</a>
      </div>
    </div>
  </li> --}}

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="/">
      <i class="fas fa-arrow-left"></i>
      <span>Halaman Depan</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  {{-- <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div> --}}

</ul>