<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Asset Management')</title>

    <!-- Font Family: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --sidebar-width: 260px;
            --primary-color: #2563eb;
            --primary-hover: #1d4ed8;
            --bg-dark: #0f172a;
            --bg-dark-hover: #1e293b;
            --text-light: #f8fafc;
            --text-muted: #94a3b8;
            --body-bg: #f8fafc;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--body-bg);
            color: #0f172a;
            line-height: 1.5;
        }

        /* Overlay untuk mobile saat sidebar terbuka */
        .sidebar-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.5);
            backdrop-filter: blur(4px);
            z-index: 999;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .sidebar-overlay.active {
            opacity: 1;
            pointer-events: auto;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--bg-dark);
            color: var(--text-light);
            padding: 24px 16px;
            display: flex;
            flex-direction: column;
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        /* LOGO */

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 8px;
            margin-bottom: 32px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--primary-color);
            border-radius: 10px;
            color: white;
            font-size: 18px;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .logo-text h2 {
            font-size: 16px;
            font-weight: 700;
            color: white;
            line-height: 1.2;
        }

        .logo-text p {
            font-size: 11px;
            color: var(--text-muted);
            margin-top: 2px;
        }

        /* MENU */

        .menu-container {
            flex: 1;
            overflow-y: auto;
            margin-right: -8px;
            padding-right: 8px;
        }

        /* Custom Scrollbar Menu */
        .menu-container::-webkit-scrollbar {
            width: 4px;
        }
        .menu-container::-webkit-scrollbar-thumb {
            background: #334155;
            border-radius: 4px;
        }

        .menu-title {
            font-size: 11px;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            padding: 0 12px;
            margin-bottom: 12px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            color: #cbd5e1;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .menu a:hover {
            background: var(--bg-dark-hover);
            color: white;
        }

        .menu a.active {
            background: var(--primary-color);
            color: white;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
        }

        .menu-icon {
            width: 20px;
            text-align: center;
            font-size: 16px;
            opacity: 0.85;
        }

        .menu a.active .menu-icon {
            opacity: 1;
        }

        /* SIDEBAR BOTTOM */

        .sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid #1e293b;
            padding-top: 16px;
        }

        .user-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.03);
        }

        .user-details {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #334155;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .user-info p:first-child {
            font-size: 13px;
            color: white;
            font-weight: 600;
            line-height: 1.2;
        }

        .user-info p:last-child {
            font-size: 11px;
            color: var(--text-muted);
            margin-top: 2px;
        }

        .logout-btn {
            background: transparent;
            border: none;
            color: var(--text-muted);
            padding: 8px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
        }

        /* =========================
           TOPBAR & MAIN CONTENT
        ========================= */

        .topbar {
            display: none;
            position: sticky;
            top: 0;
            left: 0;
            right: 0;
            height: 60px;
            background: white;
            border-bottom: 1px solid #e2e8f0;
            padding: 0 20px;
            align-items: center;
            justify-content: space-between;
            z-index: 900;
        }

        .mobile-toggle {
            background: none;
            border: none;
            font-size: 20px;
            color: #334155;
            cursor: pointer;
        }

        .main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            padding: 32px 40px;
            transition: margin-left 0.3s ease;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .topbar {
                display: flex;
            }

            .main {
                margin-left: 0;
                padding: 24px 20px;
            }
        }
    </style>

    @yield('styles')
</head>

<body>

    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <!-- Header Mobile (Tampil di Layar Kecil) -->
    <header class="topbar">
        <button class="mobile-toggle" onclick="toggleSidebar()">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div style="font-weight: 600; font-size: 15px;">Asset Manager</div>
        <div style="width: 20px;"></div> <!-- Spacer -->
    </header>

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">

        <!-- LOGO -->
        <div class="logo">
            <div class="logo-icon">
                <i class="fa-solid fa-boxes-stacked"></i>
            </div>
            <div class="logo-text">
                <h2>Asset Manager</h2>
                <p>Management System</p>
            </div>
        </div>

        <!-- MENU CONTAINER -->
        <div class="menu-container">
            <div class="menu-title">Menu Utama</div>

            <nav class="menu">
                <!-- DASHBOARD -->
                <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">

                <!-- DATA ASSETS -->
                <a href="{{ route('assets.index') }}" class="{{ request()->is('assets*') ? 'active' : '' }}">
                    <span class="menu-icon"><i class="fa-solid fa-box-archive"></i></span>
                    <span>Data Assets</span>
                </a>

                <a href="{{ route('categories.index') }}" class="{{ request()->is('categories*') ? 'active' : '' }}">
                    <span class="menu-icon"><i class="fa-solid fa-tags"></i></span>
                    <span>Data Category</span>
                </a>

                <a href="{{ route('barang.index') }}" class="{{ request()->is('barang*') ? 'active' : '' }}">
                    <span class="menu-icon"><i class="fa-solid fa-cubes"></i></span>
                    <span>Data Barang</span>
                </a>

                <a href="{{ route('kerusakan.index') }}" class="{{ request()->is('kerusakan*') ? 'active' : '' }}">
                    <span class="menu-icon"><i class="fa-solid fa-wrench"></i></span>
                    <span>Data Kerusakan</span>
                </a>

                <a href="{{ route('penyusutan.index') }}" class="{{ request()->is('penyusutan*') ? 'active' : '' }}">
                    <span class="menu-icon"><i class="fa-solid fa-chart-line"></i></span>
                    <span>Data Penyusutan</span>
                </a>

                <a href="{{ route('stok.index') }}" class="{{ request()->is('stok*') ? 'active' : '' }}">
                    <span class="menu-icon"><i class="fa-solid fa-warehouse"></i></span>
                    <span>Data Stok</span>
                </a>
            </nav>
        </div>

        <!-- BOTTOM SIDEBAR -->
        <div class="sidebar-bottom">
            <div class="user-box">
                <div class="user-details">
                    <div class="user-icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="user-info">
                        <p>{{ Auth::user()->name ?? 'Administrator' }}</p>
                        <p>{{ Auth::user()->email ?? 'admin@asset.com' }}</p>
                    </div>
                </div>
                
                <!-- Form Logout Laravel -->
                
            </div>
        </div>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="main">
        @yield('content')
    </main>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('sidebarOverlay').classList.toggle('active');
        }
    </script>

    @yield('scripts')
</body>

</html>