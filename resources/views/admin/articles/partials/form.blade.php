<div>
    <label for="title" class="mb-2 block text-sm font-semibold text-slate-700">Judul</label>
    <input id="title" type="text" name="title" value="{{ old('title', $article?->title) }}" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800">
    @error('title')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="image" class="mb-2 block text-sm font-semibold text-slate-700">URL Gambar</label>
    <input id="image" type="url" name="image" value="{{ old('image', $article?->image) }}" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800">
    @error('image')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="content" class="mb-2 block text-sm font-semibold text-slate-700">Konten</label>
    <textarea id="content" name="content" rows="12" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800">{{ old('content', $article?->content) }}</textarea>
    @error('content')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<label class="inline-flex items-center gap-3 rounded-full bg-slate-50 px-4 py-3 text-sm font-medium text-slate-700">
    <input type="hidden" name="is_published" value="0">
    <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $article?->is_published ?? true))>
    Publikasikan artikel
</label>

<div class="flex gap-3">
    <button class="sf-button-primary">{{ $article ? 'Perbarui Artikel' : 'Simpan Artikel' }}</button>
    <a href="{{ route('admin.articles.index') }}" class="sf-button-secondary">Batal</a>
</div>
