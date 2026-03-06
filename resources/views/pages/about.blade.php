@extends('layouts.app')

@section('content')
    <section class="sf-container">
        <div class="grid gap-8 lg:grid-cols-[0.9fr_1.1fr]">
            <div class="space-y-6">
                <span class="sf-chip">About SafeFood</span>
                <h1 class="text-5xl font-bold text-slate-900">A focused digital platform for food safety education</h1>
                <p class="text-lg leading-8 text-slate-600">
                    SafeFood replaces the previous plant-centered concept with an integrated learning product about food safety, HACCP, hygiene, storage, and healthy food practices.
                </p>
            </div>

            <div class="grid gap-6">
                @foreach ($milestones as $milestone)
                    <article class="sf-panel p-8">
                        <h2 class="text-3xl font-bold text-slate-900">{{ $milestone['title'] }}</h2>
                        <p class="mt-4 text-sm leading-8 text-slate-600">{{ $milestone['description'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-2">
            <div class="sf-panel p-8">
                <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Vision</p>
                <p class="mt-4 text-2xl font-bold text-slate-900">Make food safety education practical, modern, and accessible.</p>
            </div>
            <div class="sf-panel p-8">
                <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Mission</p>
                <p class="mt-4 text-2xl font-bold text-slate-900">Deliver structured content, interactive tools, and production-ready presentation quality.</p>
            </div>
        </div>
    </section>
@endsection
