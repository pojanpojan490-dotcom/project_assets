<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Asset Management')</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;

            width: 250px;
            height: 100vh;

            background: #111827;
            color: white;

            padding: 25px 18px;

            display: flex;
            flex-direction: column;

            z-index: 1000;
        }

        /* LOGO */

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 0 10px;
            margin-bottom: 40px;
        }

        .logo-icon {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #2563eb;
            border-radius: 10px;

            font-size: 21px;
        }

        .logo-text h2 {
            font-size: 17px;
            color: white;
        }

        .logo-text p {
            font-size: 11px;
            color: #9ca3af;
            margin-top: 3px;
        }

        /* MENU */

        .menu-title {
            font-size: 11px;
            color: #6b7280;

            text-transform: uppercase;
            letter-spacing: 1px;

            padding: 0 12px;
            margin-bottom: 10px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 12px;

            color: #d1d5db;
            text-decoration: none;

            border-radius: 8px;

            font-size: 14px;

            transition: 0.2s;
        }

        .menu a:hover {
            background: #1f2937;
            color: white;
        }

        .menu a.active {
            background: #2563eb;
            color: white;
        }

        .menu-icon {
            width: 22px;
            text-align: center;
            font-size: 17px;
        }

        /* SIDEBAR BOTTOM */

        .sidebar-bottom {
            margin-top: auto;

            border-top: 1px solid #1f2937;

            padding-top: 18px;
        }

        .user-box {
            display: flex;
            align-items: center;
            gap: 10px;

            padding: 10px;
        }

        .user-icon {
            width: 36px;
            height: 36px;

            border-radius: 50%;

            background: #374151;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-info p:first-child {
            font-size: 13px;
            color: white;
            font-weight: bold;
        }

        .user-info p:last-child {
            font-size: 11px;
            color: #9ca3af;
            margin-top: 3px;
        }


        /* =========================
           MAIN CONTENT
        ========================= */

        .main {
            margin-left: 250px;
            min-height: 100vh;

            padding: 40px;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 768px) {

            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
                padding: 25px 15px;
            }

        }

    </style>

    @yield('styles')

</head>


<body>


    <!-- =========================
         SIDEBAR
    ========================= -->

    <aside class="sidebar">

        <!-- LOGO -->

        <div class="logo">

            <div class="logo-icon">
                📦
            </div>

            <div class="logo-text">

                <h2>Asset Manager</h2>

                <p>Management System</p>

            </div>

        </div>


        <!-- MENU -->

        <div class="menu-title">
            Menu Utama
        </div>


        <nav class="menu">

            <!-- DASHBOARD -->

            <a href="{{ route('assets.index') }}"
               class="{{ request()->is('dashboard') ? 'active' : '' }}">

                <span class="menu-icon">
                    🏠
                </span>

                <span>
                    Dashboard
                </span>

            </a>


            <!-- DATA ASSETS -->

            <a href="{{ route('assets.index') }}"
               class="{{ request()->is('assets*') ? 'active' : '' }}">

                <span class="menu-icon">
                    📦
                </span>

                <span>
                    Data Assets
                </span>

            </a>

            <a href="{{ route('categories.index') }}"
               class="{{ request()->is('categories*') ? 'active' : '' }}">

                <span class="menu-icon">
                    📦
                </span>

                <span>
                    Data Category
                </span>

            </a>


            <!-- TAMBAH ASSET -->

            <a href="{{ route('assets.create') }}">

                <span class="menu-icon">
                    ➕
                </span>

                <span>
                    Tambah Asset
                </span>

            </a>

        </nav>


        <!-- BOTTOM SIDEBAR -->

        <div class="sidebar-bottom">

            <div class="user-box">

                <div class="user-icon">
                    👤
                </div>

                <div class="user-info">

                    <p>Administrator</p>

                    <p>Asset Manager</p>

                </div>

            </div>

        </div>

    </aside>



    <!-- =========================
         MAIN CONTENT
    ========================= -->

    <main class="main">

        @yield('content')

    </main>


</body>

</html>