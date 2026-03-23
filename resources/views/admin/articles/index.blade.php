@extends('layouts.dashboard')

@section('content')
    <section class="space-y-6">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">CMS Artikel</p>
                <h2 class="mt-2 text-4xl font-bold text-slate-900 dark:text-white">Kelola artikel edukasi</h2>
                <p class="mt-3 max-w-3xl text-sm leading-7 text-slate-600 dark:text-slate-300">
                    Panel artikel admin kini lebih terasa seperti CMS modern: mudah mencari konten, menyortir daftar, dan mengelola ilustrasi artikel dari satu dashboard visual.
                </p>
            </div>
            <a href="{{ route('admin.articles.create') }}" class="inline-flex items-center justify-center rounded-xl bg-emerald-600 px-6 py-3 font-semibold text-white shadow-md transition duration-300 hover:-translate-y-0.5 hover:bg-emerald-700 hover:shadow-lg">
                Buat Artikel
            </a>
        </div>

        <div class="rounded-[2rem] border border-slate-200/80 bg-white/80 p-6 shadow-[0_18px_45px_rgba(15,23,42,0.06)] backdrop-blur dark:border-slate-700/80 dark:bg-slate-900/75">
            <form method="GET" action="{{ route('admin.articles.index') }}" class="grid gap-4 lg:grid-cols-[1fr_220px_auto_auto]">
                <div>
                    <label for="search" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Cari Artikel</label>
                    <input id="search" type="text" name="search" value="{{ $search }}" placeholder="Cari berdasarkan judul atau isi..." class="w-full rounded-xl border border-slate-200 bg-white/90 px-4 py-3 text-sm text-slate-800 shadow-sm outline-none transition duration-300 placeholder:text-slate-400 focus:border-emerald-400 focus:ring-4 focus:ring-emerald-100 dark:border-slate-700 dark:bg-slate-900/90 dark:text-slate-100 dark:placeholder:text-slate-500 dark:focus:border-emerald-500 dark:focus:ring-emerald-500/20">
                </div>

                <div>
                    <label for="sort" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Sort By</label>
                    <select id="sort" name="sort" class="w-full rounded-xl border border-slate-200 bg-white/90 px-4 py-3 text-sm text-slate-800 shadow-sm outline-none transition duration-300 focus:border-emerald-400 focus:ring-4 focus:ring-emerald-100 dark:border-slate-700 dark:bg-slate-900/90 dark:text-slate-100 dark:focus:border-emerald-500 dark:focus:ring-emerald-500/20">
                        <option value="latest" @selected($sort === 'latest')>Latest</option>
                        <option value="oldest" @selected($sort === 'oldest')>Oldest</option>
                        <option value="title" @selected($sort === 'title')>Title A-Z</option>
                    </select>
                </div>

                <div class="flex items-end">
                    <button class="inline-flex w-full items-center justify-center rounded-xl bg-emerald-600 px-5 py-3 font-semibold text-white shadow-md transition duration-300 hover:-translate-y-0.5 hover:bg-emerald-700 hover:shadow-lg">
                        Terapkan
                    </button>
                </div>

                <div class="flex items-end">
                    <a href="{{ route('admin.articles.index') }}" class="inline-flex w-full items-center justify-center rounded-xl border border-slate-200 bg-white/90 px-5 py-3 font-semibold text-slate-700 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:bg-white hover:shadow-md dark:border-slate-700 dark:bg-slate-900/80 dark:text-slate-200 dark:hover:bg-slate-900">
                        Reset
                    </a>
                </div>
            </form>

            <div class="mt-4 flex flex-wrap items-center gap-3 text-sm text-slate-500 dark:text-slate-400">
                <span>{{ $articles->total() }} artikel ditemukan</span>
                @if ($search !== '')
                    <span class="rounded-full bg-emerald-50 px-3 py-1 font-semibold text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-300">
                        Kata kunci: "{{ $search }}"
                    </span>
                @endif
            </div>
        </div>

        @if (session('success'))
            <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-medium text-emerald-700 shadow-sm dark:border-emerald-500/20 dark:bg-emerald-500/10 dark:text-emerald-300">
                {{ session('success') }}
            </div>
        @endif

        @if ($articles->count() > 0)
            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($articles as $article)
                    @include('admin.articles.partials.article-card', ['article' => $article])
                @endforeach
            </div>
        @else
            <div class="rounded-[2rem] border border-dashed border-slate-300 bg-white/70 px-6 py-16 text-center shadow-sm backdrop-blur dark:border-slate-700 dark:bg-slate-900/70">
                <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-emerald-100 text-emerald-600 dark:bg-emerald-900/40 dark:text-emerald-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V5.75A1.75 1.75 0 0 1 9.75 4h7.5A1.75 1.75 0 0 1 19 5.75v12.5A1.75 1.75 0 0 1 17.25 20h-10.5A1.75 1.75 0 0 1 5 18.25V8.75A1.75 1.75 0 0 1 6.75 7H8Zm0 0h6m-6 4h8m-8 4h8" />
                    </svg>
                </div>
                <h3 class="mt-6 text-2xl font-bold text-slate-900 dark:text-white">Belum ada artikel edukasi.</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">Klik tombol tambah untuk mulai.</p>
            </div>
        @endif

        @if ($articles->hasPages())
            <nav class="flex flex-wrap items-center justify-center gap-2 pt-2">
                @if ($articles->onFirstPage())
                    <span class="rounded-xl border border-slate-200 bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-400 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-500">Prev</span>
                @else
                    <a href="{{ $articles->previousPageUrl() }}" class="rounded-xl border border-slate-200 bg-white/90 px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md dark:border-slate-700 dark:bg-slate-900/80 dark:text-slate-200">Prev</a>
                @endif

                @foreach ($articles->getUrlRange(max(1, $articles->currentPage() - 2), min($articles->lastPage(), $articles->currentPage() + 2)) as $page => $url)
                    @if ($page == $articles->currentPage())
                        <span class="rounded-xl bg-emerald-600 px-4 py-2 text-sm font-semibold text-white shadow-md">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="rounded-xl border border-slate-200 bg-white/90 px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md dark:border-slate-700 dark:bg-slate-900/80 dark:text-slate-200">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($articles->hasMorePages())
                    <a href="{{ $articles->nextPageUrl() }}" class="rounded-xl border border-slate-200 bg-white/90 px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md dark:border-slate-700 dark:bg-slate-900/80 dark:text-slate-200">Next</a>
                @else
                    <span class="rounded-xl border border-slate-200 bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-400 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-500">Next</span>
                @endif
            </nav>
        @endif
    </section>
@endsection
