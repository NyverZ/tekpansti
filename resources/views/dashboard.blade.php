@extends('layouts.dashboard')

@section('content')
    @php
        $chartValues = [$stats['ingredients'], $stats['nutrients'], $stats['articles'], $stats['users'], $stats['pendingSuggestions']];
    @endphp

    <section class="grid gap-6 xl:grid-cols-[1.15fr_0.85fr]">
        <div class="space-y-6">
            <div class="rounded-[2rem] bg-[linear-gradient(140deg,#102033,#0f766e)] px-8 py-10 text-white shadow-xl">
                <p class="text-sm uppercase tracking-[0.28em] text-teal-100">Ringkasan</p>
                <h2 class="mt-4 text-4xl font-bold">Dasbor operasional SafeFood</h2>
                <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-100">
                    Pantau data bahan pangan, artikel terbit, pengguna terdaftar, dan alur masukan dari satu ruang kerja administratif yang rapi.
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('admin.articles.index') }}" class="sf-button-secondary border-white/20 bg-white/10 text-white">Kelola Artikel</a>
                        <a href="{{ route('admin.ingredients.index') }}" class="sf-button-secondary border-white/20 bg-white/10 text-white">Kelola Bahan Pangan</a>
                    @else
                        <a href="{{ route('education') }}" class="sf-button-secondary border-white/20 bg-white/10 text-white">Lanjut Belajar</a>
                        <a href="{{ route('foods.compare') }}" class="sf-button-secondary border-white/20 bg-white/10 text-white">Bandingkan Nutrisi</a>
                    @endif
                </div>
            </div>

            <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                <div class="sf-panel p-6">
                    <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Bahan Pangan</p>
                    <p class="mt-3 text-4xl font-bold">{{ $stats['ingredients'] }}</p>
                </div>
                <div class="sf-panel p-6">
                    <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Nutrisi</p>
                    <p class="mt-3 text-4xl font-bold">{{ $stats['nutrients'] }}</p>
                </div>
                <div class="sf-panel p-6">
                    <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Artikel</p>
                    <p class="mt-3 text-4xl font-bold">{{ $stats['articles'] }}</p>
                </div>
                <div class="sf-panel p-6">
                    <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Pengguna</p>
                    <p class="mt-3 text-4xl font-bold">{{ $stats['users'] }}</p>
                </div>
                <div class="sf-panel p-6">
                    <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Saran Tertunda</p>
                    <p class="mt-3 text-4xl font-bold">{{ $stats['pendingSuggestions'] }}</p>
                </div>
                <div class="sf-panel p-6">
                    <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Tips Harian</p>
                    <p class="mt-3 text-sm leading-7 text-slate-600">{{ $dailyTip }}</p>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="sf-panel p-6">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Komposisi data</p>
                <h3 class="mt-2 text-2xl font-bold">Metrik SafeFood</h3>
                <div class="mt-6">
                    <canvas id="dashboardMetricsChart" height="260"></canvas>
                </div>
            </div>

            <div class="sf-panel p-6">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Konten terbaru</p>
                <h3 class="mt-2 text-2xl font-bold">Artikel terbaru</h3>
                <div class="mt-6 space-y-4">
                    @forelse ($latestArticles as $article)
                        <div class="rounded-[1.5rem] bg-slate-50 px-5 py-4">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="text-sm font-semibold text-slate-900">{{ $article->title }}</p>
                                    <p class="mt-1 text-xs uppercase tracking-[0.2em] text-slate-500">{{ $article->created_at->format('d M Y') }}</p>
                                </div>
                                @if (auth()->user()->role === 'admin')
                                    <a href="{{ route('admin.articles.edit', $article) }}" class="text-sm font-semibold text-teal-700">Ubah</a>
                                @else
                                    <a href="{{ route('articles.show', $article) }}" class="text-sm font-semibold text-teal-700">Baca</a>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-slate-500">Belum ada artikel yang dipublikasikan.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            new Chart(document.getElementById('dashboardMetricsChart'), {
                type: 'bar',
                data: {
                    labels: ['Bahan', 'Nutrisi', 'Artikel', 'Pengguna', 'Tertunda'],
                    datasets: [{
                        data: @json($chartValues),
                        backgroundColor: ['#0f766e', '#155e75', '#d97706', '#334155', '#dc2626'],
                        borderRadius: 12,
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    }
                }
            });
        </script>
    @endpush
@endsection
