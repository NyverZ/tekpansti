@extends('layouts.app')

@section('content')
    <section class="sf-container">
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <span class="sf-chip">Artikel Edukasi</span>
                <h1 class="mt-4 text-3xl font-bold leading-tight text-slate-900 sm:text-4xl md:text-5xl dark:text-white">Perpustakaan artikel SafeFood</h1>
                <p class="mt-4 max-w-3xl text-lg leading-8 text-slate-600 dark:text-slate-300">
                    Jelajahi halaman artikel berbasis slug yang membahas keamanan pangan, HACCP, higienitas, sanitasi, penyimpanan sehat, dan literasi nutrisi.
                </p>
            </div>
        </div>

        <div class="sf-panel mt-10 p-6">
            <form method="GET" action="{{ route('articles.index') }}" class="grid gap-4 lg:grid-cols-[1fr_auto_auto]">
                <div>
                    <label for="search" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Cari artikel</label>
                    <input id="search" type="text" name="search" value="{{ $searchTerm }}" placeholder="Contoh: HACCP, higiene, suhu aman..." class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 focus:border-teal-600 focus:outline-none dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">
                </div>
                <div class="flex items-end">
                    <button class="sf-button-primary">Cari</button>
                </div>
                <div class="flex items-end">
                    <a href="{{ route('articles.index') }}" class="sf-button-secondary">Atur Ulang</a>
                </div>
            </form>

            <div class="mt-4 flex flex-wrap items-center gap-3 text-sm text-slate-500 dark:text-slate-400">
                <span>{{ $articles->total() }} artikel ditemukan</span>
                @if ($searchTerm !== '')
                    <span class="rounded-full bg-slate-100 px-3 py-1 text-slate-700 dark:bg-slate-800 dark:text-slate-200">
                        Kata kunci: "{{ $searchTerm }}"
                    </span>
                @endif
            </div>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @forelse ($articles as $article)
                <article class="sf-panel overflow-hidden">
                    @if ($article->image)
                        <img src="{{ $article->image }}" alt="{{ $article->title }}" class="h-44 w-full object-cover" loading="lazy">
                    @else
                        <div class="h-44 bg-[linear-gradient(135deg,#0f766e,#d97706)]"></div>
                    @endif
                    <div class="p-8">
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">{{ $article->created_at->format('d M Y') }}</p>
                        <h2 class="mt-3 text-2xl font-bold text-slate-900 dark:text-white">{{ $article->title }}</h2>
                        <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ \Illuminate\Support\Str::limit(strip_tags($article->content), 130) }}</p>
                        <a href="{{ route('articles.show', $article) }}" class="mt-6 inline-flex font-semibold text-teal-700">Baca Selengkapnya</a>
                    </div>
                </article>
            @empty
                <div class="sf-panel col-span-full p-10 text-center">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white">
                        {{ $searchTerm !== '' ? 'Tidak ada artikel yang cocok dengan pencarian Anda.' : 'Artikel edukasi belum tersedia.' }}
                    </h2>
                    <p class="mt-3 text-sm text-slate-600 dark:text-slate-300">
                        {{ $searchTerm !== '' ? 'Coba gunakan kata kunci lain seperti HACCP, kebersihan pangan, atau penyimpanan aman.' : 'Jalankan seeder untuk menampilkan konten awal SafeFood pada halaman ini.' }}
                    </p>
                </div>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $articles->links() }}
        </div>
    </section>
@endsection
