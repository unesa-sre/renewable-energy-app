@extends('layouts.app-public')

@section('title', $activity->name)

@section('content')
<div class="max-w-4xl mx-auto px-4 py-16 md:py-24 font-sans">

    {{-- Breadcrumb --}}
    <div class="flex items-center gap-2 text-[10px] md:text-xs font-bold text-gray-400 uppercase tracking-widest mb-8">
        <a href="{{ route('home') }}" class="hover:text-emerald-600 transition-colors">HOME</a>
        <span>/</span>
        <a href="{{ route('milestone.activity') }}" class="hover:text-emerald-600 transition-colors">ACTIVITY</a>
        <span>/</span>
        <span class="text-emerald-600 truncate max-w-[160px]">{{ $activity->name }}</span>
    </div>

    {{-- Title --}}
    <h1 class="text-3xl md:text-5xl font-extrabold text-[#111827] leading-tight mb-8 tracking-tight">
        {{ $activity->name }}
    </h1>

    {{-- Meta Info --}}
    <div class="flex flex-wrap items-center gap-4 md:gap-6 text-sm text-gray-500 font-medium mb-10 pb-8 border-b border-gray-100">
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            <span>{{ $activity->date ? \Carbon\Carbon::parse($activity->date)->isoFormat('D MMMM Y') : 'Segera' }}</span>
        </div>
        <div class="hidden md:block w-1 h-1 rounded-full bg-gray-300"></div>
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            <span>{{ $activity->location }}</span>
        </div>
        @if($activity->participants && count($activity->participants) > 0)
        <div class="hidden md:block w-1 h-1 rounded-full bg-gray-300"></div>
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            <span>{{ count($activity->participants) }} Peserta</span>
        </div>
        @endif
    </div>

    {{-- Photo Slider --}}
    @php
        $gallery = $activity->gallery_images ?? [];
        $hasPoster = !empty($activity->image);
        $allPhotos = [];
        if ($hasPoster) {
            $allPhotos[] = str_contains($activity->image, 'http') ? $activity->image : asset('storage/'.$activity->image);
        }
        foreach ($gallery as $g) {
            $allPhotos[] = asset('storage/'.$g);
        }
    @endphp

    @if(count($allPhotos) > 0)
    <div class="mb-12 -mx-4 md:mx-0">
        <div class="swiper activity-swiper rounded-none md:rounded-2xl overflow-hidden" style="height: 420px;">
            <div class="swiper-wrapper">
                @foreach($allPhotos as $idx => $src)
                <div class="swiper-slide">
                    <div class="relative w-full h-full cursor-pointer group" onclick="openLightbox('{{ $src }}')">
                        <img src="{{ $src }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02]" alt="Foto {{ $idx + 1 }}">
                        {{-- Slide counter badge --}}
                        <div class="absolute top-4 right-4 bg-black/50 text-white text-xs font-bold px-3 py-1 rounded-full backdrop-blur-sm">
                            {{ $idx + 1 }} / {{ count($allPhotos) }}
                        </div>
                        {{-- Poster badge on first slide --}}
                        @if($idx === 0 && $hasPoster)
                        <div class="absolute top-4 left-4 bg-[#009150] text-white text-[10px] font-black uppercase tracking-widest px-3 py-1.5 rounded-full shadow">
                            📸 Poster
                        </div>
                        @endif
                        {{-- Zoom hint --}}
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-all flex items-center justify-center">
                            <div class="opacity-0 group-hover:opacity-100 transition-opacity bg-black/40 rounded-full p-3">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Navigation arrows --}}
            @if(count($allPhotos) > 1)
            <div class="swiper-button-prev !text-white !w-10 !h-10 rounded-full bg-black/40 hover:bg-black/60 backdrop-blur-sm transition after:!text-sm"></div>
            <div class="swiper-button-next !text-white !w-10 !h-10 rounded-full bg-black/40 hover:bg-black/60 backdrop-blur-sm transition after:!text-sm"></div>
            {{-- Pagination dots --}}
            <div class="swiper-pagination"></div>
            @endif
        </div>

        {{-- Thumbnail strip (only when > 1 photo) --}}
        @if(count($allPhotos) > 1)
        <div class="swiper activity-swiper-thumbs mt-2 px-4 md:px-0" style="height: 72px;">
            <div class="swiper-wrapper">
                @foreach($allPhotos as $idx => $src)
                <div class="swiper-slide !w-auto">
                    <div class="h-16 w-24 overflow-hidden rounded-lg cursor-pointer border-2 border-transparent transition-all duration-200 hover:border-[#009150]">
                        <img src="{{ $src }}" class="w-full h-full object-cover" alt="Thumb {{ $idx + 1 }}">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
    @endif


    {{-- Description --}}
    @if($activity->description)
    <div class="prose prose-lg prose-p:break-words max-w-none w-full mb-12 description-content">
        {!! $activity->description !!}
    </div>
    @else
    <div class="prose prose-lg max-w-none w-full mb-12 text-gray-600">
        <p>Informasi lebih detail terkait kegiatan <strong>{{ $activity->name }}</strong> yang akan dilaksanakan pada tanggal {{ $activity->date ? \Carbon\Carbon::parse($activity->date)->isoFormat('D MMMM Y') : '-' }} di {{ $activity->location }} akan segera diumumkan.</p>
    </div>
    @endif

    {{-- Participants --}}
    @if($activity->participants && count($activity->participants) > 0)
    <div class="mb-12 pt-8 border-t border-gray-100">
        <h2 class="text-sm font-black text-gray-400 uppercase tracking-widest mb-5">Daftar Peserta · {{ count($activity->participants) }} orang</h2>
        <div class="flex flex-wrap gap-2">
            @foreach($activity->participants as $i => $name)
            <span class="inline-flex items-center gap-2 bg-emerald-50 border border-emerald-100 text-emerald-800 text-sm font-semibold px-4 py-2 rounded-full">
                <span class="w-5 h-5 rounded-full bg-[#009150] text-white text-[10px] font-black flex items-center justify-center shrink-0">{{ $i + 1 }}</span>
                {{ $name }}
            </span>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Footer Actions & Social --}}
    <div class="flex flex-col sm:flex-row items-center justify-between gap-6 pt-8 border-t border-gray-100">
        <a href="{{ route('milestone.activity') }}"
            class="inline-flex items-center gap-2 text-sm font-bold text-gray-500 hover:text-emerald-600 transition-colors uppercase tracking-widest">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Kembali ke Activity
        </a>

        {{-- Social Media Links --}}
        <div class="flex items-center gap-4">
            <span class="text-sm font-bold text-gray-400 uppercase tracking-widest mr-2">Share:</span>
            
            {{-- Instagram --}}
            <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 hover:bg-gradient-to-tr hover:from-yellow-400 hover:via-pink-500 hover:to-purple-500 hover:text-white transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm3.98-10.169a1.18 1.18 0 11-2.36 0 1.18 1.18 0 012.36 0z"/></svg>
            </a>

            {{-- TikTok --}}
            <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 hover:bg-black hover:text-white transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
            </a>

            {{-- YouTube --}}
            <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 hover:bg-[#ff0000] hover:text-white transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
            </a>
        </div>
    </div>

</div>

{{-- Lightbox Modal --}}
<div id="lightbox" class="fixed inset-0 bg-black/90 z-[999] hidden items-center justify-center p-4" onclick="closeLightbox()">
    <button onclick="closeLightbox()" class="absolute top-6 right-6 text-white/70 hover:text-white transition">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
    </button>
    <img id="lightbox-img" src="" class="max-w-full max-h-[90vh] object-contain rounded-xl shadow-2xl" onclick="event.stopPropagation()" />
</div>

{{-- Swiper CSS --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<style>
    .prose blockquote {
        border-left: 4px solid #10b981 !important;
        font-style: italic !important;
        color: #047857 !important;
        background: #ecfdf5 !important;
        padding: 1.5rem !important;
        border-radius: 0 0.5rem 0.5rem 0 !important;
        margin: 2rem 0 !important;
        font-weight: 600 !important;
        font-size: 1.1rem !important;
    }

    /* Description / Quill output styling */
    .description-content {
        color: #4b5563;
        word-break: break-word;
        overflow-wrap: break-word;
        white-space: normal;
        overflow-x: hidden;
    }
    .description-content * {
        word-break: break-word;
        overflow-wrap: break-word;
        white-space: normal;
    }
    .description-content p    { margin-bottom: 1rem; line-height: 1.85; }
    .description-content strong, .description-content b { font-weight: 700; color: #111827; }
    .description-content em, .description-content i     { font-style: italic; }
    .description-content u    { text-decoration: underline; }
    .description-content s    { text-decoration: line-through; color: #9ca3af; }
    .description-content h1   { font-size: 1.6rem; font-weight: 800; color: #111827; margin: 1.5rem 0 0.75rem; }
    .description-content h2   { font-size: 1.3rem; font-weight: 700; color: #111827; margin: 1.25rem 0 0.6rem; }
    .description-content h3   { font-size: 1.1rem; font-weight: 700; color: #111827; margin: 1rem 0 0.5rem; }
    .description-content ul   { list-style: disc;    padding-left: 1.5rem; margin-bottom: 1rem; }
    .description-content ol   { list-style: decimal; padding-left: 1.5rem; margin-bottom: 1rem; }
    .description-content li   { margin-bottom: 0.4rem; line-height: 1.75; }
    .description-content blockquote {
        border-left: 4px solid #10b981 !important;
        color: #047857 !important;
        background: #ecfdf5 !important;
        padding: 1.25rem 1.5rem !important;
        border-radius: 0 0.5rem 0.5rem 0 !important;
        margin: 1.5rem 0 !important;
        font-style: italic;
        font-weight: 600;
    }

    /* Swiper custom styles */
    .activity-swiper .swiper-pagination-bullet {
        background: white;
        opacity: 0.6;
        width: 8px;
        height: 8px;
    }
    .activity-swiper .swiper-pagination-bullet-active {
        background: #009150;
        opacity: 1;
        width: 24px;
        border-radius: 4px;
    }
    .activity-swiper .swiper-button-prev,
    .activity-swiper .swiper-button-next {
        width: 40px !important;
        height: 40px !important;
        margin-top: -20px;
    }
    .activity-swiper .swiper-button-prev::after,
    .activity-swiper .swiper-button-next::after {
        font-size: 14px !important;
        font-weight: 900;
    }
    /* Active thumbnail highlight */
    .activity-swiper-thumbs .swiper-slide-thumb-active > div {
        border-color: #009150 !important;
        transform: scale(1.05);
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
// Init thumbs swiper
var thumbsSwiper = null;
var thumbsEl = document.querySelector('.activity-swiper-thumbs');
if (thumbsEl) {
    thumbsSwiper = new Swiper('.activity-swiper-thumbs', {
        slidesPerView: 'auto',
        spaceBetween: 8,
        watchSlidesProgress: true,
        freeMode: true,
    });
}

// Init main swiper
var mainSwiper = new Swiper('.activity-swiper', {
    loop: false,
    speed: 500,
    grabCursor: true,
    keyboard: { enabled: true },
    pagination: {
        el: '.activity-swiper .swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.activity-swiper .swiper-button-next',
        prevEl: '.activity-swiper .swiper-button-prev',
    },
    thumbs: thumbsSwiper ? { swiper: thumbsSwiper } : undefined,
});

// Lightbox
function openLightbox(src) {
    if (!src) return;
    document.getElementById('lightbox-img').src = src;
    var lb = document.getElementById('lightbox');
    lb.classList.remove('hidden');
    lb.classList.add('flex');
    document.body.style.overflow = 'hidden';
}
function closeLightbox() {
    var lb = document.getElementById('lightbox');
    lb.classList.add('hidden');
    lb.classList.remove('flex');
    document.body.style.overflow = '';
}
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeLightbox();
});
</script>
@endsection
