@extends('layouts.app')

@section('content')
    <section class="sf-container">
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <span class="sf-chip">Educational articles</span>
                <h1 class="mt-4 text-5xl font-bold text-slate-900">SafeFood article library</h1>
                <p class="mt-4 max-w-3xl text-lg leading-8 text-slate-600">
                    Browse slug-based article pages covering food safety, HACCP, hygiene, sanitation, healthy storage, and nutrition awareness.
                </p>
            </div>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($articles as $article)
                <article class="sf-panel overflow-hidden">
                    <div class="h-44 bg-[linear-gradient(135deg,#0f766e,#d97706)]"></div>
                    <div class="p-8">
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500">{{ $article->created_at->format('d M Y') }}</p>
                        <h2 class="mt-3 text-2xl font-bold text-slate-900">{{ $article->title }}</h2>
                        <p class="mt-4 text-sm leading-7 text-slate-600">{{ \Illuminate\Support\Str::limit(strip_tags($article->content), 130) }}</p>
                        <a href="{{ route('articles.show', $article) }}" class="mt-6 inline-flex font-semibold text-teal-700">Open Article</a>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $articles->links() }}
        </div>
    </section>
@endsection
