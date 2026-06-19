@extends('layouts.app-public')

@section('title', 'Masa Depan Energi Bersih')

@section('content')
<div class="master-wrapper w-full relative overflow-x-hidden">
    <!-- Hero Section (Marketplace Design) -->
    <div id="hero-slider" class="relative h-screen w-full overflow-hidden bg-slate-900">
        
        <!-- Background Images (Slides) -->
        <div class="hero-slide absolute inset-0 w-full h-full bg-cover bg-center bg-no-repeat transition-opacity duration-1000 ease-in-out opacity-100" style="background-image: url('{{ asset('images/home/hero-bg-1.jpg') }}');"></div>
        <div class="hero-slide absolute inset-0 w-full h-full bg-cover bg-center bg-no-repeat transition-opacity duration-1000 ease-in-out opacity-0" style="background-image: url('{{ asset('images/home/hero-bg-2.jpg') }}');"></div>
        <div class="hero-slide absolute inset-0 w-full h-full bg-cover bg-center bg-no-repeat transition-opacity duration-1000 ease-in-out opacity-0" style="background-image: url('{{ asset('images/home/hero-bg-3.jpg') }}');"></div>
        
        <!-- Large Blue Oval Blob -->
        <div class="absolute top-[-25%] left-[-20%] w-[150%] md:w-[95%] lg:w-[80%] h-[150%] bg-[#009150]/50 z-0 pointer-events-none" style="border-radius: 50%; transform: rotate(-12deg);"></div>

        <!-- Content -->
        <div class="relative z-10 flex flex-col justify-center h-full px-6 md:px-16 lg:px-24 max-w-5xl">
            <h1 class="text-5xl md:text-6xl lg:text-[5.5rem] font-black text-white leading-[0.9] mb-6 tracking-tighter mt-20" data-aos="fade-up">
                Pioneering <br><span class="text-yellow-400">Green Energy</span><br>Transition.
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

    <!-- Clean Energy Showcase Section -->
    <section class="py-24 bg-[#fafafa] relative z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Heading -->
            <div class="text-center mb-16" data-aos="fade-up">
                <!-- Logos Area -->
                <div class="flex items-center justify-center gap-8 mb-8 -mt-8">
                    <img src="{{ asset('images/logo/unesa.png') }}" alt="UNESA Logo" class="h-20 md:h-32 object-contain drop-shadow-md">
                    <img src="{{ asset('images/logo/srehijau.png') }}" alt="SRE Logo" class="h-14 md:h-20 object-contain drop-shadow-md">
                </div>
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
                        <div class="relative w-full aspect-video rounded-[2rem] overflow-hidden bg-gray-800">
                            <!-- YouTube Embed -->
                            <iframe class="w-full h-full" 
                                src="https://www.youtube.com/embed//coArq_sC6Pw?si=7a1HrZZMfteKVaDC" 
                                title="YouTube video player" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                allowfullscreen>
                            </iframe>
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
                    Society of Renewable Energy (SRE) Universitas Negeri Surabaya merupakan organisasi mahasiswa yang baru direncanakan untuk mendukung transisi energi nasional menuju sumber energi bersih dan berkelanjutan. SRE Unesa difokuskan sebagai wadah pembelajaran terstruktur, diskusi ilmiah, serta pengembangan kompetensi energi terbarukan bagi mahasiswa lintas jurusan, khususnya dari latar belakang teknik dan sains di Unes.
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
                    <a href="{{ route('milestone.activity') }}" class="inline-block bg-[#009150] hover:bg-[#00703e] text-white px-8 py-3 rounded-full text-sm font-bold transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5">
                        Explore More &rarr;
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Activity Section -->
<section class="py-32 bg-slate-50 relative z-20">
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

