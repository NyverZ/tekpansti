@extends('layouts.dashboard')

@section('content')
    <section class="space-y-6">
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Artikel Admin</p>
                <h2 class="mt-2 text-4xl font-bold text-slate-900">Kelola artikel edukasi</h2>
            </div>
            <a href="{{ route('admin.articles.create') }}" class="sf-button-primary">Buat Artikel</a>
        </div>

        <div class="sf-panel p-6">
            <form method="GET" action="{{ route('admin.articles.index') }}" class="flex flex-col gap-4 md:flex-row">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul atau isi..." class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 md:max-w-md">
                <button class="sf-button-secondary">Cari</button>
            </form>
        </div>

        @if (session('success'))
            <div class="rounded-2xl bg-emerald-100 px-5 py-4 text-sm font-medium text-emerald-700">{{ session('success') }}</div>
        @endif

        <div class="sf-panel overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full text-left text-sm">
                    <thead class="bg-slate-50 text-slate-500">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Judul</th>
                            <th class="px-6 py-4 font-semibold">Slug</th>
                            <th class="px-6 py-4 font-semibold">Status</th>
                            <th class="px-6 py-4 font-semibold">Dipublikasikan</th>
                            <th class="px-6 py-4 font-semibold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($articles as $article)
                            <tr>
                                <td class="px-6 py-4 font-medium text-slate-900">{{ $article->title }}</td>
                                <td class="px-6 py-4 text-slate-500">{{ $article->slug }}</td>
                                <td class="px-6 py-4">
                                    <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $article->is_published ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                                        {{ $article->is_published ? 'Dipublikasikan' : 'Draft' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-slate-500">{{ $article->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-end gap-3">
                                        <a href="{{ route('admin.articles.edit', $article) }}" class="rounded-full bg-slate-900 px-4 py-2 text-xs font-semibold text-white">Ubah</a>
                                        <form method="POST" action="{{ route('admin.articles.destroy', $article) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="rounded-full bg-red-600 px-4 py-2 text-xs font-semibold text-white" onclick="return confirm('Hapus artikel ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-slate-500">Tidak ada artikel ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            {{ $articles->links() }}
        </div>
    </section>
@endsection
