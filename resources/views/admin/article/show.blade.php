@extends('layouts.dashboard')

@section('title', $article->title)
@section('page_title', 'Detail Artikel')

@section('content')
<div class="card" style="max-width: 800px;">
    @if($article->image)
    <img src="{{ asset('storage/'.$article->image) }}" style="width:100%; border-radius:16px; margin-bottom: 1.5rem;">
    @endif
    <h2 style="margin-bottom: 1rem;">{{ $article->title }}</h2>
    <div style="color: #64748b; margin-bottom: 2rem; font-size: 0.9rem;">
        Dipublikasikan pada {{ $article->created_at->format('d M Y') }}
    </div>
    <div style="line-height: 1.8; color: #475569;">
        {!! nl2br(e($article->content)) !!}
    </div>
    <div style="margin-top: 2rem;">
        <a href="{{ route('admin.article.index') }}" class="btn" style="background:#f1f5f9;">Kembali ke Daftar</a>
    </div>
</div>
@endsection
