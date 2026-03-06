<x-guest-layout>
    <x-slot:eyebrow>Password Recovery</x-slot:eyebrow>
    <x-slot:heading>Forgot your password?</x-slot:heading>
    <x-slot:subheading>Enter your email address and we will send you a secure reset link.</x-slot:subheading>

    <x-auth-session-status class="mb-6 rounded-2xl bg-emerald-100 px-4 py-3 text-sm font-medium text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-300" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="mt-2 block w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="name@company.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <x-primary-button class="w-full justify-center">
            {{ __('Send Reset Link') }}
        </x-primary-button>
    </form>

    <x-slot:footer>
        <div class="text-center">
            <a href="{{ route('login') }}" class="font-semibold text-teal-600 hover:text-teal-500 dark:text-teal-300">Back to sign in</a>
        </div>
    </x-slot:footer>
</x-guest-layout>
