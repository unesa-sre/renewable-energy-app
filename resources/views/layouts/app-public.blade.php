<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SRE UNESA - @yield('title', 'Renewable Energy')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo/navbar-logo.png') }}">

    <!-- Fonts (Clean Sans-Serif: Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Hanken Grotesk', 'Inter', 'system-ui', 'sans-serif'],
                        serif: ['Hanken Grotesk', 'Inter', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        'sre-green': '#009150',
                        'sre-light-green': '#01ce72',
                        'sre-dark-green': '#002816',
                        'sre-yellow': '#facc15',
                        'energy-green': '#009150',
                        'energy-blue': '#01ce72',
                        'energy-dark': '#002816',
                    }
                }
            }
        }
    </script>

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        :root {
            --glass-bg: rgba(255, 255, 255, 0.7);
            --glass-border: rgba(255, 255, 255, 0.2);
        }

        body {
            line-height: 1.7;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            line-height: 1.3;
            letter-spacing: -0.01em;
        }

        .dark {
            --glass-bg: rgba(15, 23, 42, 0.7);
            --glass-border: rgba(255, 255, 255, 0.1);
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .nav-gradient {
            background: linear-gradient(90deg, #002816 0%, #009150 100%);
            backdrop-filter: blur(10px);
        }

        /* Morphing Navbar Styles */
        #main-nav {
            transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            width: 100%;
            left: 50%;
            transform: translateX(-50%);
        }

        #main-nav.scrolled {
            top: 1.5rem;
            width: 90%;
            max-width: 1000px;
            border-radius: 9999px;
            background-color: #009150;
            /* emerald-600 (Leaf Green) */
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        #main-nav.scrolled .nav-container {
            height: 4rem;
        }

        /* Color adaptation for scroll */
        #main-nav .nav-link {
            color: #475569;
        }

        /* slate-600 */
        #main-nav .logo-text {
            color: #0f172a;
        }

        /* slate-900 */
        #main-nav .logo-span {
            color: #facc15;
        }

        /* emerald-600 */

        #main-nav.scrolled .nav-link {
            color: rgba(255, 255, 255, 0.8);
        }

        #main-nav.scrolled .nav-link:hover {
            color: #ffffff;
        }

        #main-nav.scrolled .logo-text {
            color: #ffffff;
        }

        #main-nav.scrolled .logo-span {
            color: #facc15;
        }

        /* emerald-200 */
        #main-nav.scrolled .mobile-btn {
            color: #ffffff;
        }

        #main-nav.scrolled+#mobile-menu,
        #main-nav.scrolled #mobile-menu {
            background-color: #009150;
            /* emerald-600 */
            border-top-color: rgba(255, 255, 255, 0.1);
        }

        #main-nav.scrolled #mobile-menu .mobile-nav-link {
            color: white;
        }

        #main-nav.scrolled #mobile-menu .mobile-nav-btn {
            background-color: #002816;
            /* emerald-900 */
        }

        #main-nav.scrolled .dropdown-menu {
            background-color: #009150;
            /* emerald-600 */
            border-color: rgba(255, 255, 255, 0.1);
        }

        #main-nav.scrolled .dropdown-menu a {
            color: rgba(255, 255, 255, 0.9);
        }

        #main-nav.scrolled .dropdown-menu a:hover {
            background-color: #009150;
            /* emerald-700 */
            color: white;
        }

        /* Active Link Indicator */
        .nav-link {
            position: relative;
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 4px;
            left: 50%;
            transform: translateX(-50%);
            width: 15px;
            height: 3px;
            background-color: #009150;
            /* energy-green */
            border-radius: 99px;
            box-shadow: 0 0 10px rgba(16, 185, 129, 0.8);
        }

        #main-nav.scrolled .nav-link.active::after {
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        .dark ::-webkit-scrollbar-track {
            background: #0f172a;
        }

        ::-webkit-scrollbar-thumb {
            background: #009150;
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #059669;
        }

        .glass {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
        }

        .text-gradient {
            background: linear-gradient(to right, #009150, #01ce72);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
    @yield('styles')
</head>

<body class="bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100 font-sans transition-colors duration-300">
    <x-splash-screen />

    <!-- Navbar -->
    <nav id="main-nav" class="fixed z-50 transition-all duration-300 flex items-stretch h-16 md:h-20"
        style="width: 96%; max-width: 1200px; left: 50%; transform: translateX(-50%); top: 1.5rem; border-radius: 9999px !important; background-color: #ffffff !important; border: 1px solid #e2e8f0 !important; padding: 4px;">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="h-full flex-shrink-0 block">
            <div class="bg-[#009150] rounded-full h-full px-8 md:px-12 flex items-center justify-center relative overflow-hidden"
                style="border-radius: 9999px;">
                <img src="{{ asset('images/logo/navbar-logo.png') }}" alt="SRE Logo"
                    class="h-10 md:h-12 object-contain relative z-10"
                    onerror="this.src='https://placehold.co/100x40/00a859/FFFFFF?text=SRe'">
            </div>
        </a>

        <!-- Desktop Menu -->
        <div class="hidden lg:flex flex-1 items-center justify-center space-x-6 px-4">
            <a href="{{ route('home') }}"
                class="{{ Request::routeIs('home') ? 'px-6 py-2 rounded-full bg-[#facc15] text-white shadow-sm' : 'text-slate-900 hover:text-[#009150]' }} font-medium transition uppercase tracking-wider text-[11px]">Home</a>
            <a href="{{ route('about') }}"
                class="{{ Request::routeIs('about') ? 'px-6 py-2 rounded-full bg-[#facc15] text-white shadow-sm' : 'text-slate-900 hover:text-[#009150]' }} font-medium transition uppercase tracking-wider text-[11px]">About</a>

            <a href="{{ route('milestone.activity') }}"
                class="{{ Request::routeIs('milestone.activity') ? 'px-6 py-2 rounded-full bg-[#facc15] text-white shadow-sm' : 'text-slate-900 hover:text-[#009150]' }} font-medium transition uppercase tracking-wider text-[11px]">Activity</a>
            <a href="{{ route('milestone.article') }}"
                class="{{ Request::routeIs('milestone.article') ? 'px-6 py-2 rounded-full bg-[#facc15] text-white shadow-sm' : 'text-slate-900 hover:text-[#009150]' }} font-medium transition uppercase tracking-wider text-[11px]">Article</a>
            <a href="{{ route('merch') }}"
                class="{{ Request::routeIs('merch') ? 'px-6 py-2 rounded-full bg-[#facc15] text-white shadow-sm' : 'text-slate-900 hover:text-[#009150]' }} font-medium transition uppercase tracking-wider text-[11px]">Merch</a>
        </div>

        <!-- Right Side (Contact + Login) -->
        <div class="hidden lg:flex items-center gap-4 h-full pr-6 py-2 ml-auto">
            @auth
                <a href="{{ route('dashboard') }}" class="flex flex-col items-center justify-center h-full">
                    <div class="bg-[#facc15] rounded-[10px] p-1.5 mb-1.5 shadow-sm">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg>
                    </div>
                    <span class="text-[9px] font-medium text-[#009150] uppercase tracking-wider leading-none">Dash</span>
                </a>
            @else
                <a href="{{ route('login') }}" class="flex flex-col items-center justify-center h-full">
                    <div class="bg-[#facc15] rounded-[10px] p-1.5 mb-1.5 shadow-sm">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg>
                    </div>
                    <span class="text-[9px] font-medium text-[#009150] uppercase tracking-wider leading-none">Login</span>
                </a>
            @endauth

            <a href="{{ route('contact') }}" class="flex flex-col items-center justify-center h-full ml-2">
                <div class="bg-[#facc15] rounded-[10px] p-1.5 mb-1.5 shadow-sm hover:scale-105 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                    </svg>
                </div>
                <span class="text-[9px] font-medium text-[#009150] uppercase tracking-wider leading-none">Contact</span>
            </a>

            <a href="https://mesin.ft.unesa.ac.id/" target="_blank"
                class="px-8 py-3 rounded-full bg-blue-500 text-white font-medium text-[11px] uppercase tracking-wider hover:bg-blue-600 transition shadow-md h-full flex items-center ml-2">mesin.ft.unesa.ac.id</a>
        </div>

        <!-- Mobile menu button -->
        <div class="lg:hidden flex items-center pr-4 ml-auto">
            <button id="mobile-menu-button"
                class="inline-flex items-center justify-center p-2 rounded-xl text-slate-800 hover:bg-slate-100 transition-colors">
                <svg class="h-8 w-8" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu"
            class="hidden absolute top-full left-0 w-full bg-white border border-slate-200 mt-4 rounded-3xl shadow-2xl px-4 py-6 lg:hidden">
            <div class="space-y-2">
                <a href="{{ route('home') }}"
                    class="block px-4 py-3 rounded-xl text-base font-medium text-slate-900 hover:bg-slate-50 transition uppercase tracking-wider">Home</a>
                <a href="{{ route('about') }}"
                    class="block px-4 py-3 rounded-xl text-base font-medium text-slate-900 hover:bg-slate-50 transition uppercase tracking-wider">About</a>

                <a href="{{ route('milestone.activity') }}"
                    class="block px-4 py-3 rounded-xl text-base font-medium text-slate-900 hover:bg-slate-50 transition uppercase tracking-wider">Activity</a>
                <a href="{{ route('milestone.article') }}"
                    class="block px-4 py-3 rounded-xl text-base font-medium text-slate-900 hover:bg-slate-50 transition uppercase tracking-wider">Article</a>
                <a href="{{ route('merch') }}"
                    class="block px-4 py-3 rounded-xl text-base font-medium text-slate-900 hover:bg-slate-50 transition uppercase tracking-wider">Merch</a>
                <a href="https://mesin.ft.unesa.ac.id/" target="_blank"
                    class="block px-4 py-3 rounded-xl text-base font-medium text-slate-900 hover:bg-slate-50 transition uppercase tracking-wider">mesin.ft.unesa.ac.id</a>
            </div>

            <div class="pt-4 mt-4 border-t border-slate-100 flex flex-col gap-3">
                @auth
                    <a href="{{ route('dashboard') }}"
                        class="text-center py-4 rounded-xl bg-[#3b82f6] text-white font-medium uppercase tracking-widest shadow-md">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="text-center py-4 rounded-xl border border-slate-200 text-slate-900 font-medium uppercase tracking-wider">Login</a>
                    <a href="{{ route('register') }}"
                        class="text-center py-4 rounded-xl bg-[#facc15] text-white font-medium uppercase tracking-widest shadow-md">Join
                        Community</a>
                @endauth
                <a href="{{ route('contact') }}"
                    class="text-center py-4 rounded-xl bg-[#facc15] text-[#009150] font-medium uppercase tracking-widest shadow-md flex items-center justify-center gap-2">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                    </svg>
                    Contact
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="{{ Request::is('/') || Request::routeIs('milestone.activity*') || Request::routeIs('milestone.article*') ? '' : 'pt-20' }}">
        @yield('content')
    </main>

    <!-- Footer -->
    <!-- Back to Top Button -->
    <button id="back-to-top"
        class="fixed bottom-8 right-8 z-[60] w-14 h-14 bg-[#facc15] text-white rounded-full shadow-2xl flex items-center justify-center transition-all duration-500 translate-y-24 opacity-0 hover:bg-yellow-400 active:scale-95 group">
        <svg class="w-6 h-6 group-hover:-translate-y-1 transition duration-300" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7"></path>
        </svg>
    </button>

    <footer class="bg-[#009150] text-white pt-24 pb-12 relative overflow-hidden transition-colors duration-300">
        <!-- Decoration Area -->
        <div class="absolute top-0 left-0 w-full h-px bg-white/20"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-white/5 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                <!-- Column 1: Organization -->
                <div class="space-y-8">
                    <div class="flex items-center gap-4 mb-2">
                        <img src="{{ asset('images/logo/navbar-logo.png') }}" alt="SRE Logo" class="h-12 object-contain"
                            onerror="this.src='https://placehold.co/150x50/047857/FFFFFF?text=SRE+UNESA'">
                        <img src="{{ asset('images/logo/unesaputih.png') }}" alt="UNESA Logo"
                            class="h-12 object-contain"
                            onerror="this.src='https://placehold.co/150x50/047857/FFFFFF?text=UNESA'">
                    </div>
                    <p class="text-emerald-50/80 leading-relaxed text-sm font-medium">
                        Society of Renewable Energy State University of Surabaya is dedicated to promoting sustainable
                        energy solutions and educating the next generation of renewable energy leaders.
                    </p>
                    <div class="flex gap-4">
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-yellow-400 hover:text-emerald-900 transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z">
                                </path>
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-yellow-400 hover:text-emerald-900 transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12.315 2c2.43 0 2.784.012 3.855.06 1.061.044 1.787.209 2.427.458a4.902 4.902 0 011.765 1.148 4.902 4.902 0 011.148 1.765c.249.64.414 1.366.457 2.427.06 1.061.06 1.417.06 3.865s-.012 2.783-.06 3.854c-.044 1.062-.209 1.787-.458 2.427a4.902 4.902 0 01-1.148 1.766 4.902 4.902 0 01-1.765 1.148c-.64.249-1.366.414-2.427.457-1.061.061-1.414.061-3.854.061s-2.783-.012-3.854-.06c-1.062-.044-1.787-.209-2.427-.458a4.902 4.902 0 01-1.766-1.148 4.902 4.902 0 01-1.148-1.766c-.249-.64-.414-1.366-.457-2.427-.06-1.061-.06-1.414-.06-3.854s.012-2.784.06-3.854c.044-1.061.209-1.787.458-2.427z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Column 2: Quick Links -->
                <div>
                    <h4 class="font-bold mb-8 text-white uppercase tracking-[0.2em] text-xs">Quick Links</h4>
                    <ul class="space-y-4 text-emerald-50/70 text-sm font-semibold">
                        <li><a href="{{ route('home') }}"
                                class="hover:text-yellow-400 hover:translate-x-1 transition-all inline-block">Home</a>
                        </li>
                        <li><a href="{{ route('about') }}"
                                class="hover:text-yellow-400 hover:translate-x-1 transition-all inline-block">About</a>
                        </li>

                        <li><a href="{{ route('milestone.activity') }}"
                                class="hover:text-yellow-400 hover:translate-x-1 transition-all inline-block">Activity</a>
                        </li>
                        <li><a href="{{ route('milestone.article') }}"
                                class="hover:text-yellow-400 hover:translate-x-1 transition-all inline-block">Article</a>
                        </li>
                        <li><a href="{{ route('merch') }}"
                                class="hover:text-yellow-400 hover:translate-x-1 transition-all inline-block">Merchandise</a>
                        </li>
                        <li><a href="https://mesin.ft.unesa.ac.id/" target="_blank"
                                class="hover:text-yellow-400 hover:translate-x-1 transition-all inline-block">mesin.ft.unesa.ac.id</a>
                        </li>
                    </ul>
                </div>

                <!-- Column 3: Contact -->
                <div>
                    <h4 class="font-bold mb-8 text-white uppercase tracking-[0.2em] text-xs">Contact</h4>
                    <ul class="space-y-4 text-emerald-50/70 text-sm font-semibold">
                        <li><a href="{{ route('contact') }}" class="hover:text-yellow-400 hover:translate-x-1 transition-all inline-block">Hubungi Kami</a></li>
                        <li><a href="{{ route('register') }}" class="hover:text-yellow-400 hover:translate-x-1 transition-all inline-block">Bergabung</a></li>
                        <li><a href="https://mesin.ft.unesa.ac.id/" target="_blank" class="hover:text-yellow-400 hover:translate-x-1 transition-all inline-block">mesin.ft.unesa.ac.id</a></li>
                    </ul>
                </div>

                <!-- Column 4: Newsletter -->
                <div>
                    <h4 class="font-bold mb-8 text-white uppercase tracking-[0.2em] text-xs">Newsletter</h4>
                    <p class="text-emerald-50/70 text-sm mb-6 leading-relaxed">
                        Subscribe to our newsletter to receive updates on our latest events, projects, and educational
                        resources.
                    </p>
                    <div class="relative group">
                        <input type="email" placeholder="Your email address"
                            class="w-full bg-white/10 border border-white/20 rounded-2xl py-4 pl-6 pr-12 text-sm text-white placeholder-emerald-100/40 focus:outline-none focus:ring-2 focus:ring-yellow-400/50 transition-all">
                        <button
                            class="absolute right-2 top-2 bottom-2 bg-yellow-400 text-emerald-900 px-4 rounded-xl font-bold text-[10px] uppercase hover:bg-yellow-300 transition-colors shadow-lg">
                            Subscribe
                        </button>
                    </div>
                </div>
            </div>

            <div
                class="border-t border-white/10 pt-10 flex flex-col md:flex-row justify-between items-center gap-6 text-[10px] tracking-[0.1em] font-bold uppercase text-emerald-50/30">
                <p>&copy; {{ date('Y') }} Society of Renewable Energy State University of Surabaya. All rights reserved.
                </p>
                <div class="flex gap-8">
                    <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                    <a href="#" class="hover:text-white transition-colors">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            easing: 'ease-out-cubic'
        });

        const nav = document.getElementById('main-nav');
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');

        const backToTopBtn = document.getElementById('back-to-top');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTopBtn.classList.remove('translate-y-24', 'opacity-0');
                backToTopBtn.classList.add('translate-y-0', 'opacity-100');
            } else {
                backToTopBtn.classList.add('translate-y-24', 'opacity-0');
                backToTopBtn.classList.remove('translate-y-0', 'opacity-100');
            }

            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        // No theme toggle on public pages — handled by system preference
    </script>
    @yield('scripts')
</body>

</html>