<!-- Social Connect Section -->
<section class="py-32 bg-[#009150] overflow-hidden border-t border-white/5 relative z-20">
    <!-- Infinite Marquee -->
    <div class="absolute top-0 py-8 bg-black/20 w-full overflow-hidden flex whitespace-nowrap">
        <div class="animate-marquee flex gap-12 items-center">
            <span class="text-3xl lg:text-7xl font-black text-white/5 uppercase tracking-tighter">Archiving the Power of the earth •</span>
            <span class="text-3xl lg:text-7xl font-black text-emerald-500/5 uppercase tracking-tighter">Archiving the Power of the earth •</span>
            <span class="text-3xl lg:text-7xl font-black text-emerald-500/5 uppercase tracking-tighter">Archiving the Power of the earth •</span>
            <span class="text-3xl lg:text-7xl font-black text-emerald-500/5 uppercase tracking-tighter">Archiving the Power of the earth •</span>
        </div>
        <div class="animate-marquee flex gap-12 items-center" aria-hidden="true">
            <span class="text-3xl lg:text-7xl font-black text-emerald-500/5 uppercase tracking-tighter">Archiving the Power of the earth •</span>
            <span class="text-3xl lg:text-7xl font-black text-emerald-500/5 uppercase tracking-tighter">Archiving the Power of the earth •</span>
            <span class="text-3xl lg:text-7xl font-black text-emerald-500/5 uppercase tracking-tighter">Archiving the Power of the earth •</span>
            <span class="text-3xl lg:text-7xl font-black text-emerald-500/5 uppercase tracking-tighter">Archiving the Power of the earth •</span>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20">
        <div class="mb-24" data-aos="fade-right">
            <span class="text-xs uppercase tracking-[0.5em] font-black text-[#01ce72] mb-6 block">Stay in the loop</span>
            <h2 class="text-6xl md:text-8xl lg:text-9xl font-black text-white leading-none tracking-tighter uppercase">
                Let's Get <br>
                <span class="text-yellow-400">Connected</span>
            </h2>
        </div>



        <div class="space-y-0">
            <!-- Instagram -->
            <a href="#" class="group block py-12 border-b border-white/10 hover:bg-white/5 transition-colors px-4" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-6 lg:gap-12">
                        <span class="text-xs font-bold text-white/50 uppercase tracking-widest">01</span>
                        <div class="flex items-center gap-4 lg:gap-8">
                            <svg class="w-8 h-8 lg:w-16 lg:h-16 text-white group-hover:text-pink-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5" stroke-width="1.5"></rect><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01" stroke-width="1.5"></path></svg>
                            <h3 class="text-3xl lg:text-7xl font-black text-white uppercase tracking-tight group-hover:translate-x-4 transition">Instagram</h3>
                        </div>
                    </div>
                    <div class="flex items-center gap-6">
                        <span class="hidden md:block text-xs font-bold text-slate-500 uppercase tracking-widest">@EcoFuture_Official</span>
                        <svg class="w-8 h-8 text-white/20 group-hover:text-emerald-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    </div>
                </div>
            </a>

            <!-- LinkedIn -->
            <a href="#" class="group block py-12 border-b border-white/10 hover:bg-white/5 transition-colors px-4" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-6 lg:gap-12">
                        <span class="text-xs font-bold text-white/50 uppercase tracking-widest">02</span>
                        <div class="flex items-center gap-4 lg:gap-8">
                            <svg class="w-8 h-8 lg:w-16 lg:h-16 text-white group-hover:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z" stroke-width="1.5"></path><circle cx="4" cy="4" r="2" stroke-width="1.5"></circle></svg>
                            <h3 class="text-3xl lg:text-7xl font-black text-white uppercase tracking-tight group-hover:translate-x-4 transition">LinkedIn</h3>
                        </div>
                    </div>
                    <div class="flex items-center gap-6">
                        <span class="hidden md:block text-xs font-bold text-slate-500 uppercase tracking-widest">EcoFuture Institution</span>
                        <svg class="w-8 h-8 text-white/20 group-hover:text-emerald-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    </div>
                </div>
            </a>

            <!-- YouTube -->
            <a href="#" class="group block py-12 border-b border-white/10 hover:bg-white/5 transition-colors px-4" data-aos="fade-up" data-aos-delay="300">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-6 lg:gap-12">
                        <span class="text-xs font-bold text-white/50 uppercase tracking-widest">03</span>
                        <div class="flex items-center gap-4 lg:gap-8">
                            <svg class="w-8 h-8 lg:w-16 lg:h-16 text-white group-hover:text-red-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M22.54 6.42a2.78 2.78 0 00-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 00-1.94 2A29 29 0 001 11.75a29 29 0 00.46 5.33 2.78 2.78 0 001.94 2C5.12 19.5 12 19.5 12 19.5s6.88 0 8.6-.46a2.78 2.78 0 001.94-2 29 29 0 00.46-5.33 29 29 0 00-.46-5.33z" stroke-width="1.5"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02" stroke-width="1.5"></polygon></svg>
                            <h3 class="text-3xl lg:text-7xl font-black text-white uppercase tracking-tight group-hover:translate-x-4 transition">YouTube</h3>
                        </div>
                    </div>
                    <div class="flex items-center gap-6">
                        <span class="hidden md:block text-xs font-bold text-slate-500 uppercase tracking-widest">EcoFuture Official</span>
                        <svg class="w-8 h-8 text-white/20 group-hover:text-emerald-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    </div>
                </div>
            </a>

            <!-- TikTok -->
            <a href="#" class="group block py-12 border-b border-white/10 hover:bg-white/5 transition-colors px-4" data-aos="fade-up">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-6 lg:gap-12">
                        <span class="text-xs font-bold text-white/50 uppercase tracking-widest">04</span>
                        <div class="flex items-center gap-4 lg:gap-8">
                            <svg class="w-8 h-8 lg:w-16 lg:h-16 text-white group-hover:text-cyan-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5" stroke-width="1.5"></path></svg>
                            <h3 class="text-3xl lg:text-7xl font-black text-white uppercase tracking-tight group-hover:translate-x-4 transition">TikTok</h3>
                        </div>
                    </div>
                    <div class="flex items-center gap-6">
                        <span class="hidden md:block text-xs font-bold text-slate-500 uppercase tracking-widest">@ecofuture_eco</span>
                        <svg class="w-8 h-8 text-white/20 group-hover:text-[#01ce72] transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Combined Partners Section with Wave -->
