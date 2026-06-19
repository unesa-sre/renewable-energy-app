@extends('layouts.dashboard')

@section('title', 'Edit Product')
@section('page_title', 'Perbarui Informasi Produk')

@section('content')
<div class="main-card p-8 animate-in fade-in duration-700 max-w-2xl">
    <div class="mb-8">
        <h2 class="text-xl font-bold text-slate-800">Edit Produk</h2>
        <p class="text-sm text-slate-400 mt-1">Ubah informasi produk merchandise yang sudah ada.</p>
    </div>

    <form action="{{ route($prefix . '.product.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf @method('PUT')
        
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Nama Produk</label>
            <input type="text" name="name" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition outline-none" placeholder="Contoh: Tumbler Stainless Steel" value="{{ old('name', $product->name) }}">
            @error('name') <p class="text-red-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Kategori Produk</label>
            <select name="category" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition outline-none appearance-none cursor-pointer">
                <option value="Apparel" {{ old('category', $product->category) == 'Apparel' ? 'selected' : '' }}>Apparel</option>
                <option value="Other" {{ old('category', $product->category) == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('category') <p class="text-red-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Harga (Rupiah)</label>
            <div class="relative">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 font-bold text-sm">Rp</span>
                <input type="number" name="price" class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition outline-none" placeholder="0" value="{{ old('price', $product->price) }}">
            </div>
            @error('price') <p class="text-red-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2" Deskripsi Produk</label>
            <textarea name="description" rows="5" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition outline-none resize-none" placeholder="Jelaskan keunggulan dan spesifikasi produk...">{{ old('description', $product->description) }}</textarea>
            @error('description') <p class="text-red-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Link Pembelian / Tujuan Order (Opsional)</label>
            <div class="relative">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                </span>
                <input type="url" name="order_link" class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 focus:border-primary focus:ring-4 focus:ring-primary/10 transition outline-none" placeholder="https://..." value="{{ old('order_link', $product->order_link) }}">
            </div>
            @error('order_link') <p class="text-red-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Foto Produk (Max 4)</label>
            <div class="space-y-4 mb-4">
                @if($product->image && is_array($product->image))
                <div class="flex flex-wrap gap-3">
                    @foreach($product->image as $img)
                    <div class="relative group">
                        <img src="{{ asset('storage/'.$img) }}" class="w-20 h-20 rounded-lg object-cover border-2 border-slate-100 shadow-sm">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition rounded-lg flex items-center justify-center">
                            <span class="text-[8px] text-white font-black uppercase">Current</span>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
                
                <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-slate-200 border-dashed rounded-xl cursor-pointer bg-slate-50 hover:bg-slate-100/50 transition duration-300">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        <p class="text-xs text-slate-400 font-bold">Upload Foto Baru (Akan menggantikan semua foto lama)</p>
                    </div>
                    <input type="file" name="images[]" class="hidden" multiple />
                </label>
            </div>
            @error('images') <p class="text-red-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center gap-3 p-5 bg-blue-50 border border-blue-100 rounded-2xl">
            <input type="checkbox" name="is_special" id="is_special" class="w-5 h-5 rounded text-blue-600 focus:ring-blue-500 border-slate-300 transition cursor-pointer" {{ old('is_special', $product->is_special) ? 'checked' : '' }}>
            <label for="is_special" class="text-xs font-black uppercase tracking-widest text-blue-800 cursor-pointer">Set as Special Merch (Featured Blue Section)</label>
        </div>

        <div class="pt-6 flex gap-4">
            <button type="submit" class="bg-primary hover:bg-emerald-600 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg shadow-emerald-500/20 active:scale-95">Update Produk</button>
            <a href="{{ route($prefix . '.product.index') }}" class="px-8 py-3 text-slate-500 font-bold hover:bg-slate-100 rounded-xl transition">Batal</a>
        </div>
    </form>
</div>
@endsection
