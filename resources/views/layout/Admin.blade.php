<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    {{-- Admin styles --}}
    <link rel="stylesheet" href="{{ asset('storage/CSS/admin.css') }}">
</head>
<body>

    <!-- Top Navigation -->
    <header class="top-bar">
        <h1 class="app-title">UniversityPortal</h1>

        <div class="profile-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 -960 960 960" fill="#e3e3e3">
                <path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 
                31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 
                31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 
                156T763-197q-54 54-127 85.5T480-80Zm0-80q53 
                0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 
                0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 
                0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 
                17t-17 43q0 26 17 43t43 17Z"/>
            </svg>
        </div>
    </header>

    <!-- Side Menu -->
    <aside class="sidebar">
        <nav class="menu">
            <a href="/dashboard" class="menu-link active">
                <span class="menu-label">Dashboard</span>
            </a>

            <a href="/course" class="menu-link">
                <span class="menu-label">Courses</span>
            </a>

            <a href="/department" class="menu-link">
                <span class="menu-label">Departments</span>
            </a>

            <a href="/enrollment" class="menu-link">
                <span class="menu-label">Enrollment</span>
            </a>

            <a href="/professor" class="menu-link">
                <span class="menu-label">Professors</span>
            </a>

            <a href="/student" class="menu-link">
                <span class="menu-label">Students</span>
            </a>
        </nav>
    </aside>

    <!-- Page Content -->
    <section class="page-content">
        @yield('content')
    </section>

    <!-- Footer -->
    <footer class="footer">
        <small>&copy; {{ date('Y') }} UniversityPortal. All rights reserved.</small>
    </footer>

</body>
</html>
