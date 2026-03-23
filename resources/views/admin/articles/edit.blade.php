@extends('layouts.dashboard')

@section('content')
    <section class="mx-auto max-w-3xl">
        <div class="rounded-[2rem] border border-slate-200/80 bg-white/80 p-8 shadow-[0_24px_70px_rgba(15,23,42,0.08)] backdrop-blur dark:border-slate-700/80 dark:bg-slate-900/75 sm:p-10">
            <p class="text-sm uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Article Studio</p>
            <h2 class="mt-2 text-4xl font-bold text-slate-900 dark:text-white">Ubah artikel SafeFood</h2>
            <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-slate-300">
                Perbarui isi artikel, ganti ilustrasi bila diperlukan, dan pertahankan kualitas tampilan konten untuk dashboard admin.
            </p>

            <form method="POST" action="{{ route('admin.articles.update', $article) }}" enctype="multipart/form-data" class="mt-8 space-y-6">
                @csrf
                @method('PUT')
                @include('admin.articles.partials.form', ['article' => $article])
            </form>
        </div>
    </section>
@endsection
