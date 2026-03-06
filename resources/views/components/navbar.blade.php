@props(['items' => []])

<header
    x-data="{
        open: false,
        dark: document.documentElement.classList.contains('dark'),
        toggleTheme() {
            this.dark = !this.dark;
            document.documentElement.classList.toggle('dark', this.dark);
            localStorage.setItem('theme', this.dark ? 'dark' : 'light');
        }
    }"
    class="sticky top-0 z-50"
>
    <div class="sf-container relative pt-4">
        <div class="sf-glass flex items-center justify-between gap-4 rounded-[1.75rem] px-4 py-3 shadow-[0_18px_50px_rgba(15,23,42,0.12)] md:px-6">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[linear-gradient(135deg,#0f766e,#f59e0b)] text-sm font-bold text-white shadow-lg shadow-teal-700/20">
                    SF
                </div>
                <div>
                    <p class="text-lg font-bold tracking-tight text-slate-900 dark:text-white">SafeFood</p>
                    <p class="text-[11px] uppercase tracking-[0.3em] text-slate-500 dark:text-slate-400">Startup Education</p>
                </div>
            </a>

            <div class="hidden items-center gap-3 md:flex">
                <button
                    type="button"
                    @click="open = !open"
                    class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:-translate-y-0.5 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200"
                    aria-label="Toggle navigation menu"
                >
                    <span>Navigation</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <button
                    type="button"
                    @click="toggleTheme()"
                    class="flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-700 transition hover:-translate-y-0.5 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200"
                    aria-label="Toggle dark mode"
                >
                    <svg x-show="!dark" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M21 12.79A9 9 0 1111.21 3c0 0 0 0 0 0A7 7 0 0021 12.79z" />
                    </svg>
                    <svg x-show="dark" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M12 3v2.25M12 18.75V21M4.72 4.72l1.59 1.59M17.69 17.69l1.59 1.59M3 12h2.25M18.75 12H21M4.72 19.28l1.59-1.59M17.69 6.31l1.59-1.59M15.75 12A3.75 3.75 0 1112 8.25 3.75 3.75 0 0115.75 12z" />
                    </svg>
                </button>

                @auth
                    <a href="{{ route('dashboard') }}" class="sf-button-secondary">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="sf-button-primary px-5 py-2.5">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="sf-button-secondary">Login</a>
                    <a href="{{ route('register') }}" class="sf-button-primary">Get Started</a>
                @endauth
            </div>

            <div class="flex items-center gap-2 md:hidden">
                <button
                    type="button"
                    @click="toggleTheme()"
                    class="flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-700 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200"
                    aria-label="Toggle dark mode"
                >
                    <svg x-show="!dark" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M21 12.79A9 9 0 1111.21 3c0 0 0 0 0 0A7 7 0 0021 12.79z" />
                    </svg>
                    <svg x-show="dark" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M12 3v2.25M12 18.75V21M4.72 4.72l1.59 1.59M17.69 17.69l1.59 1.59M3 12h2.25M18.75 12H21M4.72 19.28l1.59-1.59M17.69 6.31l1.59-1.59M15.75 12A3.75 3.75 0 1112 8.25 3.75 3.75 0 0115.75 12z" />
                    </svg>
                </button>

                <button
                    type="button"
                    @click="open = !open"
                    class="flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-700 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200"
                    aria-label="Toggle mobile navigation"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M4 7h16M4 12h16M4 17h16" />
                        <path x-show="open" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M6 6l12 12M18 6L6 18" />
                    </svg>
                </button>
            </div>
        </div>

        <div
            x-show="open"
            x-transition.origin.top.duration.250ms
            x-cloak
            @click.outside="open = false"
            class="absolute inset-x-4 top-[calc(100%+0.85rem)] sm:inset-x-6 lg:left-auto lg:right-8 lg:w-[26rem]"
        >
            <div class="sf-glass rounded-[1.5rem] border border-slate-200/80 px-4 py-4 shadow-[0_22px_60px_rgba(15,23,42,0.18)] dark:border-slate-700/70">
                <div class="mb-3 px-3 pt-1">
                    <p class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 dark:text-slate-500">Navigation</p>
                </div>

                <nav class="grid gap-2 text-sm font-medium text-slate-700 dark:text-slate-300 md:grid-cols-2">
                    @foreach ($items as $item)
                        <a href="{{ route($item['route']) }}" class="rounded-2xl px-4 py-3 transition hover:bg-slate-100 dark:hover:bg-slate-800">
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </nav>

                <div class="mt-4 grid gap-2 border-t border-slate-200 pt-4 dark:border-slate-800 md:hidden">
                    @auth
                        <a href="{{ route('dashboard') }}" class="sf-button-secondary justify-center">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="sf-button-primary w-full justify-center">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="sf-button-secondary justify-center">Login</a>
                        <a href="{{ route('register') }}" class="sf-button-primary justify-center">Get Started</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</header>
