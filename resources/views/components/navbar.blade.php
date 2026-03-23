@props(['items' => []])

@php
    $navMeta = [
        'home' => [
            'description' => 'Ringkasan platform dan jalur tercepat untuk mulai belajar.',
            'section' => 'utility',
        ],
        'education' => [
            'description' => 'Materi dasar keamanan pangan dan alur belajar utama SafeFood.',
            'section' => 'features',
        ],
        'foods.index' => [
            'description' => 'Telusuri basis bahan pangan beserta informasi pentingnya.',
            'section' => 'features',
        ],
        'safety-checker' => [
            'description' => 'Cek kebiasaan penanganan makanan dengan alur interaktif.',
            'section' => 'features',
        ],
        'foods.compare' => [
            'description' => 'Bandingkan nutrisi bahan pangan secara visual dan cepat.',
            'section' => 'features',
        ],
        'quiz' => [
            'description' => 'Uji pemahaman dengan kuis keamanan pangan yang ringkas.',
            'section' => 'features',
        ],
        'articles.index' => [
            'description' => 'Bacaan edukatif terbaru untuk pendalaman materi.',
            'section' => 'features',
        ],
        'consultation' => [
            'description' => 'Hubungi SafeFood untuk pertanyaan dan konsultasi lanjutan.',
            'section' => 'utility',
        ],
        'about' => [
            'description' => 'Kenali visi, latar belakang, dan arah pengembangan platform.',
            'section' => 'utility',
        ],
        'contact' => [
            'description' => 'Saluran komunikasi resmi untuk tim dan mitra SafeFood.',
            'section' => 'utility',
        ],
    ];

    $resolvedItems = collect($items)
        ->map(fn (array $item) => array_merge($item, $navMeta[$item['route']] ?? [
            'description' => 'Akses cepat ke halaman SafeFood.',
            'section' => 'utility',
        ]))
        ->keyBy('route');

    $desktopFeatureItems = collect([
        'education',
        'foods.index',
        'safety-checker',
        'foods.compare',
        'quiz',
        'articles.index',
    ])->map(fn (string $route) => $resolvedItems->get($route))
        ->filter()
        ->values()
        ->all();

    $desktopUtilityItems = collect([
        'home',
        'consultation',
        'about',
        'contact',
    ])->map(fn (string $route) => $resolvedItems->get($route))
        ->filter()
        ->values()
        ->all();

    $showGuestUx = ! auth()->check();
    $guestGateTitle = 'Akses Terbatas';
    $guestGateMessage = 'Silakan login untuk mengakses fitur SafeFood.';
@endphp

<header
    x-data="{
        open: false,
        dark: document.documentElement.classList.contains('dark'),
        mobileFeaturesOpen: true,
        toggleMenu() {
            this.open = !this.open;
        },
        closeMenu() {
            this.open = false;
        },
        toggleTheme() {
            this.dark = !this.dark;
            document.documentElement.classList.toggle('dark', this.dark);
            localStorage.setItem('theme', this.dark ? 'dark' : 'light');
        }
    }"
    class="sticky top-0 z-50"
