<x-guest-layout>
    <x-slot:eyebrow>SafeFood Login</x-slot:eyebrow>
    <x-slot:heading>Welcome back</x-slot:heading>
    <x-slot:subheading>Sign in to access your SafeFood dashboard, continue learning, and use the platform tools.</x-slot:subheading>

    <x-auth-session-status class="mb-6 rounded-2xl bg-emerald-100 px-4 py-3 text-sm font-medium text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-300" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="mt-2 block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="name@company.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <div class="flex items-center justify-between">
                <x-input-label for="password" :value="__('Password')" />
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm font-semibold text-teal-600 hover:text-teal-500 dark:text-teal-300">
                        Forgot password?
                    </a>
                @endif
            </div>

            <x-text-input id="password" class="mt-2 block w-full" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <label class="inline-flex items-center gap-3 rounded-full bg-slate-100 px-4 py-2 text-sm font-medium text-slate-700 dark:bg-slate-900 dark:text-slate-300">
            <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-teal-600 focus:ring-teal-500 dark:border-slate-600 dark:bg-slate-950" name="remember">
            <span>{{ __('Remember me') }}</span>
        </label>

        <x-primary-button class="w-full justify-center">
            {{ __('Sign In') }}
        </x-primary-button>
    </form>

    <x-slot:footer>
        <div class="flex flex-col gap-2 text-center sm:flex-row sm:items-center sm:justify-center">
            <span>No account yet?</span>
            <a href="{{ route('register') }}" class="font-semibold text-teal-600 hover:text-teal-500 dark:text-teal-300">Create a SafeFood account</a>
        </div>
    </x-slot:footer>
</x-guest-layout>
