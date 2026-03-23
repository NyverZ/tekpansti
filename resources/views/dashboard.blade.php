@extends('layouts.dashboard')

@section('content')
    @php
        $isAdmin = auth()->user()->role === 'admin';

        if ($isAdmin) {
            $chartLabels = ['Bahan', 'Nutrisi', 'Artikel'];
            $chartValues = [$stats['ingredients'], $stats['nutrients'], $stats['articles']];
            $chartColors = ['#0f766e', '#0891b2', '#d97706'];

            $metricCards = [
                [
                    'label' => 'Bahan Pangan',
                    'value' => $stats['ingredients'],
                    'description' => 'Database bahan pangan aktif',
                    'glow' => 'from-teal-500/20 via-teal-400/10 to-transparent',
                ],
                [
                    'label' => 'Nutrisi',
                    'value' => $stats['nutrients'],
                    'description' => 'Komponen gizi terkelola',
                    'glow' => 'from-sky-500/20 via-cyan-400/10 to-transparent',
                ],
                [
                    'label' => 'Artikel',
                    'value' => $stats['articles'],
                    'description' => 'Konten edukasi tersedia',
                    'glow' => 'from-amber-500/20 via-orange-400/10 to-transparent',
                ],
            ];

            $chartLabels[] = 'Pengguna';
            $chartValues[] = $stats['users'];
            $chartColors[] = '#334155';

            $metricCards[] = [
                'label' => 'Pengguna',
                'value' => $stats['users'],
                'description' => 'Akun terdaftar aktif',
                'glow' => 'from-slate-400/20 via-slate-300/10 to-transparent',
            ];

            $quickActions = [
                [
                    'title' => 'Tambah Bahan Pangan',
                    'description' => 'Input data baru langsung dari workspace admin.',
                    'route' => route('admin.ingredients.create'),
                    'glow' => 'from-teal-500/18 via-cyan-400/8 to-transparent',
                ],
                [
                    'title' => 'Publikasikan Artikel',
                    'description' => 'Luncurkan konten edukasi baru untuk pengguna.',
                    'route' => route('admin.articles.create'),
                    'glow' => 'from-amber-500/18 via-orange-400/8 to-transparent',
                ],
            ];
        } else {
            $progressTopics = [
                ['title' => 'HACCP', 'completed' => true],
                ['title' => 'Higiene dan Sanitasi', 'completed' => true],
                ['title' => 'Pengolahan dan Penyimpanan', 'completed' => false],
            ];

            $learningProgress = 70;
            $completedTopicCount = collect($progressTopics)->where('completed', true)->count();
            $safetyScore = 92;

            $learningStats = [
                [
                    'label' => 'Artikel dibaca',
                    'value' => 12,
                    'description' => 'Konten edukasi yang sudah Anda pelajari.',
                    'accent' => 'from-emerald-500/20 via-teal-400/10 to-transparent',
                    'icon' => 'article',
                ],
                [
                    'label' => 'Kuis diselesaikan',
                    'value' => 7,
                    'description' => 'Evaluasi singkat untuk menguji pemahaman.',
                    'accent' => 'from-sky-500/20 via-cyan-400/10 to-transparent',
                    'icon' => 'quiz',
                ],
                [
                    'label' => 'Checker digunakan',
                    'value' => 9,
                    'description' => 'Pemeriksaan keamanan pangan yang telah dilakukan.',
                    'accent' => 'from-amber-500/20 via-orange-400/10 to-transparent',
                    'icon' => 'checker',
                ],
            ];

            $learningBadges = [
                [
                    'title' => 'Beginner Learner',
                    'description' => 'Mulai memahami fondasi keamanan pangan dengan baik.',
                    'gradient' => 'from-amber-400 via-orange-400 to-amber-500',
                    'icon' => 'bronze',
                ],
                [
                    'title' => 'Safety Explorer',
                    'description' => 'Aktif mengeksplor fitur checker, artikel, dan perbandingan nutrisi.',
                    'gradient' => 'from-slate-300 via-slate-200 to-slate-400',
                    'icon' => 'silver',
                ],
                [
                    'title' => 'HACCP Master',
                    'description' => 'Siap menerapkan prinsip HACCP dalam praktik pangan sehari-hari.',
                    'gradient' => 'from-yellow-300 via-amber-300 to-yellow-500',
                    'icon' => 'gold',
                ],
            ];

            $quickAccessTools = [
                [
                    'title' => 'Edukasi',
                    'description' => 'Pelajari materi inti keamanan pangan dari dasar sampai praktik.',
                    'route' => route('education'),
                    'icon' => 'education',
                ],
                [
                    'title' => 'Checker',
                    'description' => 'Cek keamanan makanan dengan alur evaluasi yang cepat.',
                    'route' => route('safety-checker'),
                    'icon' => 'checker',
                ],
                [
                    'title' => 'Compare Nutrition',
                    'description' => 'Bandingkan data nutrisi bahan pangan secara praktis.',
                    'route' => route('foods.compare'),
                    'icon' => 'compare',
                ],
                [
                    'title' => 'Quiz',
                    'description' => 'Uji pemahaman keamanan pangan lewat kuis interaktif.',
                    'route' => route('quiz'),
                    'icon' => 'quiz',
                ],
                [
                    'title' => 'Articles',
                    'description' => 'Baca insight, tips, dan artikel terbaru dari SafeFood.',
                    'route' => route('articles.index'),
                    'icon' => 'article',
                ],
            ];
        }
    @endphp

    @if ($isAdmin)
        <section class="space-y-6">
        <div class="grid gap-6 xl:grid-cols-[1.15fr_0.85fr]">
            <div class="relative overflow-hidden rounded-[2rem] border border-slate-200/70 bg-[linear-gradient(135deg,#07162c_0%,#0f766e_48%,#0b3a63_100%)] px-6 py-7 text-white shadow-[0_30px_90px_rgba(2,8,23,0.28)] sm:px-8 sm:py-8">
                <div class="pointer-events-none absolute inset-0 opacity-25 [background:linear-gradient(rgba(255,255,255,0.18)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.18)_1px,transparent_1px)] [background-size:34px_34px]"></div>
                <div class="pointer-events-none absolute -left-20 top-0 h-56 w-56 rounded-full bg-cyan-300/25 blur-3xl"></div>
                <div class="pointer-events-none absolute -right-24 bottom-0 h-64 w-64 rounded-full bg-amber-300/20 blur-3xl"></div>

                <div class="relative">
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="inline-flex items-center gap-2 rounded-full border border-emerald-300/40 bg-emerald-400/10 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-emerald-100">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-300"></span>
                            System Online
                        </span>
                    </div>

                    <h2 class="mt-5 max-w-3xl text-3xl font-bold leading-[1.02] sm:text-4xl xl:text-[2.8rem]">
                        @if ($isAdmin)
                            Ruang kontrol modern untuk mengelola data, konten, dan pertumbuhan SafeFood.
                        @else
                            Workspace pembelajaran modern untuk memantau progres dan eksplorasi fitur SafeFood.
                        @endif
                    </h2>

                    <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-100/90 sm:text-base">
                        @if ($isAdmin)
                            Lihat gambaran operasional, eksekusi aksi cepat, dan pantau knowledge feed dari satu dashboard yang terasa seperti product workspace startup.
                        @else
                            Akses fitur pembelajaran, pantau resource inti, dan lanjutkan eksplorasi keamanan pangan dari satu dashboard yang lebih fokus.
                        @endif
                    </p>

                    <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                        @if ($isAdmin)
                            <a href="{{ route('admin.articles.index') }}" class="sf-button-secondary border-white/20 bg-white/10 text-white hover:bg-white/15">Kelola Artikel</a>
                            <a href="{{ route('admin.ingredients.index') }}" class="sf-button-secondary border-white/20 bg-white/10 text-white hover:bg-white/15">Kelola Bahan Pangan</a>
                        @else
                            <a href="{{ route('education') }}" class="sf-button-secondary border-white/20 bg-white/10 text-white hover:bg-white/15">Lanjut Belajar</a>
                            <a href="{{ route('foods.compare') }}" class="sf-button-secondary border-white/20 bg-white/10 text-white hover:bg-white/15">Bandingkan Nutrisi</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-1">
                <article class="relative overflow-hidden rounded-[1.8rem] border border-slate-200/80 bg-white/88 p-5 shadow-[0_18px_50px_rgba(15,23,42,0.08)] dark:border-slate-700/70 dark:bg-slate-900/82">
                    <div class="pointer-events-none absolute -right-4 -top-6 h-24 w-24 rounded-full bg-teal-300/30 blur-2xl dark:bg-teal-400/20"></div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400 dark:text-slate-500">Daily Insight</p>
                    <h3 class="mt-2 text-xl font-bold text-slate-900 dark:text-white">Safety signal hari ini</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ $dailyTip }}</p>
                    <a href="{{ route('education') }}" class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-teal-700 dark:text-teal-300">
                        Buka Edukasi
                        <span aria-hidden="true">-&gt;</span>
                    </a>
                </article>

                <article class="rounded-[1.8rem] border border-slate-200/80 bg-white/88 p-5 shadow-[0_18px_50px_rgba(15,23,42,0.08)] dark:border-slate-700/70 dark:bg-slate-900/82">
                    <div class="flex items-center justify-between gap-3">
                        <div>
                            <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400 dark:text-slate-500">System Pulse</p>
                            <h3 class="mt-2 text-xl font-bold text-slate-900 dark:text-white">Snapshot</h3>
                        </div>
                        <span class="rounded-full border border-slate-200/80 bg-slate-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-600 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300">
                            {{ count($metricCards) }} Metrics
                        </span>
                    </div>

                    <div class="mt-5 grid gap-3 sm:grid-cols-2 xl:grid-cols-2">
                        @foreach (array_slice($metricCards, 0, min(4, count($metricCards))) as $card)
                            <div class="rounded-[1.2rem] border border-slate-200/80 bg-slate-50/90 px-4 py-4 dark:border-slate-700 dark:bg-slate-950/70">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-400 dark:text-slate-500">{{ $card['label'] }}</p>
                                <p class="mt-2 text-2xl font-bold text-slate-900 dark:text-white">{{ $card['value'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </article>
            </div>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
            @foreach ($metricCards as $card)
                <article class="group relative overflow-hidden rounded-[1.65rem] border border-slate-200/80 bg-white/88 p-5 shadow-[0_16px_45px_rgba(15,23,42,0.06)] transition duration-300 hover:-translate-y-1 dark:border-slate-700/70 dark:bg-slate-900/82">
                    <div class="pointer-events-none absolute inset-x-0 top-0 h-20 bg-gradient-to-r {{ $card['glow'] }}"></div>
                    <div class="relative">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400 dark:text-slate-500">{{ $card['label'] }}</p>
                        <p class="mt-4 text-4xl font-bold tracking-tight text-slate-900 dark:text-white">{{ $card['value'] }}</p>
                        <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">{{ $card['description'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="grid gap-6 xl:grid-cols-[1.1fr_0.9fr]">
            <div class="space-y-6">
                <div class="rounded-[1.9rem] border border-slate-200/80 bg-white/88 p-6 shadow-[0_18px_50px_rgba(15,23,42,0.08)] dark:border-slate-700/70 dark:bg-slate-900/82">
                    <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                        <div>
                            <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400 dark:text-slate-500">Analytics Board</p>
                            <h3 class="mt-2 text-2xl font-bold text-slate-900 dark:text-white">Metrik SafeFood</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-500 dark:text-slate-400">Visual cepat untuk melihat skala data dan pertumbuhan resource platform.</p>
                        </div>
                    </div>

                    <div class="mt-6 relative h-[280px]">
                        <div id="dashboardMetricsChartSkeleton" class="sf-skeleton h-[280px] rounded-[1.15rem]"></div>
                        <canvas id="dashboardMetricsChart" height="280" class="hidden h-full w-full"></canvas>
                    </div>
                </div>

                <div class="rounded-[1.9rem] border border-slate-200/80 bg-white/88 p-6 shadow-[0_18px_50px_rgba(15,23,42,0.08)] dark:border-slate-700/70 dark:bg-slate-900/82">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400 dark:text-slate-500">Quick Actions</p>
                            <h3 class="mt-2 text-2xl font-bold text-slate-900 dark:text-white">Launchpad</h3>
                        </div>
                    </div>

                    <div class="mt-6 grid gap-3 sm:grid-cols-2">
                        @foreach ($quickActions as $action)
                            <a href="{{ $action['route'] }}" class="group relative overflow-hidden rounded-[1.35rem] border border-slate-200/80 bg-white/75 px-5 py-5 transition duration-300 hover:-translate-y-1 hover:border-teal-300 hover:shadow-[0_18px_40px_rgba(15,118,110,0.12)] dark:border-slate-700 dark:bg-slate-950/75 dark:hover:border-teal-500/50">
                                <div class="pointer-events-none absolute inset-x-0 top-0 h-20 bg-gradient-to-r {{ $action['glow'] }}"></div>
                                <div class="relative">
                                    <p class="text-lg font-semibold text-slate-900 dark:text-white">{{ $action['title'] }}</p>
                                    <p class="mt-2 text-sm leading-6 text-slate-600 dark:text-slate-300">{{ $action['description'] }}</p>
                                    <span class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-teal-700 dark:text-teal-300">
                                        Buka Sekarang
                                        <span aria-hidden="true">-&gt;</span>
                                    </span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="rounded-[1.9rem] border border-slate-200/80 bg-white/88 p-6 shadow-[0_18px_50px_rgba(15,23,42,0.08)] dark:border-slate-700/70 dark:bg-slate-900/82">
                    <div class="flex items-center justify-between gap-3">
                        <div>
                            <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400 dark:text-slate-500">Knowledge Feed</p>
                            <h3 class="mt-2 text-2xl font-bold text-slate-900 dark:text-white">Artikel terbaru</h3>
                        </div>
                        <a href="{{ route('articles.index') }}" class="text-sm font-semibold text-teal-700 dark:text-teal-300">Lihat semua</a>
                    </div>

                    <div class="mt-6 space-y-3">
                        @forelse ($latestArticles as $article)
                            <article class="group rounded-[1.3rem] border border-slate-200/80 bg-slate-50/85 px-5 py-4 transition duration-300 hover:-translate-y-0.5 hover:border-teal-300 hover:bg-white dark:border-slate-700 dark:bg-slate-950/65 dark:hover:border-teal-500/50">
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <p class="text-sm font-semibold leading-6 text-slate-900 dark:text-white">{{ $article->title }}</p>
                                        <p class="mt-2 text-[11px] uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400">{{ $article->created_at->format('d M Y') }}</p>
                                    </div>

                                    @if ($isAdmin)
                                        <a href="{{ route('admin.articles.edit', $article) }}" class="text-sm font-semibold text-teal-700 dark:text-teal-300">Ubah</a>
                                    @else
                                        <a href="{{ route('articles.show', $article) }}" class="text-sm font-semibold text-teal-700 dark:text-teal-300">Baca</a>
                                    @endif
                                </div>
                            </article>
                        @empty
                            <div class="rounded-[1.35rem] border border-dashed border-slate-300 bg-slate-50 px-5 py-8 text-center dark:border-slate-700 dark:bg-slate-900/60">
                                <p class="font-semibold text-slate-700 dark:text-slate-200">Belum ada artikel yang dipublikasikan.</p>
                                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Konten baru akan muncul otomatis di feed ini.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="rounded-[1.9rem] border border-slate-200/80 bg-[linear-gradient(140deg,#ffffff,#eef6ff)] p-6 shadow-[0_18px_50px_rgba(15,23,42,0.08)] dark:border-slate-700/70 dark:bg-[linear-gradient(140deg,rgba(15,23,42,0.92),rgba(15,118,110,0.14))]">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400 dark:text-slate-500">Workflow Notes</p>
                    <h3 class="mt-2 text-2xl font-bold text-slate-900 dark:text-white">Ruang kerja yang lebih fokus</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">
                        Dashboard ini sekarang terasa lebih seperti: ringkas di atas, kuat di data inti, dan tetap memberi prioritas pada aksi yang paling penting.
                    </p>

                    <div class="mt-5 grid gap-3 sm:grid-cols-2">
                        <div class="rounded-[1.2rem] border border-white/80 bg-white/80 px-4 py-4 dark:border-slate-700/70 dark:bg-slate-950/55">
                            <p class="text-sm font-semibold text-slate-900 dark:text-white">Signal Cepat</p>
                            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Stat utama langsung terbaca tanpa harus berpindah panel.</p>
                        </div>
                        <div class="rounded-[1.2rem] border border-white/80 bg-white/80 px-4 py-4 dark:border-slate-700/70 dark:bg-slate-950/55">
                            <p class="text-sm font-semibold text-slate-900 dark:text-white">Action First</p>
                            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Aksi paling relevan tetap dekat dengan konteks kerja Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
        <section class="space-y-6">
            <div class="grid gap-6 xl:grid-cols-[1.2fr_0.8fr]">
                <div class="relative overflow-hidden rounded-[2rem] border border-white/70 bg-[linear-gradient(135deg,#082f49_0%,#0f766e_48%,#10b981_100%)] px-6 py-7 text-white shadow-[0_30px_90px_rgba(2,8,23,0.24)] sm:px-8 sm:py-8">
                    <div class="pointer-events-none absolute inset-0 opacity-20 [background:linear-gradient(rgba(255,255,255,0.18)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.18)_1px,transparent_1px)] [background-size:38px_38px]"></div>
                    <div class="pointer-events-none absolute -left-16 top-0 h-52 w-52 rounded-full bg-cyan-300/25 blur-3xl"></div>
                    <div class="pointer-events-none absolute -right-12 bottom-0 h-60 w-60 rounded-full bg-emerald-200/20 blur-3xl"></div>

                    <div class="relative">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-white/90">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-200"></span>
                                Learning Journey Active
                            </span>
                            <span class="inline-flex rounded-full border border-white/20 bg-white/10 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-white/85">
                                {{ $completedTopicCount }}/{{ count($progressTopics) }} Topik Selesai
                            </span>
                        </div>

                        <h2 class="mt-5 max-w-3xl text-3xl font-bold leading-[1.02] sm:text-4xl xl:text-[2.8rem]">
                            Selamat datang kembali di SafeFood
                        </h2>

                        <p class="mt-4 max-w-2xl text-sm leading-7 text-emerald-50/90 sm:text-base">
                            Lanjutkan perjalanan belajar keamanan pangan Anda dengan dashboard yang lebih fokus, interaktif, dan siap membantu Anda membangun kebiasaan pangan yang lebih aman.
                        </p>

                        <div class="mt-7 flex flex-col gap-3 sm:flex-row sm:flex-wrap">
                            <a href="{{ route('haccp') }}" class="inline-flex items-center justify-center rounded-2xl bg-white px-5 py-3 text-sm font-semibold text-emerald-700 shadow-lg transition duration-300 hover:-translate-y-0.5 hover:shadow-xl">
                                Pelajari HACCP
                            </a>
                            <a href="{{ route('safety-checker') }}" class="inline-flex items-center justify-center rounded-2xl border border-white/20 bg-white/10 px-5 py-3 text-sm font-semibold text-white backdrop-blur transition duration-300 hover:-translate-y-0.5 hover:bg-white/15">
                                Cek Keamanan Makanan
                            </a>
                            <a href="{{ route('quiz') }}" class="inline-flex items-center justify-center rounded-2xl border border-white/20 bg-white/10 px-5 py-3 text-sm font-semibold text-white backdrop-blur transition duration-300 hover:-translate-y-0.5 hover:bg-white/15">
                                Mulai Kuis
                            </a>
                        </div>
                    </div>
                </div>

                <div class="relative overflow-hidden rounded-[2rem] border border-slate-200/80 bg-white/80 p-6 shadow-[0_20px_60px_rgba(15,23,42,0.08)] backdrop-blur-xl dark:border-slate-700/70 dark:bg-slate-900/78">
                    <div class="pointer-events-none absolute -right-5 -top-8 h-28 w-28 rounded-full bg-emerald-200/50 blur-2xl dark:bg-emerald-500/20"></div>
                    <div class="relative">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400 dark:text-slate-500">Safety Insight</p>
                        <h3 class="mt-2 text-2xl font-bold text-slate-900 dark:text-white">Ritme belajar hari ini</h3>
                        <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ $dailyTip }}</p>

                        <div class="mt-5 rounded-[1.4rem] border border-emerald-200/70 bg-emerald-50/80 p-4 dark:border-emerald-500/20 dark:bg-emerald-500/10">
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <p class="text-sm font-semibold text-emerald-900 dark:text-emerald-200">Fokus berikutnya</p>
                                    <p class="mt-1 text-sm text-emerald-700 dark:text-emerald-300">Selesaikan topik penyimpanan pangan untuk membuka progres lanjutan.</p>
                                </div>
                                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white text-emerald-600 shadow-sm dark:bg-slate-900 dark:text-emerald-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6v6l4 2" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid gap-6 xl:grid-cols-[1.05fr_0.95fr]">
                <article class="rounded-[1.9rem] border border-slate-200/80 bg-white/82 p-6 shadow-[0_18px_50px_rgba(15,23,42,0.08)] backdrop-blur-xl dark:border-slate-700/70 dark:bg-slate-900/80">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                        <div>
                            <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400 dark:text-slate-500">Learning Progress</p>
                            <h3 class="mt-2 text-2xl font-bold text-slate-900 dark:text-white">Progress Edukasi Keamanan Pangan</h3>
                            <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Pantau modul yang sudah Anda kuasai dan lanjutkan topik berikutnya.</p>
                        </div>
                        <span class="inline-flex rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-emerald-700 dark:border-emerald-500/20 dark:bg-emerald-500/10 dark:text-emerald-300">
                            {{ $learningProgress }}% Complete
                        </span>
                    </div>

                    <div class="mt-6">
                        <div class="h-3 overflow-hidden rounded-full bg-slate-200 dark:bg-slate-800">
                            <div class="h-full rounded-full bg-[linear-gradient(90deg,#10b981,#0f766e)] shadow-[0_8px_24px_rgba(16,185,129,0.32)]" style="width: {{ $learningProgress }}%"></div>
                        </div>
                    </div>

                    <div class="mt-6 space-y-3">
                        @foreach ($progressTopics as $topic)
                            <div class="flex items-center gap-3 rounded-[1.2rem] border border-slate-200/80 bg-slate-50/80 px-4 py-3 dark:border-slate-700 dark:bg-slate-950/60">
                                <span class="flex h-10 w-10 items-center justify-center rounded-full {{ $topic['completed'] ? 'bg-emerald-100 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-300' : 'bg-slate-200 text-slate-500 dark:bg-slate-800 dark:text-slate-400' }}">
                                    @if ($topic['completed'])
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3a9 9 0 100 18 9 9 0 000-18z" />
                                        </svg>
                                    @endif
                                </span>
                                <div class="min-w-0 flex-1">
                                    <p class="font-semibold text-slate-900 dark:text-white">{{ $topic['title'] }}</p>
                                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                                        {{ $topic['completed'] ? 'Topik ini sudah dipelajari dan siap dipraktikkan.' : 'Topik ini menunggu untuk Anda selesaikan berikutnya.' }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </article>

                <article class="relative overflow-hidden rounded-[1.9rem] border border-slate-200/80 bg-[linear-gradient(150deg,#0f172a_0%,#0f766e_65%,#10b981_100%)] p-6 text-white shadow-[0_24px_70px_rgba(2,8,23,0.22)]">
                    <div class="pointer-events-none absolute inset-0 opacity-20 [background:radial-gradient(circle_at_top_right,rgba(255,255,255,0.35),transparent_35%)]"></div>
                    <div class="pointer-events-none absolute -right-12 top-10 h-44 w-44 rounded-full bg-emerald-200/20 blur-3xl"></div>

                    <div class="relative">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-emerald-100/80">Food Safety Score</p>
                        <h3 class="mt-2 text-2xl font-bold">Skor Keamanan Pangan Kamu</h3>

                        <div class="mt-8 flex items-end gap-4">
                            <p class="text-6xl font-black tracking-tight">{{ $safetyScore }}</p>
                            <div class="pb-2">
                                <p class="text-lg font-semibold text-emerald-50">Praktik sangat baik</p>
                                <p class="mt-1 text-sm text-emerald-100/80">Konsistensi belajar Anda menunjukkan pemahaman yang kuat.</p>
                            </div>
                        </div>

                        <div class="mt-6 inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm font-semibold text-white/90 backdrop-blur">
                            <span class="inline-flex h-7 w-7 items-center justify-center rounded-full bg-emerald-300/20">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 17l5-5 5 5M7 7l5 5 5-5" />
                                </svg>
                            </span>
                            +5% dari minggu lalu
                        </div>

                        <div class="mt-8 grid gap-3 sm:grid-cols-2">
                            <div class="rounded-[1.25rem] border border-white/10 bg-white/10 px-4 py-4 backdrop-blur">
                                <p class="text-sm font-semibold text-white">Konsistensi Belajar</p>
                                <p class="mt-1 text-sm text-emerald-50/80">Aktif membuka fitur edukasi dan checker secara rutin.</p>
                            </div>
                            <div class="rounded-[1.25rem] border border-white/10 bg-white/10 px-4 py-4 backdrop-blur">
                                <p class="text-sm font-semibold text-white">Rekomendasi</p>
                                <p class="mt-1 text-sm text-emerald-50/80">Naikkan skor dengan menyelesaikan kuis dan topik penyimpanan.</p>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <div class="grid gap-4 md:grid-cols-3">
                @foreach ($learningStats as $card)
                    <article class="group relative overflow-hidden rounded-[1.7rem] border border-slate-200/80 bg-white/82 p-5 shadow-[0_16px_45px_rgba(15,23,42,0.06)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_20px_50px_rgba(16,185,129,0.12)] dark:border-slate-700/70 dark:bg-slate-900/80">
                        <div class="pointer-events-none absolute inset-x-0 top-0 h-20 bg-gradient-to-r {{ $card['accent'] }}"></div>
                        <div class="relative">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600 shadow-sm dark:bg-emerald-500/10 dark:text-emerald-300">
                                @if ($card['icon'] === 'article')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 8h10M7 12h7m-7 4h10M6 4h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2z" />
                                    </svg>
                                @elseif ($card['icon'] === 'quiz')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 10h8M8 14h5M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4z" />
                                    </svg>
                                @endif
                            </div>

                            <p class="mt-5 text-4xl font-bold tracking-tight text-slate-900 dark:text-white">{{ $card['value'] }}</p>
                            <p class="mt-2 text-sm font-semibold text-slate-900 dark:text-white">{{ $card['label'] }}</p>
                            <p class="mt-2 text-sm leading-6 text-slate-600 dark:text-slate-300">{{ $card['description'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
            <div class="rounded-[1.9rem] border border-slate-200/80 bg-white/82 p-6 shadow-[0_18px_50px_rgba(15,23,42,0.08)] backdrop-blur-xl dark:border-slate-700/70 dark:bg-slate-900/80">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400 dark:text-slate-500">Learning Badges</p>
                        <h3 class="mt-2 text-2xl font-bold text-slate-900 dark:text-white">Pencapaian Belajar</h3>
                        <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Badge membantu memvisualisasikan perjalanan belajar Anda di SafeFood.</p>
                    </div>
                </div>

                <div class="mt-6 grid gap-4 md:grid-cols-3">
                    @foreach ($learningBadges as $badge)
                        <article class="group rounded-[1.7rem] border border-slate-200/80 bg-slate-50/75 p-5 text-center shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-[0_18px_45px_rgba(15,23,42,0.08)] dark:border-slate-700 dark:bg-slate-950/55">
                            <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-gradient-to-br {{ $badge['gradient'] }} text-white shadow-[0_18px_40px_rgba(15,23,42,0.16)]">
                                @if ($badge['icon'] === 'bronze')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 21l4-2 4 2V5H8v16z" />
                                    </svg>
                                @elseif ($badge['icon'] === 'silver')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3l2.5 5.2 5.7.8-4.1 4 1 5.7L12 16l-5.1 2.7 1-5.7-4.1-4 5.7-.8L12 3z" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 17l-5 3 1.5-5.7L4 10l5.8-.5L12 4l2.2 5.5L20 10l-4.5 4.3L17 20l-5-3z" />
                                    </svg>
                                @endif
                            </div>
                            <h4 class="mt-5 text-lg font-semibold text-slate-900 dark:text-white">{{ $badge['title'] }}</h4>
                            <p class="mt-2 text-sm leading-6 text-slate-600 dark:text-slate-300">{{ $badge['description'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>

            <div class="rounded-[1.9rem] border border-slate-200/80 bg-white/82 p-6 shadow-[0_18px_50px_rgba(15,23,42,0.08)] backdrop-blur-xl dark:border-slate-700/70 dark:bg-slate-900/80">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400 dark:text-slate-500">Quick Access</p>
                        <h3 class="mt-2 text-2xl font-bold text-slate-900 dark:text-white">Akses Cepat Fitur SafeFood</h3>
                        <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Masuk ke fitur utama hanya dalam satu klik dari dashboard belajar Anda.</p>
                    </div>
                </div>

                <div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-5">
                    @foreach ($quickAccessTools as $tool)
                        <a href="{{ $tool['route'] }}" class="group rounded-[1.6rem] border border-slate-200/80 bg-slate-50/80 p-5 transition duration-300 hover:-translate-y-1 hover:border-emerald-300 hover:bg-white hover:shadow-[0_18px_40px_rgba(16,185,129,0.12)] dark:border-slate-700 dark:bg-slate-950/55 dark:hover:border-emerald-500/40 dark:hover:bg-slate-950/80">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600 shadow-sm transition duration-300 group-hover:scale-105 dark:bg-emerald-500/10 dark:text-emerald-300">
                                @if ($tool['icon'] === 'education')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v11.494m0-11.494L20.25 10 12 13.747 3.75 10 12 6.253z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M6.75 11.25v4.5c0 .75 2.35 2.25 5.25 2.25s5.25-1.5 5.25-2.25v-4.5" />
                                    </svg>
                                @elseif ($tool['icon'] === 'checker')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4z" />
                                    </svg>
                                @elseif ($tool['icon'] === 'compare')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 20V10m0 10l-3-3m3 3l3-3M15 4v10m0-10l-3 3m3-3l3 3" />
                                    </svg>
                                @elseif ($tool['icon'] === 'quiz')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 10h8M8 14h5M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 8h10M7 12h7m-7 4h10M6 4h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2z" />
                                    </svg>
                                @endif
                            </div>
                            <h4 class="mt-5 text-lg font-semibold text-slate-900 dark:text-white">{{ $tool['title'] }}</h4>
                            <p class="mt-2 text-sm leading-6 text-slate-600 dark:text-slate-300">{{ $tool['description'] }}</p>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="rounded-[1.9rem] border border-slate-200/80 bg-white/82 p-6 shadow-[0_18px_50px_rgba(15,23,42,0.08)] backdrop-blur-xl dark:border-slate-700/70 dark:bg-slate-900/80">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400 dark:text-slate-500">Latest Articles</p>
                        <h3 class="mt-2 text-2xl font-bold text-slate-900 dark:text-white">Artikel terbaru untuk memperkuat pemahaman</h3>
                        <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Baca ringkasan insight terbaru seputar keamanan pangan dan praktik konsumsi yang lebih aman.</p>
                    </div>
                    <a href="{{ route('articles.index') }}" class="inline-flex items-center text-sm font-semibold text-emerald-700 transition hover:text-emerald-800 dark:text-emerald-300 dark:hover:text-emerald-200">
                        Lihat semua artikel
                    </a>
                </div>

                <div class="mt-6 grid gap-4 xl:grid-cols-3">
                    @forelse (collect($latestArticles)->take(3) as $article)
                        <article class="overflow-hidden rounded-[1.7rem] border border-slate-200/80 bg-slate-50/70 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-[0_20px_45px_rgba(15,23,42,0.08)] dark:border-slate-700 dark:bg-slate-950/55">
                            @if (! empty($article->image_url))
                                <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="h-48 w-full object-cover">
                            @else
                                <div class="flex h-48 items-center justify-center bg-[linear-gradient(135deg,#d1fae5_0%,#bfdbfe_100%)] text-emerald-700 dark:bg-[linear-gradient(135deg,rgba(16,185,129,0.18),rgba(59,130,246,0.18))] dark:text-emerald-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M7 8h10M7 12h7m-7 4h10M6 4h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2z" />
                                    </svg>
                                </div>
                            @endif

                            <div class="p-5">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-400 dark:text-slate-500">{{ $article->created_at->format('d M Y') }}</p>
                                <h4 class="mt-3 text-lg font-semibold leading-7 text-slate-900 dark:text-white">{{ $article->title }}</h4>
                                <p class="mt-3 text-sm leading-6 text-slate-600 dark:text-slate-300">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 110) }}
                                </p>
                                <a href="{{ route('articles.show', $article) }}" class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-emerald-700 transition hover:text-emerald-800 dark:text-emerald-300 dark:hover:text-emerald-200">
                                    Baca artikel
                                    <span aria-hidden="true">-&gt;</span>
                                </a>
                            </div>
                        </article>
                    @empty
                        <div class="rounded-[1.5rem] border border-dashed border-slate-300 bg-slate-50 px-5 py-10 text-center xl:col-span-3 dark:border-slate-700 dark:bg-slate-900/60">
                            <p class="font-semibold text-slate-700 dark:text-slate-200">Belum ada artikel pembelajaran terbaru.</p>
                            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Artikel baru akan tampil di sini untuk membantu perjalanan belajar Anda.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    @endif

    @if ($isAdmin)
        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const dashboardChartCanvas = document.getElementById('dashboardMetricsChart');
                    const dashboardChartSkeleton = document.getElementById('dashboardMetricsChartSkeleton');
                    const revealDashboardChart = () => {
                        dashboardChartSkeleton?.classList.add('hidden');
                        dashboardChartCanvas?.classList.remove('hidden');
                    };
                    const chartSkeletonDelay = window.safeFoodSkeletonTimeout?.(850, 2800) ?? 1200;
                    const skeletonTimeout = window.setTimeout(revealDashboardChart, chartSkeletonDelay);

                    if (!dashboardChartCanvas || !window.Chart) {
                        clearTimeout(skeletonTimeout);
                        revealDashboardChart();
                        return;
                    }

                    const isDarkMode = document.documentElement.classList.contains('dark');
                    const tickColor = isDarkMode ? '#cbd5e1' : '#475569';
                    const gridColor = isDarkMode ? 'rgba(148,163,184,0.2)' : 'rgba(148,163,184,0.18)';
                    const tooltipBackground = isDarkMode ? '#0f172a' : '#111827';
                    const baseColors = @json($chartColors);
                    const chartContext = dashboardChartCanvas.getContext('2d');
                    const gradientColors = baseColors.map((color) => {
                        const gradient = chartContext.createLinearGradient(0, 0, 0, 280);
                        gradient.addColorStop(0, `${color}f0`);
                        gradient.addColorStop(1, `${color}55`);
                        return gradient;
                    });

                    new Chart(dashboardChartCanvas, {
                        type: 'bar',
                        data: {
                            labels: @json($chartLabels),
                            datasets: [{
                                data: @json($chartValues),
                                backgroundColor: gradientColors,
                                borderColor: baseColors,
                                borderWidth: 1.4,
                                borderRadius: 16,
                                barThickness: 28,
                                hoverBorderWidth: 1.8,
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false
                                },
                                tooltip: {
                                    backgroundColor: tooltipBackground,
                                    titleColor: '#ffffff',
                                    bodyColor: '#e5e7eb',
                                    displayColors: false,
                                    padding: 12,
                                    cornerRadius: 12
                                }
                            },
                            scales: {
                                x: {
                                    grid: {
                                        display: false
                                    },
                                    ticks: {
                                        color: tickColor,
                                        font: {
                                            size: 12,
                                            weight: '600'
                                        }
                                    }
                                },
                                y: {
                                    beginAtZero: true,
                                    grid: {
                                        color: gridColor
                                    },
                                    ticks: {
                                        color: tickColor,
                                        precision: 0
                                    }
                                }
                            },
                            animation: {
                                duration: 900,
                                easing: 'easeOutQuart'
                            }
                        }
                    });

                    clearTimeout(skeletonTimeout);
                    revealDashboardChart();
                });
            </script>
        @endpush
    @endif
@endsection
