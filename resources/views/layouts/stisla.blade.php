<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="shortcut icon" href="{{ asset('startbootstrap/img/logo-karanganyar.png') }}" sizes="32x32" />
    <link rel="shortcut icon" href="{{ asset('startbootstrap/img/logo-karanganyar.png') }}" sizes="192x192" />
    <title>{{ config('app.name') }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset("stisla/modules/bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("stisla/modules/fontawesome/css/all.min.css") }}">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset("stisla/css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("stisla/css/components.css") }}">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-94034622-3');
    </script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img class="rounded-circle mr-2" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <a href="{{ route('logout') }}" @click.prevent="$root.submit();" class="dropdown-item has-icon text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <livewire:sidebar-menu />

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>{{ $header }}</h1>
                    </div>

                    <div class="section-body">
                        {{ $slot }}
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; SISPADU 2024 <div class="bullet"></div> Created By <span>Arwinda Septiana</span>
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset("stisla/modules/jquery.min.js") }}"></script>
    <script src="{{ asset("stisla/modules/popper.js") }}"></script>
    <script src="{{ asset("stisla/modules/tooltip.js") }}"></script>
    <script src="{{ asset("stisla/modules/bootstrap/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("stisla/modules/nicescroll/jquery.nicescroll.min.js") }}"></script>
    <script src="{{ asset("stisla/modules/moment.min.js") }}"></script>
    <script src="{{ asset("stisla/js/stisla.js") }}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset("stisla/js/scripts.js") }}"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
