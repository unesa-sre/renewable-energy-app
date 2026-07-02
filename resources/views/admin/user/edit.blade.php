@extends('layouts.dashboard')

@section('title', 'Edit User')
@section('page_title', 'Perbarui Akun Pengguna')

@section('content')
    <div class="max-w-3xl mx-auto animate-in fade-in slide-in-from-bottom-4 duration-700">
        <div class="main-card p-10">
            <div class="mb-10 text-center">
                <h2 class="text-2xl font-black text-slate-800 dark:text-white">Edit Pengguna</h2>
                <p class="text-sm text-slate-400 mt-2">Kelola identitas dan hak akses untuk {{ $user->name }}.</p>
                <div class="h-1 w-12 bg-red-500 mx-auto mt-4 rounded-full"></div>
            </div>

            <form action="{{ route('admin.user.update', $user) }}" method="POST" class="space-y-6">
                @csrf @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Nama
                            Lengkap</label>
                        <input type="text" name="name"
                            class="w-full px-5 py-4 rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-red-500 focus:ring-4 focus:ring-red-500/10 transition outline-none text-slate-700 dark:text-slate-200 font-semibold"
                            value="{{ old('name', $user->name) }}">
                        @error('name') <p class="text-red-500 text-[10px] mt-2 font-bold uppercase tracking-tight">
                        {{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Hak Akses
                            (Role)</label>
                        <select name="role"
                            class="w-full px-5 py-4 rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-red-500 focus:ring-4 focus:ring-red-500/10 transition outline-none text-slate-700 dark:text-slate-200 font-semibold appearance-none">
                            <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="anggota" {{ old('role', $user->role) === 'anggota' ? 'selected' : '' }}>Anggota
                            </option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Alamat
                        Email</label>
                    <input type="email" name="email"
                        class="w-full px-5 py-4 rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-red-500 focus:ring-4 focus:ring-red-500/10 transition outline-none text-slate-700 dark:text-slate-200 font-semibold"
                        value="{{ old('email', $user->email) }}">
                    @error('email') <p class="text-red-500 text-[10px] mt-2 font-bold uppercase tracking-tight">
                    {{ $message }}</p> @enderror
                </div>

                <div class="pt-6 border-t border-slate-100 dark:border-slate-800">
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-6">Ubah Password (Kosongkan
                        jika tidak ingin ganti)</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 mb-2">Password Baru</label>
                            <input type="password" name="password"
                                class="w-full px-5 py-4 rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-red-500 transition outline-none text-slate-700 dark:text-slate-200">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 mb-2">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation"
                                class="w-full px-5 py-4 rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-red-500 transition outline-none text-slate-700 dark:text-slate-200">
                        </div>
                    </div>
                    @error('password') <p class="text-red-500 text-[10px] mt-2 font-bold uppercase tracking-tight">
                    {{ $message }}</p> @enderror
                </div>

                <div class="pt-6 flex flex-col sm:flex-row gap-4">
                    <button type="submit"
                        class="flex-1 bg-red-600 hover:bg-red-700 text-white py-4 rounded-2xl font-black text-sm uppercase tracking-widest transition shadow-xl shadow-red-500/20">
                        Update Pengguna
                    </button>
                    <a href="{{ route('admin.user.index') }}"
                        class="flex-1 text-center py-4 text-slate-400 hover:text-slate-600 font-black text-sm uppercase tracking-widest transition rounded-2xl">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection