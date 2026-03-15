@extends('layouts.app')

@section('content')
    <section class="sf-container">
        <div class="relative overflow-hidden rounded-[2.2rem] border border-slate-200/70 bg-white/70 px-6 py-10 shadow-[0_24px_70px_rgba(15,23,42,0.08)] backdrop-blur dark:border-slate-800/80 dark:bg-slate-950/70 sm:px-10">
            <div class="pointer-events-none absolute -right-12 -top-16 h-56 w-56 rounded-full bg-emerald-300/20 blur-3xl dark:bg-emerald-400/10"></div>
            <div class="pointer-events-none absolute -left-12 bottom-0 h-56 w-56 rounded-full bg-amber-300/20 blur-3xl dark:bg-amber-400/10"></div>

            <div class="relative grid gap-8 lg:grid-cols-[1.05fr_0.95fr] lg:items-center">
                <div class="space-y-5">
                    <span class="sf-chip">Edukasi</span>
                    <h1 class="text-3xl font-bold leading-tight text-slate-900 sm:text-4xl md:text-5xl daJrk:text-white">
                        Materi Edukasi Keamanan Pangan
                    </h1>
                    <p class="text-base leading-7 text-slate-600 dark:text-slate-300">
                        Pilih topik utama yang paling relevan untuk praktik keamanan pangan harian. Materi disusun ringkas, terstruktur, dan mudah dipahami untuk semua kalangan.
                    </p>
                    <div class="flex flex-wrap gap-3">
                        <span class="rounded-full border border-slate-200 bg-white/70 px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-slate-500 dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-300">HACCP</span>
                        <span class="rounded-full border border-slate-200 bg-white/70 px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-slate-500 dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-300">Higiene</span>
                        <span class="rounded-full border border-slate-200 bg-white/70 px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-slate-500 dark:border-slate-700 dark:bg-slate-900/70 dark:text-slate-300">Pengolahan</span>
                    </div>
                </div>

                <div class="rounded-[1.8rem] border border-emerald-200/60 bg-[linear-gradient(140deg,rgba(16,185,129,0.16),rgba(14,116,144,0.1))] p-6 text-slate-900 dark:border-emerald-500/30 dark:bg-[linear-gradient(140deg,rgba(15,118,110,0.28),rgba(15,23,42,0.6))] dark:text-white">
                    <p class="text-xs font-semibold uppercase tracking-[0.3em] text-emerald-700 dark:text-emerald-200">Peta Materi</p>
                    <p class="mt-3 text-lg font-semibold">Mulai dari dasar → praktik → kontrol mutu</p>
                    <p class="mt-3 text-sm leading-6 text-slate-600 dark:text-slate-300">
                        Setiap topik fokus pada langkah praktis untuk menjaga keamanan pangan, mulai dari proses hingga penyimpanan yang aman.
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            <a href="{{ route('haccp') }}" class="group relative overflow-hidden rounded-[1.6rem] border border-slate-200/80 bg-white/80 p-6 shadow-[0_18px_50px_rgba(15,23,42,0.08)] transition duration-300 hover:-translate-y-2 hover:border-emerald-300 dark:border-slate-700/70 dark:bg-slate-950/70 dark:hover:border-emerald-500/60">
                <div class="pointer-events-none absolute right-0 top-0 h-24 w-24 rounded-full bg-emerald-200/40 blur-2xl dark:bg-emerald-400/20"></div>
                <div class="flex items-center justify-between">
                    <span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-700 dark:bg-emerald-500/20 dark:text-emerald-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
                    <span class="text-sm font-semibold text-emerald-700 dark:text-emerald-300">Pelajari sekarang</span>
                </div>
                <h3 class="mt-5 text-2xl font-bold text-slate-900 dark:text-white">HACCP</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">
                    Pahami titik kendali kritis untuk mencegah kontaminasi dan menjaga kualitas pangan.
                </p>
            </a>

            <a href="{{ route('hygiene.sanitation') }}" class="group relative overflow-hidden rounded-[1.6rem] border border-slate-200/80 bg-white/80 p-6 shadow-[0_18px_50px_rgba(15,23,42,0.08)] transition duration-300 hover:-translate-y-2 hover:border-cyan-300 dark:border-slate-700/70 dark:bg-slate-950/70 dark:hover:border-cyan-500/60">
                <div class="pointer-events-none absolute right-0 top-0 h-24 w-24 rounded-full bg-cyan-200/40 blur-2xl dark:bg-cyan-400/20"></div>
                <div class="flex items-center justify-between">
                    <span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-cyan-100 text-cyan-700 dark:bg-cyan-500/20 dark:text-cyan-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3c2.5 3.5 3.5 5.5 3.5 8a3.5 3.5 0 01-7 0c0-2.5 1-4.5 3.5-8zM5 21h14" />
                        </svg>
                    </span>
                    <span class="text-sm font-semibold text-cyan-700 dark:text-cyan-300">Pelajari sekarang</span>
                </div>
                <h3 class="mt-5 text-2xl font-bold text-slate-900 dark:text-white">Higiene dan Sanitasi</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">
                    Bangun kebiasaan higienis untuk mencegah kontaminasi silang di area kerja pangan.
                </p>
            </a>

            <a href="{{ route('food.processing-storage') }}" class="group relative overflow-hidden rounded-[1.6rem] border border-slate-200/80 bg-white/80 p-6 shadow-[0_18px_50px_rgba(15,23,42,0.08)] transition duration-300 hover:-translate-y-2 hover:border-amber-300 dark:border-slate-700/70 dark:bg-slate-950/70 dark:hover:border-amber-500/60">
                <div class="pointer-events-none absolute right-0 top-0 h-24 w-24 rounded-full bg-amber-200/40 blur-2xl dark:bg-amber-400/20"></div>
                <div class="flex items-center justify-between">
                    <span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-100 text-amber-700 dark:bg-amber-500/20 dark:text-amber-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 7h18M3 12h18M3 17h18M5 7v10" />
                        </svg>
                    </span>
                    <span class="text-sm font-semibold text-amber-700 dark:text-amber-300">Pelajari sekarang</span>
                </div>
                <h3 class="mt-5 text-2xl font-bold text-slate-900 dark:text-white">Pengolahan &amp; Penyimpanan</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">
                    Pelajari alur pengolahan dan penyimpanan yang aman agar kualitas pangan tetap terjaga.
                </p>
            </a>
        </div>
    </section>
@endsection
