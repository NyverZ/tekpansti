@php
    $currentImage = $article?->image_url;
@endphp

<div class="space-y-6">
    <div>
        <label for="title" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Judul Artikel</label>
        <input id="title" type="text" name="title" value="{{ old('title', $article?->title) }}" placeholder="Masukkan judul artikel edukasi" class="w-full rounded-xl border border-slate-200 bg-white/90 px-4 py-3 text-sm text-slate-800 shadow-sm outline-none transition duration-300 placeholder:text-slate-400 focus:border-emerald-400 focus:ring-4 focus:ring-emerald-100 dark:border-slate-700 dark:bg-slate-900/90 dark:text-slate-100 dark:placeholder:text-slate-500 dark:focus:border-emerald-500 dark:focus:ring-emerald-500/20">
        @error('title')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <div class="mb-2 flex items-center justify-between gap-4">
            <label for="image" class="block text-sm font-semibold text-slate-700 dark:text-slate-300">Gambar Artikel</label>
            @if ($currentImage)
                <span class="rounded-full bg-emerald-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-300">
                    Gambar saat ini tersedia
                </span>
            @endif
        </div>

        <div class="rounded-[1.5rem] border-2 border-dashed border-slate-300 bg-slate-50/80 transition duration-300 hover:border-emerald-300 hover:bg-emerald-50/40 dark:border-slate-700 dark:bg-slate-900/60 dark:hover:border-emerald-500/40">
            <input id="image" type="file" name="image" accept=".jpg,.jpeg,.png,.webp" class="sr-only">
            <label for="image" class="block cursor-pointer p-6 text-center sm:p-8">
                <span class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-emerald-100 text-emerald-600 dark:bg-emerald-900/40 dark:text-emerald-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 16V8m0 0-3 3m3-3 3 3M4 15.5A4.5 4.5 0 0 0 8.5 20h7A4.5 4.5 0 0 0 20 15.5A3.5 3.5 0 0 0 16.5 12H16a5 5 0 0 0-9.8-1.4A4 4 0 0 0 4 15.5Z" />
                    </svg>
                </span>
                <p class="mt-4 text-base font-semibold text-slate-900 dark:text-white">Upload gambar ilustrasi artikel</p>
                <p class="mt-2 text-sm leading-7 text-slate-500 dark:text-slate-400">Klik untuk memilih file atau ganti ilustrasi dari perangkat Anda.</p>
                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Upload gambar ilustrasi artikel (maks 2MB)</p>
            </label>
        </div>

        @error('image')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror

        <div id="articleImagePreviewWrapper" class="{{ $currentImage ? '' : 'hidden' }} mt-4 rounded-[1.5rem] border border-slate-200 bg-white/80 p-4 shadow-sm dark:border-slate-700 dark:bg-slate-900/70">
            <p class="text-sm font-semibold text-slate-700 dark:text-slate-300">Preview gambar</p>
            <img id="articleImagePreview" src="{{ $currentImage }}" alt="Preview gambar artikel" class="mt-4 h-56 w-full rounded-2xl object-cover">
        </div>
    </div>

    <div>
        <label for="content" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Konten Artikel</label>
        <textarea id="content" name="content" rows="12" placeholder="Tulis isi artikel edukasi di sini..." class="w-full rounded-xl border border-slate-200 bg-white/90 px-4 py-3 text-sm text-slate-800 shadow-sm outline-none transition duration-300 placeholder:text-slate-400 focus:border-emerald-400 focus:ring-4 focus:ring-emerald-100 dark:border-slate-700 dark:bg-slate-900/90 dark:text-slate-100 dark:placeholder:text-slate-500 dark:focus:border-emerald-500 dark:focus:ring-emerald-500/20">{{ old('content', $article?->content) }}</textarea>
        @error('content')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <label class="flex items-start gap-4 rounded-[1.5rem] border border-slate-200 bg-slate-50/90 px-5 py-4 text-sm text-slate-700 dark:border-slate-700 dark:bg-slate-800/70 dark:text-slate-300">
        <input type="hidden" name="is_published" value="0">
        <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $article?->is_published ?? true)) class="mt-1 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
        <span>
            <span class="block font-semibold text-slate-900 dark:text-white">Publikasikan artikel</span>
            <span class="mt-1 block text-sm leading-6 text-slate-500 dark:text-slate-400">Aktifkan agar artikel langsung tampil di halaman publik SafeFood.</span>
        </span>
    </label>

    <div class="flex flex-col gap-3 pt-2 sm:flex-row">
        <button class="inline-flex items-center justify-center rounded-xl bg-emerald-600 px-6 py-3 font-semibold text-white shadow-md transition duration-300 hover:-translate-y-0.5 hover:bg-emerald-700 hover:shadow-lg">
            {{ $article ? 'Perbarui Artikel' : 'Simpan Artikel' }}
        </button>
        <a href="{{ route('admin.articles.index') }}" class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white/90 px-6 py-3 font-semibold text-slate-700 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:bg-white hover:shadow-md dark:border-slate-700 dark:bg-slate-900/80 dark:text-slate-200 dark:hover:bg-slate-900">
            Batal
        </a>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const imageInput = document.getElementById('image');
            const previewWrapper = document.getElementById('articleImagePreviewWrapper');
            const previewImage = document.getElementById('articleImagePreview');

            if (!imageInput || !previewWrapper || !previewImage) {
                return;
            }

            imageInput.addEventListener('change', (event) => {
                const [file] = event.target.files || [];

                if (!file) {
                    return;
                }

                const reader = new FileReader();
                reader.onload = (loadEvent) => {
                    previewImage.src = loadEvent.target?.result;
                    previewWrapper.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
@endpush
