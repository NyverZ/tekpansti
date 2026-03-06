@extends('layouts.dashboard')

@section('content')
    <section class="mx-auto max-w-4xl">
        <div class="sf-panel p-8">
            <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Create</p>
            <h2 class="mt-2 text-4xl font-bold text-slate-900">Add a food ingredient</h2>

            <form method="POST" action="{{ route('admin.ingredients.store') }}" enctype="multipart/form-data" class="mt-8 space-y-6">
                @csrf
                @include('admin.plants.partials.form', ['plant' => null])
            </form>
        </div>
    </section>
@endsection
