<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SafeFood') }} Dasbor</title>
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

        window.safeFoodToggleTheme = () => {
            const root = document.documentElement;
            const isDark = !root.classList.contains('dark');
            root.classList.toggle('dark', isDark);
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
            return isDark;
        };
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="min-h-screen bg-[radial-gradient(circle_at_top_left,#dff7f1_0%,#f6f8fc_38%,#eef2ff_100%)] text-slate-900 dark:bg-[radial-gradient(circle_at_top_left,#082f49_0%,#020617_42%,#020617_100%)] dark:text-white">
    @php
        $isAdmin = auth()->user()->role === 'admin';
        $workspaceLinks = [
            [
                'label' => 'Dasbor',
                'route' => route('dashboard'),
                'active' => request()->routeIs('dashboard'),
            ],
            [
                'label' => 'Katalog Pangan',
                'route' => route('foods.index'),
                'active' => request()->routeIs('foods.*'),
            ],
        ];

        $managementLinks = $isAdmin
            ? [
                [
                    'label' => 'Kelola Bahan Pangan',
                    'route' => route('admin.ingredients.index'),
                    'active' => request()->routeIs('admin.ingredients.*'),
                ],
                [
                    'label' => 'Kelola Artikel',
                    'route' => route('admin.articles.index'),
                    'active' => request()->routeIs('admin.articles.*'),
                ],
                [
                    'label' => 'Kelola Pengguna',
                    'route' => route('admin.users.index'),
                    'active' => request()->routeIs('admin.users.*'),
                ],
            ]
            : [];

        $accountLinks = [
            [
                'label' => 'Pengaturan Profil',
                'route' => route('profile.edit'),
                'active' => request()->routeIs('profile.*'),
            ],
        ];

        $workspaceTitle = $isAdmin ? 'Admin Command Center' : 'Learning Workspace';
        $workspaceSubtitle = $isAdmin/*  */
            ? 'Kelola platform, pengguna, dan konten dari satu ruang kontrol.'
            : 'Akses fitur pembelajaran dan progres harian dari satu ruang belajar.';
        $workspacePill = $isAdmin ? 'Admin Mode' : 'User Mode';
        $workspacePillClasses = $isAdmin
            ? 'border-amber-200 bg-amber-50 text-amber-700 dark:border-amber-500/20 dark:bg-amber-500/10 dark:text-amber-300'
            : 'border-emerald-200 bg-emerald-50 text-emerald-700 dark:border-emerald-500/20 dark:bg-emerald-500/10 dark:text-emerald-300';
        $workspaceHeroGradient = $isAdmin
            ? 'bg-[linear-gradient(140deg,#1f2937_0%,#0f766e_52%,#7c2d12_100%)]'
            : 'bg-[linear-gradient(140deg,#07162c_0%,#0f766e_52%,#0b3a63_100%)]';
        $roleBadgeGradient = $isAdmin
            ? 'bg-[linear-gradient(135deg,#f59e0b,#b45309)]'
            : 'bg-[linear-gradient(135deg,#14b8a6,#155e75)]';
    @endphp

    <div class="relative min-h-screen overflow-hidden">
        <div class="pointer-events-none absolute inset-x-0 top-0 h-72 bg-[radial-gradient(circle_at_top,#99f6e4_0%,transparent_58%)] opacity-70 dark:bg-[radial-gradient(circle_at_top,rgba(45,212,191,0.26)_0%,transparent_60%)]"></div>
        <div class="pointer-events-none absolute -left-24 top-24 h-72 w-72 rounded-full bg-cyan-200/50 blur-3xl dark:bg-cyan-500/12"></div>
        <div class="pointer-events-none absolute right-0 top-40 h-80 w-80 rounded-full bg-amber-100/70 blur-3xl dark:bg-amber-400/10"></div>

        <div class="relative flex min-h-screen">
            <aside id="dashboardSidebar" class="fixed inset-y-0 left-0 z-50 flex h-full w-80 max-w-[90vw] -translate-x-full flex-col overflow-y-auto border-r border-white/70 bg-white/78 opacity-0 shadow-[0_28px_80px_rgba(15,23,42,0.14)] backdrop-blur-2xl transition-[transform,opacity,width,border-color] duration-500 ease-[cubic-bezier(0.22,1,0.36,1)] dark:border-slate-800/80 dark:bg-slate-950/84 lg:static lg:z-auto lg:max-w-none lg:translate-x-0 lg:opacity-100 lg:w-80">
                <div class="border-b border-slate-200/70 px-6 pb-6 pt-7 dark:border-slate-800/80">
                    <div class="flex items-center justify-between gap-3">
                        <a href="{{ route('home') }}" class="flex min-w-0 items-center gap-3">
                            <div class="relative shrink-0">
                                <div class="absolute inset-0 rounded-2xl bg-teal-300/30 blur-xl dark:bg-teal-400/20"></div>
                                <div class="relative flex h-14 w-14 items-center justify-center rounded-2xl border border-white/70 bg-white/90 shadow-[0_16px_30px_rgba(15,118,110,0.16)] dark:border-slate-700 dark:bg-slate-900/90">
                                    <x-application-logo class="h-10 w-10 drop-shadow-[0_10px_24px_rgba(15,118,110,0.18)]" />
                                </div>
                            </div>
                            <span class="min-w-0">
                                <p class="truncate text-2xl font-bold tracking-tight text-teal-700 dark:text-teal-300">SafeFood</p>
                                <p class="truncate text-[11px] uppercase tracking-[0.28em] text-slate-500 dark:text-slate-400">{{ $workspaceTitle }}</p>
                            </span>
                        </a>

                        <div class="flex items-center gap-2">
                            <span class="hidden rounded-full border px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] sm:inline-flex {{ $workspacePillClasses }}">
                                {{ $workspacePill }}
                            </span>
                            <button
                                id="dashboardSidebarCloseMobile"
                                type="button"
                                class="inline-flex h-10 w-10 items-center justify-center rounded-2xl border border-slate-200/80 bg-white/85 text-slate-700 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:bg-white dark:border-slate-800 dark:bg-slate-900 dark:text-slate-200 lg:hidden"
                                aria-label="Tutup sidebar"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="mt-6 rounded-[1.6rem] border border-slate-200/80 p-5 text-white shadow-[0_20px_55px_rgba(2,8,23,0.22)] dark:border-slate-700/60 {{ $workspaceHeroGradient }}">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-cyan-100/85">Control Hub</p>
                                <h2 class="mt-2 text-xl font-bold leading-tight">{{ $workspaceTitle }}</h2>
                            </div>
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl {{ $roleBadgeGradient }} shadow-[0_16px_30px_rgba(15,23,42,0.22)]">
                                @if ($isAdmin)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3l7 4v5c0 4.5-2.9 7.8-7 9-4.1-1.2-7-4.5-7-9V7l7-4z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9.5 12.5l1.7 1.7 3.3-4.2" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6v12m6-6H6" />
                                    </svg>
                                @endif
                            </div>
                        </div>

                        <p class="mt-3 text-sm leading-6 text-slate-100/85">{{ $workspaceSubtitle }}</p>

                        <div class="mt-4 flex flex-wrap items-center gap-2">
                            <span class="inline-flex rounded-full border border-white/20 bg-white/10 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-white/90">
                                {{ $workspacePill }}
                            </span>
                            <span class="inline-flex rounded-full border border-white/20 bg-white/10 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-white/90">
                                Mobile Ready
                            </span>
                        </div>
                    </div>
                </div>

                <div class="flex-1 space-y-6 px-4 py-6">
                    <div>
                        <p class="px-3 text-[11px] font-semibold uppercase tracking-[0.24em] text-slate-400 dark:text-slate-500">Workspace</p>
                        <nav class="mt-3 grid gap-2">
                            @foreach ($workspaceLinks as $link)
                                <a href="{{ $link['route'] }}" class="group rounded-[1.25rem] border px-4 py-3 transition duration-300 {{ $link['active'] ? 'border-teal-500/30 bg-[linear-gradient(135deg,#0f766e,#155e75)] text-white shadow-[0_18px_35px_rgba(15,118,110,0.22)]' : 'border-slate-200/80 bg-white/72 text-slate-700 hover:-translate-y-0.5 hover:border-teal-200 hover:bg-white dark:border-slate-800 dark:bg-slate-900/75 dark:text-slate-200 dark:hover:border-teal-500/40 dark:hover:bg-slate-900' }}">
                                    <span class="block text-sm font-semibold">{{ $link['label'] }}</span>
                                </a>
                            @endforeach
                        </nav>
                    </div>

                    @if (! empty($managementLinks))
                        <div>
                            <p class="px-3 text-[11px] font-semibold uppercase tracking-[0.24em] text-slate-400 dark:text-slate-500">Management</p>
                            <nav class="mt-3 grid gap-2">
                                @foreach ($managementLinks as $link)
                                    <a href="{{ $link['route'] }}" class="group rounded-[1.25rem] border px-4 py-3 transition duration-300 {{ $link['active'] ? 'border-teal-500/30 bg-[linear-gradient(135deg,#0f766e,#155e75)] text-white shadow-[0_18px_35px_rgba(15,118,110,0.22)]' : 'border-slate-200/80 bg-white/72 text-slate-700 hover:-translate-y-0.5 hover:border-teal-200 hover:bg-white dark:border-slate-800 dark:bg-slate-900/75 dark:text-slate-200 dark:hover:border-teal-500/40 dark:hover:bg-slate-900' }}">
                                        <span class="block text-sm font-semibold">{{ $link['label'] }}</span>
                                    </a>
                                @endforeach
                            </nav>
                        </div>
                    @endif

                    <div>
                        <p class="px-3 text-[11px] font-semibold uppercase tracking-[0.24em] text-slate-400 dark:text-slate-500">Account</p>
                        <nav class="mt-3 grid gap-2">
                            @foreach ($accountLinks as $link)
                                <a href="{{ $link['route'] }}" class="group rounded-[1.25rem] border px-4 py-3 transition duration-300 {{ $link['active'] ? 'border-teal-500/30 bg-[linear-gradient(135deg,#0f766e,#155e75)] text-white shadow-[0_18px_35px_rgba(15,118,110,0.22)]' : 'border-slate-200/80 bg-white/72 text-slate-700 hover:-translate-y-0.5 hover:border-teal-200 hover:bg-white dark:border-slate-800 dark:bg-slate-900/75 dark:text-slate-200 dark:hover:border-teal-500/40 dark:hover:bg-slate-900' }}">
                                    <span class="block text-sm font-semibold">{{ $link['label'] }}</span>
                                </a>
                            @endforeach
                        </nav>
                    </div>
                </div>

                <div class="border-t border-slate-200/70 px-4 py-5 dark:border-slate-800/80">
                    <div class="mb-4 rounded-[1.5rem] border border-slate-200/80 bg-white/80 p-4 shadow-sm dark:border-slate-800 dark:bg-slate-900/70">
                        <div class="flex items-center gap-3">
                            <div class="flex h-11 w-11 items-center justify-center rounded-full bg-[linear-gradient(135deg,#0f766e,#155e75)] font-bold text-white shadow-[0_12px_26px_rgba(15,118,110,0.25)]">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <div class="min-w-0">
                                <p class="truncate text-sm font-semibold text-slate-900 dark:text-white">{{ Auth::user()->name }}</p>
                                <p class="text-[11px] uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">{{ auth()->user()->role }}</p>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="w-full rounded-[1.25rem] bg-[linear-gradient(135deg,#7f1d1d,#991b1b)] px-4 py-3 text-left text-sm font-semibold text-white shadow-[0_16px_28px_rgba(127,29,29,0.22)] transition duration-300 hover:-translate-y-0.5 hover:shadow-[0_20px_34px_rgba(127,29,29,0.28)]">Keluar</button>
                    </form>
                </div>
            </aside>
            <div id="dashboardSidebarOverlay" class="fixed inset-0 z-40 bg-slate-950/45 opacity-0 pointer-events-none backdrop-blur-sm transition-opacity duration-300 lg:hidden"></div>

            <div id="dashboardMain" class="min-w-0 flex-1 transition-all duration-500 ease-[cubic-bezier(0.22,1,0.36,1)]">
                <header class="px-4 pt-4 sm:px-6 sm:pt-6 lg:px-8">
                    <div class="rounded-[1.9rem] border border-white/80 bg-white/72 px-5 py-5 shadow-[0_20px_60px_rgba(15,23,42,0.08)] backdrop-blur-2xl dark:border-slate-800/80 dark:bg-slate-950/70 sm:px-6">
                        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                            <div class="flex items-start gap-3 sm:items-center">
                                <button
                                    id="dashboardSidebarToggle"
                                    type="button"
                                    class="sf-nav-toggle mt-0.5 h-11 w-11 rounded-2xl border border-slate-200/80 bg-white/80 p-0 text-slate-700 shadow-sm transition-transform duration-300 ease-out hover:scale-[1.03] dark:border-slate-800 dark:bg-slate-900 dark:text-slate-200 sm:mt-0"
                                    aria-label="Buka atau tutup sidebar"
                                    aria-expanded="true"
                                >
                                    <svg id="dashboardSidebarOpenIcon" xmlns="http://www.w3.org/2000/svg" class="hidden h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 7h16M4 12h16M4 17h16" />
                                    </svg>
                                    <svg id="dashboardSidebarCloseIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7h12M8 12h12M8 17h12M4 7h.01M4 12h.01M4 17h.01" />
                                    </svg>
                                </button>

                                <div>
                                    <h1 class="mt-2 text-2xl font-bold tracking-tight text-slate-900 dark:text-white sm:text-[2rem]">Dasbor SafeFood</h1>
                                    <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Ruang kerja utama untuk melihat insight, aksi cepat, dan perkembangan platform.</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap items-center gap-3">
                                <a href="{{ route('home') }}" class="inline-flex items-center rounded-full border border-slate-200/80 bg-white/80 px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:bg-white dark:border-slate-800 dark:bg-slate-900 dark:text-slate-200 dark:hover:bg-slate-900">
                                    Ke Beranda
                                </a>
                                <button type="button" onclick="window.safeFoodToggleTheme()" class="inline-flex items-center rounded-full border border-slate-200/80 bg-white/80 px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:bg-white dark:border-slate-800 dark:bg-slate-900 dark:text-slate-200 dark:hover:bg-slate-900">
                                    Toggle Tema
                                </button>
                                <div class="flex items-center gap-3 rounded-full border border-slate-200/80 bg-white/85 px-3 py-2 shadow-sm dark:border-slate-800 dark:bg-slate-900/85">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[linear-gradient(135deg,#0f766e,#155e75)] font-bold text-white shadow-[0_12px_24px_rgba(15,118,110,0.22)]">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </div>
                                    <div class="pr-1">
                                        <p class="text-sm font-semibold text-slate-900 dark:text-white">{{ Auth::user()->name }}</p>
                                        <p class="text-[11px] uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400">{{ auth()->user()->role }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <main class="px-4 pb-8 pt-5 sm:px-6 sm:pb-10 sm:pt-6 lg:px-8">
                    <div class="mx-auto max-w-[1400px]">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebarStorageKey = 'safefood.dashboard.sidebar_open';
            const sidebar = document.getElementById('dashboardSidebar');
            const overlay = document.getElementById('dashboardSidebarOverlay');
            const sidebarToggleButton = document.getElementById('dashboardSidebarToggle');
            const sidebarCloseMobileButton = document.getElementById('dashboardSidebarCloseMobile');
            const sidebarOpenIcon = document.getElementById('dashboardSidebarOpenIcon');
            const sidebarCloseIcon = document.getElementById('dashboardSidebarCloseIcon');
            const desktopQuery = window.matchMedia('(min-width: 1024px)');

            const syncSidebar = (isOpen) => {
                if (!sidebar) {
                    return;
                }

                const isDesktop = desktopQuery.matches;

                if (isOpen) {
                    sidebar.classList.remove('pointer-events-none', 'opacity-0', '-translate-x-full', 'lg:w-0', 'lg:border-r-0');
                    sidebar.classList.add('pointer-events-auto', 'opacity-100', 'translate-x-0', 'lg:w-80', 'lg:border-r');
                } else {
                    sidebar.classList.add('pointer-events-none', 'opacity-0', '-translate-x-full', 'lg:w-0', 'lg:border-r-0');
                    sidebar.classList.remove('pointer-events-auto', 'opacity-100', 'translate-x-0', 'lg:w-80', 'lg:border-r');
                }

                if (overlay) {
                    const showOverlay = !isDesktop && isOpen;
                    overlay.classList.toggle('opacity-100', showOverlay);
                    overlay.classList.toggle('pointer-events-auto', showOverlay);
                    overlay.classList.toggle('opacity-0', !showOverlay);
                    overlay.classList.toggle('pointer-events-none', !showOverlay);
                }

                sidebarOpenIcon?.classList.toggle('hidden', isOpen);
                sidebarCloseIcon?.classList.toggle('hidden', !isOpen);
                sidebarToggleButton?.classList.toggle('rotate-180', !isOpen);
                sidebarToggleButton?.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            };

            const storedSidebarState = localStorage.getItem(sidebarStorageKey);
            let isSidebarOpen = desktopQuery.matches
                ? (storedSidebarState === null ? true : storedSidebarState === '1')
                : false;
            syncSidebar(isSidebarOpen);

            sidebarToggleButton?.addEventListener('click', () => {
                isSidebarOpen = !isSidebarOpen;
                if (desktopQuery.matches) {
                    localStorage.setItem(sidebarStorageKey, isSidebarOpen ? '1' : '0');
                }
                syncSidebar(isSidebarOpen);
            });

            sidebarCloseMobileButton?.addEventListener('click', () => {
                isSidebarOpen = false;
                syncSidebar(isSidebarOpen);
            });

            overlay?.addEventListener('click', () => {
                isSidebarOpen = false;
                syncSidebar(isSidebarOpen);
            });

            sidebar?.querySelectorAll('a').forEach((link) => {
                link.addEventListener('click', () => {
                    if (!desktopQuery.matches) {
                        isSidebarOpen = false;
                        syncSidebar(isSidebarOpen);
                    }
                });
            });

            window.addEventListener('resize', () => {
                if (desktopQuery.matches) {
                    const desktopStoredState = localStorage.getItem(sidebarStorageKey);
                    isSidebarOpen = desktopStoredState === null ? true : desktopStoredState === '1';
                } else {
                    isSidebarOpen = false;
                }
                syncSidebar(isSidebarOpen);
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
