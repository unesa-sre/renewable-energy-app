@extends('layouts.app-public')

@section('title', 'Resources')

@section('styles')
<style>
    .resource-hero {
        background: #000; /* Fallback to black */
        position: relative;
        overflow: hidden;
    }
    
    .category-card {
        background: white;
        border-radius: 2rem;
        padding: 2.5rem;
        border: 1px solid #f1f5f9;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        height: 100%;
        position: relative;
        overflow: hidden;
    }
    
    .category-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 40px 80px -20px rgba(16, 185, 129, 0.15);
        border-color: #10b981;
    }

    .category-icon {
        width: 70px;
        height: 70px;
        background: #f0fdf4;
        border-radius: 1.5rem;
        display: flex;
        items-center;
        justify-content: center;
        font-size: 2rem;
        margin-bottom: 2rem;
        transition: all 0.3s;
    }

    .category-card:hover .category-icon {
        background: #10b981;
        transform: rotate(-10deg) scale(1.1);
    }
    
    .category-card:hover .category-icon span {
        filter: brightness(0) invert(1);
    }

    .learn-more-btn {
        margin-top: auto;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: #10b981;
        font-weight: 700;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
</style>
@endsection

@section('content')
<div class="relative bg-white pt-0">
    {{-- Hero Section as the Base layer --}}
    <div class="resource-hero text-white mb-0 sticky top-0 h-screen flex items-center justify-center z-0">
        <!-- Video Background Overlay -->
        <div class="absolute inset-0 z-0">
            <video autoplay muted loop playsinline class="w-full h-full object-cover">
                <!-- LOKASI FILE: public/videos/resources/hero-bg.mp4 -->
                <source src="{{ asset('videos/resources/hero-bg.mp4') }}" type="video/mp4">
            </video>
            {{-- Semi-transparent black overlay for text readability --}}
            <div class="absolute inset-0 bg-black/40"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 text-center relative z-10">

            <h1 class="text-5xl lg:text-7xl font-black mb-8 tracking-tighter" data-aos="fade-up" data-aos-delay="100">
                Renewable <br> <span class="text-emerald-400">Resources</span>
            </h1>
            <p class="max-w-2xl mx-auto text-emerald-100/70 text-lg font-medium leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                Jelajahi berbagai sumber energi terbarukan yang akan membentuk masa depan dunia kita. Temukan teknologi, inovasi, dan cara kerjanya secara mendalam.
            </p>
        </div>
    </div>

    <div class="relative z-10">
        @php $index = 0; @endphp
        @foreach($categories as $id => $cat)
        @php 
            $zIndex = 20 + $index;
            $bgColor = $index % 2 == 0 ? 'bg-white' : 'bg-slate-50';
        @endphp
        <section class="sticky top-0 min-h-screen flex items-center py-24 {{ $bgColor }} overflow-hidden relative rounded-t-[4rem] lg:rounded-t-[6rem]" style="z-index: {{ $zIndex }}">
            {{-- Decorative Elements --}}
            @if($index % 2 == 0)
                <div class="absolute top-0 right-0 w-96 h-96 bg-emerald-500/5 rounded-full blur-3xl -mr-48 -mt-48 opacity-50"></div>
            @else
                <div class="absolute bottom-0 left-0 w-96 h-96 bg-emerald-500/5 rounded-full blur-3xl -ml-48 -mb-48 opacity-50"></div>
            @endif

            <div class="max-w-7xl mx-auto px-4 w-full">
                <div class="flex flex-col {{ $index % 2 == 0 ? 'lg:flex-row' : 'lg:flex-row-reverse' }} items-center gap-12 lg:gap-20">
                    {{-- Image Column --}}
                    <div class="w-full lg:w-1/2" data-aos="{{ $index % 2 == 0 ? 'fade-right' : 'fade-left' }}">
                        <div class="relative group">
                            <div class="absolute -inset-4 bg-emerald-500/10 rounded-[3rem] blur-xl opacity-0 group-hover:opacity-100 transition duration-1000"></div>
                            <div class="relative overflow-hidden rounded-[2.5rem] shadow-2xl aspect-[4/3]">
                                <img src="{{ asset($cat['image']) }}" alt="{{ $cat['name'] }}" class="w-full h-full object-cover transform scale-105 group-hover:scale-110 transition duration-700">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-60"></div>
                            </div>
                        </div>
                    </div>

                    {{-- Text Column --}}
                    <div class="w-full lg:w-1/2 space-y-8" data-aos="{{ $index % 2 == 0 ? 'fade-left' : 'fade-right' }}">
                        <h2 class="text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight">
                            {{ $cat['name'] }}
                        </h2>
                        <div class="h-1.5 w-24 bg-emerald-500 rounded-full"></div>
                        <p class="text-xl text-slate-600 leading-relaxed font-medium">
                            {{ $cat['description'] }}
                        </p>
                        <div class="text-slate-500 leading-relaxed italic border-l-4 border-emerald-200 pl-6">
                            "{{ $cat['detail_text'] }}"
                        </div>
                        
                        <div class="pt-6">
                            <a href="{{ route('milestone.resources.show', $id) }}" class="inline-flex items-center bg-slate-900/80 backdrop-blur-sm text-white px-10 py-4 rounded-2xl font-bold hover:bg-emerald-600 transition-all shadow-xl hover:-translate-y-1 active:scale-95 group">
                                Explore Detailed Insights
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @php $index++; @endphp
        @endforeach
        
        {{-- Final CTA Section Redesign --}}
        <div class="sticky top-0 min-h-screen py-24 bg-white overflow-hidden relative rounded-t-[4rem] lg:rounded-t-[6rem] flex items-center justify-center flex items-center justify-center" style="z-index: 50">
            {{-- Decorative Blue Blobs --}}
            <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-blue-500/10 rounded-full blur-[120px] -ml-64 -mt-64"></div>
            <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-blue-400/10 rounded-full blur-[120px] -mr-64 -mb-64"></div>

            <div class="max-w-5xl mx-auto px-4 relative z-10 w-full">
                <div class="bg-blue-600 rounded-[3rem] p-12 lg:p-24 text-center shadow-2xl relative overflow-hidden group" data-aos="zoom-in">
                    {{-- Inner Pattern --}}
                    <div class="absolute inset-0 opacity-10 pointer-events-none">
                        <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <path d="M0 0 L100 0 L100 100 L0 100 Z" fill="url(#grid)" />
                            <defs>
                                <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                                    <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                                </pattern>
                            </defs>
                        </svg>
                    </div>

                    <div class="relative z-10">
                        <h2 class="text-4xl lg:text-7xl font-black text-white mb-8 tracking-tighter leading-none" data-aos="fade-up">
                            Wujudkan Masa Depan <span class="text-blue-200 underline decoration-blue-400 underline-offset-8">Hijau.</span>
                        </h2>
                        <p class="text-blue-50/70 text-lg lg:text-2xl max-w-3xl mx-auto mb-14 font-medium leading-relaxed" data-aos="fade-up" data-aos-delay="100">
                            Setiap informasi adalah langkah awal menuju keberlanjutan. Mari bergabung bersama komunitas kami untuk dampak yang lebih besar.
                        </p>
                        <div class="flex justify-center" data-aos="fade-up" data-aos-delay="200">
                            <a href="/contact" class="bg-white text-blue-600 px-12 py-6 rounded-3xl font-black hover:bg-blue-50 text-xl transition-all shadow-2xl hover:scale-105 active:scale-95 flex items-center gap-3">
                                Mulai Berkontribusi
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>

                    {{-- Floating Glass Elements --}}
                    <div class="absolute -top-12 -right-12 w-48 h-48 bg-white/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-1000"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
