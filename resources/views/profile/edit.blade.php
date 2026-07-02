@extends('layouts.dashboard')

@section('title', 'Manage Profile')
@section('page_title', 'Pengaturan Pengguna')

@section('content')
<div class="max-w-4xl mx-auto space-y-8 animate-in fade-in slide-in-from-bottom-4 duration-700">
    
    <!-- Profile Info Card -->
    <div class="main-card p-10">
        <div class="mb-8">
            <h2 class="text-xl font-black text-slate-800 dark:text-white uppercase tracking-tighter">Informasi Profil</h2>
            <p class="text-sm text-slate-400 mt-1">Perbarui nama dan alamat email akun Anda.</p>
        </div>
        <div class="max-w-xl">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    <!-- Password Card -->
    <div class="main-card p-10">
        <div class="mb-8">
            <h2 class="text-xl font-black text-slate-800 dark:text-white uppercase tracking-tighter">Keamanan</h2>
            <p class="text-sm text-slate-400 mt-1">Pastikan akun Anda menggunakan kata sandi yang kuat.</p>
        </div>
        <div class="max-w-xl text-slate-800 dark:text-slate-200">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    <!-- Delete Account -->
    <div class="main-card p-10 border-red-100 dark:border-red-900/30">
        <div class="mb-8">
            <h2 class="text-xl font-black text-red-600 uppercase tracking-tighter">Hapus Akun</h2>
            <p class="text-sm text-slate-400 mt-1">Semua data akan dihapus secara permanen. Tindakan ini tidak dapat dibatalkan.</p>
        </div>
        <div class="max-w-xl">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Styling for Breeze partials to match premium UI */
    input[type="text"], input[type="email"], input[type="password"] {
        width: 100%;
        padding: 0.75rem 1rem;
        border-radius: 1rem;
        border: 1px solid #e2e8f0;
        background-color: transparent;
        transition: all 0.2s;
    }
    .dark input[type="text"], .dark input[type="email"], .dark input[type="password"] {
        border-color: #334155;
        color: #f1f5f9;
    }
    input:focus {
        outline: none;
        border-color: #10b981 !important;
        box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
    }
    button[type="submit"] {
        background-color: #10b981;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 1rem;
        font-weight: 700;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        transition: all 0.2s;
    }
    button[type="submit"]:hover {
        background-color: #059669;
        transform: translateY(-1px);
    }
    .text-gray-600 { color: #94a3b8; font-size: 0.875rem; }
    .dark .text-gray-600 { color: #64748b; }
    .text-sm { font-size: 0.8rem; }
</style>
@endsection
