@extends('layouts.dashboard')

@section('title', 'Manage Users')
@section('page_title', 'Manajemen Pengguna')

@section('content')
<div class="main-card p-8 animate-in fade-in duration-700">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div>
            <h2 class="text-xl font-bold text-slate-800 dark:text-white">Daftar Pengguna</h2>
            <p class="text-sm text-slate-400 mt-1">Kelola akun admin dan anggota komunitas.</p>
        </div>
        <a href="{{ route('admin.user.create') }}" class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-2xl text-xs font-black uppercase tracking-widest transition shadow-lg shadow-red-500/20">
            Tambah User
        </a>
    </div>

    @if(session('success'))
    <div class="bg-emerald-50 text-primary p-4 rounded-xl border border-emerald-100 mb-6 text-sm font-bold flex items-center gap-3">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-50 text-red-500 p-4 rounded-xl border border-red-100 mb-6 text-sm font-bold flex items-center gap-3">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
        {{ session('error') }}
    </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="text-slate-400 text-[10px] font-bold uppercase tracking-widest border-b border-slate-50 dark:border-slate-800">
                    <th class="pb-4 px-4">Nama Pengguna</th>
                    <th class="pb-4 px-4">Email</th>
                    <th class="pb-4 px-4 text-center">Role</th>
                    <th class="pb-4 px-4 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-slate-600 text-sm">
                @foreach($users as $u)
                <tr class="border-b border-slate-50 dark:border-slate-800 hover:bg-slate-50/50 dark:hover:bg-slate-800/50 transition duration-200">
                    <td class="py-4 px-4 flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-[10px] font-bold text-slate-400">
                            {{ substr($u->name, 0, 1) }}
                        </div>
                        <span class="font-bold text-slate-800 dark:text-slate-200">{{ $u->name }} @if($u->id === auth()->id()) <span class="text-[8px] bg-slate-100 dark:bg-slate-800 px-1 py-0.5 rounded ml-1 italic">(Anda)</span> @endif</span>
                    </td>
                    <td class="py-4 px-4 text-slate-500">{{ $u->email }}</td>
                    <td class="py-4 px-4 text-center">
                        <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider {{ $u->role === 'admin' ? 'bg-red-50 text-red-500' : 'bg-emerald-50 text-emerald-600' }}">
                            {{ $u->role }}
                        </span>
                    </td>
                    <td class="py-4 px-4 text-right space-x-3">
                        <a href="{{ route('admin.user.edit', $u) }}" class="text-sky-500 hover:underline font-bold transition">Edit</a>
                        @if($u->id !== auth()->id())
                        <form action="{{ route('admin.user.destroy', $u) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus pengguna ini secara permanen?')" class="text-red-400 hover:text-red-600 font-bold transition">Hapus</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-8">
        {{ $users->links() }}
    </div>
</div>
@endsection
