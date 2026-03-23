@extends('layouts.app')

@php
    $contactChannels = [
        [
            'label' => 'Alamat Email',
            'value' => $contacts['email'],
            'href' => 'mailto:' . $contacts['email'],
            'description' => 'Cocok untuk pertanyaan resmi, kerja sama, dan komunikasi administratif.',
            'icon' => 'mail',
        ],
        [
            'label' => 'WhatsApp',
            'value' => $contacts['whatsapp'],
            'href' => 'https://wa.me/' . preg_replace('/\D+/', '', $contacts['whatsapp']),
            'description' => 'Paling cepat untuk koordinasi singkat, demo, dan komunikasi langsung.',
            'icon' => 'phone',
        ],
        [
            'label' => 'Instagram',
            'value' => $contacts['instagram'],
            'href' => 'https://instagram.com/' . ltrim($contacts['instagram'], '@'),
            'description' => 'Digunakan untuk pembaruan publik, identitas platform, dan interaksi ringan.',
            'icon' => 'instagram',
        ],
    ];

    $contactHighlights = [
        [
            'title' => 'Pertanyaan umum',
            'description' => 'Hubungi tim SafeFood untuk pertanyaan fitur, materi edukasi, atau kebutuhan informasi platform.',
        ],
        [
            'title' => 'Kolaborasi dan demo',
            'description' => 'Gunakan halaman ini untuk kebutuhan presentasi, diskusi kerja sama, atau permintaan demonstrasi produk.',
        ],
        [
            'title' => 'Masukan pengembangan',
            'description' => 'Sampaikan ide, kritik, dan saran agar SafeFood terus berkembang menjadi platform edukasi yang lebih kuat.',
        ],
    ];

    $serviceStandards = [
        'Gunakan email untuk komunikasi formal dan kebutuhan dokumentasi.',
        'Gunakan WhatsApp untuk koordinasi cepat terkait demo atau waktu pertemuan.',
        'Sampaikan konteks singkat agar tim SafeFood dapat merespons lebih tepat.',
    ];
@endphp

