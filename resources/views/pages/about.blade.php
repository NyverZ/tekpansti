@extends('layouts.app')

@php
    $platformPillars = [
        [
            'title' => 'Edukasi yang mudah dipahami',
            'description' => 'SafeFood menyajikan topik keamanan pangan dalam bahasa yang jelas, relevan, dan lebih dekat dengan praktik sehari-hari.',
        ],
        [
            'title' => 'Interaktif dan siap demo',
            'description' => 'Platform ini tidak hanya informatif, tetapi juga menghadirkan pengalaman interaktif melalui kuis, perbandingan nutrisi, dan self-check publik.',
        ],
        [
            'title' => 'Siap dikembangkan',
            'description' => 'Arsitektur SafeFood memungkinkan pengembangan lebih lanjut untuk studi kasus, pelaporan, maupun integrasi konten edukasi yang lebih kaya.',
        ],
    ];
@endphp

@section('content')
    <section class="sf-container">
        <div class="grid gap-8 xl:grid-cols-[0.92fr_1.08fr]">
            <div class="space-y-6">
                <span class="sf-chip">Tentang SafeFood</span>
                <h1 class="text-3xl font-bold leading-tight text-slate-900 sm:text-4xl md:text-5xl dark:text-white">Platform digital yang dirancang untuk membuat edukasi keamanan pangan terasa lebih jelas dan berdampak</h1>
                <p class="text-lg leading-8 text-slate-600 dark:text-slate-300">
                    SafeFood dikembangkan sebagai platform edukasi yang menggabungkan literasi keamanan pangan, materi HACCP, penanganan makanan yang higienis, serta fitur interaktif yang mudah dipahami oleh pengguna umum.
                </p>

                <div class="sf-panel border-transparent bg-[linear-gradient(135deg,#0f172a,#0f766e)] p-6 text-white shadow-[0_24px_70px_rgba(2,8,23,0.4)] sm:p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-cyan-100">Arah pengembangan platform</p>
                    <div class="mt-5 space-y-3">
                        @foreach ($platformPillars as $pillar)
                            <div class="rounded-[1.25rem] border border-white/10 bg-white/10 px-4 py-4 backdrop-blur">
                                <p class="text-sm font-semibold text-white">{{ $pillar['title'] }}</p>
                                <p class="mt-2 text-sm leading-7 text-slate-100">{{ $pillar['description'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="grid gap-6">
                @foreach ($milestones as $milestone)
                    <article class="sf-panel p-6 sm:p-8">
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">Nilai utama</p>
                        <h2 class="mt-3 text-2xl font-bold text-slate-900 dark:text-white sm:text-3xl">{{ $milestone['title'] }}</h2>
                        <p class="mt-4 text-sm leading-8 text-slate-600 dark:text-slate-300">{{ $milestone['description'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-2">
            <div class="sf-panel p-6 sm:p-8">
                <p class="text-sm uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Visi</p>
                <p class="mt-4 text-2xl font-bold leading-tight text-slate-900 dark:text-white">
                    Menjadikan edukasi keamanan pangan lebih praktis, modern, dan mudah diakses oleh masyarakat luas.
                </p>
                <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-slate-300">
                    Visi ini diwujudkan melalui materi yang terstruktur, tampilan yang ramah pengguna, dan pengalaman belajar yang tidak terasa membingungkan.
                </p>
            </div>

            <div class="sf-panel p-6 sm:p-8">
                <p class="text-sm uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Misi</p>
                <p class="mt-4 text-2xl font-bold leading-tight text-slate-900 dark:text-white">
                    Menyajikan konten terstruktur, alat interaktif, dan presentasi visual yang siap ditampilkan dalam konteks edukasi maupun kompetisi.
                </p>
                <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-slate-300">
                    SafeFood dibangun agar tidak hanya informatif, tetapi juga relevan untuk pembelajaran, demonstrasi, dan pengembangan lebih lanjut.
                </p>
            </div>
        </div>
    </section>
@endsection
