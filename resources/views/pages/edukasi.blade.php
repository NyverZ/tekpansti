@extends('layouts.app')

@section('content')
    <section class="sf-container">
        <div class="grid gap-8 lg:grid-cols-[0.95fr_1.05fr]">
            <div class="space-y-6">
                <span class="sf-chip">Food Education</span>
                <h1 class="text-5xl font-bold text-slate-900">Practical learning tracks for safer food handling</h1>
                <p class="text-lg leading-8 text-slate-600">
                    SafeFood organizes education into clear modules so users can understand food hazards, storage, nutrition literacy, and sanitation without technical overload.
                </p>
                <div class="sf-panel bg-[linear-gradient(140deg,#102033,#0f766e)] p-8 text-white">
                    <p class="text-sm uppercase tracking-[0.24em] text-teal-100">Daily reminder</p>
                    <p class="mt-4 text-2xl font-bold">"{{ $dailyTip }}"</p>
                </div>
            </div>

            <div class="grid gap-6">
                @foreach ($educationModules as $module)
                    <article class="sf-panel p-8">
                        <h2 class="text-3xl font-bold text-slate-900">{{ $module['title'] }}</h2>
                        <p class="mt-4 text-sm leading-7 text-slate-600">{{ $module['description'] }}</p>
                        <div class="mt-6 flex flex-wrap gap-3">
                            @foreach ($module['items'] as $item)
                                <span class="rounded-full bg-slate-100 px-4 py-2 text-sm font-medium text-slate-700">{{ $item }}</span>
                            @endforeach
                        </div>
                    </article>
                @endforeach
            </div>
        </div>

        <div class="mt-16">
            <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <div>
                    <span class="sf-chip">Educational articles</span>
                    <h2 class="mt-4 text-4xl font-bold text-slate-900">Support each module with current reading</h2>
                </div>
                <a href="{{ route('articles.index') }}" class="sf-button-secondary">All Articles</a>
            </div>

            <div class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($featuredArticles as $article)
                    <article class="sf-panel p-8">
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500">{{ $article->created_at->format('d M Y') }}</p>
                        <h3 class="mt-3 text-2xl font-bold text-slate-900">{{ $article->title }}</h3>
                        <p class="mt-4 text-sm leading-7 text-slate-600">{{ \Illuminate\Support\Str::limit(strip_tags($article->content), 110) }}</p>
                        <a href="{{ route('articles.show', $article) }}" class="mt-6 inline-flex font-semibold text-teal-700">Read More</a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
