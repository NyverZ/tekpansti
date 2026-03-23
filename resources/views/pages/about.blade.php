@extends('layouts.app')

@php
    $platformPillars = [
        [
            'title' => 'Edukasi yang mudah dipahami',
            'description' => 'SafeFood menyajikan topik keamanan pangan dalam bahasa yang jelas, relevan, dan lebih dekat dengan praktik sehari-hari.',
        ],
        [
            'title' => 'Interaktif dan siap demo',
            'description' => 'Platform ini tidak hanya informatif, tetapi juga menghadirkan pengalaman interaktif melalui kuis, perbandingan nutrisi, dan self-check publik.',
        ],
        [
            'title' => 'Siap dikembangkan',
            'description' => 'Arsitektur SafeFood memungkinkan pengembangan lebih lanjut untuk studi kasus, pelaporan, maupun integrasi konten edukasi yang lebih kaya.',
        ],
    ];

    $aboutHighlights = [
        [
            'title' => 'Latar Belakang',
            'description' => 'SafeFood adalah platform web edukasi yang hadir untuk membantu siapa saja memahami keamanan dan gizi pangan dengan cara yang mudah, praktis, dan menyenangkan. Website ini tidak hanya menyediakan informasi, tetapi juga memandu pengguna dalam memahami cara penggunaan setiap fitur agar pengalaman belajar jadi lebih maksimal.',
        ],
        [
            'title' => 'Keunggulan Website',
            'description' => 'SafeFood menghadirkan materi keamanan pangan dalam bentuk website yang modern, responsif, dan interaktif. Pengguna dapat belajar, membaca artikel, memahami bahan pangan, dan mengeksplorasi nutrisi dalam satu pengalaman yang terintegrasi.',
        ],
        [
            'title' => 'Tujuan Website',
            'description' => 'Website ini dirancang untuk membantu masyarakat, pelajar, dan mahasiswa memahami keamanan pangan secara lebih praktis, visual, dan mudah dipahami, sekaligus menjadi media presentasi yang kuat dalam kompetisi teknologi.',
        ],
    ];

    $teamMembers = [
        [
            'name' => 'Muh Noval Thurfah',
            'role' => 'Ketua Tim',
            'department' => 'Sistem dan Teknologi Informasi',
            'description' => 'Mengkoordinasikan arah produk, strategi presentasi, dan memastikan pengembangan SafeFood tetap fokus pada dampak edukasi.',
            'image' => 'https://my-portofolio-mu-snowy.vercel.app/profil.webp',
            'badge' => 'Project Lead',
        ],
        [
            'name' => 'Musyarif',
            'role' => 'Anggota Tim',
            'department' => 'Sistem dan Teknologi Informasi',
            'description' => 'Menangani pengembangan backend dan memastikan fitur-fitur utama berjalan stabil dan terstruktur.',
            'image' => 'https://ui-avatars.com/api/?name=Bima+Pratama&background=e0f2fe&color=0c4a6e&size=256',
            'badge' => 'UI Support',
        ],
        [
            'name' => 'Citra Maheswari',
            'role' => 'Anggota Tim',
            'department' => 'Teknologi Pangan',
            'description' => 'Mendukung pengembangan materi edukasi pangan agar isi platform tetap relevan, aplikatif, dan mudah dipahami.',
            'image' => 'https://ui-avatars.com/api/?name=Citra+Maheswari&background=fef3c7&color=92400e&size=256',
            'badge' => 'Food Education',
        ],
        [
            'name' => 'Dion Prakoso',
            'role' => 'Anggota Tim',
            'department' => 'Teknologi Pangan',
            'description' => 'Berfokus pada validasi materi, keamanan pangan, dan konsistensi konten agar informasi yang disajikan tetap akurat.',
            'image' => 'https://ui-avatars.com/api/?name=Dion+Prakoso&background=fce7f3&color=9d174d&size=256',
            'badge' => 'Food Safety',
        ],
        [
            'name' => 'Eka Lestari',
            'role' => 'Anggota Tim',
            'department' => 'Teknologi Pangan',
            'description' => 'Mendukung penyusunan insight pangan dan penyajian materi agar SafeFood terasa informatif sekaligus profesional.',
            'image' => 'https://ui-avatars.com/api/?name=Eka+Lestari&background=ede9fe&color=6d28d9&size=256',
            'badge' => 'Content Support',
        ],
    ];

    $topTeamMembers = array_slice($teamMembers, 0, 2);
    $bottomTeamMembers = array_slice($teamMembers, 2);
