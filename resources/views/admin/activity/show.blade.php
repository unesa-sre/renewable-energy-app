@extends('layouts.dashboard')

@section('title', $activity->name)
@section('page_title', 'Detail Kegiatan')

@section('content')
<div class="card" style="max-width: 800px;">
    @if($activity->image)
    <img src="{{ asset('storage/'.$activity->image) }}" style="width:100%; border-radius:16px; margin-bottom: 1.5rem;">
    @endif
    <h2 style="margin-bottom: 1rem;">{{ $activity->name }}</h2>
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 2rem;">
        <div>
            <span style="color: #64748b; font-size: 0.9rem;">📍 Lokasi</span>
            <div style="font-weight: 600;">{{ $activity->location }}</div>
        </div>
        <div>
            <span style="color: #64748b; font-size: 0.9rem;">📅 Tanggal</span>
            <div style="font-weight: 600;">{{ date('d M Y', strtotime($activity->date)) }}</div>
        </div>
    </div>
    <div style="margin-top: 2rem;">
        <a href="{{ route('admin.activity.index') }}" class="btn" style="background:#f1f5f9;">Kembali ke Daftar</a>
    </div>
</div>
@endsection
