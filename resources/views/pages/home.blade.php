@extends('layouts.app-public')

@section('title', 'Masa Depan Energi Bersih')

@section('content')
<div class="master-wrapper w-full relative overflow-x-hidden">
    <!-- Hero Section (Marketplace Design) -->
    <div id="hero-slider" class="relative h-screen w-full overflow-hidden bg-slate-900">
        
        <!-- Background Images (Slides) -->
        <div class="hero-slide absolute inset-0 w-full h-full bg-cover bg-center bg-no-repeat transition-opacity duration-1000 ease-in-out opacity-100" style="background-image: url('{{ asset('images/home/hero-bg-3.jpg') }}');"></div>
        <div class="hero-slide absolute inset-0 w-full h-full bg-cover bg-center bg-no-repeat transition-opacity duration-1000 ease-in-out opacity-0" style="background-image: url('{{ asset('images/home/hero-bg-2.jpg') }}');"></div>
        <div class="hero-slide absolute inset-0 w-full h-full bg-cover bg-center bg-no-repeat transition-opacity duration-1000 ease-in-out opacity-0" style="background-image: url('{{ asset('images/home/hero-bg-1.jpg') }}');"></div>
        
        <!-- Large Blue Oval Blob -->
        <div class="absolute top-[-25%] left-[-20%] w-[150%] md:w-[95%] lg:w-[80%] h-[150%] bg-[#009150]/50 z-0 pointer-events-none" style="border-radius: 50%; transform: rotate(-12deg);"></div>

        <!-- Content -->
        <div class="relative z-10 flex flex-col justify-center h-full px-6 md:px-16 lg:px-24 max-w-5xl">
            <h1 class="text-5xl md:text-6xl lg:text-[5.5rem] font-black text-white leading-[0.9] mb-6 tracking-tighter mt-20" data-aos="fade-up">
                Society of<br><span class="text-yellow-400">Renewable Energy</span><br>UNESA.
            </h1>
            <p class="text-white/90 text-lg md:text-[1.2rem] font-medium max-w-[32rem] leading-relaxed mb-10" data-aos="fade-up" data-aos-delay="100">
                Society of Renewable Energy UNESA is the leading community for sustainable energy innovation and environmental advocacy.
            </p>
            <div class="flex flex-wrap gap-4" data-aos="fade-up" data-aos-delay="200">
                <a href="{{ route('register') }}" 
                   class="inline-flex items-center justify-center px-10 py-4 bg-[#facc15] text-[#002816] font-bold rounded-full text-[15px] transition-all hover:bg-yellow-400 hover:shadow-2xl hover:-translate-y-1">
                    Gabung Komunitas
                </a>
                <a href="{{ route('about') }}" 
                   class="inline-flex items-center justify-center px-10 py-4 border-2 border-white/30 text-white font-bold rounded-full text-[15px] backdrop-blur-sm transition-all hover:bg-white/10 hover:-translate-y-1">
                    Tentang Kami
                </a>
            </div>
        </div>

        </div>