@endphp

@section('content')
    <section class="sf-container">
        <div class="grid gap-8 xl:grid-cols-[0.92fr_1.08fr]">
            <div class="space-y-6">
                <span class="sf-chip">Tentang SafeFood</span>
                <h1 class="text-3xl font-bold leading-tight text-slate-900 sm:text-4xl md:text-5xl dark:text-white">Platform digital yang dirancang untuk membuat edukasi keamanan pangan terasa lebih jelas dan berdampak</h1>
                <p class="text-lg leading-8 text-slate-600 dark:text-slate-300">
                    SafeFood dikembangkan sebagai platform edukasi yang menggabungkan literasi keamanan pangan, materi HACCP, penanganan makanan yang higienis, serta fitur interaktif yang mudah dipahami oleh pengguna umum.
                </p>

                <div class="sf-panel border-transparent bg-[linear-gradient(135deg,#0f172a,#0f766e)] p-6 text-white shadow-[0_24px_70px_rgba(2,8,23,0.4)] sm:p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-cyan-100">Arah pengembangan platform</p>
                    <div class="mt-5 space-y-3">
                        @foreach ($platformPillars as $pillar)
                            <div class="rounded-[1.25rem] border border-white/10 bg-white/10 px-4 py-4 backdrop-blur">
                                <p class="text-sm font-semibold text-white">{{ $pillar['title'] }}</p>
                                <p class="mt-2 text-sm leading-7 text-slate-100">{{ $pillar['description'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="grid gap-6">
                @foreach ($aboutHighlights as $highlight)
                    <article class="sf-panel p-6 sm:p-8">
                        <h2 class="mt-3 text-2xl font-bold text-slate-900 dark:text-white sm:text-3xl">{{ $highlight['title'] }}</h2>
                        <p class="mt-4 text-sm leading-8 text-slate-600 dark:text-slate-300">{{ $highlight['description'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-2">
            <div class="sf-panel p-6 sm:p-8">
                <p class="text-sm uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Visi</p>
                <p class="mt-4 text-2xl font-bold leading-tight text-slate-900 dark:text-white">
                    Menjadikan edukasi keamanan pangan lebih praktis, modern, dan mudah diakses oleh masyarakat luas.
                </p>
                <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-slate-300">
                    Visi ini diwujudkan melalui materi yang terstruktur, tampilan yang ramah pengguna, dan pengalaman belajar yang tidak terasa membingungkan.
                </p>
            </div>

            <div class="sf-panel p-6 sm:p-8">
                <p class="text-sm uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Misi</p>
                <p class="mt-4 text-2xl font-bold leading-tight text-slate-900 dark:text-white">
                    Menyajikan konten terstruktur, alat interaktif, dan presentasi visual yang siap ditampilkan dalam konteks edukasi maupun kompetisi.
                </p>
                <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-slate-300">
                    SafeFood dibangun agar tidak hanya informatif, tetapi juga relevan untuk pembelajaran, demonstrasi, dan pengembangan lebih lanjut.
                </p>
            </div>
        </div>

        <section class="relative mt-16 overflow-hidden rounded-[2rem] border border-slate-200/70 bg-white/70 px-6 py-8 shadow-[0_24px_70px_rgba(15,23,42,0.08)] backdrop-blur-xl sm:px-8 sm:py-10 dark:border-slate-700/70 dark:bg-slate-900/70">
            <div class="pointer-events-none absolute -left-16 top-0 h-56 w-56 rounded-full bg-emerald-100/70 blur-3xl dark:bg-emerald-500/10"></div>
            <div class="pointer-events-none absolute -right-10 bottom-0 h-64 w-64 rounded-full bg-cyan-100/70 blur-3xl dark:bg-cyan-500/10"></div>

            <div class="relative">
                <div class="max-w-3xl">
                    <span class="sf-chip">Team Profile</span>
                    <h2 class="mt-4 text-3xl font-bold leading-tight text-slate-900 sm:text-4xl dark:text-white">Tim Pengembang SafeFood</h2>
                    <p class="mt-4 text-base leading-8 text-slate-600 dark:text-slate-300">
                        Platform ini dikembangkan oleh tim multidisiplin yang berfokus pada edukasi keamanan pangan berbasis teknologi.
                    </p>
                    <p class="mt-2 text-sm leading-7 text-slate-500 dark:text-slate-400">
                        Formasi tim terdiri dari 2 anggota dari Sistem dan Teknologi Informasi serta 3 anggota dari Teknologi Pangan yang saling melengkapi dalam pengembangan SafeFood.
                    </p>
                </div>

                <div class="mt-10 space-y-8">
                    <div class="grid gap-8 md:grid-cols-2">
                        @foreach ($topTeamMembers as $member)
                            <article class="group relative overflow-hidden rounded-2xl border border-slate-200/80 bg-white/75 p-6 text-center shadow-[0_18px_45px_rgba(15,23,42,0.08)] backdrop-blur transition-all duration-300 hover:-translate-y-1 hover:shadow-xl dark:border-slate-700/80 dark:bg-slate-800/70">
                                <div class="pointer-events-none absolute inset-x-0 top-0 h-24 bg-[linear-gradient(135deg,rgba(16,185,129,0.12),rgba(14,165,233,0.08),transparent)]"></div>

                                <div class="relative">
                                    <img
                                        src="{{ $member['image'] }}"
                                        alt="Foto profil {{ $member['name'] }}"
                                        class="mx-auto h-28 w-28 rounded-full object-cover ring-4 ring-emerald-200 dark:ring-emerald-500/30"
                                    >

                                    <div class="mt-6">
                                        <span class="inline-flex rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-emerald-700 dark:border-emerald-500/20 dark:bg-emerald-500/10 dark:text-emerald-300">
                                            {{ $member['badge'] }}
                                        </span>
                                        <h3 class="mt-5 text-xl font-bold text-slate-900 dark:text-white">{{ $member['name'] }}</h3>
                                        <p class="mt-2 text-sm font-semibold uppercase tracking-[0.18em] text-emerald-700 dark:text-emerald-300">{{ $member['role'] }}</p>
                                        <p class="mt-2 text-sm font-medium text-slate-500 dark:text-slate-400">{{ $member['department'] }}</p>
                                        <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ $member['description'] }}</p>

                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">
                        @foreach ($bottomTeamMembers as $member)
                            <article class="group relative overflow-hidden rounded-2xl border border-slate-200/80 bg-white/75 p-6 text-center shadow-[0_18px_45px_rgba(15,23,42,0.08)] backdrop-blur transition-all duration-300 hover:-translate-y-1 hover:shadow-xl dark:border-slate-700/80 dark:bg-slate-800/70">
                                <div class="pointer-events-none absolute inset-x-0 top-0 h-24 bg-[linear-gradient(135deg,rgba(16,185,129,0.12),rgba(14,165,233,0.08),transparent)]"></div>

                                <div class="relative">
                                    <img
                                        src="{{ $member['image'] }}"
                                        alt="Foto profil {{ $member['name'] }}"
                                        class="mx-auto h-28 w-28 rounded-full object-cover ring-4 ring-emerald-200 dark:ring-emerald-500/30"
                                    >

                                    <div class="mt-6">
                                        <span class="inline-flex rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-emerald-700 dark:border-emerald-500/20 dark:bg-emerald-500/10 dark:text-emerald-300">
                                            {{ $member['badge'] }}
                                        </span>
                                        <h3 class="mt-5 text-xl font-bold text-slate-900 dark:text-white">{{ $member['name'] }}</h3>
                                        <p class="mt-2 text-sm font-semibold uppercase tracking-[0.18em] text-emerald-700 dark:text-emerald-300">{{ $member['role'] }}</p>
                                        <p class="mt-2 text-sm font-medium text-slate-500 dark:text-slate-400">{{ $member['department'] }}</p>
                                        <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ $member['description'] }}</p>

                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
