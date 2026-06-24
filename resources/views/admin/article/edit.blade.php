@extends('layouts.dashboard')

@section('title', 'Edit Article')
@section('page_title', 'Perbarui Artikel')

@section('content')
    <div class="max-w-3xl mx-auto animate-in fade-in slide-in-from-bottom-4 duration-700">
        <div class="main-card p-10">
            <div class="mb-10 text-center">
                <h2 class="text-2xl font-black text-slate-800 dark:text-white">Edit Artikel</h2>
                <p class="text-sm text-slate-400 mt-2">Sesuaikan kembali informasi konten edukasi Anda.</p>
                <div class="h-1 w-12 bg-primary mx-auto mt-4 rounded-full"></div>
            </div>

            <form action="{{ route($prefix . '.article.update', $article) }}" method="POST" enctype="multipart/form-data"
                class="space-y-8">
                @csrf @method('PUT')

                <div>
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Judul
                        Artikel</label>
                    <input type="text" name="title"
                        class="w-full px-5 py-4 rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:border-primary focus:ring-4 focus:ring-primary/10 transition outline-none text-slate-700 dark:text-slate-200 font-semibold"
                        value="{{ old('title', $article->title) }}">
                    @error('title') <p class="text-red-500 text-[10px] mt-2 font-bold uppercase tracking-tight">
                    {{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Konten Artikel</label>
                    <textarea name="content" id="content-input-edit" class="hidden">{{ old('content', $article->content) }}</textarea>
                    <div id="quill-edit"
                        class="rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200"
                        style="min-height: 200px;"></div>
                    @error('content') <p class="text-red-500 text-[10px] mt-2 font-bold uppercase tracking-tight">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3">Gambar Sampul</label>
                    <div class="flex flex-col sm:flex-row items-center gap-6 mb-4">
                        @if($article->image)
                            <div class="shrink-0" id="current-image-container">
                                <img src="{{ asset('storage/' . $article->image) }}"
                                    class="w-32 h-32 rounded-2xl object-cover border-4 border-slate-100 dark:border-slate-800 shadow-sm">
                                <p class="text-[10px] text-center font-black text-slate-400 mt-2 uppercase tracking-widest">Saat Ini</p>
                            </div>
                        @endif
                        <label
                            class="flex flex-col items-center justify-center w-full h-32 border-2 border-slate-200 dark:border-slate-700 border-dashed rounded-2xl cursor-pointer bg-slate-50 dark:bg-slate-800/50 hover:bg-slate-100 dark:hover:bg-slate-800 transition duration-300 overflow-hidden relative">
                            <div id="image-placeholder" class="flex flex-col items-center justify-center pt-5 pb-6 text-slate-400">
                                <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4"></path>
                                </svg>
                                <p class="text-[10px] font-bold uppercase tracking-widest">Ganti Gambar</p>
                            </div>
                            <img id="image-preview" src="" class="hidden absolute inset-0 w-full h-full object-cover">
                            <input type="file" name="image" id="image-input" class="hidden" />
                        </label>
                    </div>
                    @error('image') <p class="text-red-500 text-[10px] mt-2 font-bold uppercase tracking-tight">{{ $message }}</p> @enderror
                </div>

                <div class="pt-6 flex flex-col sm:flex-row gap-4">
                    <button type="submit"
                        class="flex-1 bg-primary hover:bg-emerald-600 text-white py-4 rounded-2xl font-black text-sm uppercase tracking-widest transition shadow-xl shadow-emerald-500/20 active:scale-[0.98]">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route($prefix . '.article.index') }}"
                        class="flex-1 text-center py-4 text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 font-black text-sm uppercase tracking-widest transition rounded-2xl border border-transparent hover:border-slate-100 dark:hover:border-slate-800">
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
#quill-edit .ql-toolbar {
    border-radius: 1rem 1rem 0 0 !important;
    border-color: #e2e8f0 !important;
    background: #f8fafc;
    font-family: inherit;
}
#quill-edit .ql-container {
    border-radius: 0 0 1rem 1rem !important;
    border-color: #e2e8f0 !important;
    font-family: inherit;
    font-size: 0.95rem;
    min-height: 200px;
}
#quill-edit .ql-editor {
    min-height: 200px;
    padding: 1.25rem;
    line-height: 1.75;
    color: #334155;
}
#quill-edit .ql-editor.ql-blank::before {
    color: #94a3b8;
    font-style: normal;
    font-size: 0.9rem;
}
.dark #quill-edit .ql-toolbar { background: #1e293b; border-color: #334155 !important; }
.dark #quill-edit .ql-container { border-color: #334155 !important; background: #1e293b; }
.dark #quill-edit .ql-editor { color: #e2e8f0; }
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

    var quill = new Quill('#quill-edit', {
        theme: 'snow',
        placeholder: 'Tuliskan isi edukasi secara mendalam...',
        modules: { toolbar: toolbarOptions }
    });

    var existingContent = document.getElementById('content-input-edit').value;
    if (existingContent) {
        quill.clipboard.dangerouslyPasteHTML(existingContent);
    }

    var form = document.querySelector('form[action*="article"]');
    if (form) {
        form.addEventListener('submit', function() {
            document.getElementById('content-input-edit').value = quill.getSemanticHTML();
        });
    }

    // Image preview
    var input = document.getElementById('image-input');
    var preview = document.getElementById('image-preview');
    var placeholder = document.getElementById('image-placeholder');
    var currentImg = document.getElementById('current-image-container');

    if (input && preview && placeholder) {
        input.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                    if (currentImg) {
                        currentImg.classList.add('hidden');
                    }
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    }
})();
</script>
@endsection