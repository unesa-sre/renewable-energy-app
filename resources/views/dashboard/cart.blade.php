@extends('layouts.dashboard')

@section('title', 'Keranjang Saya')
@section('page_title', 'Checkout Kontribusi')

@section('content')
<div class="space-y-8 animate-in fade-in slide-in-from-bottom-4 duration-700">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-bold text-slate-800 dark:text-white flex items-center gap-2">
            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
            Review Keranjang
        </h2>
        <a href="{{ route('member.product') }}" class="text-sm font-bold text-primary hover:underline flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali Belanja
        </a>
    </div>

    @if(session('cart') && count(session('cart')) > 0)
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
        <!-- Item List -->
        <div class="lg:col-span-2 space-y-4">
            @foreach(session('cart') as $id => $details)
            <div class="main-card p-6 flex items-center gap-6 group">
                <div class="w-24 h-24 shrink-0 bg-slate-50 dark:bg-slate-800 rounded-2xl p-4 flex items-center justify-center">
                    @if($details['image'] && is_array($details['image']) && count($details['image']) > 0)
                        <img src="{{ asset('storage/'.$details['image'][0]) }}" class="max-h-full max-w-full object-contain mix-blend-multiply dark:mix-blend-normal">
                    @elseif($details['image'] && is_string($details['image']))
                        <img src="{{ asset('storage/'.$details['image']) }}" class="max-h-full max-w-full object-contain mix-blend-multiply dark:mix-blend-normal">
                    @else
                        <svg class="w-10 h-10 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    @endif
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-slate-800 dark:text-white text-lg leading-tight">{{ $details['name'] }}</h3>
                    <p class="text-sm text-slate-400 mt-1">Harga Satuan: Rp {{ number_format($details['price'], 0, ',', '.') }}</p>
                    <div class="flex items-center gap-4 mt-3">
                         <span class="text-xs font-black text-primary px-2 py-1 bg-emerald-50 dark:bg-emerald-900/20 rounded">JUMLAH: {{ $details['quantity'] }}</span>
                         <span class="text-xs text-slate-300">|</span>
                         <form action="{{ route('member.cart.remove') }}" method="POST">
                            @csrf @method('DELETE')
                            <input type="hidden" name="id" value="{{ $id }}">
                            <button type="submit" class="text-xs font-bold text-rose-500 hover:underline">Hapus Item</button>
                        </form>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Subtotal</p>
                    <p class="text-lg font-black text-slate-800 dark:text-white">Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Order Summary -->
        <div class="main-card p-8 bg-slate-900 text-white relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-emerald-500/20 rounded-full blur-3xl"></div>
            <h3 class="text-lg font-bold mb-8">Ringkasan Pesanan</h3>
            
            <div class="space-y-4 mb-10">
                <div class="flex justify-between text-slate-400 text-sm">
                    <span>Subtotal Produk</span>
                    <span class="text-white font-bold">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-slate-400 text-sm">
                    <span>Biaya Layanan</span>
                    <span class="text-white font-bold">Rp 0</span>
                </div>
                <div class="h-px bg-white/10 my-4"></div>
                <div class="flex justify-between items-center">
                    <span class="text-sm font-bold uppercase tracking-widest text-emerald-400">Total Harga</span>
                    <span class="text-2xl font-black">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
            </div>

            <form action="{{ route('member.cart.checkout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full py-4 bg-primary hover:bg-emerald-600 rounded-2xl font-black text-sm uppercase tracking-wider transition shadow-lg shadow-primary/20">
                    Proses Pembayaran
                </button>
            </form>
            
            <p class="text-[10px] text-center text-slate-500 mt-6 leading-relaxed">
                Setiap pembelian Anda mendukung riset energi terbarukan komunitas berkelanjutan.
            </p>
        </div>
    </div>
    @else
    <div class="main-card p-20 text-center">
        <div class="w-24 h-24 bg-slate-50 dark:bg-slate-800 rounded-full flex items-center justify-center mx-auto mb-8 text-slate-300">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        </div>
        <h3 class="text-2xl font-bold text-slate-800 dark:text-white">Keranjang Kosong</h3>
        <p class="text-slate-500 mt-2 max-w-sm mx-auto">Anda belum memilih merchandise apa pun. Mari temukan hal-hal menarik di katalog kami.</p>
        <a href="{{ route('member.product') }}" class="inline-block mt-8 px-10 py-5 bg-primary hover:bg-emerald-600 text-white rounded-2xl font-bold transition shadow-xl shadow-primary/20">
            Jelajahi Produk
        </a>
    </div>
    @endif
</div>
@endsection
