<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SafeFood') }}</title>
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
</head>
<body class="min-h-screen bg-[var(--sf-bg)] text-[var(--sf-ink)] antialiased transition-colors duration-300">
    <div class="relative min-h-screen overflow-hidden">
        <div class="pointer-events-none absolute inset-x-0 top-0 -z-10 h-[38rem] bg-[radial-gradient(circle_at_top,_rgba(14,165,164,0.2),_transparent_42%),radial-gradient(circle_at_80%_10%,_rgba(245,158,11,0.16),_transparent_24%)]"></div>
        <div class="pointer-events-none absolute -left-16 top-32 -z-10 h-64 w-64 rounded-full bg-teal-400/15 blur-3xl dark:bg-cyan-500/10"></div>
        <div class="pointer-events-none absolute bottom-0 right-0 -z-10 h-72 w-72 rounded-full bg-amber-400/15 blur-3xl dark:bg-amber-400/10"></div>

        <div class="mx-auto flex min-h-screen max-w-7xl flex-col lg:flex-row">
            <aside class="hidden w-full p-6 lg:flex lg:w-[46%] lg:p-8">
                <div class="relative flex w-full flex-col justify-between overflow-hidden rounded-[2.5rem] bg-[linear-gradient(145deg,#082f49,#0f766e_55%,#f59e0b_150%)] p-10 text-white shadow-[0_25px_80px_rgba(8,47,73,0.35)]">
                    <div class="absolute -right-10 top-0 h-48 w-48 rounded-full bg-white/10 blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 h-56 w-56 rounded-full bg-cyan-300/10 blur-3xl"></div>

                    <div class="relative">
                        <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/10 text-sm font-bold tracking-[0.2em] text-white">SF</div>
                            <div>
                                <p class="text-xl font-bold">SafeFood</p>
                                <p class="text-xs uppercase tracking-[0.34em] text-cyan-100/80">Secure Access</p>
                            </div>
                        </a>

                        <div class="mt-16 space-y-6">
                            <span class="inline-flex rounded-full bg-white/10 px-4 py-1 text-sm font-medium text-cyan-50">Company-style access experience</span>
                            <h1 class="max-w-xl text-5xl font-bold leading-[1.02]">
                                Professional authentication screens for a competition-ready platform.
                            </h1>
                            <p class="max-w-lg text-base leading-8 text-slate-100">
                                SafeFood access pages now present a consistent brand surface with better structure, stronger hierarchy, and a polished product feel.
                            </p>
                        </div>
                    </div>

                    <div class="relative grid gap-4 sm:grid-cols-3">
                        <div class="rounded-[1.75rem] bg-white/10 px-5 py-5 backdrop-blur">
                            <p class="text-3xl font-bold">01</p>
                            <p class="mt-2 text-sm text-slate-100/80">Unified visual standard</p>
                        </div>
                        <div class="rounded-[1.75rem] bg-white/10 px-5 py-5 backdrop-blur">
                            <p class="text-3xl font-bold">02</p>
                            <p class="mt-2 text-sm text-slate-100/80">Clearer secure access flow</p>
                        </div>
                        <div class="rounded-[1.75rem] bg-white/10 px-5 py-5 backdrop-blur">
                            <p class="text-3xl font-bold">03</p>
                            <p class="mt-2 text-sm text-slate-100/80">Presentation-ready for judges</p>
                        </div>
                    </div>
                </div>
            </aside>

            <main class="flex flex-1 items-center justify-center px-4 py-8 sm:px-6 lg:px-10">
                <div class="w-full max-w-lg">
                    <div class="mb-6 flex items-center justify-between">
                        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-600 dark:text-slate-300">
                            <span aria-hidden="true">&larr;</span>
                            <span>Back to homepage</span>
                        </a>
                        <button
                            type="button"
                            onclick="document.documentElement.classList.toggle('dark'); localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light')"
                            class="rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 transition hover:-translate-y-0.5 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200"
                        >
                            ❤️ 
                        </button>
                    </div>

                    <div class="sf-panel overflow-hidden p-8 shadow-[0_25px_70px_rgba(15,23,42,0.12)] dark:bg-slate-950/85 md:p-10">
                        <div class="mb-8">
                            <p class="text-xs font-semibold uppercase tracking-[0.34em] text-slate-400 dark:text-slate-500">{{ $eyebrow ?? 'SafeFood Access' }}</p>
                            <h2 class="mt-4 text-4xl font-bold text-slate-950 dark:text-white">{{ $heading ?? 'Welcome back' }}</h2>
                            <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ $subheading ?? 'Use your account to continue learning with SafeFood.' }}</p>
                        </div>

                        {{ $slot }}

                        @isset($footer)
                            <div class="mt-8 border-t border-slate-200 pt-6 text-sm text-slate-600 dark:border-slate-800 dark:text-slate-300">
                                {{ $footer }}
                            </div>
                        @endisset
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
