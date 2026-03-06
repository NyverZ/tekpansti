@extends('layouts.app')

@section('content')
    <section class="sf-container">
        <div class="rounded-[2.5rem] bg-[linear-gradient(135deg,#102033,#0f766e)] px-8 py-12 text-white md:px-12">
            <span class="inline-flex rounded-full bg-white/10 px-4 py-1 text-sm font-medium text-teal-50">HACCP</span>
            <h1 class="mt-5 text-5xl font-bold">Hazard Analysis Critical Control Point</h1>
            <p class="mt-5 max-w-3xl text-lg leading-8 text-slate-100">
                HACCP is a preventive food safety system used to identify, evaluate, and control hazards across receiving, processing, storage, and service.
            </p>
        </div>

        <div class="mt-12 grid gap-6 lg:grid-cols-2 xl:grid-cols-3">
            @foreach ($principles as $index => $principle)
                <article class="sf-panel p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Principle {{ $index + 1 }}</p>
                    <p class="mt-4 text-lg leading-8 text-slate-700">{{ $principle }}</p>
                </article>
            @endforeach
        </div>

        <div class="mt-12 grid gap-6 xl:grid-cols-[1.1fr_0.9fr]">
            <div class="sf-panel p-8">
                <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Implementation examples</p>
                <div class="mt-6 space-y-5">
                    @foreach ($examples as $example)
                        <div class="rounded-[1.75rem] bg-slate-50 p-6">
                            <h2 class="text-2xl font-bold text-slate-900">{{ $example['title'] }}</h2>
                            <p class="mt-4 text-sm leading-7 text-slate-600"><strong>Hazard:</strong> {{ $example['hazard'] }}</p>
                            <p class="mt-2 text-sm leading-7 text-slate-600"><strong>CCP:</strong> {{ $example['ccp'] }}</p>
                            <p class="mt-2 text-sm leading-7 text-slate-600"><strong>Critical Limit:</strong> {{ $example['limit'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="sf-panel p-8">
                <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Practical checklist</p>
                <div class="mt-6 space-y-4">
                    @foreach ($checklist as $item)
                        <div class="rounded-[1.5rem] bg-slate-50 px-5 py-4 text-sm leading-7 text-slate-700">{{ $item }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
