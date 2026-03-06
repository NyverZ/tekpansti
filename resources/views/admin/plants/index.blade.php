@extends('layouts.dashboard')

@section('content')
    <section class="space-y-6">
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Ingredients</p>
                <h2 class="mt-2 text-4xl font-bold text-slate-900">Manage SafeFood ingredients</h2>
            </div>
            <a href="{{ route('admin.ingredients.create') }}" class="sf-button-primary">Add Ingredient</a>
        </div>

        @if (session('success'))
            <div class="rounded-2xl bg-emerald-100 px-5 py-4 text-sm font-medium text-emerald-700">{{ session('success') }}</div>
        @endif

        <div class="sf-panel overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full text-left text-sm">
                    <thead class="bg-slate-50 text-slate-500">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Ingredient</th>
                            <th class="px-6 py-4 font-semibold">Category</th>
                            <th class="px-6 py-4 font-semibold">Slug</th>
                            <th class="px-6 py-4 font-semibold">Status</th>
                            <th class="px-6 py-4 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach ($plants as $plant)
                            <tr>
                                <td class="px-6 py-4 font-medium text-slate-900">{{ $plant->local_name }}</td>
                                <td class="px-6 py-4 text-slate-500">{{ $plant->category?->name ?? '-' }}</td>
                                <td class="px-6 py-4 text-slate-500">{{ $plant->slug }}</td>
                                <td class="px-6 py-4">
                                    <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $plant->is_published ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                                        {{ $plant->is_published ? 'Published' : 'Draft' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-end gap-3">
                                        <a href="{{ route('admin.ingredients.edit', $plant) }}" class="rounded-full bg-slate-900 px-4 py-2 text-xs font-semibold text-white">Edit</a>
                                        <form method="POST" action="{{ route('admin.ingredients.destroy', $plant) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="rounded-full bg-red-600 px-4 py-2 text-xs font-semibold text-white" onclick="return confirm('Delete this ingredient?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            {{ $plants->links() }}
        </div>
    </section>
@endsection
