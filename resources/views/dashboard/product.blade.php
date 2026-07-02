@extends('layouts.dashboard')

@section('title', 'Katalog Produk')
@section('page_title', 'Merchandise & Solusi')

@section('content')
<div class="space-y-8 animate-in fade-in slide-in-from-bottom-4 duration-700">
    <!-- Search / Cart Status -->
    <div class="flex flex-col md:flex-row gap-6 justify-between items-center">
        <div class="relative w-full md:w-96">
            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </span>
            <input type="text" placeholder="Cari merch atau solusi..." class="w-full pl-12 pr-4 py-3 bg-white dark:bg-slate-800 border border-slate-100 dark:border-slate-700 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition text-sm">
        </div>
        <a href="{{ route('member.cart.index') }}" class="flex items-center gap-3 px-6 py-3 bg-white dark:bg-slate-800 border border-slate-100 dark:border-slate-700 rounded-2xl hover:shadow-lg transition group">
            <div class="text-right">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Keranjang</p>
                <p class="text-sm font-black text-slate-800 dark:text-white">Lihat Pesanan</p>
            </div>
            <div class="w-10 h-10 bg-emerald-50 dark:bg-emerald-900/20 text-primary rounded-xl flex items-center justify-center group-hover:bg-primary group-hover:text-white transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
            </div>
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse($products as $product)
        <div class="main-card overflow-hidden group hover:-translate-y-2 transition duration-500 flex flex-col">
            <div class="relative h-64 bg-slate-50 dark:bg-slate-800 flex items-center justify-center p-8 shrink-0">
                @if($product->image && is_array($product->image) && count($product->image) > 0)
                    <img src="{{ asset('storage/' . $product->image[0]) }}" alt="{{ $product->name }}" class="max-h-full max-w-full object-contain mix-blend-multiply dark:mix-blend-normal transition duration-500 group-hover:scale-110">
                @elseif($product->image && is_string($product->image))
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="max-h-full max-w-full object-contain mix-blend-multiply dark:mix-blend-normal transition duration-500 group-hover:scale-110">
                @else
                    <svg class="w-20 h-20 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                @endif
                
                @if($product->stock <= 5)
                <div class="absolute top-4 left-4 bg-rose-500 text-white text-[9px] font-black uppercase tracking-tighter px-2 py-1 rounded shadow-sm">
                    Stok Terbatas
                </div>
                @endif
            </div>
            <div class="p-6 flex-1 flex flex-col">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">{{ $product->category ?? 'Merchandise' }}</p>
                <h3 class="font-bold text-slate-800 dark:text-white group-hover:text-primary transition line-clamp-2 leading-snug mb-4">{{ $product->name }}</h3>
                <div class="mt-auto">
                    <div class="flex items-center justify-between mb-6">
                        <span class="text-lg font-black text-primary">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                        <span class="text-xs text-slate-400">Tersedia: {{ $product->stock }}</span>
                    </div>
                    <form action="{{ route('member.cart.add', $product->id) }}" method="GET">
                        <button type="submit" class="w-full py-3 bg-slate-100 dark:bg-slate-800 text-slate-800 dark:text-white rounded-xl font-black text-xs uppercase tracking-widest hover:bg-primary hover:text-white transition shadow-sm border border-slate-200/50 dark:border-slate-700">
                            Tambah ke Cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full py-20 text-center">
             <h3 class="text-xl font-bold text-slate-400">Belum ada produk untuk saat ini.</h3>
        </div>
        @endforelse
    </div>

    <div class="mt-12">
        {{ $products->links() }}
    </div>
</div>
@endsection
