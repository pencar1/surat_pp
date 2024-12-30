<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('karyawan.dashboard') }}">ULP BANJARBARU</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('karyawan.dashboard') }}">UB</a>
      </div>
      <ul class="sidebar-menu">
        <li class="{{ Request::is('karyawan/dashboard') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('karyawan.dashboard') }}">
            <i class="fas fa-home"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="{{ Request::is('karyawan/mutasi') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('karyawan.mutasi') }}">
            <i class="fas fa-money-check-alt"></i> <span>Mutasi N</span>
          </a>
        </li>
        <li class="{{ Request::is('karyawan/rubah-tarif') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('karyawan.rubah-tarif') }}">
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
