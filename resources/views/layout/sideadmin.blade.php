<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}">ULP BANJARBARU</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('dashboard') }}">UB</a>
      </div>
      <ul class="sidebar-menu">
        <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-home"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="{{ Request::is('pengguna') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('pengguna') }}">
            <i class="fas fa-user"></i> <span>Pengguna</span>
          </a>
        </li>
        <li class="{{ Request::is('mutasi') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('mutasi') }}">
            <i class="fas fa-money-check-alt"></i> <span>Mutasi N</span>
          </a>
        </li>
        <li class="{{ Request::is('rubah-tarif') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('rubah-tarif') }}">
            <i class="fas fa-address-card"></i> <span>Rubah Tarif</span>
          </a>
        </li>
      </ul>
    </aside>
</div>
<div class="main-panel">
    <div class="content">
        @yield('content')
    </div>
</div>
