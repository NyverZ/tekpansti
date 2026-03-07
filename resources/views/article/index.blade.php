@extends('layouts.app')

@section('content')
    <section class="sf-container">
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <span class="sf-chip">Artikel Edukasi</span>
                <h1 class="mt-4 text-5xl font-bold text-slate-900">Perpustakaan artikel SafeFood</h1>
                <p class="mt-4 max-w-3xl text-lg leading-8 text-slate-600">
                    Jelajahi halaman artikel berbasis slug yang membahas keamanan pangan, HACCP, higienitas, sanitasi, penyimpanan sehat, dan literasi nutrisi.
                </p>
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
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500">{{ $article->created_at->format('d M Y') }}</p>
                        <h2 class="mt-3 text-2xl font-bold text-slate-900">{{ $article->title }}</h2>
                        <p class="mt-4 text-sm leading-7 text-slate-600">{{ \Illuminate\Support\Str::limit(strip_tags($article->content), 130) }}</p>
                        <a href="{{ route('articles.show', $article) }}" class="mt-6 inline-flex font-semibold text-teal-700">Baca Selengkapnya</a>
                    </div>
                </article>
            @empty
                <div class="sf-panel col-span-full p-10 text-center">
                    <h2 class="text-2xl font-bold text-slate-900">Artikel edukasi belum tersedia.</h2>
                    <p class="mt-3 text-sm text-slate-600">Jalankan seeder untuk menampilkan konten awal SafeFood pada halaman ini.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $articles->links() }}
        </div>
    </section>
@endsection
