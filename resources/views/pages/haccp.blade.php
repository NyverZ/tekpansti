@extends('layouts.app')

@php
    $haccpHighlights = [
        [
            'title' => 'Pendekatan preventif',
            'description' => 'HACCP membantu mencegah bahaya sebelum makanan sampai ke konsumen, bukan hanya bereaksi setelah masalah terjadi.',
        ],
        [
            'title' => 'Berbasis titik kendali',
            'description' => 'Sistem ini menekankan pengawasan pada tahap paling kritis seperti penerimaan bahan, pengolahan, pendinginan, dan penyajian.',
        ],
        [
            'title' => 'Mudah ditelusuri',
            'description' => 'Dengan pencatatan dan verifikasi, setiap langkah dapat dievaluasi untuk menjaga mutu dan keamanan pangan.',
        ],
    ];
@endphp

@section('content')
    <section class="sf-container">
        <div class="grid gap-8 xl:grid-cols-[0.92fr_1.08fr]">
            <div class="space-y-6">
                <div class="rounded-[2.5rem] bg-[linear-gradient(135deg,#102033,#0f766e)] px-6 py-10 text-white shadow-[0_24px_70px_rgba(2,8,23,0.35)] sm:px-8 sm:py-12 md:px-12">
                    <span class="inline-flex rounded-full bg-white/10 px-4 py-1 text-sm font-medium text-teal-50">HACCP</span>
                    <h1 class="mt-5 text-3xl font-bold leading-tight sm:text-4xl md:text-5xl">Hazard Analysis Critical Control Point</h1>
                    <p class="mt-5 max-w-3xl text-lg leading-8 text-slate-100">
                        HACCP adalah sistem keamanan pangan preventif yang digunakan untuk mengidentifikasi, mengevaluasi, dan mengendalikan bahaya pada tahap penerimaan, pengolahan, penyimpanan, hingga penyajian.
                    </p>
                </div>

                <div class="sf-panel p-6 sm:p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Mengapa HACCP penting</p>
                    <div class="mt-6 space-y-4">
                        @foreach ($haccpHighlights as $highlight)
                            <div class="rounded-[1.5rem] border border-slate-200/70 bg-slate-50/90 p-5 dark:border-slate-700/70 dark:bg-slate-800/80">
                                <h2 class="text-lg font-bold text-slate-900 dark:text-white">{{ $highlight['title'] }}</h2>
                                <p class="mt-2 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ $highlight['description'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="grid gap-6">
                @foreach ($principles as $index => $principle)
                    <article class="sf-panel p-6 sm:p-8">
                        <p class="text-sm uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Prinsip {{ $index + 1 }}</p>
                        <p class="mt-4 text-lg leading-8 text-slate-700 dark:text-slate-300">{{ $principle }}</p>
                    </article>
                @endforeach
            </div>
        </div>

        <div class="mt-12 grid gap-6 xl:grid-cols-[1.08fr_0.92fr]">
            <div class="sf-panel p-6 sm:p-8">
                <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                    <div>
                        <p class="text-sm uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Contoh penerapan</p>
                        <h2 class="mt-3 text-3xl font-bold text-slate-900 dark:text-white">Penerapan HACCP dalam situasi nyata</h2>
                    </div>
                    <span class="rounded-full bg-teal-100 px-4 py-2 text-xs font-semibold uppercase tracking-[0.18em] text-teal-700 dark:bg-teal-500/15 dark:text-teal-300">
                        Studi kasus
                    </span>
                </div>

                <div class="mt-8 space-y-5">
                    @foreach ($examples as $example)
                        <div class="rounded-[1.75rem] border border-slate-200/70 bg-slate-50/90 p-6 dark:border-slate-700/70 dark:bg-slate-800/80">
                            <h3 class="text-2xl font-bold text-slate-900 dark:text-white">{{ $example['title'] }}</h3>
                            <div class="mt-4 space-y-2 text-sm leading-7 text-slate-600 dark:text-slate-300">
                                <p><strong class="text-slate-900 dark:text-white">Bahaya:</strong> {{ $example['hazard'] }}</p>
                                <p><strong class="text-slate-900 dark:text-white">CCP:</strong> {{ $example['ccp'] }}</p>
                                <p><strong class="text-slate-900 dark:text-white">Batas Kritis:</strong> {{ $example['limit'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="sf-panel p-6 sm:p-8">
                <p class="text-sm uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Checklist praktis</p>
                <h2 class="mt-3 text-3xl font-bold text-slate-900 dark:text-white">Langkah yang bisa langsung diterapkan</h2>
                <div class="mt-8 space-y-4">
                    @foreach ($checklist as $item)
                        <div class="rounded-[1.5rem] border border-slate-200/70 bg-slate-50/90 px-5 py-4 text-sm leading-7 text-slate-700 dark:border-slate-700/70 dark:bg-slate-800/80 dark:text-slate-300">
                            {{ $item }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
