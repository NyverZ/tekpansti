@extends('layouts.dashboard')

@section('content')
    <section class="mx-auto max-w-4xl">
        <div class="sf-panel p-8">
            <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Perbarui</p>
            <h2 class="mt-2 text-4xl font-bold text-slate-900">Ubah bahan pangan</h2>

            <form method="POST" action="{{ route('admin.ingredients.update', $plant) }}" enctype="multipart/form-data" class="mt-8 space-y-6">
                @csrf
                @method('PUT')
                @include('admin.plants.partials.form', ['plant' => $plant])
            </form>
        </div>
    </section>
@endsection
