@extends('layouts.app')

@section('content')
    <section class="sf-container">
        <div class="grid gap-8 lg:grid-cols-[0.95fr_1.05fr]">
            <div class="space-y-6">
                <span class="sf-chip">Pengolahan dan Penyimpanan Pangan</span>
                <h1 class="text-3xl font-bold leading-tight text-slate-900 sm:text-4xl md:text-5xl dark:text-white">Pahami titik kritis saat memasak, mendinginkan, dan menyimpan makanan</h1>
                <p class="text-lg leading-8 text-slate-600 dark:text-slate-300">
                    Pengolahan yang tepat dan penyimpanan yang benar membantu menjaga makanan tetap aman, bernutrisi, dan layak dikonsumsi. Halaman ini merangkum kebiasaan penting yang paling sering menentukan keamanan pangan sehari-hari.
                </p>
                <div class="sf-panel border border-emerald-200/70 bg-[linear-gradient(135deg,#ecfdf5,#d1fae5_52%,#cffafe)] p-6 text-slate-900 shadow-[0_22px_60px_rgba(16,185,129,0.12)] dark:border-transparent dark:bg-[linear-gradient(135deg,#0f172a,#0f766e)] dark:text-white dark:shadow-[0_24px_70px_rgba(2,8,23,0.52)] sm:p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-teal-700 dark:text-cyan-50">Titik kritis utama</p>
                    <div class="mt-5 grid gap-3">
                        @foreach ($criticalPoints as $point)
                            <div class="rounded-[1.25rem] border border-white/70 bg-white/80 px-4 py-4 backdrop-blur dark:border-slate-700/70 dark:bg-slate-950/75">
                                <p class="text-sm font-semibold text-slate-950 dark:text-white">{{ $point['title'] }}</p>
                                <p class="mt-2 text-sm leading-7 text-slate-700 dark:text-slate-200">{{ $point['description'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="grid gap-6">
                @foreach ($sections as $section)
                    <article class="sf-panel p-6 sm:p-8">
                        <h2 class="text-2xl font-bold text-slate-900 dark:text-white sm:text-3xl">{{ $section['title'] }}</h2>
                        <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ $section['description'] }}</p>
                        <div class="mt-6 space-y-3">
                            @foreach ($section['points'] as $point)
                                <div class="rounded-[1.25rem] border border-slate-200/70 bg-slate-50/90 px-4 py-4 dark:border-slate-700/70 dark:bg-slate-800/80">
                                    <p class="text-sm leading-7 text-slate-700 dark:text-slate-200">{{ $point }}</p>
                                </div>
                            @endforeach
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
