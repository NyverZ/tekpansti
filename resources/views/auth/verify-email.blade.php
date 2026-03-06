<x-guest-layout>
    <x-slot:eyebrow>Email Verification</x-slot:eyebrow>
    <x-slot:heading>Verify your email</x-slot:heading>
    <x-slot:subheading>Before getting started, please confirm your email address using the link we sent you.</x-slot:subheading>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-6 rounded-2xl bg-emerald-100 px-4 py-3 text-sm font-medium text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-300">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif

    <div class="space-y-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button class="w-full justify-center">
                {{ __('Resend Verification Email') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full rounded-full border border-slate-200 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50 dark:border-slate-700 dark:text-slate-300 dark:hover:bg-slate-900">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
