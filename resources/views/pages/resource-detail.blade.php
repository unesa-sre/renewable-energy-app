@extends('layouts.app-public')

@section('title', $resource['name'])

@section('content')
<div class="max-w-4xl mx-auto px-4 py-16 md:py-24 font-sans">
    
    <!-- Breadcrumb -->
    <div class="flex items-center gap-2 text-[10px] md:text-xs font-bold text-gray-400 uppercase tracking-widest mb-8">
        <a href="{{ route('home') }}" class="hover:text-emerald-600 transition-colors">HOME</a>
        <span>/</span>
        <a href="{{ route('milestone.resources') }}" class="hover:text-emerald-600 transition-colors">RESOURCES</a>
        <span>/</span>
        <span class="text-emerald-600 uppercase">{{ $resource['name'] }}</span>
    </div>

    <!-- Title -->
    <h1 class="text-3xl md:text-5xl font-extrabold text-[#111827] leading-tight mb-8 tracking-tight">
        {{ $resource['name'] }} : Inovasi Energi Masa Depan
    </h1>

    <!-- Meta Info -->
    <div class="flex flex-wrap items-center gap-4 md:gap-6 text-sm text-gray-500 font-medium mb-10 pb-8 border-b border-gray-100">
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            <span>Tim Inovasi SRE UNESA</span>
        </div>
        <div class="hidden md:block w-1 h-1 rounded-full bg-gray-300"></div>
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg>
            <span>{{ date('d M Y') }}</span>
        </div>
        <div class="hidden md:block w-1 h-1 rounded-full bg-gray-300"></div>
        <div class="flex items-center gap-2 text-emerald-600">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            <span class="font-bold">Teknologi Energi</span>
        </div>
    </div>

    <!-- Featured Banner -->
    <div class="w-full bg-[#f3f4f6] rounded-sm overflow-hidden mb-12 flex flex-col items-center justify-center py-20 text-center border border-gray-100">
        <span class="text-7xl mb-4 drop-shadow-md">{{ $resource['icon'] }}</span>
        <h3 class="text-2xl font-bold text-gray-800">{{ $resource['name'] }}</h3>
        <p class="text-sm text-gray-500 mt-2 font-medium tracking-widest uppercase">Fokus Teknologi SRE UNESA</p>
    </div>

    <!-- Content -->
    <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed font-medium mb-16">
        <blockquote>
            {{ $resource['description'] }}
        </blockquote>
        
        <p>{{ $resource['detail_text'] }}</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12 mb-8">
            <div class="bg-emerald-50 p-6 border-l-4 border-emerald-500">
                <h3 class="text-lg font-bold text-emerald-900 mb-2 mt-0">Kenapa Ini Penting?</h3>
                <p class="text-emerald-800/80 text-base mb-0">Teknologi ini merupakan pilar utama dalam transisi energi global menuju masa depan yang net-zero emisi.</p>
            </div>
            <div class="bg-sky-50 p-6 border-l-4 border-sky-500">
                <h3 class="text-lg font-bold text-sky-900 mb-2 mt-0">Manfaat Utama</h3>
                <ul class="list-disc pl-5 space-y-1 text-sky-800/80 text-base mb-0">
                    <li>Efisiensi energi tinggi</li>
                    <li>Ramah lingkungan & rendah emisi</li>
                    <li>Keberlanjutan jangka panjang</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Action / Tags -->
    <div class="flex flex-col md:flex-row items-center justify-between gap-6 pt-8 border-t border-gray-100">
        <a href="{{ route('milestone.resources') }}" class="w-full md:w-auto text-center inline-flex items-center justify-center gap-2 bg-[#006b4f] hover:bg-[#00523c] text-white px-8 py-3 rounded text-sm font-bold tracking-widest uppercase transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Resources
        </a>

        <div class="flex items-center gap-3">
            <span class="text-xs font-bold text-gray-400 uppercase tracking-widest mr-2">TAGS:</span>
            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded text-xs font-bold uppercase">{{ $resource['name'] }}</span>
            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded text-xs font-bold uppercase">Inovasi</span>
        </div>
    </div>
</div>

<style>
    .prose blockquote {
        border-left: 4px solid #10b981 !important;
        padding-left: 1.5rem !important;
        font-style: italic !important;
        color: #047857 !important;
        background: #ecfdf5 !important;
        padding: 1.5rem !important;
        border-radius: 0 0.5rem 0.5rem 0 !important;
        margin: 2rem 0 !important;
        font-weight: 600 !important;
        font-size: 1.1rem !important;
    }
</style>
@endsection
