@extends('layouts.app-public')

@section('title', 'Official Merch - Coming Soon')

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
    body {
        background-color: #ffffff !important;
        color: #0f172a !important;
        font-family: 'Hanken Grotesk', sans-serif;
    }

    /* Keyframes for subtle organic floating leaves */
    @keyframes float-leaf-1 {
        0% { transform: translate(0, 0) rotate(0deg) scale(1); }
        50% { transform: translate(25px, 35px) rotate(25deg) scale(1.05); }
        100% { transform: translate(0, 0) rotate(0deg) scale(1); }
    }

    @keyframes float-leaf-2 {
        0% { transform: translate(0, 0) rotate(0deg) scale(0.9); }
        50% { transform: translate(-30px, 20px) rotate(-20deg) scale(0.95); }
        100% { transform: translate(0, 0) rotate(0deg) scale(0.9); }
    }

    @keyframes float-leaf-3 {
        0% { transform: translate(0, 0) rotate(0deg) scale(1.1); }
        50% { transform: translate(20px, -25px) rotate(15deg) scale(1.15); }
        100% { transform: translate(0, 0) rotate(0deg) scale(1.1); }
    }

    .floating-leaf-1 { animation: float-leaf-1 14s ease-in-out infinite; }
    .floating-leaf-2 { animation: float-leaf-2 18s ease-in-out infinite; }
    .floating-leaf-3 { animation: float-leaf-3 12s ease-in-out infinite; }
    .floating-leaf-4 { animation: float-leaf-1 20s ease-in-out infinite; }
    .floating-leaf-5 { animation: float-leaf-2 11s ease-in-out infinite; }

    /* Supports prefers-reduced-motion to respect user OS accessibility settings */
    @media (prefers-reduced-motion: reduce) {
        .floating-leaf {
            animation: none !important;
            transform: none !important;
        }
    }

    /* Infinite Marquee */
    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .animate-marquee {
        animation: marquee 25s linear infinite;
    }
</style>
@endsection

