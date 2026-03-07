@extends('layouts.app')

@section('content')
    <section class="sf-container">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <span class="sf-chip">Katalog Bahan Pangan</span>
                <h1 class="mt-4 text-5xl font-bold text-slate-900">Jelajahi bahan pangan dengan konteks keamanan dan nutrisi</h1>
                <p class="mt-4 max-w-3xl text-lg leading-8 text-slate-600">
                    Direfaktor dari katalog tanaman lama menjadi direktori bahan pangan SafeFood yang berfokus pada data nutrisi, penanganan makanan, dan nilai edukasi praktis.
                </p>
            </div>
        </div>

        <div class="sf-panel mt-10 p-6">
            <form method="GET" action="{{ route('foods.index') }}" class="grid gap-4 lg:grid-cols-[1.3fr_0.7fr_auto]">
                <div>
                    <label for="search" class="mb-2 block text-sm font-semibold text-slate-700">Cari bahan pangan</label>
                    <input id="search" type="text" name="search" value="{{ request('search') }}" placeholder="Ayam, tempe, bayam, nasi..." class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 focus:border-teal-600 focus:outline-none">
                </div>
                <div>
                    <label for="category" class="mb-2 block text-sm font-semibold text-slate-700">Kategori</label>
                    <select id="category" name="category" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 focus:border-teal-600 focus:outline-none">
                        <option value="">Semua kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->slug }}" @selected(request('category') === $category->slug)>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-end gap-3">
                    <button class="sf-button-primary">Terapkan</button>
                    <a href="{{ route('foods.index') }}" class="sf-button-secondary">Atur Ulang</a>
                </div>
            </form>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @forelse ($foods as $food)
                <article class="sf-panel overflow-hidden">
                    @if ($food->image_path)
                        <img src="{{ asset('storage/' . $food->image_path) }}" alt="{{ $food->local_name }}" class="h-48 w-full object-cover" loading="lazy">
                    @else
                        <div class="h-48 bg-[linear-gradient(135deg,#f59e0b,#0f766e)]"></div>
                    @endif
                    <div class="p-8">
                        <p class="text-sm uppercase tracking-[0.24em] text-slate-500">{{ $food->category?->name ?? 'Bahan Pangan' }}</p>
                        <h2 class="mt-3 text-2xl font-bold text-slate-900">{{ $food->local_name }}</h2>
                        <p class="mt-2 text-sm italic text-slate-500">{{ $food->scientific_name }}</p>
                        <p class="mt-4 text-sm leading-7 text-slate-600">{{ \Illuminate\Support\Str::limit($food->description, 120) }}</p>
                        <div class="mt-5 rounded-[1.25rem] bg-slate-50 px-4 py-4">
                            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Tips Keamanan Pangan</p>
                            <p class="mt-2 text-sm leading-7 text-slate-600">{{ \Illuminate\Support\Str::limit($food->processing_potential ?: 'Pastikan bahan pangan disimpan, dicuci, dan dimasak dengan benar sebelum disajikan.', 120) }}</p>
                        </div>
                        <div class="mt-6 flex items-center justify-between text-sm text-slate-500">
                            <span>{{ $food->nutrients_count }} indikator nutrisi</span>
                            <a href="{{ route('foods.show', $food) }}" class="font-semibold text-teal-700">Lihat Detail</a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="sf-panel col-span-full p-10 text-center">
                    <h2 class="text-2xl font-bold text-slate-900">Tidak ada bahan pangan yang sesuai dengan filter Anda.</h2>
                    <p class="mt-3 text-sm text-slate-600">Coba kata kunci atau kategori lain untuk melanjutkan penjelajahan data SafeFood.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $foods->links() }}
        </div>
    </section>
@endsection
