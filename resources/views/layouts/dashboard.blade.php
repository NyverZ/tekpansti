<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'SafeFood') }} Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="min-h-screen bg-[#efe7d8] text-slate-900">
    <div class="flex min-h-screen flex-col lg:flex-row">
        <aside class="w-full border-b border-slate-200/80 bg-white/70 backdrop-blur-xl lg:w-72 lg:border-b-0 lg:border-r">
            <div class="flex items-center justify-between px-6 py-6 lg:block">
                <a href="{{ route('home') }}" class="block">
                    <p class="text-2xl font-bold text-teal-700">SafeFood</p>
                    <p class="text-xs uppercase tracking-[0.24em] text-slate-500">Admin Console</p>
                </a>
                <a href="{{ route('home') }}" class="text-sm font-semibold text-slate-600 lg:hidden">Back to site</a>
            </div>

            <nav class="grid gap-2 px-4 pb-6">
                <a href="{{ route('dashboard') }}" class="rounded-2xl px-4 py-3 {{ request()->routeIs('dashboard') ? 'bg-teal-700 text-white' : 'bg-white/80 text-slate-700 hover:bg-white' }}">Dashboard</a>
                <a href="{{ route('foods.index') }}" class="rounded-2xl px-4 py-3 {{ request()->routeIs('foods.*') ? 'bg-teal-700 text-white' : 'bg-white/80 text-slate-700 hover:bg-white' }}">Food Catalog</a>
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.ingredients.index') }}" class="rounded-2xl px-4 py-3 {{ request()->routeIs('admin.ingredients.*') ? 'bg-teal-700 text-white' : 'bg-white/80 text-slate-700 hover:bg-white' }}">Manage Ingredients</a>
                    <a href="{{ route('admin.articles.index') }}" class="rounded-2xl px-4 py-3 {{ request()->routeIs('admin.articles.*') ? 'bg-teal-700 text-white' : 'bg-white/80 text-slate-700 hover:bg-white' }}">Manage Articles</a>
                @endif
                <a href="{{ route('profile.edit') }}" class="rounded-2xl px-4 py-3 {{ request()->routeIs('profile.*') ? 'bg-teal-700 text-white' : 'bg-white/80 text-slate-700 hover:bg-white' }}">Profile Settings</a>
            </nav>

            <div class="border-t border-slate-200 px-4 py-6">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full rounded-2xl bg-[#7f1d1d] px-4 py-3 text-left text-sm font-semibold text-white">Logout</button>
                </form>
            </div>
        </aside>

        <div class="flex-1">
            <header class="border-b border-slate-200/80 bg-white/60 px-6 py-5 backdrop-blur-xl sm:px-8">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm uppercase tracking-[0.28em] text-slate-500">Operations</p>
                        <h1 class="text-2xl font-bold">SafeFood Dashboard</h1>
                    </div>
                    <div class="flex items-center gap-3 rounded-full bg-white px-4 py-2 shadow-sm">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-teal-700 font-bold text-white">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-sm font-semibold">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-slate-500">{{ auth()->user()->role }}</p>
                        </div>
                    </div>
                </div>
            </header>

            <main class="p-6 sm:p-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
