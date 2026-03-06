@extends('layouts.app')

@section('content')
    <section class="sf-container">
        <div class="grid gap-8 lg:grid-cols-[0.85fr_1.15fr]">
            <div class="space-y-6">
                <span class="sf-chip">Contact</span>
                <h1 class="text-5xl font-bold text-slate-900">Reach the SafeFood team</h1>
                <p class="text-lg leading-8 text-slate-600">
                    Use these channels for questions, collaboration, judging demos, or outreach related to food safety education.
                </p>
                <div class="sf-panel p-8">
                    <div class="space-y-4 text-sm text-slate-700">
                        <p><strong>Email:</strong> {{ $contacts['email'] }}</p>
                        <p><strong>WhatsApp:</strong> {{ $contacts['whatsapp'] }}</p>
                        <p><strong>Instagram:</strong> {{ $contacts['instagram'] }}</p>
                    </div>
                </div>
            </div>

            <div class="sf-panel p-8">
                <h2 class="text-3xl font-bold text-slate-900">Message framework</h2>
                <p class="mt-3 text-sm leading-7 text-slate-600">
                    For a technology competition project, use the contact section to show clear communication channels and a professional support flow.
                </p>
                <div class="mt-8 grid gap-4">
                    <div class="rounded-[1.5rem] bg-slate-50 p-5">
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500">General inquiries</p>
                        <p class="mt-2 text-sm leading-7 text-slate-700">Ask about platform features, educational content, or project scope.</p>
                    </div>
                    <div class="rounded-[1.5rem] bg-slate-50 p-5">
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Demo requests</p>
                        <p class="mt-2 text-sm leading-7 text-slate-700">Use when presenting SafeFood to judges, mentors, or partners.</p>
                    </div>
                    <div class="rounded-[1.5rem] bg-slate-50 p-5">
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Feedback</p>
                        <p class="mt-2 text-sm leading-7 text-slate-700">Collect suggestions for future improvements and feature expansion.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
