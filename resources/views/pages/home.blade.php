@extends('layouts.app')

@section('content')
    <section class="sf-container pt-6">
        <div class="grid gap-10 lg:grid-cols-[1.04fr_0.96fr] lg:items-center">
            <div class="space-y-8">
                <div class="sf-reveal space-y-5">
                    <span class="sf-chip">Platform keamanan pangan modern untuk edukasi dan demo kompetisi</span>
                    <h1 class="max-w-5xl text-5xl font-bold leading-[0.96] text-slate-950 md:text-7xl dark:text-white">
                        SafeFood
                        <span class="bg-gradient-to-r from-teal-500 via-cyan-500 to-amber-400 bg-clip-text text-transparent">
                            mengajarkan keamanan pangan dengan cara yang cerdas.
                        </span>
                    </h1>
                    <p class="max-w-2xl text-lg leading-8 text-slate-600 dark:text-slate-300">
                        SafeFood menggabungkan edukasi HACCP, alat pemeriksaan mandiri, perbandingan nutrisi, Quiz, dan artikel modern dalam satu platform yang dirancang untuk menarik perhatian juri sekaligus membantu pengguna bertindak lebih aman.
                    </p>
                </div>

                <div class="sf-reveal flex flex-col gap-4 sm:flex-row">
                    <a href="{{ route('haccp') }}" class="sf-button-primary">Pelajari HACCP</a>
                    <a href="{{ route('safety-checker') }}" class="sf-button-secondary">Cek Keamanan Makanan</a>
                </div>

                <div class="sf-reveal grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                    <div class="sf-stat-card dark:bg-slate-900/70">
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">Bahan Pangan</p>
                        <p class="mt-3 text-4xl font-bold text-slate-900 dark:text-white">{{ $stats['ingredients'] }}</p>
                    </div>
                    <div class="sf-stat-card dark:bg-slate-900/70">
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">Poin Nutrisi</p>
                        <p class="mt-3 text-4xl font-bold text-slate-900 dark:text-white">{{ $stats['nutritionPoints'] }}</p>
                    </div>
                    <div class="sf-stat-card dark:bg-slate-900/70">
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">Artikel</p>
                        <p class="mt-3 text-4xl font-bold text-slate-900 dark:text-white">{{ $stats['articles'] }}</p>
                    </div>
                    <div class="sf-stat-card dark:bg-slate-900/70">
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">Tips Harian</p>
                        <p class="mt-3 text-4xl font-bold text-slate-900 dark:text-white">{{ $stats['tips'] }}</p>
                    </div>
                </div>
            </div>

            <div class="sf-reveal relative">
                <div class="absolute -left-6 top-10 hidden rounded-full border border-teal-200 bg-white/85 px-4 py-2 text-sm font-medium text-teal-700 shadow-lg lg:block dark:border-teal-500/30 dark:bg-slate-900/80 dark:text-teal-300">
                    Siap HACCP
                </div>
                <div class="absolute -right-4 bottom-10 hidden rounded-full border border-amber-200 bg-white/85 px-4 py-2 text-sm font-medium text-amber-700 shadow-lg lg:block dark:border-amber-500/30 dark:bg-slate-900/80 dark:text-amber-300">
                    Pemeriksa Cerdas
                </div>

                <div class="sf-panel relative overflow-hidden p-4 dark:bg-slate-950/70">
                    <div class="absolute inset-x-10 top-0 h-28 rounded-b-full bg-gradient-to-r from-teal-500/20 via-cyan-400/20 to-amber-400/20 blur-2xl"></div>
                    <div class="relative rounded-[2rem] bg-[linear-gradient(145deg,#082f49,#0f766e_55%,#f59e0b_140%)] p-7 text-white">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-sm uppercase tracking-[0.24em] text-cyan-100">SafeFood Console</p>
                                <h2 class="mt-3 text-3xl font-bold">Pelajari. Cek. Bandingkan.</h2>
                            </div>
                            <div class="rounded-full bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-white/80">
                                UI Kompetisi
                            </div>
                        </div>

                        <div class="mt-8 grid gap-4 sm:grid-cols-[0.95fr_1.05fr]">
                            <div class="rounded-[1.75rem] bg-white/10 p-5 backdrop-blur">
                                <p class="text-sm text-white/70">Fokus hari ini</p>
                                <p class="mt-3 text-2xl font-semibold leading-8">"{{ $dailyTip }}"</p>
                            </div>

                            <div class="space-y-4">
                                <div class="rounded-[1.75rem] bg-slate-950/35 p-5 backdrop-blur">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm text-white/70">Skor Keamanan Pangan</p>
                                        <span class="rounded-full bg-emerald-400/15 px-3 py-1 text-xs font-semibold text-emerald-200">Pratinjau Langsung</span>
                                    </div>
                                    <div class="mt-4 flex items-end gap-3">
                                        <p class="text-5xl font-bold">92</p>
                                        <p class="pb-1 text-sm text-white/70">Praktik sangat baik</p>
                                    </div>
                                </div>
                                <div class="rounded-[1.75rem] bg-slate-950/35 p-5 backdrop-blur">
                                    <p class="text-sm text-white/70">Alasan juri memperhatikannya</p>
                                    <div class="mt-4 grid grid-cols-3 gap-3 text-center text-sm">
                                        <div class="rounded-2xl bg-white/10 px-3 py-3">
                                            <p class="font-bold">5</p>
                                            <p class="mt-1 text-white/70">Fitur inti</p>
                                        </div>
                                        <div class="rounded-2xl bg-white/10 px-3 py-3">
                                            <p class="font-bold">3</p>
                                            <p class="mt-1 text-white/70">Alur interaktif</p>
                                        </div>
                                        <div class="rounded-2xl bg-white/10 px-3 py-3">
                                            <p class="font-bold">1</p>
                                            <p class="mt-1 text-white/70">Platform terpadu</p>
                                        </div>
                                    </div>
                                </div>
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
                <h2 class="mt-4 text-4xl font-bold text-slate-950 dark:text-white">Keamanan pangan adalah isu kesehatan publik, bukan sekadar urusan dapur</h2>
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
                    <p class="mt-6 text-5xl font-bold text-slate-950 dark:text-white">{{ $item['value'] }}</p>
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
                <h2 class="mt-4 text-4xl font-bold text-slate-950 dark:text-white">Lima fitur yang membentuk pengalaman SafeFood</h2>
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
                    />
                </div>
            @endforeach
        </div>
    </section>

    <section class="sf-container mt-24">
        <div class="grid gap-8 xl:grid-cols-[0.95fr_1.05fr]">
            <div class="sf-panel sf-reveal p-8 md:p-10 dark:bg-slate-900/70">
                <span class="sf-chip">Alat Interaktif</span>
                <h2 class="mt-5 text-4xl font-bold text-slate-950 dark:text-white">Alat yang mengubah pembelajaran menjadi tindakan</h2>
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
                            <span class="text-lg font-semibold text-teal-600 transition group-hover:translate-x-1 dark:text-teal-300">-></span>
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
                        <span class="rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold uppercase tracking-[0.16em] text-amber-700 dark:bg-amber-500/15 dark:text-amber-300">Chart.js</span>
                    </div>
                    <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-slate-300">
                        SafeFood menggunakan visualisasi perbandingan agar pengguna dapat membaca perbedaan nutrisi dengan cepat, bukan hanya memindai tabel.
                    </p>
                    <div class="mt-8 rounded-[1.5rem] bg-slate-50 p-5 dark:bg-slate-900">
                        <canvas id="homepageNutritionChart" height="280"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sf-container mt-24">
        <div class="sf-reveal flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <span class="sf-chip">Artikel Edukasi Terbaru</span>
                <h2 class="mt-4 text-4xl font-bold text-slate-950 dark:text-white">Kartu bacaan modern untuk pembelajaran yang relevan</h2>
            </div>
            <a href="{{ route('articles.index') }}" class="sf-button-secondary">Lihat Semua Artikel</a>
        </div>

        <div class="mt-10 grid gap-6 lg:grid-cols-3">
            @foreach ($latestArticles as $article)
                <article class="sf-panel sf-hover-lift sf-reveal overflow-hidden dark:bg-slate-900/70">
                    @if ($article->image)
                        <img src="{{ $article->image }}" alt="{{ $article->title }}" loading="lazy" decoding="async" class="h-52 w-full object-cover">
                    @else
                        <div class="h-52 w-full bg-[linear-gradient(135deg,#0f766e,#0891b2,#f59e0b)]"></div>
                    @endif
                    <div class="p-8">
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">{{ $article->created_at->format('d M Y') }}</p>
                        <h3 class="mt-4 text-2xl font-bold text-slate-950 dark:text-white">{{ $article->title }}</h3>
                        <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ \Illuminate\Support\Str::limit(strip_tags($article->content), 130) }}</p>
                        <a href="{{ route('articles.show', $article) }}" class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-teal-600 transition hover:gap-3 dark:text-teal-300">
                            Baca Selengkapnya
                            <span aria-hidden="true">-></span>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="sf-container mt-24">
        <div class="sf-panel sf-reveal overflow-hidden px-8 py-10 md:px-10 dark:bg-slate-900/70">
            <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <div>
                    <span class="sf-chip">Statistik Platform</span>
                    <h2 class="mt-4 text-4xl font-bold text-slate-950 dark:text-white">Metrik yang memperkuat kredibilitas platform</h2>
                </div>
                <p class="max-w-xl text-sm leading-7 text-slate-600 dark:text-slate-300">
                    Penghitung bergaya startup membantu menyampaikan cakupan platform dengan cepat dan memberi juri gambaran jelas tentang nilainya.
                </p>
            </div>

            <div class="mt-10 grid gap-6 md:grid-cols-3">
                @foreach ($platformStats as $item)
                    <div class="rounded-[1.75rem] border border-slate-200 bg-white/80 px-6 py-8 text-center dark:border-slate-700 dark:bg-slate-950/70">
                        <p class="text-5xl font-bold text-slate-950 dark:text-white">
                            <span class="sf-counter" data-target="{{ $item['value'] }}">0</span>{{ $item['suffix'] }}
                        </p>
                        <p class="mt-4 text-sm font-medium uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">{{ $item['label'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="sf-container mb-8 mt-24">
        <div class="sf-panel sf-reveal relative overflow-hidden bg-[linear-gradient(140deg,#0f172a,#0f766e)] px-8 py-12 text-white md:px-12">
            <div class="absolute -right-10 top-0 h-48 w-48 rounded-full bg-amber-400/15 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 h-56 w-56 rounded-full bg-cyan-400/15 blur-3xl"></div>
            <div class="relative flex flex-col gap-8 md:flex-row md:items-end md:justify-between">
                <div class="max-w-2xl">
                    <span class="inline-flex rounded-full bg-white/10 px-4 py-1 text-sm font-medium text-white/90">Aksi Sekarang</span>
                    <h2 class="mt-5 text-4xl font-bold">Mulai pelajari keamanan pangan hari ini dan lindungi kesehatan Anda.</h2>
                    <p class="mt-4 text-base leading-8 text-slate-100">
                        SafeFood dirancang agar jelas, interaktif, dan siap untuk kompetisi, dengan desain modern serta kedalaman materi edukasi dalam satu platform.
                    </p>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('education') }}" class="sf-button-secondary border-white/20 bg-white/10 text-white">Jelajahi Edukasi</a>
                    <a href="{{ route('quiz') }}" class="sf-button-primary">Ikuti Kuis</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

            if (chartCanvas) {
                const darkMode = document.documentElement.classList.contains('dark');

                new Chart(chartCanvas, {
                    type: 'bar',
                    data: {
                        labels: ['Kalori', 'Protein', 'Lemak'],
                        datasets: [
                            {
                                label: 'Ayam',
                                data: [165, 31, 3.6],
                                backgroundColor: '#0f766e',
                                borderRadius: 10,
                            },
                            {
                                label: 'Tempe',
                                data: [193, 20.3, 10.8],
                                backgroundColor: '#f59e0b',
                                borderRadius: 10,
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                labels: {
                                    color: darkMode ? '#e2e8f0' : '#334155'
                                }
                            }
                        },
                        scales: {
                            x: {
                                ticks: {
                                    color: darkMode ? '#cbd5e1' : '#475569'
                                },
                                grid: {
                                    color: darkMode ? 'rgba(148,163,184,0.12)' : 'rgba(148,163,184,0.18)'
                                }
                            },
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    color: darkMode ? '#cbd5e1' : '#475569'
                                },
                                grid: {
                                    color: darkMode ? 'rgba(148,163,184,0.12)' : 'rgba(148,163,184,0.18)'
                                }
                            }
                        }
                    }
                });
            }
        });
    </script>
@endpush
