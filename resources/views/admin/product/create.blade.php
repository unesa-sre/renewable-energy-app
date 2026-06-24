@extends('layouts.dashboard')

@section('title', 'Add New Product')
@section('page_title', 'Tambah Produk Baru')

@section('content')
<div class="max-w-2xl mx-auto animate-in fade-in slide-in-from-bottom-4 duration-700">
    <div class="main-card p-10">
        <div class="mb-10 text-center">
            <h2 class="text-2xl font-black text-slate-800 dark:text-white">Detail Produk Merch</h2>
            <p class="text-sm text-slate-400 mt-2">Daftarkan merchandise ramah lingkungan terbaru.</p>
            <div class="h-1 w-12 bg-emerald-500 mx-auto mt-4 rounded-full"></div>
        </div>

        <form action="{{ route($prefix . '.product.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Nama Produk</label>
                <input type="text" name="name" class="w-full px-5 py-4 rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition outline-none text-slate-700 dark:text-slate-200 font-semibold" placeholder="Contoh: Tumbler Bambu" value="{{ old('name') }}">
                @error('name') <p class="text-red-500 text-[10px] mt-2 font-bold uppercase tracking-tight">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Kategori Produk</label>
                <select name="category" class="w-full px-5 py-4 rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition outline-none text-slate-700 dark:text-slate-200 font-semibold appearance-none cursor-pointer">
                    <option value="Apparel" {{ old('category') == 'Apparel' ? 'selected' : '' }}>Apparel</option>
                    <option value="Other" {{ old('category') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('category') <p class="text-red-500 text-[10px] mt-2 font-bold uppercase tracking-tight">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Harga (IDR)</label>
                <div class="relative">
                    <span class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 font-black text-xs uppercase tracking-widest">Rp</span>
                    <input type="number" name="price" class="w-full pl-14 pr-5 py-4 rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition outline-none text-slate-700 dark:text-slate-200 font-semibold" placeholder="0" value="{{ old('price') }}">
                </div>
                @error('price') <p class="text-red-500 text-[10px] mt-2 font-bold uppercase tracking-tight">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Deskripsi Produk</label>
                <textarea name="description" id="desc-input-create" class="hidden">{{ old('description') }}</textarea>
                <div id="quill-create"
                    class="rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200"
                    style="min-height: 200px;"></div>
                @error('description') <p class="text-red-500 text-[10px] mt-2 font-bold uppercase tracking-tight">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Link Pembelian (Opsional)</label>
                <div class="relative">
                    <span class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                    </span>
                    <input type="url" name="order_link" class="w-full pl-14 pr-5 py-4 rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition outline-none text-slate-700 dark:text-slate-200 font-semibold" placeholder="https://shopee.co.id/..." value="{{ old('order_link') }}">
                </div>
                @error('order_link') <p class="text-red-500 text-[10px] mt-2 font-bold uppercase tracking-tight">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Gambar Produk (Bisa lebih dari 1 foto, Max 4)</label>
                <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-slate-200 dark:border-slate-700 border-dashed rounded-2xl cursor-pointer bg-slate-50 dark:bg-slate-800/50 hover:bg-slate-100 dark:hover:bg-slate-800 transition duration-300 relative overflow-hidden">
                    <div id="image-placeholder" class="flex flex-col items-center justify-center pt-5 pb-6 text-slate-400">
                        <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-center px-4">Pilih Foto (Max 4)</p>
                    </div>
                    <div id="image-preview-container" class="hidden absolute inset-0 w-full h-full bg-slate-100 dark:bg-slate-800 flex gap-2 p-2 items-center justify-center overflow-x-auto"></div>
                    <input type="file" name="images[]" id="image-input" class="hidden" multiple accept="image/*" />
                </label>
                @error('images') <p class="text-red-500 text-[10px] mt-2 font-bold uppercase tracking-tight">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-3 p-5 bg-blue-50 dark:bg-blue-900/10 border border-blue-100 dark:border-blue-800 rounded-2xl">
                <input type="checkbox" name="is_special" id="is_special" class="w-5 h-5 rounded text-blue-600 focus:ring-blue-500 border-slate-300 transition cursor-pointer" {{ old('is_special') ? 'checked' : '' }}>
                <label for="is_special" class="text-xs font-black uppercase tracking-widest text-blue-800 dark:text-blue-300 cursor-pointer">Set as Special Merch (Featured Blue Section)</label>
            </div>

            <div class="pt-6 flex flex-col sm:flex-row gap-4">
                <button type="submit" class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white py-4 rounded-2xl font-black text-sm uppercase tracking-widest transition shadow-xl shadow-emerald-500/20">
                    Simpan Produk
                </button>
                <a href="{{ route($prefix . '.product.index') }}" class="flex-1 text-center py-4 text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 font-black text-sm uppercase tracking-widest transition rounded-2xl">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
{{-- Quill CDN --}}
<link href="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.snow.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.js"></script>

<style>
#quill-create .ql-toolbar {
    border-radius: 1rem 1rem 0 0 !important;
    border-color: #e2e8f0 !important;
    background: #f8fafc;
    font-family: inherit;
}
#quill-create .ql-container {
    border-radius: 0 0 1rem 1rem !important;
    border-color: #e2e8f0 !important;
    font-family: inherit;
    font-size: 0.95rem;
    min-height: 200px;
}
#quill-create .ql-editor {
    min-height: 200px;
    padding: 1.25rem;
    line-height: 1.75;
    color: #334155;
}
#quill-create .ql-editor.ql-blank::before {
    color: #94a3b8;
    font-style: normal;
    font-size: 0.9rem;
}
.dark #quill-create .ql-toolbar { background: #1e293b; border-color: #334155 !important; }
.dark #quill-create .ql-container { border-color: #334155 !important; background: #1e293b; }
.dark #quill-create .ql-editor { color: #e2e8f0; }
.dark .ql-snow .ql-stroke { stroke: #94a3b8; }
.dark .ql-snow .ql-fill  { fill: #94a3b8; }
.dark .ql-snow .ql-picker-label { color: #94a3b8; }
</style>

<script>
(function() {
    // Quill editor
    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        ['blockquote'],
        [{ 'header': [1, 2, 3, false] }],
        ['clean']
    ];

    var quill = new Quill('#quill-create', {
        theme: 'snow',
        placeholder: 'Deskripsikan produk secara detail...',
        modules: { toolbar: toolbarOptions }
    });

    var oldDesc = document.getElementById('desc-input-create').value;
    if (oldDesc) {
        quill.clipboard.dangerouslyPasteHTML(oldDesc);
    }

    var form = document.querySelector('form[action*="product"]');
    if (form) {
        form.addEventListener('submit', function() {
            document.getElementById('desc-input-create').value = quill.getSemanticHTML();
        });
    }

    // Image preview for multiple files
    var input = document.getElementById('image-input');
    var container = document.getElementById('image-preview-container');
    var placeholder = document.getElementById('image-placeholder');

    if (input && container && placeholder) {
        input.addEventListener('change', function() {
            container.innerHTML = ''; // clear old
            if (this.files && this.files.length > 0) {
                var max = Math.min(this.files.length, 4);
                for (let i = 0; i < max; i++) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        let img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'h-full w-auto object-cover rounded-lg shadow-sm aspect-square';
                        container.appendChild(img);
                    }
                    reader.readAsDataURL(this.files[i]);
                }
                container.classList.remove('hidden');
                placeholder.classList.add('hidden');
            } else {
                container.classList.add('hidden');
                placeholder.classList.remove('hidden');
            }
        });
    }
})();
</script>
@endsection