@section('content')
<div x-data="{ showModal: false, email: '', isSubmitted: false, errors: '' }" 
     class="relative w-full overflow-hidden min-h-[calc(100vh-5rem)] bg-gradient-to-b from-[#f2faf5] via-white to-white flex flex-col justify-between pt-12 md:pt-16">
    
    <!-- Floating Realistic Leaves Background (pointer-events-none) -->
    <div class="absolute inset-0 pointer-events-none z-0">
        <!-- Leaf 1: Top Left -->
        <div class="absolute left-[12%] top-[18%] w-10 h-10 floating-leaf floating-leaf-1 opacity-70">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" class="w-full h-full text-[#01ce72]/45">
                <path d="M2 22C2 22 6 20 8 16C10 12 11 8 22 2C22 2 18 11 14 13C10 15 8 16 8 16L2 22Z" fill="currentColor" fill-opacity="0.1"/>
                <path d="M8 16L20 4" />
                <path d="M11 13c1.5-0.5 2.5-1.5 2.5-1.5" />
                <path d="M14 10c1.5-0.5 2.5-1.5 2.5-1.5" />
                <path d="M17 7c1.5-0.5 2.5-1.5 2.5-1.5" />
                <path d="M9 15c-0.5 1.5-1.5 2.5-1.5 2.5" />
                <path d="M12 12c-0.5 1.5-1.5 2.5-1.5 2.5" />
                <path d="M15 9c-0.5 1.5-1.5 2.5-1.5 2.5" />
            </svg>
        </div>
        <!-- Leaf 2: Mid Left (Blurred) -->
        <div class="absolute left-[5%] top-[45%] w-16 h-16 floating-leaf floating-leaf-2 opacity-50 blur-[2px]">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" class="w-full h-full text-[#009150]/30">
                <path d="M2 22C2 22 6 20 8 16C10 12 11 8 22 2C22 2 18 11 14 13C10 15 8 16 8 16L2 22Z" fill="currentColor" fill-opacity="0.08"/>
                <path d="M8 16L20 4" />
                <path d="M11 13c1.5-0.5 2.5-1.5 2.5-1.5" />
                <path d="M14 10c1.5-0.5 2.5-1.5 2.5-1.5" />
                <path d="M17 7c1.5-0.5 2.5-1.5 2.5-1.5" />
                <path d="M9 15c-0.5 1.5-1.5 2.5-1.5 2.5" />
                <path d="M12 12c-0.5 1.5-1.5 2.5-1.5 2.5" />
                <path d="M15 9c-0.5 1.5-1.5 2.5-1.5 2.5" />
            </svg>
        </div>
        <!-- Leaf 3: Bottom Left -->
        <div class="absolute left-[22%] bottom-[25%] w-12 h-12 floating-leaf floating-leaf-3 opacity-70">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" class="w-full h-full text-[#01ce72]/35">
                <path d="M2 22C2 22 6 20 8 16C10 12 11 8 22 2C22 2 18 11 14 13C10 15 8 16 8 16L2 22Z" fill="currentColor" fill-opacity="0.1"/>
                <path d="M8 16L20 4" />
                <path d="M11 13c1.5-0.5 2.5-1.5 2.5-1.5" />
                <path d="M14 10c1.5-0.5 2.5-1.5 2.5-1.5" />
                <path d="M17 7c1.5-0.5 2.5-1.5 2.5-1.5" />
                <path d="M9 15c-0.5 1.5-1.5 2.5-1.5 2.5" />
                <path d="M12 12c-0.5 1.5-1.5 2.5-1.5 2.5" />
                <path d="M15 9c-0.5 1.5-1.5 2.5-1.5 2.5" />
            </svg>
        </div>
        <!-- Leaf 4: Top Right -->
        <div class="absolute right-[15%] top-[15%] w-12 h-12 floating-leaf floating-leaf-4 opacity-80">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" class="w-full h-full text-[#009150]/40">
                <path d="M2 22C2 22 6 20 8 16C10 12 11 8 22 2C22 2 18 11 14 13C10 15 8 16 8 16L2 22Z" fill="currentColor" fill-opacity="0.12"/>
                <path d="M8 16L20 4" />
                <path d="M11 13c1.5-0.5 2.5-1.5 2.5-1.5" />
                <path d="M14 10c1.5-0.5 2.5-1.5 2.5-1.5" />
                <path d="M17 7c1.5-0.5 2.5-1.5 2.5-1.5" />
                <path d="M9 15c-0.5 1.5-1.5 2.5-1.5 2.5" />
                <path d="M12 12c-0.5 1.5-1.5 2.5-1.5 2.5" />
                <path d="M15 9c-0.5 1.5-1.5 2.5-1.5 2.5" />
            </svg>
        </div>
        <!-- Leaf 5: Bottom Right (Blurred) -->
        <div class="absolute right-[8%] bottom-[30%] w-20 h-20 floating-leaf floating-leaf-5 opacity-40 blur-[3px]">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" class="w-full h-full text-[#01ce72]/20">
                <path d="M2 22C2 22 6 20 8 16C10 12 11 8 22 2C22 2 18 11 14 13C10 15 8 16 8 16L2 22Z" fill="currentColor" fill-opacity="0.05"/>
                <path d="M8 16L20 4" />
                <path d="M11 13c1.5-0.5 2.5-1.5 2.5-1.5" />
                <path d="M14 10c1.5-0.5 2.5-1.5 2.5-1.5" />
                <path d="M17 7c1.5-0.5 2.5-1.5 2.5-1.5" />
                <path d="M9 15c-0.5 1.5-1.5 2.5-1.5 2.5" />
                <path d="M12 12c-0.5 1.5-1.5 2.5-1.5 2.5" />
                <path d="M15 9c-0.5 1.5-1.5 2.5-1.5 2.5" />
            </svg>
        </div>
        
        <!-- Dotted Grid Decoration -->
        <div class="absolute top-[25%] left-[4%] opacity-25 text-[#009150]">
            <svg width="120" height="120" viewBox="0 0 100 100" fill="currentColor">
                <circle cx="10" cy="10" r="2" /><circle cx="30" cy="10" r="2" /><circle cx="50" cy="10" r="2" /><circle cx="70" cy="10" r="2" /><circle cx="90" cy="10" r="2" />
                <circle cx="10" cy="30" r="2" /><circle cx="30" cy="30" r="2" /><circle cx="50" cy="30" r="2" /><circle cx="70" cy="30" r="2" /><circle cx="90" cy="30" r="2" />
                <circle cx="10" cy="50" r="2" /><circle cx="30" cy="50" r="2" /><circle cx="50" cy="50" r="2" /><circle cx="70" cy="50" r="2" /><circle cx="90" cy="50" r="2" />
                <circle cx="10" cy="70" r="2" /><circle cx="30" cy="70" r="2" /><circle cx="50" cy="70" r="2" /><circle cx="70" cy="70" r="2" /><circle cx="90" cy="70" r="2" />
            </svg>
        </div>
        <div class="absolute bottom-[35%] right-[4%] opacity-25 text-[#009150]">
            <svg width="120" height="120" viewBox="0 0 100 100" fill="currentColor">
                <circle cx="10" cy="10" r="2" /><circle cx="30" cy="10" r="2" /><circle cx="50" cy="10" r="2" /><circle cx="70" cy="10" r="2" /><circle cx="90" cy="10" r="2" />
                <circle cx="10" cy="30" r="2" /><circle cx="30" cy="30" r="2" /><circle cx="50" cy="30" r="2" /><circle cx="70" cy="30" r="2" /><circle cx="90" cy="30" r="2" />
                <circle cx="10" cy="50" r="2" /><circle cx="30" cy="50" r="2" /><circle cx="50" cy="50" r="2" /><circle cx="70" cy="50" r="2" /><circle cx="90" cy="50" r="2" />
                <circle cx="10" cy="70" r="2" /><circle cx="30" cy="70" r="2" /><circle cx="50" cy="70" r="2" /><circle cx="70" cy="70" r="2" /><circle cx="90" cy="70" r="2" />
            </svg>
        </div>
    </div>

    <!-- Main Hero Wrapper -->
    <div class="relative z-10 flex-1 flex flex-col items-center justify-center max-w-5xl mx-auto px-6 text-center py-10 md:py-16">
        
        <!-- Large Central Visual/Icon -->
        <div class="relative mb-8 md:mb-10 scale-110 sm:scale-125">
            <!-- Glow background -->
            <div class="absolute inset-0 bg-[#01ce72]/15 rounded-full blur-2xl scale-75"></div>
            <!-- Dashed Outer Circle -->
            <div class="w-32 h-32 border-2 border-dashed border-[#009150]/35 rounded-full flex items-center justify-center relative animate-[spin_50s_linear_infinite]"></div>
            
            <!-- Center Shopping Bag SVG -->
            <div class="absolute inset-0 flex items-center justify-center text-[#009150]">
                <svg class="w-16 h-16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4H6z" />
                    <path d="M3 6h18M16 10a4 4 0 01-8 0" />
                    <!-- Bright green leaf overlay on bag -->
                    <path d="M12 11c1-1.5 2.5-1.5 2.5-1.5s0 1.5-1.5 2.5a2 2 0 01-1 0.5z" fill="#01ce72" />
                </svg>
            </div>
            
            <!-- Sparkles -->
            <span class="absolute top-1 right-2 text-[#facc15] text-2xl animate-pulse">✦</span>
            <span class="absolute bottom-5 -left-3 text-[#facc15] text-lg animate-pulse delay-500">✦</span>
            <span class="absolute top-12 -right-6 text-[#facc15] text-sm animate-pulse delay-300">✦</span>
        </div>

        <!-- Small "COMING SOON" Label -->
        <span class="text-xs sm:text-sm font-extrabold text-[#009150] uppercase tracking-[0.45em] mb-4 block">Coming Soon</span>

        <!-- Large Headline -->
        <h1 class="text-4xl sm:text-6xl md:text-[5rem] lg:text-[5.5rem] font-black tracking-tighter leading-[0.95] mb-6">
            <span class="text-[#002816]">SOMETHING</span><br>
            <span class="text-[#01ce72]">GREAT IS COMING</span>
        </h1>

        <!-- Divider with Leaf Icon -->
        <div class="flex items-center justify-center gap-4 mb-8 w-full max-w-sm mx-auto">
            <div class="h-[1.5px] bg-[#009150]/20 flex-1"></div>
            <svg class="w-6 h-6 text-[#009150] fill-current" viewBox="0 0 24 24">
                <path d="M21,3C11.6,3,4.4,10.2,4.4,19.6c0,1,0.8,1.8,1.8,1.8c9.4,0,16.6-7.2,16.6-16.6C22.8,3.8,22,3,21,3z" />
            </svg>
            <div class="h-[1.5px] bg-[#009150]/20 flex-1"></div>
        </div>

        <!-- Subheadline -->
        <p class="text-slate-600 font-medium text-base sm:text-lg md:text-xl max-w-2xl leading-relaxed mb-10 px-4">
            Our exclusive SRE UNESA merch collection is currently in the works.<br>
            <span class="font-bold text-[#002816]">Be the first to know when it drops!</span>
        </p>

        <!-- CTA Buttons with fixed size constraints to prevent vertical wrapping -->
        <div class="flex flex-wrap gap-4 justify-center items-center mb-20 relative z-20">
            <button @click="showModal = true" 
                    class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-[#009150] hover:bg-[#002816] text-white font-bold rounded-full text-[14px] transition-all shadow-xl shadow-[#009150]/20 hover:shadow-2xl hover:-translate-y-0.5 active:translate-y-0 cursor-pointer min-w-[180px]">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                </svg>
                <span class="whitespace-nowrap tracking-wider text-xs">NOTIFY ME</span>
            </button>
            
            <a href="{{ route('home') }}" 
               class="inline-flex items-center justify-center gap-2 px-8 py-4 border-2 border-[#009150]/25 hover:border-[#009150] text-[#002816] font-bold rounded-full text-[14px] transition-all hover:bg-slate-50 hover:-translate-y-0.5 active:translate-y-0 min-w-[180px]">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                <span class="whitespace-nowrap tracking-wider text-xs">BACK TO HOME</span>
            </a>
        </div>

        <!-- Teaser Products Section (Highly Visual Cards) -->
        <div class="w-full max-w-4xl grid grid-cols-1 md:grid-cols-3 gap-8 px-4 sm:px-0">
            
            <!-- Card 1: Shirt -->
            <div class="bg-gradient-to-b from-white to-[#f6fcf8] border border-[#009150]/15 rounded-[2.2rem] p-10 flex flex-col items-center justify-center relative overflow-hidden group hover:border-[#01ce72]/45 hover:shadow-2xl transition-all duration-500">
                <!-- Gold Badge -->
                <span class="absolute top-4 right-4 bg-gradient-to-r from-[#facc15] to-[#f59e0b] text-[#002816] text-[8px] font-black px-3.5 py-1.5 rounded-full uppercase tracking-widest shadow-md select-none">
                    COMING SOON
                </span>
                
                <!-- Silhouette Circle -->
                <div class="w-24 h-24 bg-[#009150]/5 text-[#009150] rounded-[1.8rem] flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-[#01ce72]/10 transition-all duration-500">
                    <svg class="w-12 h-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 4L9 7v2h6V7l3-3 3 5.5-3.5 1.5V20H6.5V11L3 9.5 6 4z" />
                        <path d="M12 11c.5 1.5 2 1.5 2 1.5" stroke-width="1" />
                    </svg>
                </div>
                
                <h3 class="text-base font-black text-[#002816] uppercase tracking-wider mb-2 group-hover:text-[#009150] transition-colors">Official T-Shirt</h3>
                <p class="text-xs text-slate-500 text-center max-w-[200px] leading-relaxed">High quality organic cotton styled with SRE iconic elements.</p>
            </div>
            
            <!-- Card 2: Cap -->
            <div class="bg-gradient-to-b from-white to-[#f6fcf8] border border-[#009150]/15 rounded-[2.2rem] p-10 flex flex-col items-center justify-center relative overflow-hidden group hover:border-[#01ce72]/45 hover:shadow-2xl transition-all duration-500">
                <span class="absolute top-4 right-4 bg-gradient-to-r from-[#facc15] to-[#f59e0b] text-[#002816] text-[8px] font-black px-3.5 py-1.5 rounded-full uppercase tracking-widest shadow-md select-none">
                    COMING SOON
                </span>
                
                <div class="w-24 h-24 bg-[#009150]/5 text-[#009150] rounded-[1.8rem] flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-[#01ce72]/10 transition-all duration-500">
                    <svg class="w-12 h-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 6a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        <path d="M4 13c-1.5.5-2.5 1.5-2.5 2.5S3 17 6.5 17h11c3.5 0 5-1 5-1.5s-1-2-2.5-2.5" />
                        <circle cx="12" cy="6" r="1" />
                    </svg>
                </div>
                
                <h3 class="text-base font-black text-[#002816] uppercase tracking-wider mb-2 group-hover:text-[#009150] transition-colors">Official Cap</h3>
                <p class="text-xs text-slate-500 text-center max-w-[200px] leading-relaxed">Sleek embroidered design with adjustable backstrap.</p>
            </div>
            
            <!-- Card 3: Tote Bag -->
            <div class="bg-gradient-to-b from-white to-[#f6fcf8] border border-[#009150]/15 rounded-[2.2rem] p-10 flex flex-col items-center justify-center relative overflow-hidden group hover:border-[#01ce72]/45 hover:shadow-2xl transition-all duration-500">
                <span class="absolute top-4 right-4 bg-gradient-to-r from-[#facc15] to-[#f59e0b] text-[#002816] text-[8px] font-black px-3.5 py-1.5 rounded-full uppercase tracking-widest shadow-md select-none">
                    COMING SOON
                </span>
                
                <div class="w-24 h-24 bg-[#009150]/5 text-[#009150] rounded-[1.8rem] flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-[#01ce72]/10 transition-all duration-500">
                    <svg class="w-12 h-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 9V6a6 6 0 0112 0v3" />
                        <rect x="4" y="9" width="16" height="12" rx="2" />
                        <path d="M9 13.5c1.5 1.5 4.5 1.5 6 0" stroke-width="1" />
                    </svg>
                </div>
                
                <h3 class="text-base font-black text-[#002816] uppercase tracking-wider mb-2 group-hover:text-[#009150] transition-colors">Official Tote Bag</h3>
                <p class="text-xs text-slate-500 text-center max-w-[200px] leading-relaxed">Heavyweight organic canvas bag for daily sustainable routines.</p>
            </div>
        </div>
    </div>

    <!-- Animated Loop Banner (Marquee) - Restored exactly to match image 3 (white background, yellow text, sre logo) -->
    <div class="w-full relative py-12 my-12 overflow-hidden bg-white border-y border-slate-100 z-10">
        <div class="absolute inset-0 py-12 flex items-center whitespace-nowrap">
            <div class="animate-marquee flex gap-16 items-center pr-16">
                @foreach(range(1, 8) as $i)
                <span class="text-4xl lg:text-7xl font-black uppercase tracking-tighter inline-flex items-center">
                    <img src="{{ asset('images/logo/srehijau.png') }}" class="h-10 lg:h-16 w-auto mr-4" alt="SRE Logo">
                    <span class="text-yellow-400">Merchandise</span>
                </span>
                @endforeach
            </div>
            <div class="animate-marquee flex gap-16 items-center pr-16" aria-hidden="true">
                @foreach(range(1, 8) as $i)
                <span class="text-4xl lg:text-7xl font-black uppercase tracking-tighter inline-flex items-center">
                    <img src="{{ asset('images/logo/srehijau.png') }}" class="h-10 lg:h-16 w-auto mr-4" alt="SRE Logo">
                    <span class="text-yellow-400">Merchandise</span>
                </span>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Get Notified Modal Backdrop -->
    <div x-show="showModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-[#002816]/75 backdrop-blur-sm z-50 flex items-center justify-center p-4"
         style="display: none;">
        
        <!-- Modal Container -->
        <div @click.outside="showModal = false"
             x-show="showModal"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 scale-95 translate-y-4"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 translate-y-4"
             class="bg-white rounded-[2rem] border border-[#009150]/20 shadow-2xl p-6 sm:p-8 max-w-md w-full relative overflow-hidden">
            
            <!-- Graphic background glows inside modal -->
            <div class="absolute -right-12 -top-12 w-32 h-32 bg-[#01ce72]/10 rounded-full blur-2xl pointer-events-none"></div>
            <div class="absolute -left-12 -bottom-12 w-24 h-24 bg-[#facc15]/10 rounded-full blur-xl pointer-events-none"></div>

            <div class="relative z-10 flex flex-col items-center text-center">
                <!-- Icon mail badge -->
                <div class="w-14 h-14 bg-[#009150]/10 text-[#009150] rounded-full flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                </div>
                
                <h3 class="text-xl font-bold text-[#002816] mb-2">Get Notified</h3>
                <p class="text-sm text-slate-500 mb-6">
                    Masukkan email Anda untuk menerima kabar terbaru saat merchandise resmi SRE UNESA dirilis!
                </p>

                <!-- Email Input Form -->
                <form @submit.prevent="if (email.includes('@')) { isSubmitted = true; showModal = false; email = ''; } else { errors = 'Email tidak valid!'; }" class="w-full space-y-4">
                    <div class="relative">
                        <input type="email" x-model="email" @input="errors = ''" placeholder="Alamat email Anda" required
                               class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#009150] focus:border-[#009150] transition duration-200">
                        <p x-show="errors" x-text="errors" class="text-xs text-red-500 text-left mt-1 pl-1" style="display: none;"></p>
                    </div>

                    <div class="flex gap-3 w-full">
                        <button type="button" @click="showModal = false"
                                class="flex-1 px-5 py-4 border border-slate-200 hover:bg-slate-50 rounded-2xl font-bold text-sm text-slate-600 transition duration-200">
                            Batal
                        </button>
                        <button type="submit"
                                class="flex-1 px-5 py-4 bg-[#009150] hover:bg-[#002816] rounded-2xl font-bold text-sm text-white transition duration-200 shadow-lg shadow-[#009150]/20">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Success Toast Notification -->
    <div x-show="isSubmitted"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-4"
         x-init="$watch('isSubmitted', value => { if (value) setTimeout(() => isSubmitted = false, 5000) })"
         class="fixed bottom-8 left-1/2 -translate-x-1/2 bg-[#002816] border border-[#01ce72]/30 text-white rounded-2xl px-6 py-4 shadow-2xl z-50 flex items-center gap-3 w-full max-w-sm"
         style="display: none;">
        <div class="w-8 h-8 bg-[#01ce72]/20 text-[#01ce72] rounded-full flex items-center justify-center shrink-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
            </svg>
        </div>
        <div class="text-left">
            <p class="text-sm font-bold">Terima kasih!</p>
            <p class="text-xs text-slate-300">Kami akan memberi tahu Anda saat merchandise dirilis.</p>
        </div>
        <button @click="isSubmitted = false" class="ml-auto text-slate-400 hover:text-white transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>
@endsection

@section('scripts')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
