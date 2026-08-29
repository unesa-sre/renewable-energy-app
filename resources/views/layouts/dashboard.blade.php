<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SRE UNESA - @yield('title', 'Dashboard')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo/navbar-logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .sidebar-link.active {
            background-color: rgba(0, 145, 80, 0.1);
            border-right: 4px solid #009150;
            color: #009150;
        }

        .main-card {
            background: white;
            border-radius: 1.5rem;
            border: 1px solid #f1f5f9;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            transition: all 0.3s;
        }

        .dark .main-card {
            background-color: #1e293b;
            border-color: #334155;
            color: #f1f5f9;
        }

        #sidebar {
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        #main-content {
            transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-collapsed {
            width: 5rem !important;
        }

        .sidebar-collapsed .nav-label {
            display: none;
        }

        .sidebar-collapsed .logo-text {
            display: none;
        }

        .sidebar-collapsed .menu-header {
            display: none;
        }

        .sidebar-collapsed .sidebar-link {
            justify-content: center;
            padding-left: 0;
            padding-right: 0;
        }

        .sidebar-collapsed .sidebar-link svg {
            margin: 0;
        }
    </style>
</head>

<body
    class="font-sans text-dark dark:text-slate-200 bg-slate-50 dark:bg-slate-950 flex min-h-screen transition-colors duration-300">

    <!-- Sidebar -->
    <aside id="sidebar"
        class="w-64 bg-white dark:bg-slate-900 hidden lg:flex flex-col fixed inset-y-0 shadow-sm z-50 transition-colors border-r dark:border-slate-800">
        <div class="h-20 flex items-center px-6">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <img src="{{ asset('images/logo/srehijau.png') }}" alt="SRE Logo" class="h-10 object-contain shrink-0">
                <img src="{{ asset('images/logo/unesa.png') }}" alt="UNESA Logo" class="h-10 object-contain shrink-0">
            </a>
        </div>

        <nav class="flex-1 px-4 space-y-2 overflow-y-auto mt-4">
            @php
                $role = Auth::user()?->role ?? 'member';
                $menuGroups = ($role === 'admin') ? [
                    'MAIN' => [
                        ['route' => 'admin.dashboard', 'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10', 'label' => 'Statistik'],
                    ],
                    'PENGOLAHAN WEB' => [

                        ['route' => 'admin.activity.index', 'icon' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9', 'label' => 'Activity'],
                        ['route' => 'admin.article.index', 'icon' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2h-14', 'label' => 'News'],
                        ['route' => 'admin.product.index', 'icon' => 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z', 'label' => 'Produk'],
                    ],
                    'MANAJEMEN' => [
                        ['route' => 'admin.user.index', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197', 'label' => 'Users'],
                        ['route' => 'admin.contact.index', 'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'label' => 'Pesan'],
                    ],
                ] : [
                    'MAIN' => [
                        ['route' => 'member.dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3', 'label' => 'Beranda'],
                    ],
                    'PENGOLAHAN WEB' => [

                        ['route' => 'member.activity.index', 'icon' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9', 'label' => 'Activity'],
                        ['route' => 'member.article.index', 'icon' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 002-2h10l4 4v10a2 2 0 01-2 2h-14', 'label' => 'News'],
                        ['route' => 'member.product.index', 'icon' => 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z', 'label' => 'Produk'],
                    ],
                ];
            @endphp

            @foreach($menuGroups as $title => $routes)
                <div class="mt-6 first:mt-0">
                    <p class="menu-header px-4 text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-2">{{ $title }}</p>
                    <div class="space-y-1">
                        @foreach($routes as $r)
                            <a href="{{ route($r['route']) }}"
                                class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-xl text-slate-600 dark:text-slate-400 hover:bg-emerald-50/50 dark:hover:bg-[#009150]/20 hover:text-[#009150] transition {{ request()->routeIs($r['route']) ? 'active' : '' }}"
                                title="{{ $r['label'] }}">
                                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $r['icon'] }}"></path>
                                </svg>
                                <span class="nav-label transition-opacity">{{ $r['label'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </nav>

        <div class="p-4 border-t border-slate-100 dark:border-slate-800">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="sidebar-link flex w-full items-center gap-3 px-4 py-3 text-sm font-semibold rounded-xl text-red-500 hover:bg-red-50 dark:hover:bg-red-900/10 transition"
                    title="Keluar">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    <span class="nav-label">Keluar Sesi</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Content Area -->
    <div id="main-content" class="flex-1 ml-64 flex flex-col min-w-0">
        <!-- Header -->
        <header
            class="h-20 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md flex items-center justify-between px-8 sticky top-0 z-40 border-b border-slate-100 dark:border-slate-800 transition-all">
            <div class="flex items-center gap-4">
                <!-- Sidebar Toggle -->
                <button id="sidebar-toggle"
                    class="p-2 rounded-xl bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 transition">
                    <svg class="w-5 h-5 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16"></path>
                    </svg>
                </button>
                <h1 class="text-xl font-bold text-slate-800 dark:text-white truncate">@yield('page_title')</h1>
            </div>

            <div class="flex items-center gap-6">
                <div class="sm:flex items-center gap-4 hidden">
                    <div class="text-right">
                        <p class="text-[10px] font-bold text-[#009150] uppercase">{{ (Auth::user()?->role === 'admin') ? 'Administrator' : 'Anggota' }}</p>
                        <p class="text-sm font-bold text-slate-700 dark:text-slate-300 truncate max-w-[100px]">
                            {{ Auth::user()?->name ?? 'Guest' }}
                        </p>
                    </div>
                    <div
                        class="w-10 h-10 rounded-full bg-emerald-100 dark:bg-[#002816] text-[#009150] flex items-center justify-center font-bold">
                        {{ substr(Auth::user()?->name ?? 'G', 0, 1) }}
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="p-8 pb-20 max-w-7xl mx-auto w-full">
            @yield('content')
        </main>
    </div>

    <script>
        // Sidebar Toggle Logic
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const sidebarToggle = document.getElementById('sidebar-toggle');

        function toggleSidebar() {
            sidebar.classList.toggle('sidebar-collapsed');
            if (sidebar.classList.contains('sidebar-collapsed')) {
                mainContent.classList.replace('ml-64', 'ml-20');
                localStorage.setItem('sidebar-mode', 'collapsed');
            } else {
                mainContent.classList.replace('ml-20', 'ml-64');
                localStorage.setItem('sidebar-mode', 'expanded');
            }
        }

        // Init Sidebar state
        if (localStorage.getItem('sidebar-mode') === 'collapsed') {
            sidebar.classList.add('sidebar-collapsed');
            mainContent.classList.replace('ml-64', 'ml-20');
        }

        sidebarToggle.addEventListener('click', toggleSidebar);
    </script>
    @yield('scripts')
</body>

</html>