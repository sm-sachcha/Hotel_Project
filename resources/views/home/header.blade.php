<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Management</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        .navbar-nav .nav-link {
            font-weight: 500;
            margin-right: 15px;
            color: black;
            position: relative;
            padding-bottom: 6px;
        }

        /* Hover effect */
        .navbar-nav .nav-link:hover {
            color: red !important;
        }

        /* Red underline ONLY for left menu links */
        .navbar-nav.me-auto .nav-link::after {
            content: "";
            position: absolute;
            width: 0%;
            height: 2px;
            background: red;
            left: 0;
            bottom: 0;
            transition: 0.3s ease;
        }

        .navbar-nav.me-auto .nav-link:hover::after {
            width: 100%;
        }

        /* Active menu link */
        .navbar-nav.me-auto .nav-link.active {
            color: red !important;
            font-weight: 600;
        }

        .navbar-nav.me-auto .nav-link.active::after {
            width: 100%;
        }

        .logo img {
            height: 55px;
        }
    </style>
</head>

<body>

<header>
    <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">

        <div class="container">
                    <a class="navbar-brand logo" href="{{ url('/') }}">
                        <img src="{{ asset('images/Logo.png') }}" alt="Logo">
                    </a>
            <!-- Toggle Button -->
            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="mainNavbar">
                <div style="text-align: center;">
                <!-- Left Side Menu -->
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('hotel_about') ? 'active' : '' }}" href="{{ url('/hotel_about') }}">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('our_rooms') ? 'active' : '' }}" href="{{ url('/our_rooms') }}">Our Room</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('hotel_gallary') ? 'active' : '' }}" href="{{ url('/hotel_gallary') }}">Gallery</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('hotel_blog') ? 'active' : '' }}" href="{{ url('/hotel_blog') }}">Blog</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('hotel_contact') ? 'active' : '' }}" href="{{ url('/hotel_contact') }}">Contact Us</a>
                    </li>
                </ul>
                </div>

                <!-- Right Side Auth Section (Account) -->
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle btn btn-outline-dark px-3"
                                   href="#"
                                   role="button"
                                   data-bs-toggle="dropdown">
                                    Account
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="{{ url('/dashboard') }}">
                                            <i class="bi bi-speedometer2"></i> Dashboard
                                        </a>
                                    </li>

                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="bi bi-box-arrow-right"></i> Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item me-2">
                                <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-warning" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>

            </div>
        </div>
    </nav>
</header>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>