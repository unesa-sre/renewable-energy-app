@extends('layouts.dashboard')

@section('title', 'Detail Pesan')
@section('page_title', 'Detail Pesan Kontak')

@section('content')
<div class="max-w-3xl mx-auto">
    <a href="{{ route('admin.contact.index') }}" class="inline-flex items-center text-primary font-bold text-sm hover:underline mb-6 group">
        <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Kembali ke Daftar Pesan
    </a>

    <div class="main-card p-8">
        <div class="flex justify-between items-start mb-8">
            <div>
                <h2 class="text-xl font-bold text-slate-800 dark:text-white mb-1">{{ $contact_message->name }}</h2>
                <p class="text-sm text-slate-400">{{ $contact_message->email }}</p>
            </div>
            <span class="text-xs text-slate-400 font-semibold">{{ $contact_message->created_at->format('d M Y, H:i') }}</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
            @if($contact_message->phone)
            <div>
                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Phone</p>
                <p class="text-sm font-semibold text-slate-700 dark:text-slate-200">{{ $contact_message->phone }}</p>
            </div>
            @endif

            @if($contact_message->post_code)
            <div>
                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Post Code</p>
                <p class="text-sm font-semibold text-slate-700 dark:text-slate-200">{{ $contact_message->post_code }}</p>
            </div>
            @endif

            @if($contact_message->location)
            <div>
                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Location</p>
                <p class="text-sm font-semibold text-slate-700 dark:text-slate-200">{{ $contact_message->location }}</p>
            </div>
            @endif

            @if($contact_message->heard_from)
            <div>
                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Heard From</p>
                <p class="text-sm font-semibold text-slate-700 dark:text-slate-200">{{ $contact_message->heard_from }}</p>
            </div>
            @endif

            @if($contact_message->service)
            <div>
                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Service</p>
                <span class="inline-block bg-sky-50 dark:bg-sky-900/30 text-sky-600 dark:text-sky-400 px-4 py-1.5 rounded-xl text-xs font-bold">{{ $contact_message->service }}</span>
            </div>
            @endif
        </div>

        <div class="border-t border-slate-100 dark:border-slate-700 pt-6">
            <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-3">Pesan</p>
            <div class="bg-slate-50 dark:bg-slate-800 rounded-2xl p-6 text-sm text-slate-700 dark:text-slate-200 leading-relaxed whitespace-pre-wrap">{{ $contact_message->message }}</div>
        </div>

        <div class="mt-8 pt-6 border-t border-slate-100 dark:border-slate-700 flex justify-end">
            <form action="{{ route('admin.contact.destroy', $contact_message) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" onclick="return confirm('Hapus pesan ini?')" class="bg-red-50 dark:bg-red-900/20 text-red-500 px-6 py-2.5 rounded-xl font-bold text-sm hover:bg-red-100 dark:hover:bg-red-900/30 transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    Hapus Pesan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
