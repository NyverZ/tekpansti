<x-guest-layout>
    <x-slot:eyebrow>Verifikasi Email</x-slot:eyebrow>
    <x-slot:heading>Verifikasi email Anda</x-slot:heading>
    <x-slot:subheading>Sebelum memulai, silakan konfirmasi alamat email Anda melalui tautan yang kami kirimkan.</x-slot:subheading>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-6 rounded-2xl bg-emerald-100 px-4 py-3 text-sm font-medium text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-300">
            {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
        </div>
    @endif

    <div class="space-y-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button class="w-full justify-center">
                {{ __('Kirim Ulang Email Verifikasi') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full rounded-full border border-slate-200 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50 dark:border-slate-700 dark:text-slate-300 dark:hover:bg-slate-900">
                {{ __('Keluar') }}
            </button>
        </form>
    </div>
</x-guest-layout>
