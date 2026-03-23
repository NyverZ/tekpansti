@extends('layouts.app')

@section('title', 'SafeFood | Edukasi Keamanan Pangan, HACCP, Nutrisi, dan Self Check')
@section('meta_description', 'SafeFood adalah platform edukasi keamanan pangan untuk masyarakat umum yang membahas HACCP, higiene pangan, nutrisi, perbandingan bahan pangan, kuis, artikel edukasi, dan self-check keamanan makanan.')
@section('canonical', route('home'))
@section('og_title', 'SafeFood | Platform Edukasi Keamanan Pangan')
@section('og_description', 'Pelajari keamanan pangan, HACCP, nutrisi, dan kebiasaan penanganan makanan yang aman melalui artikel, perbandingan nutrisi, kuis, dan self-check publik.')

@push('head')
    @php
        $faqSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => collect($faqs)->map(fn (array $faq) => [
                '@type' => 'Question',
                'name' => $faq['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq['answer'],
                ],
            ])->values()->all(),
        ];
    @endphp
    <script type="application/ld+json">{!! json_encode($faqSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
@endpush

@php
    $heroStatCards = [
        ['label' => 'Bahan Pangan', 'value' => $stats['ingredients']],
        ['label' => 'Poin Nutrisi', 'value' => $stats['nutritionPoints']],
        ['label' => 'Artikel', 'value' => $stats['articles']],
        ['label' => 'Tips Harian', 'value' => $stats['tips']],
    ];

    $judgeHighlights = [
        ['value' => '5', 'label' => 'Core Features'],
        ['value' => '3', 'label' => 'Interactive Flow'],
        ['value' => '1', 'label' => 'Unified Platform'],
    ];

    $heroSignals = [
        'Interaktif untuk pembelajaran dan presentasi',
        'Terintegrasi dengan artikel, checker, quiz, dan compare',
        'Dirancang untuk pengalaman edukasi yang modern',
    ];

    $featuredModules = collect($educationModules)->take(4)->values()->all();

    $entryAction = auth()->check()
        ? ['label' => 'Buka Dashboard', 'href' => route('dashboard')]
        : ['label' => 'Mulai Dengan Akun', 'href' => route('register')];

    $platformAdvantages = [
        [
            'title' => 'Belajar Bertahap',
            'description' => 'Pengguna bisa bergerak dari teori ke praktik tanpa merasa tersesat.',
        ],
        [
            'title' => 'Visual Lebih Meyakinkan',
            'description' => 'Tampilan modern membantu juri menangkap value platform lebih cepat.',
        ],
        [
            'title' => 'Tools yang Relevan',
            'description' => 'Setiap fitur dirancang untuk memberi aksi nyata, bukan hanya bacaan.',
        ],
    ];

    $closingSignals = [
        ['label' => 'Experience', 'value' => 'Learning-first'],
        ['label' => 'Design', 'value' => 'Premium startup feel'],
        ['label' => 'Focus', 'value' => 'Food safety education'],
    ];

    $closingPillars = [
        [
            'title' => 'Materi yang runtut',
            'description' => 'Pembelajaran dibangun dari konsep dasar ke aksi nyata dengan alur yang mudah diikuti.',
        ],
        [
            'title' => 'Fitur yang hidup',
            'description' => 'Checker, compare, dan quiz membuat SafeFood terasa aktif, bukan sekadar portal bacaan.',
        ],
        [
            'title' => 'Siap dipresentasikan',
            'description' => 'Visual, interaksi, dan struktur halaman membantu memperkuat kesan profesional saat demo.',
        ],
    ];
@endphp

@section('content')
    <section class="py-10 sm:py-12 lg:min-h-[calc(100vh-5.5rem)] lg:py-10">
        <div class="mx-auto grid w-full max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[1.04fr_0.96fr] lg:items-start lg:px-8">
            <div class="space-y-6 sm:space-y-8 lg:pt-10">
                <div class="sf-reveal space-y-5">
                    <span class="sf-chip">Platform keamanan pangan modern untuk edukasi dan kolaborasi antar Prodi</span>
                    <h1 class="max-w-5xl text-4xl font-bold leading-[1.08] text-slate-950 sm:text-5xl sm:leading-[1.02] md:text-6xl lg:text-7xl lg:leading-[0.96] dark:text-white">
                        SafeFood
                        <span class="bg-gradient-to-r from-teal-500 via-cyan-500 to-amber-400 bg-clip-text text-transparent">
                            mengajarkan keamanan pangan dengan cara yang cerdas.
                        </span>
                    </h1>
                    <p class="max-w-2xl text-base leading-7 text-slate-600 sm:text-lg sm:leading-8 dark:text-slate-300">
                        SafeFood merupakan platform edukasi digital yang menghadirkan solusi pembelajaran keamanan pangan secara modern dan interaktif.
                        Dengan integrasi materi HACCP, fitur pengecekan keamanan makanan, analisis nutrisi, kuis pembelajaran, dan artikel edukatif,
                        SafeFood membantu mahasiswa dan masyarakat memahami serta menerapkan praktik keamanan pangan yang lebih aman, cerdas, dan berkelanjutan.
                    </p>
                </div>

                <div class="sf-reveal flex flex-col gap-4">
                    <div class="flex flex-col gap-4 sm:flex-row sm:flex-wrap">
                    <a href="{{ route('haccp') }}" class="sf-button-primary w-full sm:w-auto">Pelajari HACCP</a>
                    <a href="{{ route('safety-checker') }}" class="sf-button-secondary w-full sm:w-auto">Cek Keamanan Makanan</a>
                        <a href="{{ $entryAction['href'] }}" class="sf-button-secondary w-full sm:w-auto">{{ $entryAction['label'] }}</a>
                    </div>

                    <div class="flex flex-col gap-3 sm:flex-row sm:flex-wrap">
                        @foreach ($heroSignals as $signal)
                            <div class="inline-flex items-center gap-2 rounded-full border border-slate-200/80 bg-white/80 px-4 py-2 text-sm text-slate-600 shadow-sm backdrop-blur dark:border-slate-700/80 dark:bg-slate-900/70 dark:text-slate-300">
                                <span class="h-2 w-2 rounded-full bg-teal-500"></span>
                                <span>{{ $signal }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="sf-reveal grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                    @foreach ($heroStatCards as $card)
                        <div class="sf-stat-card p-5 md:p-6 dark:bg-slate-900/70">
                            <p class="text-sm uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">{{ $card['label'] }}</p>
                            <p class="mt-3 text-3xl font-bold text-slate-900 md:text-4xl dark:text-white">{{ $card['value'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="sf-reveal relative lg:pt-2">
                <div class="sf-panel relative overflow-hidden rounded-[2.5rem] border border-white/20 bg-gradient-to-br from-slate-950 via-slate-900 to-teal-950 p-4 shadow-[0_40px_120px_rgba(2,8,23,0.8)] sm:p-6">
                    <div class="absolute -left-20 -top-20 h-72 w-72 bg-teal-500/20 blur-[120px]"></div>
                    <div class="absolute -bottom-24 -right-24 h-80 w-80 bg-amber-400/20 blur-[140px]"></div>

                    <div class="relative rounded-[2rem] bg-gradient-to-br from-[#0b2239] via-[#0f766e] to-[#f59e0b] p-6 text-white shadow-[inset_0_0_0_1px_rgba(255,255,255,0.08)] sm:p-8">
                        <div class="flex items-start justify-between gap-6">
                            <div>
                                <p class="text-xs uppercase tracking-[0.35em] text-cyan-200">SafeFood Console</p>
                                <h2 class="mt-4 text-3xl font-bold leading-tight sm:text-4xl">Pelajari. Cek. Bandingkan.</h2>
                                <p class="mt-3 max-w-md text-white/70">
                                    Platform edukasi keamanan pangan modern dengan tools interaktif untuk membantu masyarakat memahami praktik food safety secara nyata.
                                </p>
                            </div>

                            <div class="hidden items-center gap-2 rounded-full bg-white/10 px-4 py-2 text-xs uppercase tracking-wider backdrop-blur sm:flex">
                                <span aria-hidden="true">&#9733;</span>
                                <span>Competition Ready</span>
                            </div>
                        </div>

                        <div class="mt-10 grid gap-5 lg:grid-cols-[1fr_1.2fr]">
                            <div class="rounded-[1.8rem] border border-white/15 bg-white/10 p-6 backdrop-blur-xl transition hover:bg-white/15">
                                <p class="text-xs uppercase tracking-widest text-white/60">Daily Safety Insight</p>
                                <p class="mt-4 text-2xl font-semibold leading-9">"{{ $dailyTip }}"</p>
                                <div class="mt-6 flex items-center gap-2 text-xs text-white/60">
                                    <div class="h-2 w-2 animate-pulse rounded-full bg-emerald-400"></div>
                                    <span>Live recommendation system</span>
                                </div>
                            </div>

                            <div class="grid gap-5">
                                <div class="rounded-[1.8rem] border border-white/10 bg-gradient-to-br from-slate-900 to-slate-950 p-6 shadow-[0_20px_60px_rgba(0,0,0,0.6)]">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm text-white/70">Food Safety Score</p>
                                        <span class="rounded-full bg-emerald-400/20 px-3 py-1 text-xs font-semibold text-emerald-300">Realtime</span>
                                    </div>

                                    <div class="mt-6 flex items-end gap-4">
                                        <p class="text-5xl font-bold tracking-tight">92</p>
                                        <p class="pb-2 text-sm text-white/60">Excellent hygiene practice</p>
                                    </div>

                                    <div class="mt-5 h-2 overflow-hidden rounded-full bg-white/10">
                                        <div class="h-full w-[92%] bg-gradient-to-r from-emerald-400 to-teal-400"></div>
                                    </div>
                                </div>

                                <div class="rounded-[1.8rem] border border-white/10 bg-white/5 p-6 backdrop-blur">
                                    <p class="text-sm text-white/70">Why judges notice this platform</p>

                                    <div class="mt-5 grid grid-cols-3 gap-4 text-center">
                                        @foreach ($judgeHighlights as $highlight)
                                            <div class="rounded-2xl bg-white/10 p-4 transition hover:bg-white/20">
                                                <p class="text-xl font-bold">{{ $highlight['value'] }}</p>
                                                <p class="mt-1 text-xs text-white/60">{{ $highlight['label'] }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 rounded-[1.8rem] border border-white/10 bg-white/5 p-6 backdrop-blur">
                            <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                                <div>
                                    <p class="text-xs uppercase tracking-[0.32em] text-white/55">Learning Tracks</p>
                                    <h3 class="mt-3 text-2xl font-bold">Jalur pembelajaran yang langsung terlihat</h3>
                                </div>
                                <span class="rounded-full border border-white/10 bg-white/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-white/70">
                                    {{ count($featuredModules) }} Modul Awal
                                </span>
                            </div>

                            <div class="mt-6 grid gap-3 sm:grid-cols-2">
                                @foreach ($featuredModules as $module)
                                    <div class="rounded-[1.4rem] border border-white/10 bg-white/10 p-4 transition duration-300 hover:bg-white/15">
                                        <p class="text-sm font-semibold text-white">{{ $module['title'] }}</p>
                                        <p class="mt-2 text-sm leading-6 text-white/65">{{ $module['description'] }}</p>
                                        <div class="mt-4 flex flex-wrap gap-2">
                                            @foreach (collect($module['items'])->take(2) as $item)
                                                <span class="rounded-full bg-white/10 px-3 py-1 text-[11px] font-medium text-white/75">{{ $item }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sf-container mt-24">
        <div class="sf-reveal flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <span class="sf-chip">Mengapa Keamanan Pangan Penting</span>
                <h2 class="mt-4 text-3xl font-bold leading-tight text-slate-950 sm:text-4xl dark:text-white">Keamanan pangan adalah isu kesehatan publik, bukan sekadar urusan dapur</h2>
            </div>
            <p class="max-w-xl text-sm leading-7 text-slate-600 dark:text-slate-300">
                SafeFood membantu pengguna memahami mengapa higienitas, penanganan yang bersih, suhu yang tepat, dan pengendalian kontaminasi penting dalam keputusan sehari-hari.
            </p>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-3">
            @foreach ($whyItMattersStats as $item)
                <article class="sf-panel sf-hover-lift sf-reveal p-8 dark:bg-slate-900/70">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-teal-500/20 to-cyan-500/10 text-teal-600 dark:text-teal-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <p class="mt-6 text-4xl font-bold text-slate-950 sm:text-5xl dark:text-white">{{ $item['value'] }}</p>
                    <h3 class="mt-4 text-xl font-bold text-slate-900 dark:text-white">{{ $item['label'] }}</h3>
                    <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ $item['description'] }}</p>
                </article>
            @endforeach
        </div>
        <p class="mt-5 text-xs uppercase tracking-[0.2em] text-slate-400 dark:text-slate-500">Dasar referensi: estimasi penyakit bawaan pangan dari CDC dan panduan higienitas preventif.</p>
    </section>

    <section class="sf-container mt-24">
        <div class="sf-reveal flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <span class="sf-chip">Fitur Utama Platform</span>
                <h2 class="mt-4 text-3xl font-bold leading-tight text-slate-950 sm:text-4xl dark:text-white">Lima fitur yang membentuk pengalaman SafeFood</h2>
            </div>
            <a href="{{ route('education') }}" class="sf-button-secondary">Jelajahi Edukasi</a>
        </div>

        <div class="mt-10 grid gap-6 lg:grid-cols-2 xl:grid-cols-3">
            @foreach ($coreFeatures as $feature)
                <div class="sf-reveal">
                    <x-feature-card
                        :icon="$feature['icon']"
                        :title="$feature['title']"
                        :description="$feature['description']"
                        :href="$feature['href']"
                        :cta="$feature['cta']"
                        :accent="$feature['accent']"
                        :protected="true"
                    />
                </div>
            @endforeach
        </div>
    </section>

    <section class="sf-container mt-24">
        <div class="grid gap-8 xl:grid-cols-[1.02fr_0.98fr]">
            <div class="sf-panel sf-reveal overflow-hidden p-8 md:p-10 dark:bg-slate-900/70">
                <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                    <div>
                        <span class="sf-chip">Learning Tracks</span>
                        <h2 class="mt-4 text-3xl font-bold leading-tight text-slate-950 sm:text-4xl dark:text-white">Materi SafeFood terasa lebih terstruktur dan siap dipelajari</h2>
                    </div>
                    <a href="{{ route('education') }}" class="sf-button-secondary">Lihat Semua Materi</a>
                </div>

                <div class="mt-8 grid gap-4 md:grid-cols-2">
                    @foreach ($featuredModules as $index => $module)
                        <article class="rounded-[1.7rem] border border-slate-200/80 bg-white/85 p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-[0_20px_40px_rgba(15,23,42,0.08)] dark:border-slate-700 dark:bg-slate-950/65">
                            <div class="flex items-center justify-between gap-4">
                                <span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-teal-500/20 to-cyan-500/10 text-lg font-bold text-teal-700 dark:text-teal-300">
                                    {{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}
                                </span>
                                <span class="rounded-full border border-slate-200/80 bg-slate-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-600 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300">
                                    {{ count($module['items']) }} Fokus
                                </span>
                            </div>
                            <h3 class="mt-5 text-xl font-bold text-slate-950 dark:text-white">{{ $module['title'] }}</h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ $module['description'] }}</p>
                            <ul class="mt-5 space-y-3">
                                @foreach ($module['items'] as $item)
                                    <li class="flex items-start gap-3 text-sm text-slate-600 dark:text-slate-300">
                                        <span class="mt-1.5 h-2.5 w-2.5 rounded-full bg-teal-500 dark:bg-teal-300"></span>
                                        <span>{{ $item }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </article>
                    @endforeach
                </div>
            </div>

            <div class="space-y-6">
                <div class="sf-panel sf-reveal bg-[linear-gradient(145deg,#0f172a,#0f766e)] p-8 text-white md:p-10">
                    <span class="inline-flex rounded-full bg-white/10 px-4 py-1 text-sm font-medium text-white/90">Nilai Platform</span>
                    <h3 class="mt-5 text-3xl font-bold leading-tight">Beranda yang bukan hanya cantik, tetapi menjelaskan value produk dengan cepat.</h3>
                    <p class="mt-4 text-base leading-8 text-slate-100/85">
                        SafeFood dirancang untuk menunjukkan alur belajar, alat interaktif, dan kekuatan edukasi dalam satu halaman yang mudah dipahami pengguna maupun dewan juri.
                    </p>

                    <div class="mt-8 grid gap-4">
                        @foreach ($platformAdvantages as $advantage)
                            <div class="rounded-[1.5rem] border border-white/10 bg-white/10 p-5 backdrop-blur">
                                <p class="text-lg font-semibold text-white">{{ $advantage['title'] }}</p>
                                <p class="mt-2 text-sm leading-7 text-slate-100/75">{{ $advantage['description'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="sf-panel sf-reveal p-8 dark:bg-slate-900/70">
                    <span class="sf-chip">Quick Snapshot</span>
                    <h3 class="mt-4 text-3xl font-bold leading-tight text-slate-950 dark:text-white">Apa yang langsung bisa dilakukan pengunjung?</h3>
                    <div class="mt-6 grid gap-4">
                        <div class="rounded-[1.5rem] bg-slate-50 p-5 dark:bg-slate-950/60">
                            <p class="text-sm font-semibold uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400">01</p>
                            <p class="mt-2 text-lg font-bold text-slate-950 dark:text-white">Masuk ke materi edukasi</p>
                            <p class="mt-2 text-sm leading-7 text-slate-600 dark:text-slate-300">Mulai dari HACCP, higiene, dan penyimpanan pangan yang aman.</p>
                        </div>
                        <div class="rounded-[1.5rem] bg-slate-50 p-5 dark:bg-slate-950/60">
                            <p class="text-sm font-semibold uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400">02</p>
                            <p class="mt-2 text-lg font-bold text-slate-950 dark:text-white">Uji dengan fitur interaktif</p>
                            <p class="mt-2 text-sm leading-7 text-slate-600 dark:text-slate-300">Gunakan checker, compare nutrition, dan quiz untuk pengalaman yang lebih aktif.</p>
                        </div>
                        <div class="rounded-[1.5rem] bg-slate-50 p-5 dark:bg-slate-950/60">
                            <p class="text-sm font-semibold uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400">03</p>
                            <p class="mt-2 text-lg font-bold text-slate-950 dark:text-white">Lanjutkan ke dashboard</p>
                            <p class="mt-2 text-sm leading-7 text-slate-600 dark:text-slate-300">Setelah login, pengguna diarahkan ke ruang belajar yang lebih fokus dan terukur.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sf-container mt-24">
        <div class="sf-reveal flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <span class="sf-chip">Mulai Dari Sini</span>
                <h2 class="mt-4 text-3xl font-bold leading-tight text-slate-950 sm:text-4xl dark:text-white">Alur tercepat untuk memahami SafeFood</h2>
            </div>
            <p class="max-w-2xl text-sm leading-7 text-slate-600 dark:text-slate-300">
                Bagian ini membuat pengunjung baru, juri, dan pengguna umum langsung paham ke mana harus mulai tanpa perlu menebak alur platform.
            </p>
        </div>

        <div class="mt-10 grid gap-6 lg:grid-cols-3">
            @foreach ($journeySteps as $step)
                <article class="sf-panel sf-reveal p-8 dark:bg-slate-900/70">
                    <p class="text-sm font-semibold uppercase tracking-[0.26em] text-teal-600 dark:text-teal-300">{{ $step['step'] }}</p>
                    <h3 class="mt-4 text-2xl font-bold text-slate-950 dark:text-white">{{ $step['title'] }}</h3>
                    <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ $step['description'] }}</p>
                    <a href="{{ $step['href'] }}" class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-teal-600 transition hover:gap-3 dark:text-teal-300">
                        {{ $step['cta'] }}
                        <span aria-hidden="true">-&gt;</span>
                    </a>
                </article>
            @endforeach
        </div>
    </section>

    <section class="sf-container mt-24">
        <div class="grid gap-8 xl:grid-cols-[0.95fr_1.05fr]">
            <div class="sf-panel sf-reveal p-8 md:p-10 dark:bg-slate-900/70">
                <span class="sf-chip">Alat Interaktif</span>
                <h2 class="mt-5 text-3xl font-bold leading-tight text-slate-950 sm:text-4xl dark:text-white">Alat yang mengubah pembelajaran menjadi tindakan</h2>
                <p class="mt-4 text-base leading-8 text-slate-600 dark:text-slate-300">
                    Kekuatan utama SafeFood adalah interaksi. Pengguna tidak hanya membaca; mereka juga memeriksa kebiasaan, membandingkan makanan, dan menguji pemahaman mereka.
                </p>

                <div class="mt-8 space-y-4">
                    @foreach ($interactiveTools as $tool)
                        <a href="{{ $tool['href'] }}" class="group flex items-center justify-between rounded-[1.5rem] bg-slate-50 px-5 py-4 transition hover:bg-slate-100 dark:bg-slate-950/60 dark:hover:bg-slate-950">
                            <div>
                                <div class="flex items-center gap-3">
                                    <span class="rounded-full bg-slate-900 px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-white dark:bg-white dark:text-slate-900">{{ $tool['badge'] }}</span>
                                    <p class="text-lg font-bold text-slate-900 dark:text-white">{{ $tool['title'] }}</p>
                                </div>
                                <p class="mt-2 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ $tool['description'] }}</p>
                            </div>
                            <span class="text-lg font-semibold text-teal-600 transition group-hover:translate-x-1 dark:text-teal-300">-&gt;</span>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="sf-panel sf-reveal overflow-hidden p-4 dark:bg-slate-900/70">
                <div class="rounded-[1.75rem] border border-slate-200/80 bg-white/75 p-7 backdrop-blur dark:border-slate-700 dark:bg-slate-950/80">
                    <div class="flex items-end justify-between gap-4">
                        <div>
                            <p class="text-sm uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Pratinjau</p>
                            <h3 class="mt-3 text-3xl font-bold text-slate-950 dark:text-white">Ayam vs Tempe</h3>
                        </div> 
                        <span class="rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold uppercase tracking-[0.16em] text-amber-700 dark:bg-amber-500/15 dark:text-amber-300">Chart.js Interactive</span>
                    </div>
                    <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-slate-300">
                        SafeFood menggunakan visualisasi perbandingan agar pengguna dapat membaca perbedaan nutrisi dengan cepat, bukan hanya memindai tabel.
                    </p>
                    <div class="mt-6 flex flex-wrap gap-3">
                        <div class="rounded-full border border-emerald-200/70 bg-emerald-50/80 px-4 py-2 text-sm dark:border-emerald-500/20 dark:bg-emerald-500/10">
                            <span class="font-semibold text-emerald-700 dark:text-emerald-300">Ayam</span>
                            <span class="mx-1 text-slate-400 dark:text-slate-500">&bull;</span>
                            <span class="text-slate-600 dark:text-slate-300">Protein lebih tinggi</span>
                        </div>
                        <div class="rounded-full border border-amber-200/70 bg-amber-50/80 px-4 py-2 text-sm dark:border-amber-500/20 dark:bg-amber-500/10">
                            <span class="font-semibold text-amber-700 dark:text-amber-300">Tempe</span>
                            <span class="mx-1 text-slate-400 dark:text-slate-500">&bull;</span>
                            <span class="text-slate-600 dark:text-slate-300">Kalori dan lemak lebih tinggi</span>
                        </div>
                    </div>
                    <div class="mt-6 rounded-[1.6rem] border border-slate-200/80 bg-[linear-gradient(180deg,rgba(255,255,255,0.9),rgba(241,245,249,0.86))] p-5 shadow-inner dark:border-slate-800 dark:bg-[linear-gradient(180deg,rgba(15,23,42,0.96),rgba(2,6,23,0.9))]">
                        <div class="mb-4 flex flex-wrap items-center gap-2">
                            <span class="rounded-full bg-slate-900 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-white dark:bg-white dark:text-slate-900">Per 100 gram</span>
                            <span class="rounded-full border border-slate-200 bg-white/80 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-600 dark:border-slate-700 dark:bg-slate-900/80 dark:text-slate-300">Premium comparison view</span>
                        </div>
                        <div class="relative h-[260px] sm:h-[280px]">
                            <div id="homepageNutritionChartSkeleton" class="sf-skeleton h-full rounded-[1rem]"></div>
                            <canvas id="homepageNutritionChart" height="280" class="hidden h-full w-full"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sf-container mt-24">
        <div class="grid gap-8 lg:grid-cols-[0.9fr_1.1fr]">
            <div class="sf-reveal">
                <span class="sf-chip">Pertanyaan Umum</span>
                <h2 class="mt-4 text-3xl font-bold leading-tight text-slate-950 sm:text-4xl dark:text-white">Hal penting yang sering ditanyakan pengguna</h2>
                <p class="mt-4 max-w-2xl text-base leading-8 text-slate-600 dark:text-slate-300">
                    FAQ singkat ini membantu pengunjung memahami konsep utama platform dengan cepat dan membuat beranda terasa lebih lengkap serta lebih meyakinkan untuk demo.
                </p>
            </div>

            <div class="space-y-4">
                @foreach ($faqs as $faq)
                    <article x-data="{ open: false }" class="sf-panel sf-reveal overflow-hidden dark:bg-slate-900/70">
                        <button
                            type="button"
                            @click="open = !open"
                            class="flex w-full items-center justify-between gap-4 px-6 py-5 text-left"
                            :aria-expanded="open"
                        >
                            <span class="text-lg font-semibold text-slate-900 dark:text-white">{{ $faq['question'] }}</span>
                            <span class="text-2xl font-light text-teal-600 dark:text-teal-300" x-text="open ? '-' : '+'"></span>
                        </button>
                        <div
                            x-show="open"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-2"
                            x-cloak
                            class="border-t border-slate-200 px-6 py-5 text-sm leading-7 text-slate-600 dark:border-slate-800 dark:text-slate-300"
                        >
                            {{ $faq['answer'] }}
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="sf-container mt-24">
        <div class="sf-reveal flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <span class="sf-chip">Artikel Edukasi Terbaru</span>
                <h2 class="mt-4 text-3xl font-bold leading-tight text-slate-950 sm:text-4xl dark:text-white">Kartu bacaan modern untuk pembelajaran yang relevan</h2>
            </div>
            <a href="{{ route('articles.index') }}" class="sf-button-secondary">Lihat Semua Artikel</a>
        </div>

        <div class="mt-10 grid gap-6 lg:grid-cols-3">
            @foreach ($latestArticles as $article)
                <article class="sf-panel sf-hover-lift sf-reveal overflow-hidden dark:bg-slate-900/70">
                    @if ($article->image_url)
                        <img src="{{ $article->image_url }}" alt="{{ $article->title }}" loading="lazy" decoding="async" class="h-52 w-full object-cover">
                    @else
                        <div class="h-52 w-full bg-[linear-gradient(135deg,#0f766e,#0891b2,#f59e0b)]"></div>
                    @endif
                    <div class="p-8">
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">{{ $article->created_at->format('d M Y') }}</p>
                        <h3 class="mt-4 text-2xl font-bold text-slate-950 dark:text-white">{{ $article->title }}</h3>
                        <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ \Illuminate\Support\Str::limit(strip_tags($article->content), 130) }}</p>
                        <a href="{{ route('articles.show', $article) }}" class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-teal-600 transition hover:gap-3 dark:text-teal-300">
                            Baca Selengkapnya
                            <span aria-hidden="true">-&gt;</span>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="sf-container mt-24">
        <div class="sf-panel sf-reveal relative overflow-hidden px-6 py-8 sm:px-8 sm:py-10 md:px-10 dark:bg-slate-900/70">
            <div class="pointer-events-none absolute inset-x-0 top-0 h-28 bg-[linear-gradient(120deg,rgba(20,184,166,0.14),rgba(59,130,246,0.08),rgba(245,158,11,0.16))]"></div>
            <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <div>
                    <span class="sf-chip">Statistik Platform</span>
                    <h2 class="mt-4 text-3xl font-bold leading-tight text-slate-950 sm:text-4xl dark:text-white">Metrik yang memperkuat kredibilitas platform</h2>
                </div>
                <p class="max-w-xl text-sm leading-7 text-slate-600 dark:text-slate-300">
                    Penghitung bergaya startup membantu menyampaikan cakupan platform dengan cepat dan memberi juri gambaran jelas tentang nilainya.
                </p>
            </div>

            <div class="mt-10 grid gap-6 md:grid-cols-3">
                @foreach ($platformStats as $item)
                    <div class="rounded-[1.75rem] border border-slate-200 bg-white/85 px-6 py-8 text-center shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-[0_20px_40px_rgba(15,23,42,0.08)] dark:border-slate-700 dark:bg-slate-950/70">
                        <p class="text-4xl font-bold text-slate-950 sm:text-5xl dark:text-white">
                            <span class="sf-counter" data-target="{{ $item['value'] }}">0</span>{{ $item['suffix'] }}
                        </p>
                        <p class="mt-4 text-sm font-medium uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">{{ $item['label'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 grid gap-4 md:grid-cols-3">
                @foreach ($closingSignals as $signal)
                    <div class="rounded-[1.5rem] border border-slate-200/80 bg-white/70 px-5 py-4 backdrop-blur dark:border-slate-700 dark:bg-slate-950/60">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400 dark:text-slate-500">{{ $signal['label'] }}</p>
                        <p class="mt-2 text-base font-semibold text-slate-900 dark:text-white">{{ $signal['value'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="sf-container mb-8 mt-24">
        <div class="sf-panel sf-reveal relative overflow-hidden bg-[linear-gradient(140deg,#081124,#0f766e,#155e75)] px-6 py-10 text-white shadow-[0_32px_90px_rgba(15,23,42,0.22)] sm:px-8 sm:py-12 md:px-12">
            <div class="absolute -right-10 top-0 h-48 w-48 rounded-full bg-amber-400/15 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 h-56 w-56 rounded-full bg-cyan-400/15 blur-3xl"></div>
            <div class="relative grid gap-8 xl:grid-cols-[1.05fr_0.95fr] xl:items-end">
                <div class="max-w-2xl">
                    <span class="inline-flex rounded-full border border-white/10 bg-white/10 px-4 py-1 text-sm font-medium text-white/90">Aksi Sekarang</span>
                    <h2 class="mt-5 text-3xl font-bold leading-tight sm:text-4xl">Mulai pelajari keamanan pangan hari ini dengan tampilan dan pengalaman yang lebih meyakinkan.</h2>
                    <p class="mt-4 text-base leading-8 text-slate-100/90">
                        SafeFood dirancang agar jelas, interaktif, dan siap untuk kompetisi, dengan desain modern, alur pembelajaran yang runtut, dan fitur yang benar-benar terasa hidup saat dicoba.
                    </p>

                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <a href="{{ route('education') }}" class="sf-button-secondary border-white/20 bg-white/10 text-white">Jelajahi Edukasi</a>
                        <a href="{{ route('quiz') }}" class="sf-button-primary">Ikuti Kuis</a>
                    </div>

                    <div class="mt-8 grid gap-4 md:grid-cols-3">
                        @foreach ($closingPillars as $pillar)
                            <div class="rounded-[1.5rem] border border-white/10 bg-white/10 p-5 backdrop-blur">
                                <p class="text-base font-semibold text-white">{{ $pillar['title'] }}</p>
                                <p class="mt-2 text-sm leading-7 text-slate-100/75">{{ $pillar['description'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="rounded-[1.9rem] border border-white/10 bg-white/10 p-5 backdrop-blur-xl">
                    <div class="rounded-[1.5rem] border border-white/10 bg-slate-950/35 p-6">
                        <p class="text-xs uppercase tracking-[0.3em] text-cyan-200/80">SafeFood Closing Note</p>
                        <h3 class="mt-4 text-2xl font-bold">Platform edukasi yang terasa siap pakai, siap belajar, dan siap dipresentasikan.</h3>
                        <p class="mt-4 text-sm leading-7 text-slate-100/75">
                            Dari landing page hingga dashboard, SafeFood dibentuk untuk memberi kesan modern, terarah, dan profesional bagi pengguna umum maupun juri kompetisi.
                        </p>

                        <div class="mt-6 space-y-3">
                            <div class="flex items-center justify-between rounded-2xl bg-white/10 px-4 py-3">
                                <span class="text-sm text-white/75">Interactive learning tools</span>
                                <span class="text-sm font-semibold text-white">Active</span>
                            </div>
                            <div class="flex items-center justify-between rounded-2xl bg-white/10 px-4 py-3">
                                <span class="text-sm text-white/75">Learning dashboard</span>
                                <span class="text-sm font-semibold text-white">Ready</span>
                            </div>
                            <div class="flex items-center justify-between rounded-2xl bg-white/10 px-4 py-3">
                                <span class="text-sm text-white/75">Competition presentation feel</span>
                                <span class="text-sm font-semibold text-emerald-200">Premium</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const revealItems = document.querySelectorAll('.sf-reveal');
            const counters = document.querySelectorAll('.sf-counter');

            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        revealObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.12 });

            revealItems.forEach((item) => revealObserver.observe(item));

            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) {
                        return;
                    }

                    const counter = entry.target;
                    const target = Number(counter.dataset.target);
                    const duration = 1200;
                    const start = performance.now();

                    const animate = (timestamp) => {
                        const progress = Math.min((timestamp - start) / duration, 1);
                        counter.textContent = Math.floor(progress * target);

                        if (progress < 1) {
                            requestAnimationFrame(animate);
                        } else {
                            counter.textContent = target;
                        }
                    };

                    requestAnimationFrame(animate);
                    counterObserver.unobserve(counter);
                });
            }, { threshold: 0.35 });

            counters.forEach((counter) => counterObserver.observe(counter));

            const chartCanvas = document.getElementById('homepageNutritionChart');
            const chartSkeleton = document.getElementById('homepageNutritionChartSkeleton');
            const revealChart = () => {
                chartSkeleton?.classList.add('hidden');
                chartCanvas?.classList.remove('hidden');
            };
            const chartSkeletonDelay = window.safeFoodSkeletonTimeout?.(850, 2800) ?? 1200;
            const chartSkeletonTimeout = window.setTimeout(revealChart, chartSkeletonDelay);

            if (chartCanvas && window.Chart) {
                const darkMode = document.documentElement.classList.contains('dark');
                const chartContext = chartCanvas.getContext('2d');
                const labels = ['Kalori', 'Protein', 'Lemak'];
                const units = ['kkal', 'g', 'g'];
                const tickColor = darkMode ? '#cbd5e1' : '#475569';
                const gridColor = darkMode ? 'rgba(148,163,184,0.12)' : 'rgba(148,163,184,0.18)';
                const legendColor = darkMode ? '#e2e8f0' : '#334155';
                const tooltipBackground = darkMode ? 'rgba(15,23,42,0.96)' : 'rgba(15,23,42,0.94)';
                const tooltipBorder = darkMode ? 'rgba(45,212,191,0.24)' : 'rgba(15,118,110,0.16)';

                const ayamGradient = chartContext.createLinearGradient(0, 0, 0, 280);
                ayamGradient.addColorStop(0, 'rgba(20,184,166,0.98)');
                ayamGradient.addColorStop(0.5, 'rgba(15,118,110,0.88)');
                ayamGradient.addColorStop(1, 'rgba(8,145,178,0.55)');

                const tempeGradient = chartContext.createLinearGradient(0, 0, 0, 280);
                tempeGradient.addColorStop(0, 'rgba(251,191,36,0.98)');
                tempeGradient.addColorStop(0.5, 'rgba(245,158,11,0.88)');
                tempeGradient.addColorStop(1, 'rgba(249,115,22,0.52)');

                const barGlowPlugin = {
                    id: 'barGlowPlugin',
                    beforeDatasetsDraw(chart) {
                        const { ctx } = chart;
                        ctx.save();
                        ctx.shadowBlur = 24;
                        ctx.shadowColor = darkMode ? 'rgba(45,212,191,0.22)' : 'rgba(15,118,110,0.18)';
                    },
                    afterDatasetsDraw(chart) {
                        chart.ctx.restore();
                    },
                };

                const chartAreaBackgroundPlugin = {
                    id: 'chartAreaBackgroundPlugin',
                    beforeDraw(chart) {
                        const { ctx, chartArea } = chart;

                        if (!chartArea) {
                            return;
                        }

                        const { left, top, width, height } = chartArea;
                        const gradient = ctx.createLinearGradient(left, top, left, top + height);
                        gradient.addColorStop(0, darkMode ? 'rgba(15,23,42,0.18)' : 'rgba(255,255,255,0.9)');
                        gradient.addColorStop(1, darkMode ? 'rgba(15,23,42,0.02)' : 'rgba(241,245,249,0.4)');

                        ctx.save();
                        ctx.fillStyle = gradient;
                        ctx.fillRect(left, top, width, height);
                        ctx.restore();
                    },
                };

                new Chart(chartCanvas, {
                    type: 'bar',
                    plugins: [barGlowPlugin, chartAreaBackgroundPlugin],
                    data: {
                        labels,
                        datasets: [
                            {
                                label: 'Ayam',
                                data: [165, 31, 3.6],
                                backgroundColor: ayamGradient,
                                borderColor: 'rgba(15,118,110,1)',
                                borderWidth: 1.2,
                                borderRadius: 18,
                                borderSkipped: false,
                                barThickness: 24,
                                maxBarThickness: 28,
                                categoryPercentage: 0.62,
                                barPercentage: 0.86,
                                hoverBackgroundColor: 'rgba(20,184,166,0.92)',
                                hoverBorderWidth: 1.5,
                            },
                            {
                                label: 'Tempe',
                                data: [193, 20.3, 10.8],
                                backgroundColor: tempeGradient,
                                borderColor: 'rgba(245,158,11,1)',
                                borderWidth: 1.2,
                                borderRadius: 18,
                                borderSkipped: false,
                                barThickness: 24,
                                maxBarThickness: 28,
                                categoryPercentage: 0.62,
                                barPercentage: 0.86,
                                hoverBackgroundColor: 'rgba(251,191,36,0.92)',
                                hoverBorderWidth: 1.5,
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: {
                            mode: 'index',
                            intersect: false,
                        },
                        plugins: {
                            legend: {
                                position: 'top',
                                align: 'start',
                                labels: {
                                    color: legendColor,
                                    usePointStyle: true,
                                    pointStyle: 'circle',
                                    boxWidth: 10,
                                    boxHeight: 10,
                                    padding: 20,
                                    font: {
                                        size: 12,
                                        weight: '700',
                                    }
                                }
                            },
                            tooltip: {
                                backgroundColor: tooltipBackground,
                                borderColor: tooltipBorder,
                                borderWidth: 1,
                                titleColor: '#ffffff',
                                bodyColor: '#e2e8f0',
                                footerColor: '#94a3b8',
                                displayColors: true,
                                padding: 14,
                                cornerRadius: 16,
                                boxPadding: 6,
                                titleFont: {
                                    size: 13,
                                    weight: '700',
                                },
                                bodyFont: {
                                    size: 12,
                                    weight: '600',
                                },
                                footerFont: {
                                    size: 11,
                                    weight: '500',
                                },
                                callbacks: {
                                    label(context) {
                                        const unit = units[context.dataIndex] ?? '';
                                        return `${context.dataset.label}: ${context.formattedValue} ${unit}`.trim();
                                    },
                                    footer() {
                                        return 'Perkiraan nilai per 100 gram';
                                    }
                                }
                            }
                        },
                        scales: {
                            x: {
                                ticks: {
                                    color: tickColor,
                                    font: {
                                        size: 12,
                                        weight: '700',
                                    }
                                },
                                grid: {
                                    display: false,
                                }
                            },
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    color: tickColor,
                                    font: {
                                        size: 11,
                                        weight: '600',
                                    }
                                },
                                grid: {
                                    color: gridColor,
                                    drawBorder: false,
                                },
                                border: {
                                    display: false,
                                }
                            }
                        },
                        animation: {
                            duration: 1400,
                            easing: 'easeOutQuart',
                            delay(context) {
                                return context.type === 'data' ? context.dataIndex * 120 + context.datasetIndex * 140 : 0;
                            },
                        }
                    }
                });

                clearTimeout(chartSkeletonTimeout);
                revealChart();
                return;
            }

            clearTimeout(chartSkeletonTimeout);
            revealChart();
        });
    </script>
@endpush