>
    <div class="sf-container relative pt-4">
        <div class="sf-glass flex items-center justify-between gap-4 rounded-[1.9rem] px-4 py-3 shadow-[0_22px_60px_rgba(15,23,42,0.14)] transition duration-300 md:px-6 lg:px-7">
            <a href="{{ route('home') }}" class="flex min-w-0 items-center gap-3">
                <x-application-logo class="h-11 w-11 shrink-0 drop-shadow-[0_12px_26px_rgba(15,118,110,0.28)]" />
                <div class="min-w-0">
                    <p class="truncate text-lg font-bold tracking-tight text-slate-900 dark:text-white">SafeFood</p>
                    <p class="text-[11px] uppercase tracking-[0.28em] text-slate-500 dark:text-slate-400">Modern Learning Platform</p>
                </div>
            </a>
            <div class="flex items-center gap-2 md:gap-3">
                @auth
                    <x-notification-bell />
                @endauth

                <div class="hidden items-center gap-3 md:flex">
                    <button
                        type="button"
                        @click="toggleMenu()"
                        class="sf-nav-toggle gap-2 hover:-translate-y-0.5"
                        aria-label="Buka menu navigasi"
                    >
                        <span>Navigasi</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition duration-200" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <button
                        type="button"
                        @click="toggleTheme()"
                        class="sf-nav-toggle h-11 w-11 p-0 hover:-translate-y-0.5"
                        aria-label="Ubah mode gelap"
                    >
                        <svg x-show="!dark" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M21 12.79A9 9 0 1111.21 3A7 7 0 0021 12.79z" />
                        </svg>
                        <svg x-show="dark" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M12 3v2.25M12 18.75V21M4.72 4.72l1.59 1.59M17.69 17.69l1.59 1.59M3 12h2.25M18.75 12H21M4.72 19.28l1.59-1.59M17.69 6.31l1.59-1.59M15.75 12A3.75 3.75 0 1112 8.25 3.75 3.75 0 0115.75 12z" />
                        </svg>
                    </button>

                    @auth
                        <a href="{{ route('dashboard') }}" class="sf-button-secondary">Dasbor</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="sf-button-primary px-5 py-2.5">Keluar</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="sf-button-secondary">Masuk</a>
                        <a href="{{ route('register') }}" class="sf-button-primary">Daftar</a>
                    @endauth
                </div>

                <div class="flex items-center gap-2 md:hidden">
                    <button
                        type="button"
                        @click="toggleTheme()"
                        class="sf-nav-toggle h-10 w-10 p-0"
                        aria-label="Ubah mode gelap"
                    >
                        <svg x-show="!dark" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M21 12.79A9 9 0 1111.21 3A7 7 0 0021 12.79z" />
                        </svg>
                        <svg x-show="dark" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M12 3v2.25M12 18.75V21M4.72 4.72l1.59 1.59M17.69 17.69l1.59 1.59M3 12h2.25M18.75 12H21M4.72 19.28l1.59-1.59M17.69 6.31l1.59-1.59M15.75 12A3.75 3.75 0 1112 8.25 3.75 3.75 0 0115.75 12z" />
                        </svg>
                    </button>

                    <button
                        type="button"
                        @click="toggleMenu()"
                        class="sf-nav-toggle h-10 w-10 p-0"
                        aria-label="Buka navigasi seluler"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M4 7h16M4 12h16M4 17h16" />
                            <path x-show="open" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M6 6l12 12M18 6L6 18" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div
            x-show="open"
            x-transition.origin.top.duration.250ms
            x-cloak
            @click.outside="closeMenu()"
            class="absolute inset-x-4 top-[calc(100%+0.95rem)] sm:inset-x-6 lg:left-auto lg:right-8 lg:w-[34rem] xl:w-[36rem]"
        >
            <div class="sf-glass overflow-hidden rounded-[1.7rem] border border-slate-200/80 p-3 shadow-[0_28px_80px_rgba(15,23,42,0.18)] dark:border-slate-700/70 md:p-4">
                <div class="max-h-[76vh] overflow-y-auto pr-1 md:max-h-[72vh]">
                    <div class="rounded-[1.35rem] border border-white/70 bg-[linear-gradient(135deg,rgba(255,255,255,0.82),rgba(240,253,250,0.68),rgba(255,251,235,0.74))] p-3 shadow-[inset_0_1px_0_rgba(255,255,255,0.72)] dark:border-slate-700/60 dark:bg-[linear-gradient(135deg,rgba(15,23,42,0.92),rgba(15,118,110,0.16),rgba(245,158,11,0.12))]">
                        <div class="flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
                        <div class="max-w-lg">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">SafeFood Navigation</p>
                            <h3 class="mt-1.5 text-lg font-bold text-slate-950 dark:text-white">Akses fitur utama dan halaman publik dari panel yang lebih ringkas.</h3>
                            <p class="mt-1.5 text-xs leading-5 text-slate-600 dark:text-slate-300">
                                Scroll bila ingin melihat semua menu.
                            </p>
                        </div>

                        <div class="flex flex-wrap gap-2">
                            <span class="inline-flex items-center rounded-full border border-slate-200/80 bg-white/80 px-3 py-1.5 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-600 dark:border-slate-700/70 dark:bg-slate-950/70 dark:text-slate-300">
                                {{ count($desktopFeatureItems) }} Fitur Utama
                            </span>
                            <span class="inline-flex items-center rounded-full border border-teal-200/80 bg-teal-50/80 px-3 py-1.5 text-[11px] font-semibold uppercase tracking-[0.18em] text-teal-700 dark:border-teal-400/20 dark:bg-teal-500/10 dark:text-teal-300">
                                @auth
                                    Akses Personal Aktif
                                @else
                                    Preview Guest Aktif
                                @endauth
                            </span>
                        </div>
                    </div>
                    </div>

                    <div class="mt-3 hidden gap-3 md:grid md:grid-cols-2">
                        <section class="rounded-[1.3rem] border border-slate-200/80 bg-white/70 p-3 backdrop-blur dark:border-slate-700/70 dark:bg-slate-950/65">
                        <div class="px-2 pb-3">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400 dark:text-slate-500">Fitur Utama</p>
                            <p class="mt-1 text-xs leading-5 text-slate-500 dark:text-slate-400">Belajar, cek, bandingkan, dan eksplorasi konten.</p>
                        </div>

                        <div class="space-y-2">
                            @foreach ($desktopFeatureItems as $item)
                                @php
                                    $isProtectedGuestItem = $showGuestUx && ($item['protected'] ?? false);
                                @endphp

                                <div class="group relative">
                                    <a
                                        href="{{ route($item['route']) }}"
                                        class="flex items-start gap-3 rounded-[1rem] border border-transparent bg-transparent px-3 py-2.5 transition duration-200 hover:-translate-y-0.5 hover:border-slate-200 hover:bg-slate-50/80 dark:hover:border-slate-700 dark:hover:bg-slate-900/70"
                                    >
                                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-[1rem] bg-slate-900/5 text-xs font-semibold text-slate-600 dark:bg-white/5 dark:text-slate-300">
                                            {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                        </span>

                                        <span class="min-w-0 flex-1">
                                            <span class="flex items-center gap-2">
                                                <span class="text-sm font-semibold text-slate-900 dark:text-white">{{ $item['label'] }}</span>

                                                @if ($isProtectedGuestItem)
                                                    <span class="inline-flex items-center gap-1 rounded-full border border-amber-200/80 bg-amber-50/90 px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.16em] text-amber-700 shadow-sm dark:border-amber-400/20 dark:bg-amber-500/10 dark:text-amber-300">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16.5 10.5V8a4.5 4.5 0 10-9 0v2.5M7.5 10.5h9a1 1 0 011 1v6a1 1 0 01-1 1h-9a1 1 0 01-1-1v-6a1 1 0 011-1z" />
                                                        </svg>
                                                        Login
                                                    </span>
                                                @endif
                                            </span>

                                            <span class="mt-1 block text-[11px] leading-[1.15rem] text-slate-500 dark:text-slate-400">{{ $item['description'] }}</span>
                                        </span>

                                        <span class="mt-0.5 text-sm font-semibold text-teal-600 dark:text-teal-300" aria-hidden="true">&rarr;</span>
                                    </a>

                                    @if ($isProtectedGuestItem)
                                        <div class="pointer-events-none absolute inset-x-4 top-full z-10 mt-2 translate-y-2 opacity-0 transition duration-200 group-hover:translate-y-0 group-hover:opacity-100">
                                            <div class="rounded-2xl border border-slate-200/80 bg-white/90 px-3 py-2 text-xs font-medium text-slate-600 shadow-[0_18px_45px_rgba(15,23,42,0.12)] backdrop-blur-xl dark:border-slate-700/70 dark:bg-slate-950/90 dark:text-slate-200">
                                                Login untuk mengakses fitur SafeFood
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        </section>

                        <section class="rounded-[1.3rem] border border-slate-200/80 bg-white/70 p-3 backdrop-blur dark:border-slate-700/70 dark:bg-slate-950/65">
                        <div class="px-2 pb-3">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400 dark:text-slate-500">Info & Akses</p>
                            <p class="mt-1 text-xs leading-5 text-slate-500 dark:text-slate-400">Halaman publik, bantuan, dan akses cepat.</p>
                        </div>

                        <div class="space-y-2">
                            @foreach ($desktopUtilityItems as $item)
                                @php
                                    $isProtectedGuestItem = $showGuestUx && ($item['protected'] ?? false);
                                @endphp

                                <div class="group relative">
                                    <a
                                        href="{{ route($item['route']) }}"
                                        class="flex items-start gap-3 rounded-[1rem] border border-transparent bg-transparent px-3 py-2.5 transition duration-200 hover:-translate-y-0.5 hover:border-slate-200 hover:bg-slate-50/80 dark:hover:border-slate-700 dark:hover:bg-slate-900/70"
                                    >
                                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-[1rem] bg-slate-900/5 text-xs font-semibold text-slate-600 dark:bg-white/5 dark:text-slate-300">
                                            {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                        </span>

                                        <span class="min-w-0 flex-1">
                                            <span class="flex items-center gap-2">
                                                <span class="text-sm font-semibold text-slate-900 dark:text-white">{{ $item['label'] }}</span>

                                                @if ($isProtectedGuestItem)
                                                    <span class="inline-flex items-center gap-1 rounded-full border border-amber-200/80 bg-amber-50/90 px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.16em] text-amber-700 shadow-sm dark:border-amber-400/20 dark:bg-amber-500/10 dark:text-amber-300">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16.5 10.5V8a4.5 4.5 0 10-9 0v2.5M7.5 10.5h9a1 1 0 011 1v6a1 1 0 01-1 1h-9a1 1 0 01-1-1v-6a1 1 0 011-1z" />
                                                        </svg>
                                                        Login
                                                    </span>
                                                @endif
                                            </span>

                                            <span class="mt-1 block text-[11px] leading-[1.15rem] text-slate-500 dark:text-slate-400">{{ $item['description'] }}</span>
                                        </span>

                                        <span class="mt-0.5 text-sm font-semibold text-teal-600 dark:text-teal-300" aria-hidden="true">&rarr;</span>
                                    </a>

                                    @if ($isProtectedGuestItem)
                                        <div class="pointer-events-none absolute inset-x-4 top-full z-10 mt-2 translate-y-2 opacity-0 transition duration-200 group-hover:translate-y-0 group-hover:opacity-100">
                                            <div class="rounded-2xl border border-slate-200/80 bg-white/90 px-3 py-2 text-xs font-medium text-slate-600 shadow-[0_18px_45px_rgba(15,23,42,0.12)] backdrop-blur-xl dark:border-slate-700/70 dark:bg-slate-950/90 dark:text-slate-200">
                                                Login untuk mengakses fitur SafeFood
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        </section>
                    </div>

                    <div class="mt-3 space-y-3 md:hidden">
                        <section class="rounded-[1.3rem] border border-slate-200/80 bg-white/70 p-3 backdrop-blur dark:border-slate-700/70 dark:bg-slate-950/65">
                            <button
                                type="button"
                                @click="mobileFeaturesOpen = !mobileFeaturesOpen"
                                class="flex w-full items-center justify-between rounded-[1rem] px-2 py-1 text-left"
                            >
                                <span>
                                    <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-slate-400 dark:text-slate-500">Menu Utama</p>
                                    <p class="mt-1 text-xs leading-5 text-slate-500 dark:text-slate-400">Edukasi, cek keamanan, perbandingan nutrisi, kuis, dan artikel.</p>
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-500 transition duration-200" :class="mobileFeaturesOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div
                                x-show="mobileFeaturesOpen"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 -translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 -translate-y-2"
                                class="mt-3 space-y-2"
                            >
                                @foreach ($desktopFeatureItems as $item)
                                    <a
                                        href="{{ route($item['route']) }}"
                                        @if ($showGuestUx && ($item['protected'] ?? false))
                                            @click.prevent="closeMenu(); $dispatch('safefood-guest-gate', { title: '{{ $guestGateTitle }}', message: '{{ $guestGateMessage }}', loginUrl: '{{ route('login') }}' })"
                                        @else
                                            @click="closeMenu()"
                                        @endif
                                        class="flex items-start gap-3 rounded-[1rem] border border-slate-200/80 bg-white/75 px-4 py-3 transition duration-200 hover:-translate-y-0.5 hover:border-teal-200 hover:bg-white dark:border-slate-700 dark:bg-slate-950/75 dark:hover:border-teal-400/30"
                                    >
                                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-[1rem] bg-slate-900/5 text-xs font-semibold text-slate-600 dark:bg-white/5 dark:text-slate-300">
                                            {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                        </span>

                                        <span class="min-w-0 flex-1">
                                            <span class="flex items-center gap-2">
                                                <span class="text-sm font-semibold text-slate-900 dark:text-white">{{ $item['label'] }}</span>

                                                @if ($showGuestUx && ($item['protected'] ?? false))
                                                    <span class="inline-flex items-center gap-1 rounded-full border border-amber-200/80 bg-amber-50/90 px-2 py-1 text-[10px] font-semibold uppercase tracking-[0.14em] text-amber-700 dark:border-amber-400/20 dark:bg-amber-500/10 dark:text-amber-300">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16.5 10.5V8a4.5 4.5 0 10-9 0v2.5M7.5 10.5h9a1 1 0 011 1v6a1 1 0 01-1 1h-9a1 1 0 01-1-1v-6a1 1 0 011-1z" />
                                                        </svg>
                                                        Login
                                                    </span>
                                                @endif
                                            </span>

                                            <span class="mt-1 block text-[11px] leading-[1.15rem] text-slate-500 dark:text-slate-400">{{ $item['description'] }}</span>
                                        </span>

                                        <span class="mt-0.5 text-sm font-semibold text-teal-600 dark:text-teal-300" aria-hidden="true">&rarr;</span>
                                    </a>
                                @endforeach
                            </div>
                        </section>
                    </div>

                    <div class="mt-3 grid gap-3 border-t border-slate-200/80 pt-4 dark:border-slate-800/80 md:hidden">
                        @auth
                            <a href="{{ route('dashboard') }}" @click="closeMenu()" class="sf-button-secondary justify-center">Dasbor</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button @click="closeMenu()" class="sf-button-primary w-full justify-center">Keluar</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" @click="closeMenu()" class="sf-button-secondary justify-center">Masuk</a>
                            <a href="{{ route('register') }}" @click="closeMenu()" class="sf-button-primary justify-center">Daftar</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
