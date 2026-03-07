@extends('layouts.dashboard')

@section('content')
    <section class="space-y-6">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Admin Pengguna</p>
                <h2 class="mt-2 text-4xl font-bold text-slate-900">Kelola pengguna SafeFood</h2>
                <p class="mt-3 max-w-2xl text-sm leading-7 text-slate-600">
                    Pantau akun yang sudah terdaftar, cari pengguna dengan cepat, dan kelola akses dari satu tabel admin yang ringkas.
                </p>
            </div>
            <div class="rounded-[1.5rem] bg-slate-900 px-5 py-4 text-white shadow-lg">
                <p class="text-xs uppercase tracking-[0.24em] text-slate-300">Total pengguna</p>
                <p class="mt-2 text-3xl font-bold">{{ $users->total() }}</p>
            </div>
        </div>

        <div class="sf-panel p-6">
            <form method="GET" action="{{ route('admin.users.index') }}" class="flex flex-col gap-4 lg:flex-row lg:items-center">
                <div class="flex-1">
                    <label for="search" class="mb-2 block text-sm font-semibold text-slate-700">Cari pengguna</label>
                    <input
                        id="search"
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari nama, email, atau role..."
                        class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-teal-500 focus:ring-4 focus:ring-teal-100"
                    >
                </div>
                <div class="flex gap-3 lg:self-end">
                    <button class="sf-button-secondary">Cari</button>
                    @if (request()->filled('search'))
                        <a href="{{ route('admin.users.index') }}" class="rounded-full border border-slate-200 px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Reset</a>
                    @endif
                </div>
            </form>
        </div>

        @if (session('success'))
            <div class="rounded-2xl bg-emerald-100 px-5 py-4 text-sm font-medium text-emerald-700">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="rounded-2xl bg-rose-100 px-5 py-4 text-sm font-medium text-rose-700">{{ session('error') }}</div>
        @endif

        <div class="sf-panel overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                    <thead class="bg-slate-50 text-slate-500">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Avatar</th>
                            <th class="px-6 py-4 font-semibold">Nama</th>
                            <th class="px-6 py-4 font-semibold">Email</th>
                            <th class="px-6 py-4 font-semibold">Role</th>
                            <th class="px-6 py-4 font-semibold">Terdaftar</th>
                            <th class="px-6 py-4 font-semibold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 bg-white">
                        @forelse ($users as $user)
                            <tr class="align-middle">
                                <td class="px-6 py-4">
                                    <div class="flex h-11 w-11 items-center justify-center rounded-full bg-teal-700 text-sm font-bold text-white">
                                        {{ strtoupper(mb_substr($user->name, 0, 1)) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-semibold text-slate-900">{{ $user->name }}</p>
                                        @if (auth()->id() === $user->id)
                                            <p class="mt-1 text-xs font-medium uppercase tracking-[0.18em] text-teal-700">Akun Anda</p>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-slate-600">{{ $user->email }}</td>
                                <td class="px-6 py-4">
                                    <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $user->role === 'admin' ? 'bg-amber-100 text-amber-700' : 'bg-slate-100 text-slate-700' }}">
                                        {{ ucfirst($user->role ?? 'user') }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-slate-500">{{ optional($user->created_at)->format('d M Y') }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-end gap-3">
                                        <a href="mailto:{{ $user->email }}" class="rounded-full border border-slate-200 px-4 py-2 text-xs font-semibold text-slate-700 transition hover:bg-slate-50">Email</a>
                                        @if (auth()->id() !== $user->id)
                                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="rounded-full bg-rose-600 px-4 py-2 text-xs font-semibold text-white transition hover:bg-rose-700" onclick="return confirm('Hapus pengguna ini?')">Hapus</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-10 text-center text-slate-500">Tidak ada pengguna yang sesuai dengan pencarian.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            {{ $users->links() }}
        </div>
    </section>
@endsection
