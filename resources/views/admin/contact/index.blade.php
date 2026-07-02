@extends('layouts.dashboard')

@section('title', 'Pesan Masuk')
@section('page_title', 'Pesan dari Pengunjung')

@section('content')
<div class="main-card p-8 animate-in fade-in duration-700">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div>
            <h2 class="text-xl font-bold text-slate-800 dark:text-white">Pesan Masuk</h2>
            <p class="text-sm text-slate-400 mt-1">Pesan kontak dari pengunjung halaman website.</p>
        </div>
        <span class="bg-emerald-50 dark:bg-emerald-900/30 text-primary px-4 py-2 rounded-xl text-sm font-bold">
            {{ \App\Models\ContactMessage::unread()->count() }} belum dibaca
        </span>
    </div>

    @if(session('success'))
    <div class="bg-emerald-50 text-primary p-4 rounded-xl border border-emerald-100 mb-6 text-sm font-bold flex items-center gap-3">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="text-slate-400 dark:text-slate-500 text-[10px] font-bold uppercase tracking-widest border-b border-slate-50 dark:border-slate-700">
                    <th class="pb-4 px-4"></th>
                    <th class="pb-4 px-4">Nama</th>
                    <th class="pb-4 px-4">Email</th>
                    <th class="pb-4 px-4">Layanan</th>
                    <th class="pb-4 px-4">Tanggal</th>
                    <th class="pb-4 px-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-slate-600 dark:text-slate-300 text-sm">
                @forelse($messages as $msg)
                <tr class="border-b border-slate-50 dark:border-slate-700 hover:bg-slate-50/50 dark:hover:bg-slate-800/50 transition duration-200 {{ !$msg->is_read ? 'bg-emerald-50/30 dark:bg-emerald-900/10' : '' }}">
                    <td class="py-4 px-4">
                        @if(!$msg->is_read)
                            <span class="inline-block w-2.5 h-2.5 bg-emerald-500 rounded-full shadow-lg shadow-emerald-500/50"></span>
                        @endif
                    </td>
                    <td class="py-4 px-4 font-bold text-slate-800 dark:text-white">{{ $msg->name }}</td>
                    <td class="py-4 px-4 text-slate-500 dark:text-slate-400">{{ $msg->email }}</td>
                    <td class="py-4 px-4">
                        @if($msg->service)
                            <span class="bg-sky-50 dark:bg-sky-900/30 text-sky-600 dark:text-sky-400 px-3 py-1 rounded-lg text-xs font-bold">{{ $msg->service }}</span>
                        @else
                            <span class="text-slate-300 dark:text-slate-600 text-xs">-</span>
                        @endif
                    </td>
                    <td class="py-4 px-4 text-slate-400">{{ $msg->created_at->format('d M Y H:i') }}</td>
                    <td class="py-4 px-4 text-right space-x-3">
                        <a href="{{ route('admin.contact.show', $msg) }}" class="text-primary hover:underline font-bold">Lihat</a>
                        <form action="{{ route('admin.contact.destroy', $msg) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus pesan ini?')" class="text-red-400 hover:text-red-600 font-bold transition">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-12 text-center text-slate-300 dark:text-slate-600 italic">Belum ada pesan masuk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-8">
        {{ $messages->links() }}
    </div>
</div>
@endsection
