<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - CLSKY Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f6fa;
            color: #2c3e50;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            width: 260px;
            background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%);
            padding: 20px 0;
            transition: all 0.3s;
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar-header {
            padding: 0 20px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
        }

        .sidebar-logo i {
            font-size: 32px;
            color: #fdb714;
        }

        .sidebar-logo h3 {
            font-size: 20px;
            transition: opacity 0.3s;
        }

        .sidebar.collapsed .sidebar-logo h3,
        .sidebar.collapsed .menu-text {
            opacity: 0;
            display: none;
        }

        .toggle-sidebar {
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
            padding: 5px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 20px 0;
        }

        .menu-item {
            margin-bottom: 5px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s;
        }

        .menu-link:hover,
        .menu-link.active {
            background: rgba(253, 183, 20, 0.1);
            color: #fdb714;
            border-left: 4px solid #fdb714;
        }

        .menu-link i {
            font-size: 20px;
            width: 20px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            transition: all 0.3s;
            min-height: 100vh;
        }

        .main-content.expanded {
            margin-left: 80px;
        }

        /* Header */
        .header {
            background: white;
            padding: 20px 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-left h1 {
            font-size: 24px;
            color: #2c3e50;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #fdb714;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .logout-btn {
            padding: 8px 20px;
            background: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
        }

        .logout-btn:hover {
            background: #c0392b;
        }

        /* Page Content */
        .page-content {
            padding: 30px;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: all 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: white;
        }

        .stat-icon.blue {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .stat-icon.green {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .stat-icon.orange {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .stat-info h3 {
            font-size: 28px;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .stat-info p {
            color: #7f8c8d;
            font-size: 14px;
        }

        /* Alert Messages */
        .alert {
            padding: 15px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border-left: 4px solid #28a745;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border-left: 4px solid #dc3545;
        }

        /* Mobile Menu Toggle */
        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            color: #2c3e50;
            cursor: pointer;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                left: -260px;
            }

            .sidebar.active {
                left: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-toggle {
                display: block;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .header {
                padding: 15px 20px;
            }

            .header-left h1 {
                font-size: 20px;
            }

            .user-info span {
                display: none;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <i class="fas fa-shipping-fast"></i>
                <h3>CLSKY Admin</h3>
            </div>
            <button class="toggle-sidebar" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-item">
                <a href="{{ route('admin.dashboard') }}" class="menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.services.index') }}" class="menu-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                    <i class="fas fa-concierge-bell"></i>
                    <span class="menu-text">Services</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.annonces.index') }}" class="menu-link {{ request()->routeIs('admin.annonces.*') ? 'active' : '' }}">
                    <i class="fas fa-bullhorn"></i>
                    <span class="menu-text">Annonces</span>
                </a>
            </li>
            <li class="menu-item">
                {{-- <a href="{{ route('admin.membres.index') }}" class="menu-link {{ request()->routeIs('admin.membres.*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>
                    <span class="menu-text">Membres</span>
                </a> --}}
            </li>
            <li class="menu-item">
                <a href="{{ route('home') }}" class="menu-link" target="_blank">
                    <i class="fas fa-eye"></i>
                    <span class="menu-text">Voir le Site</span>
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="main-content" id="mainContent">
        <!-- Header -->
        <header class="header">
            <div class="header-left">
                <button class="mobile-toggle" onclick="toggleMobileSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>@yield('page-title', 'Dashboard')</h1>
            </div>
            <div class="header-right">
                <div class="user-info">
                    <div class="user-avatar">A</div>
                    <span>Admin</span>
                </div>
                <a href="{{ route('logout') }}" class="logout-btn"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Déconnexion</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </header>

        <!-- Page Content -->
        <div class="page-content">
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        }

        function toggleMobileSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const mobileToggle = document.querySelector('.mobile-toggle');
            
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(event.target) && !mobileToggle.contains(event.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });
    </script>
    @stack('scripts')
</body>
</html>