@section('content')
    <section class="sf-container">
        <div class="relative overflow-hidden rounded-[2rem] border border-slate-200/70 bg-white/65 px-6 py-8 shadow-[0_24px_70px_rgba(15,23,42,0.08)] backdrop-blur-xl sm:px-8 sm:py-10 dark:border-slate-700/70 dark:bg-slate-900/70">
            <div class="pointer-events-none absolute -left-20 top-0 h-64 w-64 rounded-full bg-emerald-100/70 blur-3xl dark:bg-emerald-500/10"></div>
            <div class="pointer-events-none absolute -right-10 top-8 h-72 w-72 rounded-full bg-cyan-100/70 blur-3xl dark:bg-cyan-500/10"></div>

            <div class="relative">
                <div class="max-w-3xl">
                    <span class="sf-chip">Kontak</span>
                    <h1 class="mt-4 text-3xl font-bold leading-tight text-slate-900 sm:text-4xl md:text-5xl dark:text-white">Hubungi Kami</h1>
                    <p class="mt-4 text-lg leading-8 text-slate-600 dark:text-slate-300">
                        Jika Anda memiliki pertanyaan atau ingin berkolaborasi dalam edukasi keamanan pangan, silakan hubungi tim SafeFood.
                    </p>
                </div>

                <div class="mt-10 grid gap-10 md:grid-cols-2">
                    <div class="group rounded-3xl border border-slate-200/80 bg-white/70 p-6 shadow-lg backdrop-blur transition duration-300 hover:-translate-y-1 hover:shadow-xl dark:border-slate-700/80 dark:bg-slate-800/70 sm:p-8">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <p class="text-sm uppercase tracking-[0.22em] text-slate-500 dark:text-slate-400">Contact Information</p>
                                <h2 class="mt-3 text-3xl font-bold text-slate-900 dark:text-white">Tim SafeFood siap dihubungi</h2>
                            </div>
                            <span class="rounded-full border border-emerald-200 bg-emerald-50 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.18em] text-emerald-700 dark:border-emerald-500/20 dark:bg-emerald-500/10 dark:text-emerald-300">
                                Online
                            </span>
                        </div>

                        <div class="mt-8 space-y-4">
                            @foreach ($contactChannels as $channel)
                                <a
                                    href="{{ $channel['href'] }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="flex items-start gap-4 rounded-2xl border border-slate-200/80 bg-white/80 p-4 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-emerald-200 hover:shadow-md dark:border-slate-700/80 dark:bg-slate-900/70 dark:hover:border-emerald-500/30"
                                >
                                    <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600 dark:bg-emerald-900/40 dark:text-emerald-300">
                                        @if ($channel['icon'] === 'mail')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path d="M3.75 5.5h16.5A1.75 1.75 0 0 1 22 7.25v9.5A1.75 1.75 0 0 1 20.25 18.5H3.75A1.75 1.75 0 0 1 2 16.75v-9.5A1.75 1.75 0 0 1 3.75 5.5Zm0 1.5v.17L12 12.4l8.25-5.23V7H3.75Zm16.5 10V8.94l-7.85 4.98a.75.75 0 0 1-.8 0L3.75 8.94V17h16.5Z" />
                                            </svg>
                                        @elseif ($channel['icon'] === 'phone')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path d="M6.62 3.51c.28-.3.7-.42 1.08-.31l2.16.62c.47.13.78.56.76 1.04l-.09 2.1a1 1 0 0 1-.45.8l-1.3.84a15.9 15.9 0 0 0 6.6 6.6l.84-1.3a1 1 0 0 1 .8-.45l2.1-.09c.48-.02.91.3 1.04.76l.62 2.16c.1.38 0 .8-.31 1.08l-1.43 1.3a2 2 0 0 1-1.72.48A18.5 18.5 0 0 1 3.77 6.66a2 2 0 0 1 .48-1.72l1.37-1.43Z" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2Zm0 1.8A3.95 3.95 0 0 0 3.8 7.75v8.5a3.95 3.95 0 0 0 3.95 3.95h8.5a3.95 3.95 0 0 0 3.95-3.95v-8.5a3.95 3.95 0 0 0-3.95-3.95h-8.5Zm8.95 1.35a1.1 1.1 0 1 1 0 2.2 1.1 1.1 0 0 1 0-2.2ZM12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10Zm0 1.8A3.2 3.2 0 1 0 12 15.2a3.2 3.2 0 0 0 0-6.4Z" />
                                            </svg>
                                        @endif
                                    </span>

                                    <span class="min-w-0">
                                        <p class="text-sm font-semibold uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400">{{ $channel['label'] }}</p>
                                        <p class="mt-2 break-words text-lg font-bold text-slate-900 dark:text-white">{{ $channel['value'] }}</p>
                                        <p class="mt-2 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ $channel['description'] }}</p>
                                    </span>
                                </a>
                            @endforeach
                        </div>

                        <div class="mt-8 rounded-2xl border border-slate-200/80 bg-slate-50/90 p-5 dark:border-slate-700/70 dark:bg-slate-900/70">
                            <p class="text-sm uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">Standar komunikasi</p>
                            <div class="mt-4 space-y-3">
                                @foreach ($serviceStandards as $item)
                                    <div class="flex items-start gap-3">
                                        <span class="mt-1 inline-flex h-6 w-6 items-center justify-center rounded-full bg-emerald-100 text-xs font-bold text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300">&#10003;</span>
                                        <p class="text-sm leading-7 text-slate-600 dark:text-slate-300">{{ $item }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="group rounded-3xl border border-slate-200/80 bg-white/70 p-6 shadow-lg backdrop-blur transition duration-300 hover:-translate-y-1 hover:shadow-xl dark:border-slate-700/80 dark:bg-slate-800/70 sm:p-8">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <p class="text-sm uppercase tracking-[0.22em] text-slate-500 dark:text-slate-400">Contact Form</p>
                                <h2 class="mt-3 text-3xl font-bold text-slate-900 dark:text-white">Sampaikan kebutuhan Anda</h2>
                            </div>
                            <span class="rounded-full border border-slate-200/80 bg-white/80 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-600 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300">
                                Startup Style
                            </span>
                        </div>

                        <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-slate-300">
                            Halaman ini menggunakan kanal komunikasi resmi SafeFood. Tulis kebutuhan Anda dengan format berikut, lalu kirim melalui email atau WhatsApp agar tim dapat menanggapi dengan lebih cepat.
                        </p>

                        <div class="mt-8 space-y-5">
                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-200">Nama</label>
                                <input type="text" placeholder="Masukkan nama Anda" class="w-full rounded-xl border border-slate-200 bg-white/90 px-4 py-3 text-slate-900 shadow-sm outline-none transition duration-300 placeholder:text-slate-400 focus:border-emerald-400 focus:ring-4 focus:ring-emerald-100 dark:border-slate-700 dark:bg-slate-900/80 dark:text-white dark:placeholder:text-slate-500 dark:focus:border-emerald-500 dark:focus:ring-emerald-500/20">
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-200">Email</label>
                                <input type="email" placeholder="nama@email.com" class="w-full rounded-xl border border-slate-200 bg-white/90 px-4 py-3 text-slate-900 shadow-sm outline-none transition duration-300 placeholder:text-slate-400 focus:border-emerald-400 focus:ring-4 focus:ring-emerald-100 dark:border-slate-700 dark:bg-slate-900/80 dark:text-white dark:placeholder:text-slate-500 dark:focus:border-emerald-500 dark:focus:ring-emerald-500/20">
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-200">Subjek</label>
                                <input type="text" placeholder="Contoh: Permintaan demo SafeFood" class="w-full rounded-xl border border-slate-200 bg-white/90 px-4 py-3 text-slate-900 shadow-sm outline-none transition duration-300 placeholder:text-slate-400 focus:border-emerald-400 focus:ring-4 focus:ring-emerald-100 dark:border-slate-700 dark:bg-slate-900/80 dark:text-white dark:placeholder:text-slate-500 dark:focus:border-emerald-500 dark:focus:ring-emerald-500/20">
                            </div>

                            <div>
                                <label class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-200">Pesan</label>
                                <textarea rows="5" placeholder="Tuliskan kebutuhan, pertanyaan, atau rencana kolaborasi Anda." class="w-full rounded-xl border border-slate-200 bg-white/90 px-4 py-3 text-slate-900 shadow-sm outline-none transition duration-300 placeholder:text-slate-400 focus:border-emerald-400 focus:ring-4 focus:ring-emerald-100 dark:border-slate-700 dark:bg-slate-900/80 dark:text-white dark:placeholder:text-slate-500 dark:focus:border-emerald-500 dark:focus:ring-emerald-500/20"></textarea>
                            </div>
                        </div>

                        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                            <a href="mailto:{{ $contacts['email'] }}" class="inline-flex items-center justify-center rounded-xl bg-emerald-600 px-6 py-3 font-semibold text-white shadow-md transition duration-300 hover:-translate-y-0.5 hover:bg-emerald-700 hover:shadow-lg">
                                Kirim via Email
                            </a>
                            <a href="https://wa.me/{{ preg_replace('/\D+/', '', $contacts['whatsapp']) }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white/90 px-6 py-3 font-semibold text-slate-700 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-emerald-200 hover:bg-white hover:shadow-md dark:border-slate-700 dark:bg-slate-900/80 dark:text-slate-200 dark:hover:border-emerald-500/30 dark:hover:bg-slate-900">
                                Chat via WhatsApp
                            </a>
                        </div>

                        <div class="mt-8 grid gap-4">
                            @foreach ($contactHighlights as $item)
                                <div class="rounded-2xl border border-slate-200/80 bg-slate-50/85 p-5 transition duration-300 hover:-translate-y-0.5 hover:shadow-md dark:border-slate-700/70 dark:bg-slate-900/70">
                                    <p class="text-sm font-semibold uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400">{{ $item['title'] }}</p>
                                    <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ $item['description'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
