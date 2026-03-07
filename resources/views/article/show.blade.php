@extends('layouts.app')

@section('content')
    <section class="sf-container">
        <div class="grid gap-8 lg:grid-cols-[1fr_0.36fr]">
            <article class="sf-panel overflow-hidden">
                <div class="h-64 bg-[linear-gradient(135deg,#0f766e,#d97706)]"></div>
                <div class="p-8 md:p-10">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500">{{ $article->created_at->format('d M Y') }}</p>
                    <h1 class="mt-4 text-5xl font-bold text-slate-900">{{ $article->title }}</h1>
                    <div class="prose prose-slate mt-8 max-w-none leading-8">
                        {!! nl2br(e($article->content)) !!}
                    </div>
                </div>
            </article>

            <aside class="space-y-6">
                <div class="sf-panel p-6">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Bacaan terkait</p>
                    <div class="mt-6 space-y-4">
                        @forelse ($relatedArticles as $related)
                            <a href="{{ route('articles.show', $related) }}" class="block rounded-[1.5rem] bg-slate-50 px-5 py-4">
                                <p class="text-sm font-semibold text-slate-900">{{ $related->title }}</p>
                                <p class="mt-1 text-xs uppercase tracking-[0.2em] text-slate-500">{{ $related->created_at->format('d M Y') }}</p>
                            </a>
                        @empty
                            <p class="text-sm text-slate-500">Belum ada artikel terkait.</p>
                        @endforelse
                    </div>
                </div>
                <div class="sf-panel p-6">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Lanjut belajar</p>
                    <a href="{{ route('education') }}" class="mt-4 inline-flex font-semibold text-teal-700">Kembali ke Edukasi</a>
                </div>
            </aside>
        </div>
    </section>
@endsection
