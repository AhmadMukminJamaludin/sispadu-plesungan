<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img class="mr-3" style="width: 35px;" src="{{ asset('startbootstrap/img/logo-karanganyar.png') }}" alt="...">
            <a href="{{ route('dashboard') }}">SISPADU</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <img style="width: 35px;" src="{{ asset('startbootstrap/img/logo-karanganyar.png') }}" alt="...">
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li
                @if (request()->routeIs('dashboard'))
                    class=active
                @endif
            >
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li
                @if (request()->routeIs('profile-user'))
                    class=active
                @endif
            >
                <a class="nav-link" href="{{ route('profile-user') }}">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="menu-header">Aduan</li>
            <li
                @if (request()->routeIs('formulir-aduan'))
                    class=active
                @endif
            >
                <a class="nav-link" href="{{ route('formulir-aduan') }}">
                    <i class="fas fa-paper-plane"></i>
                    <span>Formulir Aduan</span>
                </a>
            </li>
            <li
                @if (request()->routeIs('daftar-aduan'))
                    class=active
                @endif
            >
                <a class="nav-link" href="{{ route('daftar-aduan') }}">
                    <i class="fas fa-envelope-open-text"></i>
                    <span>Daftar Aduan</span>
                </a>
            </li>
            @if (auth()->user()->hasRole('admin'))
                <li class="menu-header">Kegiatan</li>
                <li
                    @if (request()->routeIs('formulir-kegiatan'))
                        class=active
                    @endif
                >
                    <a class="nav-link" href="{{ route('formulir-kegiatan') }}">
                        <i class="fas fa-paper-plane"></i>
                        <span>Formulir Kegiatan</span>
                    </a>
                </li>
                <li
                    @if (request()->routeIs('daftar-kegiatan'))
                        class=active
                    @endif
                >
                    <a class="nav-link" href="{{ route('daftar-kegiatan') }}">
                        <i class="fas fa-envelope-open-text"></i>
                        <span>Daftar Kegiatan</span>
                    </a>
                </li>
                <li class="menu-header">Laporan</li>
                <li
                    @if (request()->routeIs('laporan-aduan'))
                        class=active
                    @endif
                >
                    <a class="nav-link" href="{{ route('laporan-aduan') }}">
                        <i class="fas fa-envelope"></i>
                        <span>Laporan Aduan</span>
                    </a>
                </li>
                <li class="menu-header">Manajemen Data</li>
                <li
                    @if (request()->routeIs('data-pengguna'))
                        class=active
                    @endif
                >
                    <a class="nav-link" href="{{ route('data-pengguna') }}">
                        <i class="fas fa-users"></i>
                        <span>Data Pengguna</span>
                    </a>
                </li>
            @endif
        </ul>
    </aside>
</div>