<!-- About SRE UNESA Section -->
<section class="py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Title -->
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-[#004225] tracking-tight uppercase">ABOUT SRE UNESA</h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Left: Text -->
            <div data-aos="fade-right" class="space-y-6">
                <p class="text-slate-700 leading-relaxed font-medium">
                    Amidst the global transition to clean energy and Indonesia's Net Zero Emissions 2060 commitment, renewable energy development requires the support of competent human resources. However, practical platforms within campuses to facilitate student learning and collaboration in this energy sector remain very limited. Surabaya State University (Unesa) has significant potential to address this challenge through students with strong science and engineering backgrounds. Therefore, the establishment of the Unesa Society of Renewable Energy (SRE) is a strategic step in providing a structured learning and research center to prepare the younger generation to face future energy challenges.

The SRE at Surabaya State University was established to create a learning and innovation ecosystem in the renewable energy sector.
                </p>
                <p class="text-slate-700 leading-relaxed font-medium">
                    SRE Universitas Negeri Surabaya didirikan untuk menciptakan ekosistem pembelajaran dan inovasi di bidang energi terbarukan.
                </p>
                <div class="pt-4">
                    <a href="{{ route('about') }}" class="inline-block bg-[#009150] hover:bg-[#00703e] text-white px-8 py-3 rounded-full text-sm font-bold transition-all shadow-lg hover:shadow-xl hover:-translate-y-1">
                        Read More
                    </a>
                </div>
            </div>

            <!-- Right: Card Slider -->
            <div data-aos="fade-left">
                @php
                    $sliderActivities = isset($latestActivities) && $latestActivities->count() > 0 
                        ? $latestActivities->take(4)->values()->map(function($act, $index) {
                            return [
                                'id' => $index + 1,
                                'url' => route('milestone.activity.show', $act->id ?? $act),
                                'image' => $act->image ? (str_contains($act->image, 'http') ? $act->image : asset('storage/' . $act->image)) : 'https://images.unsplash.com/photo-1511632765486-a01980e01a18?q=80&w=1200',
                                'title' => $act->category ?? 'ACTIVITY',
                                'desc' => $act->name ?? $act->title ?? 'SRE UNESA Activity'
                            ];
                        })->toArray() 
                        : [
                            [ 'id' => 1, 'image' => 'https://images.unsplash.com/photo-1511632765486-a01980e01a18?q=80&w=1200', 'title' => 'MEET AND GREET', 'desc' => 'Perkenalan Anggota SRE', 'url' => '#' ],
                            [ 'id' => 2, 'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=1200', 'title' => 'WORKSHOP', 'desc' => 'Solar Panel • Energi Terbarukan', 'url' => '#' ],
                            [ 'id' => 3, 'image' => 'https://images.unsplash.com/photo-1497435334941-8c899ee9e8e9?q=80&w=1200', 'title' => 'SEMINAR', 'desc' => 'Transisi Energi Nasional', 'url' => '#' ],
                            [ 'id' => 4, 'image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=1200', 'title' => 'PROJECT', 'desc' => 'Pemasangan Panel Surya', 'url' => '#' ]
                        ];
                @endphp
                <div class="bg-slate-50 rounded-[2rem] p-8 lg:p-10 shadow-[0_8px_30px_rgb(0,0,0,0.06)] border border-slate-100 flex flex-col items-center"
                    x-data="{ 
                        activeSlide: 1, 
                        slides: {{ json_encode($sliderActivities) }},
                        next() { this.activeSlide = this.activeSlide === this.slides.length ? 1 : this.activeSlide + 1 },
                        prev() { this.activeSlide = this.activeSlide === 1 ? this.slides.length : this.activeSlide - 1 }
                    }"
                    x-init="if(slides.length > 1) setInterval(() => next(), 5000)"
                >
                    <!-- Header -->
                    <h3 class="text-3xl font-black italic mb-3 text-slate-900">
                        Our <span class="text-[#009150] relative inline-block">Journey
                            <span class="absolute -bottom-1 left-0 w-full h-[3px] bg-[#009150]"></span>
                        </span>
                    </h3>
                    <span class="bg-yellow-400 text-slate-900 text-[10px] font-bold px-4 py-1.5 rounded-sm uppercase tracking-wider mb-8">
                        Dokumentasi Kegiatan SRE UNESA
                    </span>

                    <!-- Image Card -->
                    <div class="w-full bg-white rounded-[1.5rem] overflow-hidden shadow-sm border border-slate-100 relative mb-6">
                        
                        <!-- Carousel Container -->
                        <div class="relative w-full h-48 md:h-64 overflow-hidden group bg-slate-200">
                            <template x-for="slide in slides" :key="slide.id">
                                <img :src="slide.image" x-show="activeSlide === slide.id"
                                     x-transition:enter="transition ease-out duration-500"
                                     x-transition:enter-start="opacity-0 translate-x-10"
                                     x-transition:enter-end="opacity-100 translate-x-0"
                                     x-transition:leave="transition ease-in duration-300 absolute inset-0"
                                     x-transition:leave-start="opacity-100 translate-x-0"
                                     x-transition:leave-end="opacity-0 -translate-x-10"
                                     class="w-full h-full object-cover" :alt="slide.title" 
                                     onerror="this.src='https://images.unsplash.com/photo-1511632765486-a01980e01a18?q=80&w=1200'">
                            </template>

                            <!-- Navigation Arrows -->
                            <button @click="prev()" class="absolute left-2 top-1/2 -translate-y-1/2 w-8 h-8 bg-white/80 hover:bg-white rounded-full flex items-center justify-center text-[#009150] shadow-md opacity-0 group-hover:opacity-100 transition-all z-10">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                            </button>
                            <button @click="next()" class="absolute right-2 top-1/2 -translate-y-1/2 w-8 h-8 bg-white/80 hover:bg-white rounded-full flex items-center justify-center text-[#009150] shadow-md opacity-0 group-hover:opacity-100 transition-all z-10">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                            </button>
                        </div>
                        
                        <!-- Info Box -->
                        <div class="bg-white px-6 py-5 flex items-center gap-4 relative z-20">
                            <div class="w-10 h-10 bg-[#009150] rounded-full flex items-center justify-center text-white font-bold text-sm shrink-0 shadow-md" x-text="String(activeSlide).padStart(2, '0')">
                            </div>
                            <div>
                                <h4 class="font-black text-slate-900 text-sm tracking-wide uppercase" x-text="slides[activeSlide - 1].title"></h4>
                                <p class="text-[11px] text-slate-500 mt-0.5 font-medium" x-text="slides[activeSlide - 1].desc"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="w-full flex items-center justify-between px-2 mb-8">
                        <div class="flex items-center gap-1.5">
                            <template x-for="slide in slides" :key="slide.id">
                                <button @click="activeSlide = slide.id" 
                                    :class="activeSlide === slide.id ? 'w-6 h-2 bg-[#009150]' : 'w-2 h-2 border-[1.5px] border-[#009150]'" 
                                    class="rounded-full transition-all duration-300 cursor-pointer"></button>
                            </template>
                        </div>
                        <span class="text-[10px] font-bold text-[#009150] tracking-widest" x-text="`${String(activeSlide).padStart(2, '0')} / 04`"></span>
                    </div>

                    <!-- Button -->
                    <a href="{{ route('milestone.activity') }}" class="inline-block bg-[#009150] hover:bg-[#facc15] text-white px-8 py-3 rounded-full text-sm font-bold transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5">
                        Explore More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>



    <!-- Clean Energy Showcase Section -->
    <section class="py-24 bg-white relative z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Heading -->
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-extrabold text-[#111827] leading-tight font-sans tracking-tight">
                    Produce Your Own Clean Energy,<br>Save The Environment
                </h2>
            </div>

            <!-- Top Row: Icon, Video, Icon -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-20 items-center">
                <!-- Col 1: Battery Storage -->
                <div class="flex flex-col items-center text-center md:col-span-1" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-20 h-20 rounded-full border-2 border-[#009150] flex items-center justify-center mb-6">
                        <svg class="w-10 h-10 text-[#009150]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7h8M10 4h4a1 1 0 011 1v2H9V5a1 1 0 011-1zm-6 6h16v10a2 2 0 01-2 2H6a2 2 0 01-2-2V13z M13 15l-3 4h4l-1 4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-sans">Battery Storage<br>Solutions</h3>
                    <p class="text-[13px] text-gray-500 leading-relaxed font-sans px-2">
                        We fully utilise the latest corporate renewable energy technology to generate significant energy.
                    </p>
                </div>

                <!-- Col 2: Video Player -->
                <div class="md:col-span-2" data-aos="zoom-in" data-aos-delay="200">
                    <div class="relative w-full rounded-[2rem] pb-4 bg-[#009150]">
                        <div class="relative w-full aspect-video rounded-[2rem] overflow-hidden bg-gray-800 group">
                            <!-- Video Kincir Angin -->
                            <video class="w-full h-full object-cover" autoplay muted loop playsinline>
                                <source src="{{ asset('videos/home/SocietySRE.mp4') }}" type="video/mp4">
                            </video>
                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent pointer-events-none"></div>
                        </div>
                    </div>
                </div>

                <!-- Col 3: Commercial Solar -->
                <div class="flex flex-col items-center text-center md:col-span-1" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-20 h-20 rounded-full border-2 border-[#009150] flex items-center justify-center mb-6">
                        <svg class="w-10 h-10 text-[#009150]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-sans">Commercial Solar<br>Energy</h3>
                    <p class="text-[13px] text-gray-500 leading-relaxed font-sans px-2">
                        We fully utilise the latest corporate renewable energy technology to generate significant energy.
                    </p>
                </div>
            </div>

            <!-- Bottom Row: 4 Icons -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Bottom 1 -->
                <div class="flex flex-col items-center text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-20 h-20 rounded-full border-2 border-[#009150] flex items-center justify-center mb-6">
                        <svg class="w-10 h-10 text-[#009150]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-sans">Inovasi Riset</h3>
                    <p class="text-[13px] text-gray-500 leading-relaxed font-sans px-2">
                        Mengembangkan teknologi energi terbarukan melalui penelitian berkelanjutan.
                    </p>
                </div>

                <!-- Bottom 2 -->
                <div class="flex flex-col items-center text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-20 h-20 rounded-full border-2 border-[#009150] flex items-center justify-center mb-6">
                        <svg class="w-10 h-10 text-[#009150]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-sans">Community</h3>
                    <p class="text-[13px] text-gray-500 leading-relaxed font-sans px-2">
                        Wadah kolaborasi bagi mahasiswa dan praktisi energi bersih di Indonesia.
                    </p>
                </div>

                <!-- Bottom 3 -->
                <div class="flex flex-col items-center text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-20 h-20 rounded-full border-2 border-[#009150] flex items-center justify-center mb-6">
                        <svg class="w-10 h-10 text-[#009150]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-sans">Edukasi Publik</h3>
                    <p class="text-[13px] text-gray-500 leading-relaxed font-sans px-2">
                        Menyebarluaskan pengetahuan tentang pentingnya transisi energi hijau.
                    </p>
                </div>

                <!-- Bottom 4 -->
                <div class="flex flex-col items-center text-center" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-20 h-20 rounded-full border-2 border-[#009150] flex items-center justify-center mb-6">
                        <svg class="w-10 h-10 text-[#009150]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-3 font-sans">Aksi Nyata</h3>
                    <p class="text-[13px] text-gray-500 leading-relaxed font-sans px-2">
                        Implementasi langsung teknologi ramah lingkungan di masyarakat.
                    </p>
                </div>
            </div>
        </div>
    </section>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


<!-- Our Activity Section -->
<section class="py-32 bg-white relative z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-[11px] font-black text-[#009150] uppercase tracking-widest border-b-[2px] border-[#009150] pb-1">Our Journey</span>
            <h2 class="text-4xl lg:text-6xl font-black text-slate-900 mt-6 tracking-tight">Recent Activities</h2>
        </div>

        <!-- Activity Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16" data-aos="fade-up" data-aos-delay="200">
            @php 
                $latestActList = $latestActivities->count() > 0 ? $latestActivities->take(3) : collect([
                    (object)['id' => 1, 'title' => "SRE Community Gathering", 'category' => 'EVENT', 'image' => null],
                    (object)['id' => 2, 'title' => "Renewable Energy Workshop", 'category' => 'EDUCATION', 'image' => null],
                    (object)['id' => 3, 'title' => "Solar Panel Installation", 'category' => 'PROJECT', 'image' => null],
                ]);
            @endphp

            @foreach($latestActList as $act)
                <div class="group flex flex-col">
                    <!-- Image Part -->
                    <div class="relative aspect-[4/3] w-full rounded-3xl overflow-hidden bg-[#5e5e5e] mb-6">
                        @if($act->image)
                            <img src="{{ str_contains($act->image, 'http') ? $act->image : asset('storage/' . $act->image) }}" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="{{ $act->title }}">
                        @endif
                        
                        <!-- Date Badge -->
                        <div class="absolute bottom-4 left-4 bg-[#009150] text-white text-[11px] font-bold px-3 py-1.5 rounded-xl">
                            {{ isset($act->created_at) ? \Carbon\Carbon::parse($act->created_at)->format('F d, Y') : 'December 12, 2023' }}
                        </div>
                    </div>
                    
                    <!-- Text Part -->
                    <div class="flex flex-col items-start flex-grow">
                        <div class="inline-block border-b border-gray-300 pb-[2px] mb-3">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-gray-400">
                                {{ $act->category ?? 'ACTIVITY' }}
                            </span>
                        </div>
                        <a href="{{ route('milestone.activity.show', $act->id ?? $act) }}" class="block">
                            <h3 class="text-xl font-bold text-slate-900 leading-snug group-hover:text-[#009150] transition-colors line-clamp-2">
                                {{ $act->title }}
                            </h3>
                        </a>
                        
                        <!-- Author -->
                        <div class="flex items-center gap-3 mt-6">
                            <img src="{{ asset('images/logo/srehijau.png') }}" alt="SRE Logo" class="w-8 h-8 object-contain rounded-full">
                            <span class="text-[11px] font-bold text-gray-500">By SRE UNESA</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- View All Link -->
        <div class="text-center" data-aos="fade-up" data-aos-delay="400">
            <a href="{{ route('milestone.activity') }}" class="inline-block px-10 py-4 bg-[#009150] text-white font-bold rounded-full text-sm hover:bg-[#002816] transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                View All Activities
            </a>
        </div>
    </div>
</section>



<!-- Join Movement Section -->
<section class="py-24 bg-[#009150] overflow-hidden relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <!-- Left Content -->
            <div data-aos="fade-right">
                <h2 class="text-4xl lg:text-6xl font-bold text-white mb-8 leading-tight">
                    Join the Renewable Energy <br> Movement
                </h2>
                <p class="text-white/90 text-xl mb-12 leading-relaxed max-w-xl">
                    Become a part of SRE EcoFuture and contribute to a sustainable future. Whether you're a student, professional, or simply passionate about renewable energy, there's a place for you in our community.
                </p>
                <div class="flex flex-wrap gap-6">
                    <a href="{{ route('register') }}" class="px-10 py-4 bg-white text-[#009150] rounded-full font-bold text-lg hover:bg-slate-100 transition-all shadow-lg">
                        Register Now
                    </a>
                    <a href="#" class="px-10 py-4 border-2 border-white text-white rounded-full font-bold text-lg hover:bg-white/10 transition-all">
                        Contact Us
                    </a>
                </div>
            </div>

            <!-- Right Content: Image Montage -->
            <div class="relative" data-aos="fade-left">
                <div class="relative z-10 space-y-4">
                    <!-- Top Image -->
                    <div class="rounded-2xl overflow-hidden shadow-2xl border-4 border-yellow-400 transform -rotate-2 hover:rotate-0 transition-transform duration-500">
                        <img src="{{ asset('images/join/speaker.jpg') }}" class="w-full h-56 object-cover" alt="SRE Activity" onerror="this.src='https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=800'">
                    </div>
                    <!-- Middle Image -->
                    <div class="rounded-2xl overflow-hidden shadow-2xl border-4 border-yellow-400 transform rotate-2 hover:rotate-0 transition-transform duration-500 ml-12">
                        <img src="{{ asset('images/join/group.jpg') }}" class="w-full h-56 object-cover" alt="SRE Group" onerror="this.src='https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=800'">
                    </div>
                    <!-- Bottom Image -->
                    <div class="rounded-2xl overflow-hidden shadow-2xl border-4 border-yellow-400 transform -rotate-1 hover:rotate-0 transition-transform duration-500 mr-12">
                        <img src="{{ asset('images/join/team.jpg') }}" class="w-full h-56 object-cover" alt="SRE Team" onerror="this.src='https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=800'">
                    </div>
                </div>
                <!-- Abstract Elements -->
                <div class="absolute -right-12 -top-12 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute -left-12 -bottom-12 w-48 h-48 bg-emerald-400/20 rounded-full blur-2xl"></div>
            </div>
        </div>
    </div>
</section>



<!-- Our News Section -->
<section class="py-32 bg-white relative z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-[11px] font-black text-[#facc15] uppercase tracking-widest border-b-[2px] border-[#facc15] pb-1">Blog & Updates</span>
            <h2 class="text-4xl lg:text-6xl font-black text-slate-900 mt-6 tracking-tight">Recent News</h2>
        </div>

        <!-- News Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16" data-aos="fade-up" data-aos-delay="200">
            @php 
                $latestNews = $latestArticles->count() > 0 ? $latestArticles->take(3) : collect([
                    (object)['id' => 1, 'title' => "Solar Energy's Exceptional Synergies", 'category' => 'DESIGN PROCESS', 'thumbnail' => null],
                    (object)['id' => 2, 'title' => "Solar Energy's Exceptional Synergies", 'category' => 'DESIGN PROCESS', 'thumbnail' => null],
                    (object)['id' => 3, 'title' => "Solar Energy's Exceptional Synergies", 'category' => 'DESIGN PROCESS', 'thumbnail' => null],
                ]);
            @endphp

            @foreach($latestNews as $news)
                <div class="group flex flex-col">
                    <!-- Image Part -->
                    <div class="relative aspect-[4/3] w-full rounded-3xl overflow-hidden bg-[#5e5e5e] mb-6">
                        @php $newsImage = $news->image ?? $news->thumbnail ?? null; @endphp
                        @if($newsImage)
                            <img src="{{ str_contains($newsImage, 'http') ? $newsImage : asset('storage/' . $newsImage) }}" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="{{ $news->title }}">
                        @endif
                        
                        <!-- Date Badge -->
                        <div class="absolute bottom-4 left-4 bg-[#009150] text-white text-[11px] font-bold px-3 py-1.5 rounded-xl">
                            {{ isset($news->created_at) ? \Carbon\Carbon::parse($news->created_at)->format('F d, Y') : 'December 12, 2023' }}
                        </div>
                    </div>
                    
                    <!-- Text Part -->
                    <div class="flex flex-col items-start flex-grow">
                        <div class="inline-block border-b border-gray-300 pb-[2px] mb-3">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-gray-400">
                                {{ $news->category ?? 'Design Process' }}
                            </span>
                        </div>
                        <a href="{{ route('milestone.article.show', $news->id ?? $news) }}" class="block">
                            <h3 class="text-xl font-bold text-slate-900 leading-snug group-hover:text-[#facc15] transition-colors line-clamp-2">
                                {{ $news->title }}
                            </h3>
                        </a>
                        
                        <!-- Author -->
                        <div class="flex items-center gap-3 mt-6">
                            <img src="{{ asset('images/logo/srehijau.png') }}" alt="SRE Logo" class="w-8 h-8 object-contain rounded-full">
                            <span class="text-[11px] font-bold text-gray-500">By SRE UNESA</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- View All Link -->
        <div class="text-center" data-aos="fade-up" data-aos-delay="400">
            <a href="{{ route('milestone.article') }}" class="inline-block px-10 py-4 bg-[#facc15] text-emerald-900 font-bold rounded-full text-sm hover:bg-yellow-400 transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                View All News
            </a>
        </div>
    </div>
</section>

</div> <!-- End of Master Wrapper (from top) -->

<!-- Social Links Section -->
<section class="pt-24 pb-40 bg-[#009150] relative overflow-hidden">
    
    <!-- Decorative Elements -->
    <div class="absolute inset-0 pointer-events-none opacity-10">
        <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-white rounded-full blur-[120px] translate-x-1/3 -translate-y-1/3"></div>
        <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-white rounded-full blur-[100px] -translate-x-1/3 translate-y-1/3"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="max-w-6xl mx-auto mb-16 lg:mb-24 text-left px-4 lg:px-8">
            <h2 class="text-5xl md:text-7xl lg:text-[7rem] font-black text-white italic uppercase tracking-tighter leading-none" data-aos="fade-up">
                JOIN THE <br> MOVEMENT
            </h2>
            <p class="mt-6 text-sm lg:text-base text-white/70 font-medium tracking-widest uppercase font-sans" data-aos="fade-up" data-aos-delay="100">
                BE PART OF OUR SUSTAINABLE ECOSYSTEM
            </p>
        </div>

        <div class="space-y-0 max-w-6xl mx-auto">
            
            <!-- INSTAGRAM -->
            <a href="#" class="relative group flex items-center justify-center py-6 px-4 lg:px-8 border-b border-white/20 transition-all duration-500 hover:bg-[#fcd303] hover:border-transparent rounded-2xl min-h-[120px] lg:min-h-[140px] overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                <!-- NORMAL STATE -->
                <div class="relative flex items-center w-full transition-all duration-500 group-hover:opacity-0 group-hover:scale-95 group-hover:-translate-x-12">
                    <div class="w-1/2 flex justify-end pr-8 lg:pr-14">
                        <h3 class="text-3xl md:text-5xl lg:text-7xl font-black text-white uppercase tracking-tighter leading-none">INSTAGRAM</h3>
                    </div>
                    <div class="shrink-0 relative z-10 flex items-center justify-center">
                        <div class="w-10 h-10 lg:w-14 lg:h-14 bg-[#fcd303] rounded-full flex items-center justify-center shadow-sm">
                            <svg class="w-5 h-5 lg:w-7 lg:h-7 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                    <div class="w-1/2 pl-8 lg:pl-14 flex flex-col justify-center text-left">
                        <span class="text-xs lg:text-sm font-medium text-white/60 uppercase tracking-widest leading-relaxed font-sans block mb-0.5">OFFICIAL ACCOUNT</span>
                        <span class="text-xs lg:text-sm font-medium text-white/80 uppercase tracking-widest font-sans">@ECOFUTURE_OFFICIAL</span>
                    </div>
                </div>
                <!-- HOVER STATE -->
                <div class="absolute inset-0 flex items-center justify-center w-full gap-4 lg:gap-6 transition-all duration-500 opacity-0 translate-x-12 group-hover:opacity-100 group-hover:translate-x-0 pointer-events-none">
                    <div class="w-10 h-10 lg:w-14 lg:h-14 bg-slate-900 rounded-full flex items-center justify-center shadow-sm shrink-0">
                        <svg class="w-5 h-5 lg:w-7 lg:h-7 text-[#fcd303]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </div>
                    <span class="text-xl md:text-3xl lg:text-5xl font-black text-slate-900 uppercase tracking-tighter leading-none whitespace-nowrap">@ECOFUTURE_OFFICIAL</span>
                </div>
            </a>

            <!-- TIKTOK -->
            <a href="#" class="relative group flex items-center justify-center py-6 px-4 lg:px-8 border-b border-white/20 transition-all duration-500 hover:bg-[#fcd303] hover:border-transparent rounded-2xl min-h-[120px] lg:min-h-[140px] overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                <!-- NORMAL STATE -->
                <div class="relative flex items-center w-full transition-all duration-500 group-hover:opacity-0 group-hover:scale-95 group-hover:translate-x-12">
                    <div class="w-1/2 pr-8 lg:pr-14 flex flex-col justify-center items-end text-right">
                        <span class="text-xs lg:text-sm font-medium text-white/60 uppercase tracking-widest leading-relaxed font-sans block mb-0.5">OFFICIAL ACCOUNT</span>
                        <span class="text-xs lg:text-sm font-medium text-white/80 uppercase tracking-widest font-sans">@ECOFUTURE_ECO</span>
                    </div>
                    <div class="shrink-0 relative z-10 flex items-center justify-center">
                        <div class="w-10 h-10 lg:w-14 lg:h-14 bg-[#fcd303] rounded-full flex items-center justify-center shadow-sm">
                            <svg class="w-5 h-5 lg:w-7 lg:h-7 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                    <div class="w-1/2 flex justify-start pl-8 lg:pl-14">
                        <h3 class="text-3xl md:text-5xl lg:text-7xl font-black text-white uppercase tracking-tighter leading-none">TIKTOK</h3>
                    </div>
                </div>
                <!-- HOVER STATE -->
                <div class="absolute inset-0 flex items-center justify-center w-full gap-4 lg:gap-6 transition-all duration-500 opacity-0 -translate-x-12 group-hover:opacity-100 group-hover:translate-x-0 pointer-events-none">
                    <div class="w-10 h-10 lg:w-14 lg:h-14 bg-slate-900 rounded-full flex items-center justify-center shadow-sm shrink-0">
                        <svg class="w-5 h-5 lg:w-7 lg:h-7 text-[#fcd303]" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1.04-.1z"/></svg>
                    </div>
                    <span class="text-xl md:text-3xl lg:text-5xl font-black text-slate-900 uppercase tracking-tighter leading-none whitespace-nowrap">@ECOFUTURE_ECO</span>
                </div>
            </a>

            <!-- YOUTUBE -->
            <a href="#" class="relative group flex items-center justify-center py-6 px-4 lg:px-8 border-b border-white/20 transition-all duration-500 hover:bg-[#fcd303] hover:border-transparent rounded-2xl min-h-[120px] lg:min-h-[140px] overflow-hidden" data-aos="fade-up" data-aos-delay="300">
                <!-- NORMAL STATE -->
                <div class="relative flex items-center w-full transition-all duration-500 group-hover:opacity-0 group-hover:scale-95 group-hover:-translate-x-12">
                    <div class="w-1/2 flex justify-end pr-8 lg:pr-14">
                        <h3 class="text-3xl md:text-5xl lg:text-7xl font-black text-white uppercase tracking-tighter leading-none">YOUTUBE</h3>
                    </div>
                    <div class="shrink-0 relative z-10 flex items-center justify-center">
                        <div class="w-10 h-10 lg:w-14 lg:h-14 bg-[#fcd303] rounded-full flex items-center justify-center shadow-sm">
                            <svg class="w-5 h-5 lg:w-7 lg:h-7 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                    <div class="w-1/2 pl-8 lg:pl-14 flex flex-col justify-center text-left">
                        <span class="text-xs lg:text-sm font-medium text-white/60 uppercase tracking-widest leading-relaxed font-sans block mb-0.5">OFFICIAL CHANNEL</span>
                        <span class="text-xs lg:text-sm font-medium text-white/80 uppercase tracking-widest font-sans">ECOFUTURE OFFICIAL</span>
                    </div>
                </div>
                <!-- HOVER STATE -->
                <div class="absolute inset-0 flex items-center justify-center w-full gap-4 lg:gap-6 transition-all duration-500 opacity-0 translate-x-12 group-hover:opacity-100 group-hover:translate-x-0 pointer-events-none">
                    <div class="w-10 h-10 lg:w-14 lg:h-14 bg-slate-900 rounded-full flex items-center justify-center shadow-sm shrink-0">
                        <svg class="w-5 h-5 lg:w-7 lg:h-7 text-[#fcd303]" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.5 12 3.5 12 3.5s-7.505 0-9.377.55a3.016 3.016 0 0 0-2.122 2.136C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.55 9.376.55 9.376.55s7.505 0 9.377-.55a3.016 3.016 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </div>
                    <span class="text-xl md:text-3xl lg:text-5xl font-black text-slate-900 uppercase tracking-tighter leading-none whitespace-nowrap">ECOFUTURE OFFICIAL</span>
                </div>
            </a>

            <!-- WHATSAPP -->
            <a href="#" class="relative group flex items-center justify-center py-6 px-4 lg:px-8 border-b border-white/20 transition-all duration-500 hover:bg-[#fcd303] hover:border-transparent rounded-2xl min-h-[120px] lg:min-h-[140px] overflow-hidden" data-aos="fade-up" data-aos-delay="400">
                <!-- NORMAL STATE -->
                <div class="relative flex items-center w-full transition-all duration-500 group-hover:opacity-0 group-hover:scale-95 group-hover:translate-x-12">
                    <div class="w-1/2 pr-8 lg:pr-14 flex flex-col justify-center items-end text-right">
                        <span class="text-xs lg:text-sm font-medium text-white/60 uppercase tracking-widest leading-relaxed font-sans block mb-0.5">CUSTOMER SERVICE</span>
                        <span class="text-xs lg:text-sm font-medium text-white/80 uppercase tracking-widest font-sans">+62 812-3456-7890</span>
                    </div>
                    <div class="shrink-0 relative z-10 flex items-center justify-center">
                        <div class="w-10 h-10 lg:w-14 lg:h-14 bg-[#fcd303] rounded-full flex items-center justify-center shadow-sm">
                            <svg class="w-5 h-5 lg:w-7 lg:h-7 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                    <div class="w-1/2 flex justify-start pl-8 lg:pl-14">
                        <h3 class="text-3xl md:text-5xl lg:text-7xl font-black text-white uppercase tracking-tighter leading-none">WHATSAPP</h3>
                    </div>
                </div>
                <!-- HOVER STATE -->
                <div class="absolute inset-0 flex items-center justify-center w-full gap-4 lg:gap-6 transition-all duration-500 opacity-0 -translate-x-12 group-hover:opacity-100 group-hover:translate-x-0 pointer-events-none">
                    <div class="w-10 h-10 lg:w-14 lg:h-14 bg-slate-900 rounded-full flex items-center justify-center shadow-sm shrink-0">
                        <svg class="w-5 h-5 lg:w-7 lg:h-7 text-[#fcd303]" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 0C5.385 0 0 5.386 0 12.031c0 2.106.549 4.148 1.595 5.955L.044 23.957l6.126-1.606c1.745.95 3.708 1.45 5.86 1.45 6.646 0 12.031-5.386 12.031-12.031C24 5.386 18.677 0 12.031 0zm3.626 17.26c-.152.428-.888.804-1.246.839-.333.033-1.053.111-3.415-.87-2.836-1.177-4.646-4.103-4.783-4.286-.137-.183-1.144-1.523-1.144-2.905 0-1.383.719-2.062.973-2.336.255-.274.555-.343.738-.343.183 0 .366 0 .522.008.163.007.382-.061.597.464.223.541.738 1.802.803 1.932.066.131.111.282.02.464-.092.183-.137.297-.275.457-.137.16-.287.35-.411.472-.137.137-.282.288-.124.562.157.274.7 1.161 1.503 1.879 1.037.922 1.905 1.206 2.179 1.343.274.137.438.114.601-.069.163-.183.7-1.053 1.111-1.411.411-.358.823-.3 1.176-.176.353.124 2.228 1.053 2.607 1.244.379.191.634.282.725.442.092.16.092.937-.06 1.365z"/></svg>
                    </div>
                    <span class="text-xl md:text-3xl lg:text-5xl font-black text-slate-900 uppercase tracking-tighter leading-none whitespace-nowrap">+62 812-3456-7890</span>
                </div>
            </a>

            <!-- SHOPEE -->
            <a href="#" class="relative group flex items-center justify-center py-6 px-4 lg:px-8 border-b border-white/20 transition-all duration-500 hover:bg-[#fcd303] hover:border-transparent rounded-2xl min-h-[120px] lg:min-h-[140px] overflow-hidden" data-aos="fade-up" data-aos-delay="500">
                <!-- NORMAL STATE -->
                <div class="relative flex items-center w-full transition-all duration-500 group-hover:opacity-0 group-hover:scale-95 group-hover:-translate-x-12">
                    <div class="w-1/2 flex justify-end pr-8 lg:pr-14">
                        <h3 class="text-3xl md:text-5xl lg:text-7xl font-black text-white uppercase tracking-tighter leading-none">SHOPEE</h3>
                    </div>
                    <div class="shrink-0 relative z-10 flex items-center justify-center">
                        <div class="w-10 h-10 lg:w-14 lg:h-14 bg-[#fcd303] rounded-full flex items-center justify-center shadow-sm">
                            <svg class="w-5 h-5 lg:w-7 lg:h-7 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                    <div class="w-1/2 pl-8 lg:pl-14 flex flex-col justify-center text-left">
                        <span class="text-xs lg:text-sm font-medium text-white/60 uppercase tracking-widest leading-relaxed font-sans block mb-0.5">OFFICIAL STORE</span>
                        <span class="text-xs lg:text-sm font-medium text-white/80 uppercase tracking-widest font-sans">ECOFUTURE.STORE</span>
                    </div>
                </div>
                <!-- HOVER STATE -->
                <div class="absolute inset-0 flex items-center justify-center w-full gap-4 lg:gap-6 transition-all duration-500 opacity-0 translate-x-12 group-hover:opacity-100 group-hover:translate-x-0 pointer-events-none">
                    <div class="w-10 h-10 lg:w-14 lg:h-14 bg-slate-900 rounded-full flex items-center justify-center shadow-sm shrink-0">
                        <svg class="w-5 h-5 lg:w-7 lg:h-7 text-[#fcd303]" fill="currentColor" viewBox="0 0 24 24"><path d="M19.14,4.28H15.86V3a3,3,0,0,0-6,0V4.28H4.86a1,1,0,0,0-.94.66L1,18A3,3,0,0,0,3.83,22H20.17A3,3,0,0,0,23,18L20.08,4.94A1,1,0,0,0,19.14,4.28ZM11.86,3a1,1,0,0,1,2,0V4.28H11.86Zm7,17H3.83a1,1,0,0,1-.95-1.31L5.59,6.28h4.27v1.5a1,1,0,0,0,2,0V6.28h4.28v1.5a1,1,0,0,0,2,0V6.28h4.27L20.81,18.69A1,1,0,0,1,18.86,20Z"/></svg>
                    </div>
                    <span class="text-xl md:text-3xl lg:text-5xl font-black text-slate-900 uppercase tracking-tighter leading-none whitespace-nowrap">ECOFUTURE.STORE</span>
                </div>
            </a>
            
        </div>
    </div>
</section>

<!-- Combined Partners Section with Wave -->
<div class="relative w-full">
    <!-- White Wave Transition (Overlapping Dark Section) -->
    <div class="absolute top-0 left-0 w-full overflow-hidden leading-none z-30 -mt-[80px]">
        <svg class="relative block w-full h-[120px]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120 " preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#ffffff"></path>
        </svg>
    </div>

    <!-- Map Section -->
    <section class="py-24 bg-white relative z-10 w-full pt-48">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" data-aos="fade-up">
            <div class="text-center mb-16">
                <span class="text-[11px] font-black text-[#009150] uppercase tracking-widest border-b-[2px] border-[#009150] pb-1">Our Location</span>
                <h2 class="text-4xl lg:text-5xl font-black text-slate-900 mt-6 tracking-tight">Visit Our Secretariat</h2>
                <p class="text-slate-500 mt-4 font-medium">Universitas Negeri Surabaya, Kampus Ketintang, Surabaya</p>
            </div>
            
            <div class="relative max-w-5xl mx-auto">
                <div class="relative rounded-3xl overflow-hidden border-2 border-slate-100 bg-white">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.3852028612716!2d112.7262692740283!3d-7.315514671926616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb705888e7a1%3A0x8673a388b3941320!2sUniversitas%20Negeri%20Surabaya!5e0!3m2!1sen!2sid!4v1715598150000!5m2!1sen!2sid" 
                        width="100%" 
                        height="400" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        class="grayscale hover:grayscale-0 transition-all duration-700"
                    ></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners Section (White) -->
    <section class="pb-32 bg-white overflow-hidden relative z-10 w-full">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24 text-center" data-aos="fade-up">
            <h2 class="text-6xl md:text-8xl lg:text-9xl font-black leading-none tracking-tighter uppercase">
                <span class="text-[#009150]">OUR</span> <span class="text-[#009150]">PARTNERS</span><span class="text-[#009150]">.</span>
            </h2>
        </div>
        
        <div class="flex items-center gap-12 animate-marquee-right whitespace-nowrap" data-aos="fade-up" data-aos-delay="200">
                @php
                    $partners = [
                        ['name' => 'Pupuk Kaltim', 'logo' => 'images/partners/contoh.png'],
                        ['name' => 'Freeport Indonesia', 'logo' => 'images/partners/contoh.png'],
                        ['name' => 'PLN Nusantara', 'logo' => 'images/partners/contoh.png'],
                        ['name' => 'Pertamina', 'logo' => 'images/partners/contoh.png'],
                        ['name' => 'Bukit Asam', 'logo' => 'images/partners/contoh.png'],
                        ['name' => 'SIER', 'logo' => 'images/partners/contoh.png'],
                        ['name' => 'Pupuk Kaltim', 'logo' => 'images/partners/contoh.png'],
                        ['name' => 'Freeport Indonesia', 'logo' => 'images/partners/contoh.png'],
                        ['name' => 'PLN Nusantara', 'logo' => 'images/partners/contoh.png'],
                        ['name' => 'Pertamina', 'logo' => 'images/partners/contoh.png'],
                        ['name' => 'Bukit Asam', 'logo' => 'images/partners/contoh.png'],
                        ['name' => 'SIER', 'logo' => 'images/partners/contoh.png'],
                    ];
                    $displayPartners = array_merge($partners, $partners, $partners);
                @endphp

                @foreach($displayPartners as $partner)
                    <div class="inline-flex items-center justify-center w-64 h-32 flex-shrink-0 transition-all duration-300">
                        <img src="{{ asset($partner['logo']) }}" 
                             alt="{{ $partner['name'] }}" 
                             class="max-w-full max-h-[80px] object-contain transition-all active:grayscale active:scale-95 cursor-pointer"
                             onerror="this.src='https://placehold.co/400x200/FFFFFF/059669?text={{ urlencode($partner['name']) }}'">
                    </div>
                @endforeach
            </div>
    </section>
</div>

<style>
/* Prevent Layout Shifts */
.master-wrapper {
    overflow-x: hidden !important;
}
body {
    overflow-x: hidden !important;
    background: #002816;
}

@keyframes slow-zoom {
    0% { transform: scale(1); }
    100% { transform: scale(1.1); }
}
.animate-slow-zoom {
    animation: slow-zoom 20s infinite alternate cubic-bezier(0.4, 0, 0.2, 1);
}
@keyframes marquee {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
.animate-marquee {
    animation: marquee 25s linear infinite;
}
@keyframes marquee-right {
    0% { transform: translateX(-50%); }
    100% { transform: translateX(0); }
}
.animate-marquee-right {
    animation: marquee-right 25s linear infinite;
}
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.hero-slide');
        let currentSlide = 0;
        let slideInterval;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                if (i === index) {
                    slide.classList.remove('opacity-0');
                    slide.classList.add('opacity-100');
                } else {
                    slide.classList.remove('opacity-100');
                    slide.classList.add('opacity-0');
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        function startSlider() {
            slideInterval = setInterval(nextSlide, 5000); // Auto slide every 5 seconds
        }

        if (slides.length > 0) {
            startSlider();
        }
    });
</script>
@endsection