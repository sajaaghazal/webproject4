<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    {{-- Admin styles --}}
    <link rel="stylesheet" href="{{ asset('storage/CSS/admin.css') }}">
    
    <style>
        /* Additional custom styles */
        .professors-page {
            padding: 20px;
        }
        
        .card {
            border: none;
            border-radius: 10px;
        }
        
        .btn-group .btn {
            margin-right: 5px;
        }
        
        .breadcrumb {
            background-color: transparent;
            padding-left: 0;
        }
        
        .table th {
            background-color: #f8f9fa;
            border-top: none;
        }
        
        /* Logout button styles */
        .logout-btn {
            background: none;
            border: none;
            color: #e3e3e3;
            cursor: pointer;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        
        .logout-btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        
        .profile-section {
            display: flex;
            align-items: center;
            gap: 20px;
        }
    </style>
</head>
<body>

    <!-- Top Navigation -->
    <header class="top-bar">
        <h1 class="app-title">UniversityPortal</h1>

        <div class="profile-section">
            <!-- Logout Button -->
            <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>

            <!-- Profile Icon -->
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
        </div>
    </header>

    <!-- Side Menu -->
    <aside class="sidebar">
        <nav class="menu">
            <a href="/dashboard" class="menu-link {{ request()->is('dashboard') ? 'active' : '' }}">
                <span class="menu-label">Dashboard</span>
            </a>

            <a href="/course" class="menu-link {{ request()->is('course*') ? 'active' : '' }}">
                <span class="menu-label">Courses</span>
            </a>

            <a href="/department" class="menu-link {{ request()->is('department*') ? 'active' : '' }}">
                <span class="menu-label">Departments</span>
            </a>

            <a href="/enrollment" class="menu-link {{ request()->is('enrollment*') ? 'active' : '' }}">
                <span class="menu-label">Enrollment</span>
            </a>

            <a href="/professor" class="menu-link {{ request()->is('professor*') ? 'active' : '' }}">
                <span class="menu-label">Professors</span>
            </a>

            <a href="/student" class="menu-link {{ request()->is('student*') ? 'active' : '' }}">
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

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript for confirmations -->
    <script>
        // Confirm before delete
        function confirmDelete() {
            return confirm('Are you sure you want to delete this professor?');
        }
        
        // Optional: Confirm logout
        document.addEventListener('DOMContentLoaded', function() {
            const logoutForm = document.querySelector('form[action*="logout"]');
            if (logoutForm) {
                logoutForm.addEventListener('submit', function(e) {
                    if (!confirm('Are you sure you want to logout?')) {
                        e.preventDefault();
                    }
                });
            }
        });
    </script>
</body>
</html>