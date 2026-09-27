@extends('layouts.app-public')

@section('title', $article->title)

@section('content')
<div class="max-w-4xl mx-auto px-4 py-16 md:py-24 font-sans overflow-hidden">
    
    <!-- Breadcrumb -->
    <div class="flex items-center gap-2 text-[10px] md:text-xs font-bold text-gray-400 uppercase tracking-widest mb-8">
        <a href="{{ route('home') }}" class="hover:text-emerald-600 transition-colors">HOME</a>
        <span>/</span>
        <a href="{{ route('milestone.article') }}" class="hover:text-emerald-600 transition-colors">NEWS</a>
        <span>/</span>
        <span class="text-emerald-600">{{ $article->category ?? 'BERITA' }}</span>
    </div>

    <!-- Title -->
    <h1 class="text-3xl md:text-5xl font-extrabold text-[#111827] leading-tight mb-8 tracking-tight break-words">
        {{ $article->title }}
    </h1>

    <!-- Meta Info -->
    <div class="flex flex-wrap items-center gap-4 md:gap-6 text-sm text-gray-500 font-medium mb-10 pb-8 border-b border-gray-100">
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            <span>Tim Redaksi SRE UNESA</span>
        </div>
        <div class="hidden md:block w-1 h-1 rounded-full bg-gray-300"></div>
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg>
            <span>{{ $article->created_at->format('d M Y') }}</span>
        </div>
        <div class="hidden md:block w-1 h-1 rounded-full bg-gray-300"></div>
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
            <span>{{ $article->category ?? 'Edukasi' }}</span>
        </div>
    </div>

    <!-- Featured Image -->
    @if($article->image)
    <div class="w-full bg-[#f3f4f6] rounded-sm overflow-hidden mb-12 flex items-center justify-center py-10 md:py-16">
        <img src="{{ str_contains($article->image, 'http') ? $article->image : asset('storage/'.$article->image) }}" class="w-auto max-h-[400px] object-contain drop-shadow-xl" alt="{{ $article->title }}">
    </div>
    @endif

    <!-- Content -->
    <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed font-medium mb-16 break-words overflow-hidden w-full">
        {!! str_replace(['&nbsp;', 'nbsp;'], ' ', $article->content) !!}
    </div>

    <!-- Tags and Share -->
    <div class="flex flex-col md:flex-row items-center justify-between gap-6 pt-8 border-t border-gray-100">
        <div class="flex items-center gap-3">
            <span class="text-xs font-bold text-gray-400 uppercase tracking-widest mr-2">TAGS:</span>
            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded text-xs font-bold">Energi Hijau</span>
            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded text-xs font-bold">SRE UNESA</span>
        </div>
        <div class="flex items-center gap-3">
            <button class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:text-emerald-600 hover:border-emerald-600 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
            </button>
            <button class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:text-emerald-600 hover:border-emerald-600 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
            </button>
        </div>
    </div>
</div>

<style>
    .prose {
        word-break: normal !important;
        overflow-wrap: break-word !important;
        max-width: 100% !important;
    }
    .prose * {
        max-width: 100% !important;
        box-sizing: border-box !important;
    }
    .prose p {
        margin-bottom: 1.5rem !important;
        line-height: 1.85 !important;
    }
    .prose p:last-child {
        margin-bottom: 0 !important;
    }
    .prose h1 {
        font-size: 2.25rem !important;
        margin-top: 2.5rem !important;
        margin-bottom: 1.25rem !important;
        font-weight: 800 !important;
        color: #111827 !important;
    }
    .prose h2 {
        font-size: 1.75rem !important;
        margin-top: 2rem !important;
        margin-bottom: 1rem !important;
        font-weight: 800 !important;
        color: #111827 !important;
    }
    .prose h3 {
        font-size: 1.35rem !important;
        margin-top: 1.75rem !important;
        margin-bottom: 0.75rem !important;
        font-weight: 700 !important;
        color: #111827 !important;
    }
    .prose ul {
        list-style-type: disc !important;
        margin-bottom: 1.5rem !important;
        padding-left: 1.75rem !important;
    }
    .prose ol {
        list-style-type: decimal !important;
        margin-bottom: 1.5rem !important;
        padding-left: 1.75rem !important;
    }
    .prose li {
        margin-bottom: 0.5rem !important;
    }
    .prose img {
        max-width: 100% !important;
        height: auto !important;
        border-radius: 1rem;
        margin: 2rem auto !important;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.08);
        display: block;
        object-fit: contain;
    }
    .prose table {
        display: block !important;
        width: 100% !important;
        overflow-x: auto !important;
        border-collapse: collapse;
        margin-bottom: 1.5rem !important;
    }
    .prose p, .prose span, .prose strong, .prose h1, .prose h2, .prose h3, .prose li {
        word-break: normal !important;
        overflow-wrap: break-word !important;
        white-space: normal !important;
        hyphens: none !important;
        -webkit-hyphens: none !important;
    }
    .prose pre, .prose code {
        white-space: pre-wrap !important;
        word-break: break-all !important;
    }
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
