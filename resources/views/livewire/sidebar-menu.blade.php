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
            <li class="menu-header">Aduan</li>
            <li
                @if (request()->routeIs('dashboard'))
                    class=active
                @endif
            >
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fire"></i>
                    <span>Formulir Aduan</span>
                </a>
            </li>
            <li
                @if (request()->routeIs('dashboard'))
                    class=active
                @endif
            >
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fire"></i>
                    <span>Daftar Aduan</span>
                </a>
            </li>
            <li class="menu-header">Manajemen Data</li>
            <li
                @if (request()->routeIs('dashboard'))
                    class=active
                @endif
            >
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fire"></i>
                    <span>Data Pengguna</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
