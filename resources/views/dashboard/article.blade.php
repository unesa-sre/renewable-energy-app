@extends('layouts.dashboard')

@section('title', 'Edukasi Hijau')
@section('page_title', 'Perluas Wawasan Anda')

@section('content')
    <div class="space-y-8 animate-in fade-in slide-in-from-bottom-4 duration-700">
        <!-- Featured Search / Filter (Visual Only for now) -->
        <div
            class="main-card p-6 bg-gradient-to-r from-emerald-500 to-sky-500 text-white flex flex-col md:flex-row items-center justify-between gap-6 border-none">
            <div>
                <h2 class="text-2xl font-black">Pusat Literasi Energi</h2>
                <p class="text-emerald-50 opacity-90 mt-1">Temukan artikel dan panduan terbaru seputar teknologi ramah
                    lingkungan.</p>
            </div>
            <div class="flex gap-2">
                <span
                    class="px-4 py-2 bg-white/20 backdrop-blur rounded-xl text-xs font-black uppercase tracking-wider">Solar</span>
                <span
                    class="px-4 py-2 bg-white/20 backdrop-blur rounded-xl text-xs font-black uppercase tracking-wider">Wind</span>
                <span
                    class="px-4 py-2 bg-white/20 backdrop-blur rounded-xl text-xs font-black uppercase tracking-wider">Biomass</span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($articles as $article)
                <div
                    class="main-card overflow-hidden group hover:shadow-2xl transition duration-500 border-none shadow-sm h-full flex flex-col">
                    <div class="relative h-56 bg-slate-100 overflow-hidden shrink-0">
                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                                class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                        @else
                            <div
                                class="w-full h-full flex items-center justify-center text-primary/10 bg-emerald-50 dark:bg-slate-800">
                                <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2h-14"></path>
                                </svg>
                            </div>
                        @endif
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <div class="flex items-center justify-between gap-2 mb-4">
                            <span
                                class="text-[10px] font-black uppercase tracking-widest text-primary px-2 py-1 bg-emerald-50 dark:bg-emerald-900/20 rounded">{{ $article->category ?? 'Wawasan' }}</span>
                            <span
                                class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ $article->created_at->format('M d, Y') }}</span>
                        </div>
                        <h3
                            class="text-xl font-bold text-slate-800 dark:text-white leading-tight mb-4 group-hover:text-primary transition line-clamp-2">
                            {{ $article->title }}</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400 leading-relaxed mb-6 line-clamp-3">
                            {{ $article->excerpt ?? Str::limit(strip_tags($article->content), 120) }}</p>

                        <div class="mt-auto pt-6 border-t border-slate-50 dark:border-slate-800">
                            <a href="{{ route('milestone.article.show', $article) }}"
                                class="inline-flex items-center gap-2 text-sm font-black text-slate-800 dark:text-white hover:text-primary transition group/link">
                                Baca Selengkapnya
                                <svg class="w-4 h-4 group-hover/link:translate-x-1 transition" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center">
                    <h3 class="text-xl font-bold text-slate-400">Belum ada konten edukasi tersedia.</h3>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $articles->links() }}
        </div>
    </div>
@endsection