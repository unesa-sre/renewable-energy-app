@extends('layouts.app-public')

@section('title', $activity->name)

@section('content')
<!-- Header Section -->
<div class="relative w-full bg-[#009150] pt-36 pb-36 overflow-hidden text-center">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 32px 32px;"></div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 flex flex-col items-center">
        <h1 class="text-4xl md:text-6xl font-black text-white tracking-tight mb-4">
            Dokumentasi
        </h1>
        <p class="text-emerald-50 text-base md:text-lg max-w-2xl mx-auto font-medium">
            Kumpulan momen dan dokumentasi dari berbagai rangkaian kegiatan kolaboratif kami.
        </p>
    </div>
</div>

<div class="bg-white min-h-screen pb-24 relative z-30 -mt-16">
    <div class="max-w-6xl mx-auto px-4 font-sans">

        <!-- Featured Image Slider Mock -->
        <div class="relative w-full rounded-3xl overflow-hidden mb-16 group">
            @if($activity->image)
                <img src="{{ str_contains($activity->image, 'http') ? $activity->image : asset('storage/'.$activity->image) }}" class="w-full h-[400px] md:h-[600px] object-cover" alt="{{ $activity->name }}">
            @else
                <div class="w-full h-[400px] md:h-[600px] bg-slate-200 flex items-center justify-center">
                    <svg class="w-20 h-20 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
            @endif
            
            <!-- Left Arrow -->
            <button class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-[#009150] rounded-full flex items-center justify-center text-white border-2 border-white shadow-lg opacity-0 group-hover:opacity-100 transition-all hover:scale-105 cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            <!-- Right Arrow -->
            <button class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-[#009150] rounded-full flex items-center justify-center text-white border-2 border-white shadow-lg opacity-0 group-hover:opacity-100 transition-all hover:scale-105 cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
            </button>
            
            <!-- Dots -->
            <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex items-center gap-2">
                <div class="w-8 h-2.5 bg-[#009150] rounded-full"></div>
                <div class="w-2.5 h-2.5 bg-white/60 border-2 border-white/80 rounded-full"></div>
                <div class="w-2.5 h-2.5 bg-white/60 border-2 border-white/80 rounded-full"></div>
            </div>
        </div>

        <!-- 3 Info Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16 max-w-4xl mx-auto">
            <!-- Card 1: Jadwal -->
            <div class="bg-slate-50 rounded-3xl p-8 flex flex-col items-center text-center border border-slate-200 transition-colors duration-300 hover:border-[#009150]/30 hover:bg-emerald-50/50">
                <div class="text-[#009150] mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg>
                </div>
                <span class="text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">JADWAL</span>
                <h3 class="font-bold text-slate-800">{{ $activity->name }}</h3>
            </div>

            <!-- Card 2: Peserta -->
            <div class="bg-slate-50 rounded-3xl p-8 flex flex-col items-center text-center border border-slate-200 transition-colors duration-300 hover:border-[#009150]/30 hover:bg-emerald-50/50">
                <div class="text-[#009150] mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <span class="text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">PESERTA</span>
                <h3 class="font-bold text-slate-800">Semua Anggota</h3>
            </div>

            <!-- Card 3: Lokasi -->
            <div class="bg-slate-50 rounded-3xl p-8 flex flex-col items-center text-center border border-slate-200 transition-colors duration-300 hover:border-[#009150]/30 hover:bg-emerald-50/50">
                <div class="text-[#009150] mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <span class="text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">LOKASI</span>
                <h3 class="font-bold text-slate-800">{{ $activity->location }}</h3>
            </div>
        </div>

        <!-- Content Area -->
        <div class="max-w-4xl mx-auto bg-slate-50 rounded-[2rem] p-8 md:p-12 border border-slate-200 relative overflow-hidden">
            <!-- Decorative soft blur -->
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-emerald-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>
            <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-yellow-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>
            
            <div class="relative z-10">
                <!-- Article Header -->
            <div class="mb-10 pb-8 border-b border-gray-100 text-center">
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 leading-tight mb-6">
                    Detail Kegiatan
                </h2>
                <div class="flex flex-wrap items-center justify-center gap-4 text-sm text-gray-500 font-medium">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#009150]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span>Tim SRE UNESA</span>
                    </div>
                    <div class="w-1 h-1 rounded-full bg-gray-300"></div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#009150]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg>
                        <span>{{ $activity->date ? \Carbon\Carbon::parse($activity->date)->format('d M Y') : 'Segera' }}</span>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="prose prose-lg max-w-none text-slate-600 leading-relaxed font-medium">
                @if($activity->description)
                    {!! $activity->description !!}
                @else
                    <blockquote>
                        Kami percaya bahwa kegiatan bersama merupakan langkah progresif untuk menciptakan wawasan energi baru terbarukan. Kolaborasi SRE ini difokuskan pada aksi nyata untuk lingkungan dan edukasi masyarakat sekitar.
                    </blockquote>
                    <p>Informasi lebih detail terkait kegiatan <strong>{{ $activity->name }}</strong> yang akan dilaksanakan pada tanggal {{ $activity->date ? \Carbon\Carbon::parse($activity->date)->format('d F Y') : '-' }} di {{ $activity->location }} akan segera diumumkan.</p>
                @endif
            </div>

                <!-- Action -->
                <div class="mt-12 pt-8 border-t border-slate-200 flex flex-wrap items-center justify-center gap-4">
                    <a href="{{ route('milestone.activity') }}" class="inline-block bg-white hover:bg-slate-100 text-slate-700 border-2 border-slate-200 px-10 py-4 rounded-full text-sm font-bold tracking-widest uppercase transition-all hover:-translate-y-1">
                        Kembali
                    </a>
                    <a href="{{ route('login') }}" class="inline-block bg-[#009150] hover:bg-[#00703e] text-white px-10 py-4 rounded-full text-sm font-bold tracking-widest uppercase transition-all hover:-translate-y-1 hover:shadow-[0_8px_20px_rgb(0,145,80,0.3)]">
                        Ikuti Kegiatan
                    </a>
                </div>
            </div>
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
