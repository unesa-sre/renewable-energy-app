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
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Deskripsi Kegiatan</label>
                    {{-- Hidden textarea for form submission --}}
                    <textarea name="description" id="description-input-create" class="hidden">{{ old('description') }}</textarea>
                    {{-- Quill editor container --}}
                    <div id="quill-create"
                        class="rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200"
                        style="min-height: 160px;"></div>
                    @error('description') <p class="text-red-500 text-[10px] mt-2 font-bold uppercase tracking-tight">{{ $message }}</p> @enderror
                </div>

                {{-- Participants --}}
                <div>
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Peserta Kegiatan</label>
                    <p class="text-[11px] text-slate-400 mb-3 font-medium">Ketik nama peserta, pisahkan dengan <strong>koma</strong> atau <strong>enter baru</strong>.</p>
                    <textarea name="participants" rows="4" id="participants-create"
                        class="w-full px-5 py-4 rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-sky-500 focus:ring-4 focus:ring-sky-500/10 transition outline-none text-slate-700 dark:text-slate-200 font-semibold resize-none"
                        placeholder="Contoh: Budi Santoso, Rina Kurnia, Ahmad Fauzi&#10;(Ketik satu nama per baris atau pisahkan dengan koma)">{{ old('participants') }}</textarea>
                    <div id="participants-preview-create" class="mt-3 flex flex-wrap gap-2 hidden"></div>
                    @error('participants') <p class="text-red-500 text-[10px] mt-2 font-bold uppercase tracking-tight">{{ $message }}</p> @enderror
                </div>

                {{-- Poster & Gallery Images --}}
                <div>
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-1">Foto Kegiatan</label>
                    <p class="text-[11px] text-slate-400 mb-4 font-medium">1 foto <strong>Poster</strong> utama + hingga 3 foto <strong>Galeri</strong> tambahan.</p>

                    {{-- Layout: Poster besar kiri + 3 slot kanan --}}
                    <div class="grid grid-cols-4 gap-3" style="height: 220px;">

                        {{-- Poster (col-span-2) --}}
                        <label id="poster-label-create" class="col-span-2 relative flex flex-col items-center justify-center border-2 border-slate-200 dark:border-slate-700 border-dashed rounded-2xl cursor-pointer bg-slate-50 dark:bg-slate-800/50 hover:bg-slate-100 dark:hover:bg-slate-800 transition overflow-hidden group h-full">
                            <div id="poster-placeholder-create" class="flex flex-col items-center gap-2 text-slate-400">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span class="text-[10px] font-black uppercase tracking-widest">Poster Utama</span>
                            </div>
                            <img id="poster-preview-create" src="" class="absolute inset-0 w-full h-full object-cover hidden rounded-2xl" />
                            <div class="absolute bottom-2 left-2 bg-[#009150] text-white text-[9px] font-black uppercase tracking-widest px-2 py-1 rounded-full">Poster</div>
                            <input type="file" name="image" id="poster-input-create" class="hidden" accept="image/*" />
                        </label>

                        {{-- 3 Gallery Slots (col-span-1 each) --}}
                        <div class="col-span-2 grid grid-rows-3 gap-3 h-full">
                            @for($g = 0; $g < 3; $g++)
                            <label id="gallery-label-create-{{ $g }}" class="relative flex items-center justify-center border-2 border-slate-200 dark:border-slate-700 border-dashed rounded-xl cursor-pointer bg-slate-50 dark:bg-slate-800/50 hover:bg-slate-100 transition overflow-hidden">
                                <div id="gallery-placeholder-create-{{ $g }}" class="flex items-center gap-2 text-slate-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                    <span class="text-[9px] font-black uppercase tracking-widest">Foto {{ $g + 1 }}</span>
                                </div>
                                <img id="gallery-preview-create-{{ $g }}" src="" class="absolute inset-0 w-full h-full object-cover hidden rounded-xl" />
                                <input type="file" name="gallery_images[{{ $g }}]" id="gallery-input-create-{{ $g }}" class="hidden" accept="image/*" />
                            </label>
                            @endfor
                        </div>

                    </div>
                    @error('image') <p class="text-red-500 text-[10px] mt-2 font-bold uppercase tracking-tight">{{ $message }}</p> @enderror
                    @error('gallery_images.*') <p class="text-red-500 text-[10px] mt-2 font-bold uppercase tracking-tight">{{ $message }}</p> @enderror
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

