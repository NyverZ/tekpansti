@extends('layouts.app')

@section('content')
    <section class="sf-container">
        <div class="grid gap-8 lg:grid-cols-[0.9fr_1.1fr]">
            <div class="space-y-6">
                <span class="sf-chip">Cek Keamanan Makanan</span>

                <h1 class="text-3xl font-bold leading-tight text-slate-900 sm:text-4xl md:text-5xl dark:text-white">
                    Isi self-check keamanan pangan melalui formulir yang mudah diakses
                </h1>

                <p class="text-lg leading-8 text-slate-600 dark:text-slate-300">
                    SafeFood menggunakan Google Form agar masyarakat dapat mengisi self-check dengan mudah, stabil,
                    dan nyaman di berbagai perangkat. Formulir ini membantu mengumpulkan evaluasi kebiasaan keamanan
                    pangan secara praktis untuk kebutuhan edukasi publik.
                </p>

                <div class="sf-panel bg-[linear-gradient(140deg,#102033,#0f766e)] p-6 text-white sm:p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-teal-100">Panduan Pengisian</p>
                    <div class="mt-4 space-y-3 text-sm leading-7 text-slate-100">
                        <p>Isi semua pertanyaan berdasarkan kebiasaan Anda saat menangani, menyimpan, dan menyajikan makanan.</p>
                        <p>Jawaban yang jujur akan membantu menghasilkan gambaran praktik keamanan pangan yang lebih akurat.</p>
                        <p>Formulir ini dirancang agar mudah digunakan oleh masyarakat umum, baik melalui ponsel maupun desktop.</p>
                    </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div class="sf-panel p-5 dark:bg-slate-900/70">
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">Kelebihan Formulir</p>
                        <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">
                            Lebih mudah diakses, ringan, dan familiar bagi banyak pengguna yang mengisi melalui ponsel.
                        </p>
                    </div>
                    <div class="sf-panel p-5 dark:bg-slate-900/70">
                        <p class="text-sm uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">Untuk Pengguna Publik</p>
                        <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">
                            Cocok untuk edukasi masyarakat karena tidak memerlukan login dan tetap mudah digunakan kapan saja.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row">
                    <a
                        href="https://docs.google.com/forms/d/e/1FAIpQLSdBhrzbbg8G93dHEAjhd0dalVIeWsmhBdbs5RqHJimJjg1oZg/viewform?usp=publish-editor"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="sf-button-primary justify-center"
                    >
                        Buka Google Form
                    </a>
                    <a href="{{ route('education') }}" class="sf-button-secondary justify-center">Kembali ke Edukasi</a>
                </div>
            </div>

            <div class="sf-panel overflow-hidden p-4 dark:bg-slate-900/70">
                <div class="rounded-[1.75rem] border border-slate-200 bg-white/80 p-4 dark:border-slate-800 dark:bg-slate-950/80">
                    <div class="flex flex-col gap-2 border-b border-slate-200 pb-4 dark:border-slate-800 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Formulir Publik</p>
                            <h2 class="mt-2 text-2xl font-bold text-slate-900 dark:text-white">Self-check keamanan pangan</h2>
                        </div>
                        <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold uppercase tracking-[0.16em] text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-300">
                            Google Form
                        </span>
                    </div>

                    <div class="mt-4 overflow-hidden rounded-[1.5rem] bg-slate-50 dark:bg-slate-950">
                        <iframe
                            src="https://docs.google.com/forms/d/e/1FAIpQLSdBhrzbbg8G93dHEAjhd0dalVIeWsmhBdbs5RqHJimJjg1oZg/viewform?usp=pp_url&embedded=true"
                            width="100%"
                            height="980"
                            frameborder="0"
                            marginheight="0"
                            marginwidth="0"
                            loading="lazy"
                            title="Formulir Self-check Keamanan Pangan SafeFood"
                            class="w-full rounded-[1.5rem]"
                        >
                            Memuat formulir...
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
