@extends('layouts.app')

@php
    $contactChannels = [
        [
            'label' => 'Alamat Email',
            'value' => $contacts['email'],
            'href' => 'mailto:' . $contacts['email'],
            'description' => 'Cocok untuk pertanyaan resmi, kerja sama, dan komunikasi administratif.',
        ],
        [
            'label' => 'WhatsApp',
            'value' => $contacts['whatsapp'],
            'href' => 'https://wa.me/' . preg_replace('/\D+/', '', $contacts['whatsapp']),
            'description' => 'Paling cepat untuk koordinasi singkat, demo, dan komunikasi langsung.',
        ],
        [
            'label' => 'Instagram',
            'value' => $contacts['instagram'],
            'href' => 'https://instagram.com/' . ltrim($contacts['instagram'], '@'),
            'description' => 'Digunakan untuk pembaruan publik, identitas platform, dan interaksi ringan.',
        ],
    ];

    $communicationFlows = [
        [
            'title' => 'Pertanyaan umum',
            'description' => 'Ajukan pertanyaan tentang fitur platform, materi edukasi, atau topik keamanan pangan yang ingin dipelajari lebih lanjut.',
        ],
        [
            'title' => 'Permintaan demo',
            'description' => 'Gunakan untuk presentasi SafeFood kepada juri, dosen pembimbing, mentor, atau mitra kolaborasi.',
        ],
        [
            'title' => 'Masukan dan pengembangan',
            'description' => 'Sampaikan saran agar SafeFood terus berkembang menjadi platform edukasi yang lebih kuat dan relevan.',
        ],
    ];

    $serviceStandards = [
        'Gunakan email untuk kebutuhan formal dan dokumentasi komunikasi.',
        'Gunakan WhatsApp untuk komunikasi cepat terkait demo atau koordinasi waktu.',
        'Sertakan konteks singkat agar tim SafeFood dapat merespons lebih tepat.',
    ];
@endphp

@section('content')
    <section class="sf-container">
        <div class="grid gap-8 xl:grid-cols-[0.92fr_1.08fr]">
            <div class="space-y-6">
                <span class="sf-chip">Kontak</span>
                <h1 class="text-3xl font-bold leading-tight text-slate-900 sm:text-4xl md:text-5xl dark:text-white">Hubungi tim SafeFood dengan saluran yang jelas dan profesional</h1>
                <p class="text-lg leading-8 text-slate-600 dark:text-slate-300">
                    Halaman ini dirancang untuk memudahkan komunikasi terkait pertanyaan umum, kolaborasi, kebutuhan demo kompetisi, maupun masukan pengembangan platform edukasi keamanan pangan.
                </p>

                <div class="sf-panel border-transparent bg-[linear-gradient(135deg,#0f172a,#0f766e)] p-6 text-white shadow-[0_24px_70px_rgba(2,8,23,0.4)] sm:p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-cyan-100">Respon yang kami utamakan</p>
                    <div class="mt-5 space-y-3">
                        @foreach ($serviceStandards as $item)
                            <div class="flex items-start gap-3 rounded-[1.25rem] border border-white/10 bg-white/10 px-4 py-3 backdrop-blur">
                                <span class="mt-1 inline-flex h-6 w-6 items-center justify-center rounded-full bg-white/15 text-xs font-bold text-white">&#10003;</span>
                                <p class="text-sm leading-7 text-slate-100">{{ $item }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="grid gap-4">
                    @foreach ($contactChannels as $channel)
                        <article class="sf-panel p-6 sm:p-7">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                                <div>
                                    <p class="text-sm uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">{{ $channel['label'] }}</p>
                                    <h2 class="mt-3 text-2xl font-bold text-slate-900 dark:text-white">{{ $channel['value'] }}</h2>
                                    <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ $channel['description'] }}</p>
                                </div>
                                <a href="{{ $channel['href'] }}" target="_blank" rel="noopener noreferrer" class="sf-button-secondary whitespace-nowrap">
                                    Buka Saluran
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="sf-panel p-6 sm:p-8">
                    <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                        <div>
                            <p class="text-sm uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">Kerangka komunikasi</p>
                            <h2 class="mt-3 text-3xl font-bold text-slate-900 dark:text-white">Alur kontak yang mudah dipahami</h2>
                        </div>
                        <span class="rounded-full bg-teal-100 px-4 py-2 text-xs font-semibold uppercase tracking-[0.18em] text-teal-700 dark:bg-teal-500/15 dark:text-teal-300">
                            Mantap!
                        </span>
                    </div>

                    <div class="mt-8 grid gap-4">
                        @foreach ($communicationFlows as $flow)
                            <div class="rounded-[1.5rem] border border-slate-200/70 bg-slate-50/90 p-5 dark:border-slate-700/70 dark:bg-slate-800/80">
                                <p class="text-sm uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">{{ $flow['title'] }}</p>
                                <p class="mt-3 text-sm leading-7 text-slate-700 dark:text-slate-200">{{ $flow['description'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
