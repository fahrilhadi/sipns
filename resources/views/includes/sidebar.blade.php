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
        {{-- <li class="{{ request()->routeIs('admin.users-management.index','admin.users-management.create','admin.users-management.edit','admin.users-management.change-password') ? 'active' : '' }}">
            <a href="{{ route('admin.users-management.index') }}" class="nav-link"><i class="fas fa-users"></i> <span>Manajemen Pengguna</span></a>
        </li>
        <li class="{{ request()->routeIs('admin.teachers-data.index','admin.teachers-data.create','admin.teachers-data.edit','admin.teachers-data.change-password') ? 'active' : '' }}">
            <a href="{{ route('admin.teachers-data.index') }}" class="nav-link"><i class="fas fa-user-tie"></i> <span>Data Guru</span></a>
        </li>
        <li class="{{ request()->routeIs('admin.criteria.index','admin.criteria.create','admin.criteria.edit') ? 'active' : '' }}">
            <a href="{{ route('admin.criteria.index') }}" class="nav-link"><i class="fas fa-tasks"></i> <span>Kriteria</span></a>
        </li>
        <li class="{{ request()->routeIs('admin.supervision-instruments.index','admin.supervision-instruments.create','admin.supervision-instruments.edit') ? 'active' : '' }}">
            <a href="{{ route('admin.supervision-instruments.index') }}" class="nav-link"><i class="far fa-file-alt"></i> <span>Instrumen Supervisi</span></a>
        </li>
        <li class="{{ request()->routeIs('admin.assessments.index','admin.assessments.show') ? 'active' : '' }}">
            <a href="{{ route('admin.assessments.index') }}" class="nav-link"><i class="fas fa-pen"></i> <span>Penilaian</span></a>
        </li>  --}}
    </aside>
</div>