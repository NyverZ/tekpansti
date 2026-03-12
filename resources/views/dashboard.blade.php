@extends('layouts.dashboard')

@section('content')
    @php
        $isAdmin = auth()->user()->role === 'admin';
        $chartLabels = ['Bahan', 'Nutrisi', 'Artikel'];
        $chartValues = [$stats['ingredients'], $stats['nutrients'], $stats['articles']];
        $chartColors = ['#0f766e', '#155e75', '#d97706'];

        if ($isAdmin) {
            $chartLabels[] = 'Pengguna';
            $chartValues[] = $stats['users'];
            $chartColors[] = '#334155';
        }
    @endphp

    <section class="space-y-8">
        <div class="relative overflow-hidden rounded-[2.4rem] border border-cyan-200/25 bg-[radial-gradient(circle_at_12%_18%,rgba(34,211,238,0.2),transparent_40%),radial-gradient(circle_at_90%_85%,rgba(251,191,36,0.15),transparent_36%),linear-gradient(130deg,#07162c_0%,#0f766e_52%,#0b3a63_100%)] px-6 py-8 text-white shadow-[0_30px_90px_rgba(2,8,23,0.4)] sm:px-8 sm:py-10">
            <div class="pointer-events-none absolute inset-0 opacity-25 [background:linear-gradient(rgba(255,255,255,0.18)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.18)_1px,transparent_1px)] [background-size:38px_38px]"></div>
            <div class="pointer-events-none absolute -left-16 top-0 h-56 w-56 rounded-full bg-cyan-300/25 blur-3xl"></div>
            <div class="pointer-events-none absolute -right-20 bottom-0 h-64 w-64 rounded-full bg-amber-300/20 blur-3xl"></div>

            <div class="relative grid gap-8 xl:grid-cols-[1.25fr_0.75fr] xl:items-end">
                <div class="max-w-3xl">
                    <p class="text-xs font-semibold uppercase tracking-[0.34em] text-cyan-100/90">SafeFood Control Center</p>
                    <h2 class="mt-4 text-3xl font-bold leading-[1.06] sm:text-4xl lg:text-5xl">Dashboard futuristik yang tetap tenang dan elegan</h2>
                    <p class="mt-4 text-sm leading-7 text-slate-100/95 sm:text-base">
                        @if ($isAdmin)
                            Pantau data bahan pangan, artikel terbit, pengguna terdaftar, dan alur masukan dari satu ruang kerja administratif yang terstruktur.
                        @else
                            Pantau data bahan pangan, artikel terbit, dan alur masukan dari satu ruang kerja yang terstruktur.
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

                <div class="rounded-[1.75rem] border border-white/20 bg-white/10 p-5 backdrop-blur-xl">
                    <div class="flex items-center justify-between">
                        <p class="text-xs font-semibold uppercase tracking-[0.28em] text-cyan-100/90">Status Sistem</p>
                        <span class="inline-flex items-center gap-2 rounded-full border border-emerald-300/50 bg-emerald-400/10 px-3 py-1 text-xs font-semibold text-emerald-100">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-300"></span>
                            Aktif
                        </span>
                    </div>
                    <div class="mt-5 grid gap-3 sm:grid-cols-3 xl:grid-cols-1">
                        <div class="rounded-2xl border border-white/15 bg-white/10 px-4 py-3">
                            <p class="text-[11px] uppercase tracking-[0.22em] text-cyan-100/85">Bahan</p>
                            <p class="mt-2 text-2xl font-bold">{{ $stats['ingredients'] }}</p>
                        </div>
                        <div class="rounded-2xl border border-white/15 bg-white/10 px-4 py-3">
                            <p class="text-[11px] uppercase tracking-[0.22em] text-cyan-100/85">Nutrisi</p>
                            <p class="mt-2 text-2xl font-bold">{{ $stats['nutrients'] }}</p>
                        </div>
                        <div class="rounded-2xl border border-white/15 bg-white/10 px-4 py-3">
                            <p class="text-[11px] uppercase tracking-[0.22em] text-cyan-100/85">Artikel</p>
                            <p class="mt-2 text-2xl font-bold">{{ $stats['articles'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid gap-6 2xl:grid-cols-[1.25fr_0.75fr]">
            <div class="space-y-6">
                <div class="grid gap-4 md:grid-cols-2 2xl:grid-cols-3">
                    <article class="relative min-h-[176px] overflow-hidden rounded-[1.7rem] border border-slate-200/80 bg-white/85 p-6 shadow-[0_16px_45px_rgba(15,23,42,0.08)] transition duration-300 hover:-translate-y-1 dark:border-slate-700/70 dark:bg-slate-900/75">
                        <div class="pointer-events-none absolute right-0 top-0 h-24 w-24 rounded-full bg-teal-200/50 blur-2xl dark:bg-teal-500/20"></div>
                        <p class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Bahan Pangan</p>
                        <p class="mt-3 text-3xl font-bold text-slate-900 dark:text-white sm:text-4xl">{{ $stats['ingredients'] }}</p>
                        <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Database bahan pangan aktif</p>
                    </article>

                    <article class="relative min-h-[176px] overflow-hidden rounded-[1.7rem] border border-slate-200/80 bg-white/85 p-6 shadow-[0_16px_45px_rgba(15,23,42,0.08)] transition duration-300 hover:-translate-y-1 dark:border-slate-700/70 dark:bg-slate-900/75">
                        <div class="pointer-events-none absolute right-0 top-0 h-24 w-24 rounded-full bg-cyan-200/50 blur-2xl dark:bg-cyan-500/20"></div>
                        <p class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Nutrisi</p>
                        <p class="mt-3 text-3xl font-bold text-slate-900 dark:text-white sm:text-4xl">{{ $stats['nutrients'] }}</p>
                        <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Komponen gizi terkelola</p>
                    </article>

                    <article class="relative min-h-[176px] overflow-hidden rounded-[1.7rem] border border-slate-200/80 bg-white/85 p-6 shadow-[0_16px_45px_rgba(15,23,42,0.08)] transition duration-300 hover:-translate-y-1 dark:border-slate-700/70 dark:bg-slate-900/75">
                        <div class="pointer-events-none absolute right-0 top-0 h-24 w-24 rounded-full bg-amber-200/50 blur-2xl dark:bg-amber-500/20"></div>
                        <p class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Artikel</p>
                        <p class="mt-3 text-3xl font-bold text-slate-900 dark:text-white sm:text-4xl">{{ $stats['articles'] }}</p>
                        <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Konten edukasi tersedia</p>
                    </article>

                    @if ($isAdmin)
                        <article class="relative min-h-[176px] overflow-hidden rounded-[1.7rem] border border-slate-200/80 bg-white/85 p-6 shadow-[0_16px_45px_rgba(15,23,42,0.08)] transition duration-300 hover:-translate-y-1 dark:border-slate-700/70 dark:bg-slate-900/75">
                            <div class="pointer-events-none absolute right-0 top-0 h-24 w-24 rounded-full bg-slate-300/60 blur-2xl dark:bg-slate-500/20"></div>
                            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Pengguna</p>
                            <p class="mt-3 text-3xl font-bold text-slate-900 dark:text-white sm:text-4xl">{{ $stats['users'] }}</p>
                            <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Akun terdaftar aktif</p>
                        </article>
                    @endif

                    <article class="md:col-span-2 xl:col-span-3 rounded-[1.7rem] border border-slate-200/80 bg-white/85 p-6 shadow-[0_16px_45px_rgba(15,23,42,0.08)] dark:border-slate-700/70 dark:bg-slate-900/75">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                            <div class="max-w-3xl">
                                <p class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Tips Harian</p>
                                <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ $dailyTip }}</p>
                            </div>
                            <a href="{{ route('education') }}" class="sf-button-secondary whitespace-nowrap">Buka Edukasi</a>
                        </div>
                    </article>
                </div>

                <div class="rounded-[1.8rem] border border-slate-200/80 bg-white/85 p-6 shadow-[0_16px_45px_rgba(15,23,42,0.08)] dark:border-slate-700/70 dark:bg-slate-900/75">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Aksi Cepat</p>
                            <h3 class="mt-2 text-2xl font-bold text-slate-900 dark:text-white">Panel komando utama</h3>
                        </div>
                    </div>
                    <div class="mt-6 grid gap-3 sm:grid-cols-2">
                        @if ($isAdmin)
                            <a href="{{ route('admin.ingredients.create') }}" class="group rounded-2xl border border-slate-200 bg-[linear-gradient(155deg,#f8fafc,#eef6ff)] px-5 py-4 transition duration-300 hover:-translate-y-0.5 hover:border-teal-300 dark:border-slate-700 dark:bg-[linear-gradient(155deg,rgba(15,23,42,0.9),rgba(15,118,110,0.15))] dark:hover:border-teal-500/60">
                                <p class="font-semibold text-slate-900 dark:text-white">Tambah Bahan Pangan</p>
                                <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Input data baru langsung dari panel admin.</p>
                            </a>
                            <a href="{{ route('admin.articles.create') }}" class="group rounded-2xl border border-slate-200 bg-[linear-gradient(155deg,#fffaf0,#fff3dd)] px-5 py-4 transition duration-300 hover:-translate-y-0.5 hover:border-amber-300 dark:border-slate-700 dark:bg-[linear-gradient(155deg,rgba(15,23,42,0.9),rgba(217,119,6,0.14))] dark:hover:border-amber-500/60">
                                <p class="font-semibold text-slate-900 dark:text-white">Publikasikan Artikel</p>
                                <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Perbarui konten edukasi untuk pengguna.</p>
                            </a>
                        @else
                            <a href="{{ route('safety-checker') }}" class="group rounded-2xl border border-slate-200 bg-[linear-gradient(155deg,#f8fafc,#eef6ff)] px-5 py-4 transition duration-300 hover:-translate-y-0.5 hover:border-teal-300 dark:border-slate-700 dark:bg-[linear-gradient(155deg,rgba(15,23,42,0.9),rgba(15,118,110,0.15))] dark:hover:border-teal-500/60">
                                <p class="font-semibold text-slate-900 dark:text-white">Cek Keamanan Makanan</p>
                                <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Lakukan self-check praktik keamanan pangan Anda.</p>
                            </a>
                            <a href="{{ route('quiz') }}" class="group rounded-2xl border border-slate-200 bg-[linear-gradient(155deg,#fffaf0,#fff3dd)] px-5 py-4 transition duration-300 hover:-translate-y-0.5 hover:border-amber-300 dark:border-slate-700 dark:bg-[linear-gradient(155deg,rgba(15,23,42,0.9),rgba(217,119,6,0.14))] dark:hover:border-amber-500/60">
                                <p class="font-semibold text-slate-900 dark:text-white">Kerjakan Kuis</p>
                                <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Uji pemahaman Anda tentang keamanan pangan.</p>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="rounded-[1.8rem] border border-slate-200/80 bg-white/85 p-6 shadow-[0_16px_45px_rgba(15,23,42,0.08)] dark:border-slate-700/70 dark:bg-slate-900/75">
                    <div class="flex items-center justify-between gap-3">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Analytics</p>
                            <h3 class="mt-2 text-2xl font-bold text-slate-900 dark:text-white">Metrik SafeFood</h3>
                        </div>
                        <span class="rounded-full border border-teal-200 bg-teal-50 px-3 py-1 text-xs font-semibold uppercase tracking-[0.16em] text-teal-700 dark:border-teal-500/40 dark:bg-teal-500/10 dark:text-teal-300">Live Data</span>
                    </div>
                    <div class="mt-6 relative h-[260px]">
                        <div id="dashboardMetricsChartSkeleton" class="sf-skeleton h-[260px] rounded-[1rem]"></div>
                        <canvas id="dashboardMetricsChart" height="260" class="hidden h-full w-full"></canvas>
                    </div>
                </div>

                <div class="rounded-[1.8rem] border border-slate-200/80 bg-white/85 p-6 shadow-[0_16px_45px_rgba(15,23,42,0.08)] dark:border-slate-700/70 dark:bg-slate-900/75">
                    <div class="flex items-center justify-between gap-3">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Knowledge Feed</p>
                            <h3 class="mt-2 text-2xl font-bold text-slate-900 dark:text-white">Artikel terbaru</h3>
                        </div>
                        <a href="{{ route('articles.index') }}" class="text-sm font-semibold text-teal-700 dark:text-teal-300">Lihat semua</a>
                    </div>

                    <div class="relative mt-6 space-y-3">
                        @forelse ($latestArticles as $article)
                            <article class="rounded-2xl border border-slate-200 bg-slate-50/85 px-5 py-4 transition duration-300 hover:-translate-y-0.5 hover:border-teal-300 dark:border-slate-700 dark:bg-slate-900/65 dark:hover:border-teal-500/60">
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <p class="text-sm font-semibold leading-6 text-slate-900 dark:text-white">{{ $article->title }}</p>
                                        <p class="mt-1 text-xs uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">{{ $article->created_at->format('d M Y') }}</p>
                                    </div>
                                    @if ($isAdmin)
                                        <a href="{{ route('admin.articles.edit', $article) }}" class="text-sm font-semibold text-teal-700 dark:text-teal-300">Ubah</a>
                                    @else
                                        <a href="{{ route('articles.show', $article) }}" class="text-sm font-semibold text-teal-700 dark:text-teal-300">Baca</a>
                                    @endif
                                </div>
                            </article>
                        @empty
                            <div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-5 py-8 text-center dark:border-slate-700 dark:bg-slate-900/60">
                                <p class="font-semibold text-slate-700 dark:text-slate-200">Belum ada artikel yang dipublikasikan.</p>
                                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Konten baru akan muncul otomatis di bagian ini.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                    const gradient = chartContext.createLinearGradient(0, 0, 0, 260);
                    gradient.addColorStop(0, `${color}f2`);
                    gradient.addColorStop(1, `${color}66`);
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
                            borderRadius: 14,
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
                                cornerRadius: 10
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
@endsection
