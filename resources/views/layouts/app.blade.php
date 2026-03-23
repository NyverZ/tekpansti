<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'SafeFood'))</title>
    <meta name="description" content="@yield('meta_description', 'SafeFood adalah platform edukasi keamanan pangan, HACCP, nutrisi, dan praktik penanganan makanan yang aman untuk masyarakat umum.')">
    <meta name="robots" content="@yield('meta_robots', 'index,follow')">
    <link rel="canonical" href="@yield('canonical', url()->current())">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:site_name" content="{{ config('app.name', 'SafeFood') }}">
    <meta property="og:title" content="@yield('og_title', trim($__env->yieldContent('title', config('app.name', 'SafeFood'))))">
    <meta property="og:description" content="@yield('og_description', trim($__env->yieldContent('meta_description', 'SafeFood adalah platform edukasi keamanan pangan, HACCP, nutrisi, dan praktik penanganan makanan yang aman untuk masyarakat umum.')))">
    <meta property="og:url" content="@yield('canonical', url()->current())">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', trim($__env->yieldContent('title', config('app.name', 'SafeFood'))))">
    <meta name="twitter:description" content="@yield('og_description', trim($__env->yieldContent('meta_description', 'SafeFood adalah platform edukasi keamanan pangan, HACCP, nutrisi, dan praktik penanganan makanan yang aman untuk masyarakat umum.')))">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/safefood-mark.svg') }}?v=3">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/safefood-favicon-v3.ico') }}?v=1">
    <link rel="shortcut icon" href="{{ asset('images/safefood-favicon-v3.ico') }}?v=1">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon-preview.png') }}?v=3">
    <script>
        (() => {
            const storedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

            if (storedTheme === 'dark' || (!storedTheme && prefersDark)) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="sf-shell bg-[var(--sf-bg)] text-[var(--sf-ink)] transition-colors duration-300">
    @php
        $navItems = [
            ['label' => 'Beranda', 'route' => 'home', 'protected' => false],
            ['label' => 'Edukasi', 'route' => 'education', 'protected' => true],
            ['label' => 'Bahan Pangan', 'route' => 'foods.index', 'protected' => true],
            ['label' => 'Cek Keamanan Makanan', 'route' => 'safety-checker', 'protected' => true],
            ['label' => 'Perbandingan Nutrisi', 'route' => 'foods.compare', 'protected' => true],
            ['label' => 'Kuis', 'route' => 'quiz', 'protected' => true],
            ['label' => 'Artikel', 'route' => 'articles.index', 'protected' => true],
            ['label' => 'Konsultasi', 'route' => 'consultation', 'protected' => true],
            ['label' => 'Tentang Kami', 'route' => 'about', 'protected' => false],
            ['label' => 'Kontak', 'route' => 'contact', 'protected' => false],
        ];

        $footerColumns = [
            [
                'title' => 'Platform',
                'links' => [
                    ['label' => 'Beranda', 'route' => 'home'],
                    ['label' => 'Tentang Kami', 'route' => 'about'],
                    ['label' => 'Kontak', 'route' => 'contact'],
                ],
            ],
            [
                'title' => 'Fitur',
                'links' => [
                    ['label' => 'Edukasi', 'route' => 'education'],
                    ['label' => 'Artikel', 'route' => 'articles.index'],
                    ['label' => 'Quiz', 'route' => 'quiz'],
                ],
            ],
            [
                'title' => 'Eksplorasi',
                'links' => [
                    ['label' => 'Checker', 'route' => 'safety-checker'],
                    ['label' => 'Compare Nutrition', 'route' => 'foods.compare'],
                    ['label' => 'Bahan Pangan', 'route' => 'foods.index'],
                ],
            ],
            [
                'title' => 'Akun',
                'links' => [
                    ['label' => auth()->check() ? 'Dashboard' : 'Masuk', 'route' => auth()->check() ? 'dashboard' : 'login'],
                    ['label' => auth()->check() ? 'Profil' : 'Daftar', 'route' => auth()->check() ? 'profile.edit' : 'register'],
                ],
            ],
        ];

    @endphp

    <div class="relative overflow-x-clip">
        <div class="pointer-events-none absolute inset-x-0 top-0 -z-10 h-[42rem] bg-[radial-gradient(circle_at_top,_rgba(14,165,164,0.22),_transparent_42%),radial-gradient(circle_at_85%_8%,_rgba(245,158,11,0.18),_transparent_24%),linear-gradient(180deg,rgba(255,255,255,0.3),transparent)] dark:bg-[radial-gradient(circle_at_top,_rgba(45,212,191,0.18),_transparent_36%),radial-gradient(circle_at_85%_8%,_rgba(251,191,36,0.15),_transparent_22%),linear-gradient(180deg,rgba(15,23,42,0.45),transparent)]"></div>
        <div class="pointer-events-none absolute left-1/2 top-28 -z-10 h-[34rem] w-[70rem] -translate-x-1/2 rounded-full bg-teal-500/10 blur-3xl dark:bg-cyan-400/10"></div>

        <x-navbar :items="$navItems" />

        <main class="pb-16 pt-6">
            @yield('content')
        </main>

        @guest
            <div
                x-data="{
                    open: false,
                    title: 'Akses Terbatas',
                    message: 'Silakan login untuk mengakses fitur SafeFood.',
                    loginUrl: '{{ route('login') }}',
                    openGate(detail = {}) {
                        this.title = detail.title || 'Akses Terbatas';
                        this.message = detail.message || 'Silakan login untuk mengakses fitur SafeFood.';
                        this.loginUrl = detail.loginUrl || '{{ route('login') }}';
                        this.open = true;
                        document.body.classList.add('overflow-y-hidden');
                    },
                    closeGate() {
                        this.open = false;
                        document.body.classList.remove('overflow-y-hidden');
                    }
                }"
                x-on:safefood-guest-gate.window="openGate($event.detail || {})"
                x-on:keydown.escape.window="if (open) closeGate()"
            >
                <div
                    x-show="open"
                    x-cloak
                    class="fixed inset-0 z-[90] flex items-end justify-center p-4 sm:items-center"
                    aria-modal="true"
                    role="dialog"
                >
                    <div
                        x-show="open"
                        x-transition:enter="transition ease-out duration-250"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        @click="closeGate()"
                        class="absolute inset-0 bg-slate-950/45 backdrop-blur-md"
                    ></div>

                    <div
                        x-show="open"
                        x-transition:enter="transition ease-out duration-250"
                        x-transition:enter-start="translate-y-6 opacity-0 sm:scale-95"
                        x-transition:enter-end="translate-y-0 opacity-100 sm:scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="translate-y-0 opacity-100 sm:scale-100"
                        x-transition:leave-end="translate-y-4 opacity-0 sm:scale-95"
                        class="relative w-full max-w-md overflow-hidden rounded-[2rem] border border-white/50 bg-white/90 p-6 shadow-[0_30px_90px_rgba(15,23,42,0.28)] backdrop-blur-2xl dark:border-slate-700/70 dark:bg-slate-900/90 sm:p-7"
                    >
                        <div class="absolute inset-x-0 top-0 h-24 bg-[linear-gradient(120deg,rgba(20,184,166,0.18),rgba(59,130,246,0.08),rgba(245,158,11,0.18))]"></div>

                        <div class="relative">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-900 text-white shadow-lg shadow-slate-900/20 dark:bg-white dark:text-slate-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16.5 10.5V8a4.5 4.5 0 10-9 0v2.5M7.5 10.5h9a1 1 0 011 1v6a1 1 0 01-1 1h-9a1 1 0 01-1-1v-6a1 1 0 011-1z" />
                                </svg>
                            </div>

                            <p class="mt-6 text-sm font-semibold uppercase tracking-[0.24em] text-teal-600 dark:text-teal-300">Guest Access</p>
                            <h3 class="mt-3 text-2xl font-bold text-slate-950 dark:text-white" x-text="title"></h3>
                            <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300" x-text="message"></p>

                            <div class="mt-7 grid gap-3 sm:grid-cols-2">
                                <a
                                    :href="loginUrl"
                                    class="inline-flex items-center justify-center rounded-2xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white shadow-[0_16px_34px_rgba(15,23,42,0.18)] transition duration-200 hover:-translate-y-0.5 hover:bg-slate-800 dark:bg-white dark:text-slate-900 dark:hover:bg-slate-100"
                                >
                                    Login Sekarang
                                </a>
                                <button
                                    type="button"
                                    @click="closeGate()"
                                    class="inline-flex items-center justify-center rounded-2xl border border-slate-200 bg-white/70 px-5 py-3 text-sm font-semibold text-slate-700 transition duration-200 hover:-translate-y-0.5 hover:border-slate-300 hover:bg-white dark:border-slate-700 dark:bg-slate-950/70 dark:text-slate-200 dark:hover:border-slate-600"
                                >
                                    Tutup
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endguest

        <footer class="mt-20 border-t border-slate-200/70 bg-white py-14 transition-colors duration-300 dark:border-slate-800 dark:bg-black">
            <div class="sf-container">
                <div class="grid gap-12 xl:grid-cols-[0.9fr_1.1fr]">
                    <div class="max-w-md">
                        <div class="flex items-center gap-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl border border-slate-200/80 bg-white shadow-sm dark:border-slate-800 dark:bg-slate-950">
                                <x-application-logo class="h-8 w-8" />
                            </div>
                            <div>
                                <p class="text-2xl font-bold tracking-tight text-slate-950 dark:text-white">SafeFood</p>
                                <p class="text-[11px] uppercase tracking-[0.26em] text-slate-500 dark:text-slate-400">Modern Learning Platform</p>
                            </div>
                        </div>

                        <p class="mt-5 text-sm leading-7 text-slate-600 dark:text-slate-300">
                            Platform edukasi keamanan pangan yang menggabungkan materi, tools interaktif, dan pengalaman belajar modern dalam satu tempat.
                        </p>

                        <div class="mt-6 flex flex-wrap gap-3">
                            <a href="{{ auth()->check() ? route('dashboard') : route('register') }}" class="inline-flex items-center justify-center rounded-2xl border border-slate-200/80 bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition duration-300 hover:-translate-y-0.5 dark:border-slate-700 dark:bg-white dark:text-slate-950">
                                {{ auth()->check() ? 'Buka Dashboard' : 'Mulai Sekarang' }}
                            </a>
                            <a href="{{ route('articles.index') }}" class="inline-flex items-center justify-center rounded-2xl border border-slate-200/80 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition duration-300 hover:-translate-y-0.5 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-200">
                                Artikel
                            </a>
                        </div>
                    </div>

                    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                        @foreach ($footerColumns as $column)
                            <div>
                                <p class="text-sm font-semibold text-slate-950 dark:text-white">{{ $column['title'] }}</p>
                                <div class="mt-5 space-y-3">
                                    @foreach ($column['links'] as $link)
                                        <a href="{{ route($link['route']) }}" class="block text-sm text-slate-600 transition hover:text-slate-950 dark:text-slate-400 dark:hover:text-white">
                                            {{ $link['label'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-12 border-t border-slate-200/70 pt-6 text-sm text-slate-500 dark:border-slate-800 dark:text-slate-400">
                    <p>&copy; {{ date('Y') }} SafeFood. Dibangun untuk edukasi keamanan pangan modern.</p>
                </div>
            </div>
        </footer>
    </div>

    @stack('scripts')
</body>
</html>
