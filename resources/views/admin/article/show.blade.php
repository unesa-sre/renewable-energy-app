@extends('layouts.dashboard')

@section('title', 'Detail: ' . $article->title)
@section('page_title', 'Detail Artikel')

@section('content')
<div class="flex flex-col lg:flex-row gap-8 items-start">
    {{-- Left Column: Image --}}
    <div class="w-full lg:w-1/3 shrink-0">
        <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 shadow-sm border border-slate-100 dark:border-slate-700">
            <h3 class="text-sm font-black uppercase tracking-widest text-slate-400 mb-4">Media Artikel</h3>
            
            <div class="mb-2">
                <p class="text-[10px] font-bold text-slate-400 uppercase mb-2">Gambar Sampul</p>
                @if($article->image)
                    <img src="{{ str_contains($article->image, 'http') ? $article->image : asset('storage/'.$article->image) }}" 
                        class="w-full h-auto rounded-xl object-cover aspect-[4/3] shadow-sm" alt="Sampul">
                @else
                    <div class="w-full aspect-[4/3] rounded-xl bg-slate-50 dark:bg-slate-900 flex items-center justify-center border border-dashed border-slate-200 dark:border-slate-700">
                        <span class="text-xs text-slate-400 font-medium">Tidak ada gambar</span>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Right Column: Information --}}
    <div class="w-full lg:w-2/3">
        <div class="bg-white dark:bg-slate-800 rounded-3xl p-8 shadow-sm border border-slate-100 dark:border-slate-700">
            <div class="flex flex-wrap gap-4 items-center justify-between mb-6 pb-6 border-b border-slate-100 dark:border-slate-700">
                <h2 class="text-2xl font-black text-slate-800 dark:text-white leading-tight">{{ $article->title }}</h2>
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.article.edit', $article->id) }}" class="inline-flex items-center gap-2 bg-amber-50 dark:bg-amber-500/10 text-amber-600 dark:text-amber-400 hover:bg-amber-100 px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-widest transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                        Edit
                    </a>
                </div>
            </div>

            <div class="flex flex-wrap gap-8 mb-8">
                <div>
                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-400 block mb-1">Tanggal Publikasi</span>
                    <div class="flex items-center gap-2 text-slate-700 dark:text-slate-200 font-semibold">
                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        {{ $article->created_at->isoFormat('D MMMM Y') }}
                    </div>
                </div>
            </div>

            {{-- Quill Content --}}
            <div class="mb-10">
                <span class="text-[10px] font-black uppercase tracking-widest text-slate-400 block mb-4 border-b border-slate-100 dark:border-slate-700 pb-2">Konten Artikel</span>
                @if($article->content)
                <div class="prose prose-sm prose-slate prose-p:break-words max-w-none w-full description-content dark:prose-invert">
                    {!! $article->content !!}
                </div>
                @else
                <p class="text-slate-400 italic text-sm">Tidak ada konten untuk artikel ini.</p>
                @endif
            </div>

        </div>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('admin.article.index') }}" class="px-6 py-3 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 font-bold text-xs uppercase tracking-widest rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 transition border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-md">
                Kembali ke Daftar
            </a>
        </div>
    </div>
</div>

@section('scripts')
<style>
    /* Quill output styling matching frontend */
    .description-content {
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
    .description-content p    { margin-bottom: 1rem; line-height: 1.7; }
    .description-content strong, .description-content b { font-weight: 700; }
    .description-content em, .description-content i     { font-style: italic; }
    .description-content u    { text-decoration: underline; }
    .description-content s    { text-decoration: line-through; }
    .description-content h1   { font-size: 1.5rem; font-weight: 800; margin: 1.5rem 0 0.75rem; }
    .description-content h2   { font-size: 1.2rem; font-weight: 700; margin: 1.25rem 0 0.6rem; }
    .description-content h3   { font-size: 1.05rem; font-weight: 700; margin: 1rem 0 0.5rem; }
    .description-content ul   { list-style: disc;    padding-left: 1.5rem; margin-bottom: 1rem; }
    .description-content ol   { list-style: decimal; padding-left: 1.5rem; margin-bottom: 1rem; }
    .description-content li   { margin-bottom: 0.4rem; line-height: 1.6; }
    .description-content blockquote {
        border-left: 4px solid #10b981 !important;
        color: #047857 !important;
        background: #ecfdf5 !important;
        padding: 1rem 1.25rem !important;
        border-radius: 0 0.5rem 0.5rem 0 !important;
        margin: 1.25rem 0 !important;
        font-style: italic;
        font-weight: 600;
    }
    .dark .description-content blockquote {
        background: rgba(16, 185, 129, 0.1) !important;
        color: #34d399 !important;
    }
</style>
@endsection
@endsection
