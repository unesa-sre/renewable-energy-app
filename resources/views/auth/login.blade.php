<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SRE UNESA - Login</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo/navbar-logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Hanken Grotesk', sans-serif;
        }

        .login-input {
            border: 1px solid #E2E8F0;
            transition: all 0.2s ease;
        }

        .login-input:focus {
            border-color: #009150;
            box-shadow: 0 0 0 4px rgba(0, 145, 80, 0.1);
        }
    </style>
</head>

<body class="antialiased text-gray-900 bg-white">
    <x-splash-screen />

    <div class="flex min-h-screen">

        <!-- Left Side: Login Form Area -->
        <div class="w-full lg:w-[45%] flex flex-col p-8 sm:p-12 lg:p-16 xl:p-24 bg-white relative">

            <!-- Back Link -->
            <div class="mb-12">
                <a href="{{ url('/') }}"
                    class="inline-flex items-center text-[#009150] font-semibold hover:text-[#002816] transition-colors group">
                    <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back
                </a>
            </div>

            <div class="flex-grow flex items-center justify-center">
                <div class="w-full max-w-md">
                    <div class="mb-10 text-center">
                        <h2 class="text-4xl font-extrabold text-gray-900 tracking-tight mb-2">Login</h2>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Username</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400 group-focus-within:text-[#009150] transition-colors"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                    autofocus placeholder="yourname@example.com"
                                    class="login-input block w-full rounded-xl py-3.5 pl-11 pr-4 text-gray-900 bg-white sm:text-sm focus:outline-none">
                            </div>
                            <p class="mt-2 text-xs text-[#009150] font-medium">Username berupa email</p>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-bold text-gray-700 mb-2">Password</label>
                            <div class="relative group" x-data="{ show: false }">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400 group-focus-within:text-[#009150] transition-colors"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input id="password" :type="show ? 'text' : 'password'" name="password" required
                                    placeholder="••••••••"
                                    class="login-input block w-full rounded-xl py-3.5 pl-11 pr-11 text-gray-900 bg-white sm:text-sm focus:outline-none">
                                <button type="button" @click="show = !show"
                                    class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-[#009150] transition-colors">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        x-show="!show">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        x-show="show" style="display: none;">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                                    </svg>
                                </button>
                            </div>
                            <div class="mt-2 text-right">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                        class="text-xs font-bold text-[#009150] hover:text-[#002816] transition-colors border-b border-transparent hover:border-[#002816]">
                                        Lupa password?
                                    </a>
                                @endif
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-2">
                            <button type="submit"
                                class="w-full py-4 bg-[#009150] hover:bg-[#002816] text-white font-bold rounded-xl shadow-lg shadow-[#009150]/30 transition-all duration-300 transform hover:-translate-y-1 active:scale-[0.98]">
                                Login
                            </button>
                        </div>
                    </form>

                    <!-- Registration Link -->
                    @if (Route::has('register'))
                        <p class="mt-10 text-center text-sm font-medium text-gray-500">
                            Belum punya akun?
                            <a href="{{ route('register') }}"
                                class="text-[#009150] font-bold hover:text-[#002816] transition-colors">Daftar</a>
                        </p>
                    @endif
                </div>
            </div>

            <!-- Footer Attribution -->
            <div class="mt-12 text-center lg:text-left">
                <p class="text-xs text-gray-400 font-medium tracking-wider uppercase">&copy; 2026 SRE UNESA. All rights
                    reserved.</p>
            </div>
        </div>

        <!-- Right Side: Branded Image Area -->
        <div class="hidden lg:flex lg:w-[55%] relative bg-white overflow-hidden">
            <!-- Background Image Placeholder (Wind Turbines) -->
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('images/home/hero-bg-1.jpg') }}" alt="SRE Background"
                    class="w-full h-full object-cover">
            </div>

            <!-- Branded Content Overlay -->
            <div class="relative z-10 w-full h-full text-white">
                <div data-aos="fade-down" class="absolute top-12 right-12 xl:top-16 xl:right-16 flex items-center gap-6">
                    <img src="{{ asset('images/logo/unesaputih.png') }}" alt="UNESA Logo"
                        class="h-20 sm:h-24 xl:h-32 object-contain drop-shadow-2xl hover:scale-105 transition-transform duration-500">
                    <img src="{{ asset('images/logo/navbar-logo-1.png') }}" alt="SRE Logo"
                        class="h-20 sm:h-24 xl:h-32 object-contain drop-shadow-2xl hover:scale-105 transition-transform duration-500">
                </div>
            </div>
        </div>
    </div>

    <!-- Alpine.js for password toggle -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>