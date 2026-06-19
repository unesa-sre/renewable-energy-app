@extends('layouts.dashboard')

@section('title', 'Manage Activities')
@section('page_title', 'Manajemen Kegiatan')

@section('content')
    <div class="main-card p-8 animate-in fade-in duration-700">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <div>
                <h2 class="text-xl font-bold text-slate-800 dark:text-white">Daftar Kegiatan</h2>
                <p class="text-sm text-slate-400 mt-1">Kelola agenda kegiatan lingkungan komunitas.</p>
            </div>
            <a href="{{ route($prefix . '.activity.create') }}"
                class="bg-primary hover:bg-emerald-600 text-white px-6 py-2.5 rounded-xl font-bold text-sm transition shadow-lg shadow-emerald-500/20 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Kegiatan
            </a>
        </div>

        @if(session('success'))
            <div
                class="bg-emerald-50 text-primary p-4 rounded-xl border border-emerald-100 mb-6 text-sm font-bold flex items-center gap-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-slate-400 text-[10px] font-bold uppercase tracking-widest border-b border-slate-50">
                        <th class="pb-4 px-4">Nama Kegiatan</th>
                        <th class="pb-4 px-4">Lokasi</th>
                        <th class="pb-4 px-4">Tanggal</th>
                        <th class="pb-4 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-slate-600 text-sm">
                    @forelse($activities as $activity)
                        <tr class="border-b border-slate-50 hover:bg-slate-50/50 transition duration-200">
                            <td class="py-4 px-4 font-bold text-slate-800 dark:text-white">{{ $activity->name }}</td>
                            <td class="py-4 px-4 text-slate-500">{{ $activity->location }}</td>
                            <td class="py-4 px-4 text-slate-400">{{ date('d M Y', strtotime($activity->date)) }}</td>
                            <td class="py-4 px-4 text-right space-x-3">
                                <a href="{{ route($prefix . '.activity.show', $activity) }}"
                                    class="text-primary hover:underline font-bold">Detail</a>
                                <a href="{{ route($prefix . '.activity.edit', $activity) }}"
                                    class="text-sky-500 hover:underline font-bold">Edit</a>
                                <form action="{{ route($prefix . '.activity.destroy', $activity) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('Hapus kegiatan ini?')"
                                        class="text-red-400 hover:text-red-600 font-bold transition">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-12 text-center text-slate-300 italic">Belum ada data kegiatan tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-8">
            {{ $activities->links() }}
        </div>
    </div>
@endsection