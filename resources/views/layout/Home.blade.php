<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'University Portal')</title>

    {{-- Guest styles --}}
    <link rel="stylesheet" href="{{ asset('storage/CSS/Guest.css') }}">
</head>
<body>

    <!-- Top Header -->
    <header class="guest-header">
        <h1 class="site-name">UniversityPortal</h1>

        <div class="auth-link">
            <a href="/adminLogin">Login</a>
        </div>
    </header>

    <!-- Navigation Bar -->
    <nav class="guest-nav">
        <a href="/" class="{{ request()->routeIs('/') ? 'active' : '' }}">
            Home
        </a>

        <a href="/about" class="{{ request()->is('about') ? 'active' : '' }}">
            About
        </a>

        <a href="/contact" class="{{ request()->is('contact') ? 'active' : '' }}">
            Contact
        </a>
    </nav>

    <!-- Page Body -->
    <section class="guest-content">
        @yield('content')
    </section>

    <!-- Footer -->
    <footer class="guest-footer">
        <small>&copy; {{ date('Y') }} UniversityPortal. All rights reserved.</small>
    </footer>

</body>
</html>
