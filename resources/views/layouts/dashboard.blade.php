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
<body class="min-h-screen bg-[#efe7d8] text-slate-900 dark:bg-slate-950 dark:text-white">
    <div class="relative flex min-h-screen">
        <aside id="dashboardSidebar" class="fixed inset-y-0 left-0 z-50 flex h-full w-72 max-w-[88vw] -translate-x-full flex-col overflow-y-auto border-r border-slate-200/80 bg-white/80 opacity-0 backdrop-blur-xl transition-[transform,opacity,width,border-color] duration-500 ease-[cubic-bezier(0.22,1,0.36,1)] dark:border-slate-800 dark:bg-slate-900/85 lg:static lg:z-auto lg:max-w-none lg:translate-x-0 lg:opacity-100 lg:w-72">
            <div class="flex items-center px-6 py-6 lg:block">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <x-application-logo class="h-11 w-11 shrink-0 drop-shadow-[0_10px_20px_rgba(15,118,110,0.18)]" />
                    <span>
                        <p class="text-2xl font-bold text-teal-700">SafeFood</p>
                        <p class="text-xs uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Konsol</p>
                    </span>
                </a>
            </div>

            <nav class="grid flex-1 gap-2 px-4 pb-6">
                <a href="{{ route('dashboard') }}" class="rounded-2xl px-4 py-3 {{ request()->routeIs('dashboard') ? 'bg-teal-700 text-white' : 'bg-white/80 text-slate-700 hover:bg-white dark:bg-slate-800/90 dark:text-slate-200 dark:hover:bg-slate-800' }}">Dasbor</a>
                <a href="{{ route('foods.index') }}" class="rounded-2xl px-4 py-3 {{ request()->routeIs('foods.*') ? 'bg-teal-700 text-white' : 'bg-white/80 text-slate-700 hover:bg-white dark:bg-slate-800/90 dark:text-slate-200 dark:hover:bg-slate-800' }}">Katalog Pangan</a>
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.ingredients.index') }}" class="rounded-2xl px-4 py-3 {{ request()->routeIs('admin.ingredients.*') ? 'bg-teal-700 text-white' : 'bg-white/80 text-slate-700 hover:bg-white dark:bg-slate-800/90 dark:text-slate-200 dark:hover:bg-slate-800' }}">Kelola Bahan Pangan</a>
                    <a href="{{ route('admin.articles.index') }}" class="rounded-2xl px-4 py-3 {{ request()->routeIs('admin.articles.*') ? 'bg-teal-700 text-white' : 'bg-white/80 text-slate-700 hover:bg-white dark:bg-slate-800/90 dark:text-slate-200 dark:hover:bg-slate-800' }}">Kelola Artikel</a>
                    <a href="{{ route('admin.users.index') }}" class="rounded-2xl px-4 py-3 {{ request()->routeIs('admin.users.*') ? 'bg-teal-700 text-white' : 'bg-white/80 text-slate-700 hover:bg-white dark:bg-slate-800/90 dark:text-slate-200 dark:hover:bg-slate-800' }}">Kelola Pengguna</a>
                @endif
                <a href="{{ route('profile.edit') }}" class="rounded-2xl px-4 py-3 {{ request()->routeIs('profile.*') ? 'bg-teal-700 text-white' : 'bg-white/80 text-slate-700 hover:bg-white dark:bg-slate-800/90 dark:text-slate-200 dark:hover:bg-slate-800' }}">Pengaturan Profil</a>
            </nav>

            <div class="border-t border-slate-200 px-4 py-6 dark:border-slate-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full rounded-2xl bg-[#7f1d1d] px-4 py-3 text-left text-sm font-semibold text-white">Keluar</button>
                </form>
            </div>
        </aside>
        <div id="dashboardSidebarOverlay" class="fixed inset-0 z-40 bg-slate-950/45 opacity-0 pointer-events-none transition-opacity duration-300 lg:hidden"></div>

        <div id="dashboardMain" class="min-w-0 flex-1 transition-all duration-500 ease-[cubic-bezier(0.22,1,0.36,1)]">
            <header class="border-b border-slate-200/80 bg-white/60 px-6 py-5 backdrop-blur-xl dark:border-slate-800 dark:bg-slate-900/70 sm:px-8">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex items-center gap-3">
                        <button
                            id="dashboardSidebarToggle"
                            type="button"
                            class="sf-nav-toggle h-10 w-10 p-0 transition-transform duration-300 ease-out hover:scale-105"
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
                            <p class="text-sm uppercase tracking-[0.28em] text-slate-500 dark:text-slate-400">Operasional</p>
                            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Dasbor SafeFood</h1>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <x-notification-bell />
                        <div class="flex items-center gap-3 rounded-full bg-white px-4 py-2 shadow-sm dark:bg-slate-800">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-teal-700 font-bold text-white">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-slate-900 dark:text-white">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400">{{ auth()->user()->role }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="p-6 sm:p-8">
                @yield('content')
            </main>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebarStorageKey = 'safefood.dashboard.sidebar_open';
            const sidebar = document.getElementById('dashboardSidebar');
            const overlay = document.getElementById('dashboardSidebarOverlay');
            const sidebarToggleButton = document.getElementById('dashboardSidebarToggle');
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
                    sidebar.classList.add('pointer-events-auto', 'opacity-100', 'translate-x-0', 'lg:w-72', 'lg:border-r');
                } else {
                    sidebar.classList.add('pointer-events-none', 'opacity-0', '-translate-x-full', 'lg:w-0', 'lg:border-r-0');
                    sidebar.classList.remove('pointer-events-auto', 'opacity-100', 'translate-x-0', 'lg:w-72', 'lg:border-r');
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
