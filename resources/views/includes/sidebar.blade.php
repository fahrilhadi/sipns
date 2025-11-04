<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="">SIPNS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
        <a href="">SIPNS</a>
        </div>
        <ul class="sidebar-menu">
        <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Data Pegawai</li>
        <li class="nav-item dropdown {{ request()->routeIs('user.employee-list.index','user.employee-list.create','user.employee-list.edit') ? 'active' : '' }}">
            <a href="{{ route('user.employee-list.index') }}" class="nav-link"><i class="fas fa-user"></i> <span>Daftar Pegawai</span></a>
        </li>
        <li class="menu-header">Master Data</li>
        <li class="nav-item dropdown {{ request()->routeIs('user.religions.index','user.religions.create','user.religions.edit') ? 'active' : '' }}">
            <a href="{{ route('user.religions.index') }}" class="nav-link"><i class="fas fa-circle"></i> <span>Agama</span></a>
        </li>
        <li class="nav-item dropdown {{ request()->routeIs('user.ranks.index','user.ranks.create','user.ranks.edit') ? 'active' : '' }}">
            <a href="{{ route('user.ranks.index') }}" class="nav-link"><i class="fas fa-circle"></i> <span>Golongan</span></a>
        </li>
        <li class="nav-item dropdown {{ request()->routeIs('user.echelons.index','user.echelons.create','user.echelons.edit') ? 'active' : '' }}">
            <a href="{{ route('user.echelons.index') }}" class="nav-link"><i class="fas fa-circle"></i> <span>Eselon</span></a>
        </li>
        <li class="nav-item dropdown {{ request()->routeIs('user.positions.index','user.positions.create','user.positions.edit') ? 'active' : '' }}">
            <a href="{{ route('user.positions.index') }}" class="nav-link"><i class="fas fa-circle"></i> <span>Jabatan</span></a>
        </li>
        <li class="nav-item dropdown {{ request()->routeIs('user.work-unit.index','user.work-unit.create','user.work-unit.edit') ? 'active' : '' }}">
            <a href="{{ route('user.work-unit.index') }}" class="nav-link"><i class="fas fa-circle"></i> <span>Unit Kerja</span></a>
        </li>
        <li class="nav-item dropdown {{ request()->routeIs('user.duty-station.index','user.duty-station.create','user.duty-station.edit') ? 'active' : '' }}">
            <a href="{{ route('user.duty-station.index') }}" class="nav-link"><i class="fas fa-circle"></i> <span>Tempat Tugas</span></a>
        </li>
    </aside>
</div>