@section('scripts')
{{-- Quill CDN --}}
<link href="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.snow.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.js"></script>

<style>
/* Match Quill toolbar to dashboard theme */
#quill-create .ql-toolbar,
#quill-edit .ql-toolbar {
    border-radius: 1rem 1rem 0 0 !important;
    border-color: #e2e8f0 !important;
    background: #f8fafc;
    font-family: inherit;
}
#quill-create .ql-container,
#quill-edit .ql-container {
    border-radius: 0 0 1rem 1rem !important;
    border-color: #e2e8f0 !important;
    font-family: inherit;
    font-size: 0.95rem;
    min-height: 140px;
}
#quill-create .ql-editor,
#quill-edit .ql-editor {
    min-height: 140px;
    padding: 1rem 1.25rem;
    line-height: 1.75;
    color: #334155;
}
#quill-create .ql-editor.ql-blank::before,
#quill-edit .ql-editor.ql-blank::before {
    color: #94a3b8;
    font-style: normal;
    font-size: 0.9rem;
}
.dark #quill-create .ql-toolbar,
.dark #quill-edit .ql-toolbar {
    background: #1e293b;
    border-color: #334155 !important;
}
.dark #quill-create .ql-container,
.dark #quill-edit .ql-container {
    border-color: #334155 !important;
    background: #1e293b;
    color: #e2e8f0;
}
.dark #quill-create .ql-editor,
.dark #quill-edit .ql-editor { color: #e2e8f0; }
.dark .ql-snow .ql-stroke { stroke: #94a3b8; }
.dark .ql-snow .ql-fill  { fill:   #94a3b8; }
.dark .ql-snow .ql-picker-label { color: #94a3b8; }
</style>

<script>
(function () {
    // ---- Quill rich text editor (Create) ----
    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        ['blockquote'],
        [{ 'header': [1, 2, 3, false] }],
        ['clean']
    ];

    var quillCreate = new Quill('#quill-create', {
        theme: 'snow',
        placeholder: 'Ceritakan tentang kegiatan ini, tujuan, dan hal yang akan dilakukan...',
        modules: { toolbar: toolbarOptions }
    });

    // Pre-fill with old value if validation failed
    var oldDesc = document.getElementById('description-input-create').value;
    if (oldDesc) {
        quillCreate.clipboard.dangerouslyPasteHTML(oldDesc);
    }

    // Sync to hidden textarea before submit
    var form = document.querySelector('form[action*="activity"]');
    if (form) {
        form.addEventListener('submit', function () {
            document.getElementById('description-input-create').value = quillCreate.getSemanticHTML();
        });
    }

    // ---- Participants tag preview ----
    function renderTags(textarea, preview) {
        var val = textarea.value.trim();
        if (!val) { preview.classList.add('hidden'); preview.innerHTML = ''; return; }
        var names = val.split(/[\n,]+/).map(s => s.trim()).filter(Boolean);
        if (!names.length) { preview.classList.add('hidden'); preview.innerHTML = ''; return; }
        preview.classList.remove('hidden');
        preview.innerHTML = names.map(n =>
            '<span class="inline-flex items-center gap-1 bg-sky-50 border border-sky-200 text-sky-700 text-xs font-bold px-3 py-1 rounded-full">' +
            '<svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>' +
            n + '</span>'
        ).join('');
    }
    var ta = document.getElementById('participants-create');
    var pv = document.getElementById('participants-preview-create');
    if (ta && pv) {
        ta.addEventListener('input', function () { renderTags(ta, pv); });
        renderTags(ta, pv);
    }

    // ---- Image preview helper ----
    function bindPreview(inputId, previewId, placeholderId) {
        var input = document.getElementById(inputId);
        var preview = document.getElementById(previewId);
        var placeholder = document.getElementById(placeholderId);
        if (!input || !preview) return;
        input.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    if (placeholder) placeholder.classList.add('hidden');
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    }

    // Poster
    bindPreview('poster-input-create', 'poster-preview-create', 'poster-placeholder-create');
    // Gallery slots
    for (var g = 0; g < 3; g++) {
        bindPreview('gallery-input-create-' + g, 'gallery-preview-create-' + g, 'gallery-placeholder-create-' + g);
    }
})();
</script>
@endsection
@endsection