@extends('layouts.app-public')

@section('title', 'Artikel Edukasi')

@section('content')
<!-- Hero Section -->
<div class="relative bg-[#009150] pt-36 pb-0 text-white overflow-hidden">

    <!-- Decorative blobs -->
    <div class="absolute top-[-60px] left-[-80px] w-72 h-72 bg-white/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-10 right-[-60px] w-60 h-60 bg-emerald-300/10 rounded-full blur-2xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 text-center pb-24 relative z-10">
        <h1 class="text-4xl md:text-5xl font-black mb-4 animate-in fade-in slide-in-from-top-4 duration-700">Wawasan Energi Terbarukan</h1>
        <p class="text-emerald-100/80 max-w-2xl mx-auto leading-relaxed">Pelajari lebih dalam tentang teknologi bersih yang akan merubah dunia.</p>
    </div>

    <!-- Wave Bottom: thin green line style -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
        <!-- White fill under wave -->
        <svg class="relative block w-full h-[60px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 60" preserveAspectRatio="none">
            <path d="M0,30 C200,60 400,0 600,30 C800,60 1000,0 1200,30 L1200,60 L0,60 Z" fill="#ffffff"/>
        </svg>
        <!-- Thin green stroke line on top of white -->
        <svg class="absolute top-0 left-0 w-full h-[60px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 60" preserveAspectRatio="none">
            <path d="M0,30 C200,60 400,0 600,30 C800,60 1000,0 1200,30" fill="none" stroke="#007a40" stroke-width="2.5"/>
        </svg>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-20">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($articles as $article)
        <div class="group bg-white dark:bg-slate-900 rounded-3xl overflow-hidden transition duration-500 border border-slate-100 dark:border-slate-800 flex flex-col h-full">
            <div class="h-64 overflow-hidden relative">
                @if($article->image)
                    <img src="{{ asset('storage/'.$article->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                @else
                    <div class="w-full h-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-300">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                @endif
                <div class="absolute top-4 left-4">
                    <span class="bg-primary text-white text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full">Edukasi</span>
                </div>
            </div>
            <div class="p-8 flex flex-col flex-1">
                <p class="text-[10px] font-black text-primary uppercase tracking-widest mb-3">{{ $article->created_at->format('d M Y') }}</p>
                <h3 class="text-xl font-bold text-slate-800 dark:text-white mb-4 line-clamp-2">{{ $article->title }}</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 mb-8 line-clamp-3 leading-relaxed flex-1">{{ Str::limit($article->content, 120) }}</p>
                <a href="{{ route('milestone.article.show', $article) }}" class="text-primary font-black uppercase tracking-widest text-xs flex items-center gap-2 group/btn">
                    Baca Selengkapnya
                    <svg class="w-4 h-4 group-hover/btn:translate-x-2 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-20">
            <p class="text-slate-400 font-bold italic">Belum ada artikel tersedia.</p>
        </div>
        @endforelse
    </div>

    <div class="mt-16">
        {{ $articles->links() }}
    </div>
</div>
@endsection
