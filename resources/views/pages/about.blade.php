@extends('layouts.app')

@section('content')
    <section class="sf-container">
        <div class="grid gap-8 lg:grid-cols-[0.9fr_1.1fr]">
            <div class="space-y-6">
                <span class="sf-chip">Tentang SafeFood</span>
                <h1 class="text-5xl font-bold text-slate-900">Platform digital terfokus untuk edukasi keamanan pangan</h1>
                <p class="text-lg leading-8 text-slate-600">
                    SafeFood menggantikan konsep lama yang berpusat pada tanaman menjadi produk pembelajaran terintegrasi tentang keamanan pangan, HACCP, higienitas, penyimpanan, dan praktik pangan sehat.
                </p>
            </div>

            <div class="grid gap-6">
                @foreach ($milestones as $milestone)
                    <article class="sf-panel p-8">
                        <h2 class="text-3xl font-bold text-slate-900">{{ $milestone['title'] }}</h2>
                        <p class="mt-4 text-sm leading-8 text-slate-600">{{ $milestone['description'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-2">
            <div class="sf-panel p-8">
                <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Visi</p>
                <p class="mt-4 text-2xl font-bold text-slate-900">Menjadikan edukasi keamanan pangan lebih praktis, modern, dan mudah diakses.</p>
            </div>
            <div class="sf-panel p-8">
                <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Misi</p>
                <p class="mt-4 text-2xl font-bold text-slate-900">Menyajikan konten terstruktur, alat interaktif, dan kualitas presentasi yang siap ditampilkan.</p>
            </div>
        </div>
    </section>
@endsection
