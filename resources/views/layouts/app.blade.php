<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('head')
</head>
<body class="sf-shell bg-[var(--sf-bg)] text-[var(--sf-ink)] transition-colors duration-300">
    @php
        $navItems = [
            ['label' => 'Home', 'route' => 'home'],
            ['label' => 'Food Education', 'route' => 'education'],
            ['label' => 'HACCP', 'route' => 'haccp'],
            ['label' => 'Safety Checker', 'route' => 'safety-checker'],
            ['label' => 'Nutrition Comparison', 'route' => 'foods.compare'],
            ['label' => 'Quiz', 'route' => 'quiz'],
            ['label' => 'Articles', 'route' => 'articles.index'],
            ['label' => 'About', 'route' => 'about'],
            ['label' => 'Contact', 'route' => 'contact'],
        ];
    @endphp

    <div class="relative overflow-x-clip">
        <div class="pointer-events-none absolute inset-x-0 top-0 -z-10 h-[42rem] bg-[radial-gradient(circle_at_top,_rgba(14,165,164,0.22),_transparent_42%),radial-gradient(circle_at_85%_8%,_rgba(245,158,11,0.18),_transparent_24%),linear-gradient(180deg,rgba(255,255,255,0.3),transparent)] dark:bg-[radial-gradient(circle_at_top,_rgba(45,212,191,0.18),_transparent_36%),radial-gradient(circle_at_85%_8%,_rgba(251,191,36,0.15),_transparent_22%),linear-gradient(180deg,rgba(15,23,42,0.45),transparent)]"></div>
        <div class="pointer-events-none absolute left-1/2 top-28 -z-10 h-[34rem] w-[70rem] -translate-x-1/2 rounded-full bg-teal-500/10 blur-3xl dark:bg-cyan-400/10"></div>

        <x-navbar :items="$navItems" />

        <main class="pb-16 pt-6">
            @yield('content')
        </main>

        <footer class="border-t border-slate-200/70 bg-white/60 py-10 backdrop-blur dark:border-slate-800 dark:bg-slate-950/55">
            <div class="sf-container flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
                <div class="max-w-xl">
                    <p class="text-xl font-bold text-slate-900 dark:text-white">SafeFood</p>
                    <p class="mt-2 text-sm leading-6 text-slate-600 dark:text-slate-300">
                        A competition-ready educational platform for food safety, HACCP literacy, healthy handling habits, and practical nutrition awareness.
                    </p>
                </div>
                <div class="text-sm text-slate-500 dark:text-slate-400">
                    <p>&copy; {{ date('Y') }} SafeFood.</p>
                    <p>Built for modern food safety education.</p>
                </div>
            </div>
        </footer>
    </div>

    @stack('scripts')
</body>
</html>
