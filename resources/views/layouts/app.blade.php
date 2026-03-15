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
            ['label' => 'Beranda', 'route' => 'home'],
            ['label' => 'Edukasi', 'route' => 'education'],
            ['label' => 'Bahan Pangan', 'route' => 'foods.index'],
            ['label' => 'Cek Keamanan Makanan', 'route' => 'safety-checker'],
            ['label' => 'Perbandingan Nutrisi', 'route' => 'foods.compare'],
            ['label' => 'Kuis', 'route' => 'quiz'],
            ['label' => 'Artikel', 'route' => 'articles.index'],
            ['label' => 'Konsultasi', 'route' => 'consultation'],
            ['label' => 'Tentang Kami', 'route' => 'about'],
            ['label' => 'Kontak', 'route' => 'contact'],
        ];
    @endphp

    <div class="relative overflow-x-clip">
        <div class="pointer-events-none absolute inset-x-0 top-0 -z-10 h-[42rem] bg-[radial-gradient(circle_at_top,_rgba(14,165,164,0.22),_transparent_42%),radial-gradient(circle_at_85%_8%,_rgba(245,158,11,0.18),_transparent_24%),linear-gradient(180deg,rgba(255,255,255,0.3),transparent)] dark:bg-[radial-gradient(circle_at_top,_rgba(45,212,191,0.18),_transparent_36%),radial-gradient(circle_at_85%_8%,_rgba(251,191,36,0.15),_transparent_22%),linear-gradient(180deg,rgba(15,23,42,0.45),transparent)]"></div>
        <div class="pointer-events-none absolute left-1/2 top-28 -z-10 h-[34rem] w-[70rem] -translate-x-1/2 rounded-full bg-teal-500/10 blur-3xl dark:bg-cyan-400/10"></div>

        <x-navbar :items="$navItems" />

        <main class="pb-16 pt-6">
            @yield('content')
        </main>

        <footer class="border-t border-slate-200/70 bg-white/60 py-10 backdrop-blur transition-colors duration-300 dark:border-slate-800 dark:bg-slate-950/55">
            <div class="sf-container flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
                <div class="max-w-xl">
                    <p class="text-xl font-bold text-slate-900 dark:text-white">SafeFood</p>
                    <p class="mt-2 text-sm leading-6 text-slate-600 dark:text-slate-300">
                        Platform edukasi yang siap untuk kompetisi teknologi, dengan fokus pada keamanan pangan, literasi HACCP, praktik penanganan yang higienis, dan pemahaman nutrisi yang praktis.
                    </p>
                </div>
                <div class="text-sm text-slate-500 dark:text-slate-400">
                    <p>&copy; {{ date('Y') }} SafeFood.</p>
                    <p>Dibangun untuk edukasi keamanan pangan modern.</p>
                </div>
            </div>
        </footer>
    </div>

    @stack('scripts')
</body>
</html>
