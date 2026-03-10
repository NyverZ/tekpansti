@extends('layouts.app')

@section('content')
    <section class="sf-container">
        <div class="grid gap-8 lg:grid-cols-[0.85fr_1.15fr]">
            <div class="space-y-6">
                <span class="sf-chip">Kontak</span>
                <h1 class="text-5xl font-bold text-slate-900 dark:text-white">Hubungi tim SafeFood</h1>
                <p class="text-lg leading-8 text-slate-600 dark:text-slate-300">
                    Gunakan saluran berikut untuk pertanyaan, kolaborasi, demo penjurian, atau komunikasi terkait edukasi keamanan pangan.
                </p>
                <div class="sf-panel p-8">
                    <div class="space-y-4 text-sm text-slate-700 dark:text-slate-300">
                        <p><strong>Alamat Email:</strong> {{ $contacts['email'] }}</p>
                        <p><strong>WhatsApp:</strong> {{ $contacts['whatsapp'] }}</p>
                        <p><strong>Instagram:</strong> {{ $contacts['instagram'] }}</p>
                    </div>
                </div>
            </div>

            <div class="sf-panel p-8">
                <h2 class="text-3xl font-bold text-slate-900 dark:text-white">Kerangka komunikasi</h2>
                <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">
                    Untuk proyek kompetisi teknologi, bagian kontak ini menunjukkan saluran komunikasi yang jelas dan alur dukungan yang profesional.
                </p>
                <div class="mt-8 grid gap-4">
                    <div class="rounded-[1.5rem] bg-slate-50 p-5">
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">Pertanyaan umum</p>
                        <p class="mt-2 text-sm leading-7 text-slate-700 dark:text-slate-300">Ajukan pertanyaan tentang fitur platform, konten edukasi, atau cakupan proyek.</p>
                    </div>
                    <div class="rounded-[1.5rem] bg-slate-50 p-5">
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">Permintaan demo</p>
                        <p class="mt-2 text-sm leading-7 text-slate-700 dark:text-slate-300">Gunakan saat mempresentasikan SafeFood kepada juri, mentor, atau mitra.</p>
                    </div>
                    <div class="rounded-[1.5rem] bg-slate-50 p-5">
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">Masukan</p>
                        <p class="mt-2 text-sm leading-7 text-slate-700 dark:text-slate-300">Kumpulkan saran untuk pengembangan fitur dan peningkatan di masa depan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