<div class="relative w-full">
    <!-- White Wave Transition (Overlapping Dark Section) -->
    <div class="absolute top-0 left-0 w-full overflow-hidden leading-none z-30 -mt-[119px]">
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
                <span class="text-sky-600">🌱OUR</span> <span class="text-yellow-500">PARTNERS</span><span class="text-[#009150]">.</span>
            </h2>
        </div>
        
        <div class="flex items-center gap-12 animate-marquee-right whitespace-nowrap" data-aos="fade-up" data-aos-delay="200">
                @php
                    $partners = [
                        ['name' => 'Pupuk Kaltim', 'logo' => 'images/partners/pln.png'],
                        ['name' => 'Freeport Indonesia', 'logo' => 'images/partners/freeport.png'],
                        ['name' => 'PLN Nusantara', 'logo' => 'images/partners/pertamina.png'],
                        ['name' => 'Pertamina', 'logo' => 'images/partners/vale.png'],
                        ['name' => 'Bukit Asam', 'logo' => 'images/partners/idx.png'],
                        ['name' => 'Bukit Asam', 'logo' => 'images/partners/sier.png'],
                        ['name' => 'Pupuk Kaltim', 'logo' => 'images/partners/pln.png'],
                        ['name' => 'Freeport Indonesia', 'logo' => 'images/partners/freeport.png'],
                        ['name' => 'PLN Nusantara', 'logo' => 'images/partners/pertamina.png'],
                        ['name' => 'Pertamina', 'logo' => 'images/partners/vale.png'],
                        ['name' => 'Bukit Asam', 'logo' => 'images/partners/idx.png'],
                        ['name' => 'Bukit Asam', 'logo' => 'images/partners/sier.png'],
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