@extends('layouts.app')

@section('content')
    <section class="sf-container">
        <div class="grid gap-8 lg:grid-cols-[0.92fr_1.08fr]">
            <div class="space-y-6">
                <span class="sf-chip">Consultation</span>
                <h1 class="text-5xl font-bold text-slate-900">Connect learning with real food safety support</h1>
                <p class="text-lg leading-8 text-slate-600">
                    SafeFood consultation gives users a next step after reading articles, completing the safety checker, or reviewing HACCP guidance.
                </p>
                <div class="sf-panel bg-[linear-gradient(140deg,#102033,#0f766e)] p-8 text-white">
                    <p class="text-sm uppercase tracking-[0.24em] text-teal-100">Recommended use</p>
                    <p class="mt-4 text-xl leading-8 text-slate-100">Invite questions about storage failures, sanitation gaps, ingredient handling, or healthy food substitutions.</p>
                </div>
            </div>

            <div class="grid gap-6 md:grid-cols-2">
                <div class="sf-panel p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Email</p>
                    <p class="mt-4 text-2xl font-bold text-slate-900">{{ $contacts['email'] }}</p>
                    <p class="mt-3 text-sm leading-7 text-slate-600">Use for structured questions, collaboration requests, or follow-up documentation.</p>
                </div>
                <div class="sf-panel p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500">WhatsApp</p>
                    <p class="mt-4 text-2xl font-bold text-slate-900">{{ $contacts['whatsapp'] }}</p>
                    <p class="mt-3 text-sm leading-7 text-slate-600">Best for quick consultation and practical discussion around food safety issues.</p>
                </div>
                <div class="sf-panel p-8 md:col-span-2">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Instagram</p>
                    <p class="mt-4 text-2xl font-bold text-slate-900">{{ $contacts['instagram'] }}</p>
                    <p class="mt-3 text-sm leading-7 text-slate-600">Use social channels for broader educational updates and public engagement.</p>
                    <a href="https://wa.me/6281234567890" target="_blank" rel="noreferrer" class="sf-button-primary mt-8">Start WhatsApp Consultation</a>
                </div>
            </div>
        </div>
    </section>
@endsection
