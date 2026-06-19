@extends('layouts.dashboard')

@section('title', 'Manage Products')
@section('page_title', 'Manajemen Produk')

@section('content')
    <div class="main-card p-8 animate-in fade-in duration-700">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <div>
                <h2 class="text-xl font-bold text-slate-800">Daftar Produk</h2>
                <p class="text-sm text-slate-400 mt-1">Kelola merchandise dan produk ramah lingkungan.</p>
            </div>
            @if(Auth::user()->role === 'admin' || Auth::user()->role === 'anggota')
                <a href="{{ route($prefix . '.product.create') }}"
                    class="bg-primary hover:bg-emerald-600 text-white px-6 py-2.5 rounded-xl font-bold text-sm transition shadow-lg shadow-emerald-500/20 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Produk
                </a>
            @endif
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
                        <th class="pb-4 px-4">Info Produk</th>
                        <th class="pb-4 px-10">Harga</th>
                        <th class="pb-4 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-slate-600 text-sm">
                    @forelse($products as $product)
                        <tr class="border-b border-slate-50 hover:bg-slate-50/50 transition duration-200">
                            <td class="py-4 px-4 flex items-center gap-4">
                                <div class="w-12 h-12 bg-slate-100 rounded-lg flex items-center justify-center text-slate-300">
                                    @if($product->image && is_array($product->image) && count($product->image) > 0)
                                        <img src="{{ asset('storage/' . $product->image[0]) }}"
                                            class="w-full h-full object-cover rounded-lg">
                                    @else
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                        </svg>
                                    @endif
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-800">{{ $product->name }}</span>
                                    @if($product->is_special)
                                        <span
                                            class="text-[9px] bg-blue-100 text-blue-600 px-2 py-0.5 rounded-full font-black uppercase w-fit mt-1">Special
                                            Merch</span>
                                    @endif
                                </div>
                            </td>
                            <td class="py-4 px-10 font-bold text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}
                            </td>
                            <td class="py-4 px-4 text-right space-x-3">
                                @if(Auth::user()->role === 'admin' || Auth::user()->role === 'anggota')
                                    <a href="{{ route($prefix . '.product.edit', $product) }}"
                                        class="text-sky-500 hover:underline font-bold">Edit</a>
                                    <form action="{{ route($prefix . '.product.destroy', $product) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" onclick="return confirm('Hapus produk ini?')"
                                            class="text-red-400 hover:text-red-600 font-bold transition">Hapus</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-12 text-center text-slate-300 italic">Belum ada data produk tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </div>
@endsection