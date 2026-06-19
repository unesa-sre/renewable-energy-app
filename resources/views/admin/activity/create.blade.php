@extends('layouts.dashboard')

@section('title', 'Add New Activity')
@section('page_title', 'Buat Agenda Kegiatan')

@section('content')
    <div class="max-w-3xl mx-auto animate-in fade-in slide-in-from-bottom-4 duration-700">
        <div class="main-card p-10">
            <div class="mb-10 text-center">
                <h2 class="text-2xl font-black text-slate-800 dark:text-white">Detail Kegiatan</h2>
                <p class="text-sm text-slate-400 mt-2">Daftarkan kegiatan lingkungan baru untuk komunitas.</p>
                <div class="h-1 w-12 bg-sky-500 mx-auto mt-4 rounded-full"></div>
            </div>

            <form action="{{ route($prefix . '.activity.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf

                <div>
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Nama
                        Kegiatan</label>
                    <input type="text" name="name"
                        class="w-full px-5 py-4 rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-sky-500 focus:ring-4 focus:ring-sky-500/10 transition outline-none text-slate-700 dark:text-slate-200 font-semibold"
                        placeholder="Contoh: Bersih-bersih Pantai" value="{{ old('name') }}">
                    @error('name') <p class="text-red-500 text-[10px] mt-2 font-bold uppercase tracking-tight">
                    {{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Lokasi</label>
                        <input type="text" name="location"
                            class="w-full px-5 py-4 rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-sky-500 focus:ring-4 focus:ring-sky-500/10 transition outline-none text-slate-700 dark:text-slate-200 font-semibold"
                            placeholder="Nama Tempat/Kota" value="{{ old('location') }}">
                        @error('location') <p class="text-red-500 text-[10px] mt-2 font-bold uppercase tracking-tight">
                        {{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label
                            class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Tanggal</label>
                        <input type="date" name="date"
                            class="w-full px-5 py-4 rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-sky-500 focus:ring-4 focus:ring-sky-500/10 transition outline-none text-slate-700 dark:text-slate-200 font-semibold"
                            value="{{ old('date') }}">
                        @error('date') <p class="text-red-500 text-[10px] mt-2 font-bold uppercase tracking-tight">
                        {{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Poster
                        Kegiatan</label>
                    <div class="flex items-center justify-center w-full">
                        <label
                            class="flex flex-col items-center justify-center w-full h-40 border-2 border-slate-200 dark:border-slate-700 border-dashed rounded-2xl cursor-pointer bg-slate-50 dark:bg-slate-800/50 hover:bg-slate-100 dark:hover:bg-slate-800 transition duration-300">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6 text-slate-400">
                                <svg class="w-10 h-10 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <p class="text-xs font-bold uppercase tracking-widest">Pilih Gambar</p>
                            </div>
                            <input type="file" name="image" class="hidden" />
                        </label>
                    </div>
                    @error('image') <p class="text-red-500 text-[10px] mt-2 font-bold uppercase tracking-tight">
                    {{ $message }}</p> @enderror
                </div>

                <div class="pt-6 flex flex-col sm:flex-row gap-4">
                    <button type="submit"
                        class="flex-1 bg-sky-500 hover:bg-sky-600 text-white py-4 rounded-2xl font-black text-sm uppercase tracking-widest transition shadow-xl shadow-sky-500/20 active:scale-[0.98]">
                        Buat Agenda
                    </button>
                    <a href="{{ route($prefix . '.activity.index') }}"
                        class="flex-1 text-center py-4 text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 font-black text-sm uppercase tracking-widest transition rounded-2xl border border-transparent hover:border-slate-100 dark:hover:border-slate-800">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection