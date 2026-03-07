<x-guest-layout>
    <x-slot:eyebrow>Masuk SafeFood</x-slot:eyebrow>
    <x-slot:heading>Selamat datang kembali</x-slot:heading>
    <x-slot:subheading>Masuk untuk mengakses dasbor SafeFood, melanjutkan pembelajaran, dan menggunakan alat pada platform.</x-slot:subheading>

    <x-auth-session-status class="mb-6 rounded-2xl bg-emerald-100 px-4 py-3 text-sm font-medium text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-300" :status="session('status')" />
    <x-input-error :messages="$errors->get('social')" class="mb-6" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Alamat Email')" />
            <x-text-input id="email" class="mt-2 block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="name@company.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <div class="flex items-center justify-between">
                <x-input-label for="password" :value="__('Kata Sandi')" />
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm font-semibold text-teal-600 hover:text-teal-500 dark:text-teal-300">
                        Lupa kata sandi?
                    </a>
                @endif
            </div>

            <x-text-input id="password" class="mt-2 block w-full" type="password" name="password" required autocomplete="current-password" placeholder="Masukkan kata sandi Anda" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <label class="inline-flex items-center gap-3 rounded-full bg-slate-100 px-4 py-2 text-sm font-medium text-slate-700 dark:bg-slate-900 dark:text-slate-300">
            <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-teal-600 focus:ring-teal-500 dark:border-slate-600 dark:bg-slate-950" name="remember">
            <span>{{ __('Ingat saya') }}</span>
        </label>

        <x-primary-button class="w-full justify-center">
            {{ __('Masuk') }}
        </x-primary-button>
    </form>

    <div class="my-8 flex items-center gap-3">
        <div class="h-px flex-1 bg-slate-200 dark:bg-slate-800"></div>
        <span class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 dark:text-slate-500">Atau lanjutkan dengan</span>
        <div class="h-px flex-1 bg-slate-200 dark:bg-slate-800"></div>
    </div>

    <div class="grid gap-3">
        <a
            href="{{ route('auth.social.redirect', 'google') }}"
            class="flex items-center justify-center gap-3 rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-700 transition hover:border-slate-300 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:hover:bg-slate-900"
        >
            <svg class="h-5 w-5" viewBox="0 0 24 24" aria-hidden="true">
                <path fill="#EA4335" d="M12 10.2v3.9h5.5c-.2 1.3-1.5 3.9-5.5 3.9-3.3 0-6-2.7-6-6s2.7-6 6-6c1.9 0 3.2.8 3.9 1.5l2.7-2.6C17 3.3 14.7 2.4 12 2.4A9.6 9.6 0 1 0 12 21.6c5.5 0 9.1-3.8 9.1-9.2 0-.6-.1-1.1-.2-1.6H12Z"/>
            </svg>
            <span>Lanjutkan dengan Google</span>
        </a>

        <a
            href="{{ route('auth.social.redirect', 'github') }}"
            class="flex items-center justify-center gap-3 rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm font-semibold text-slate-700 transition hover:border-slate-300 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:hover:bg-slate-900"
        >
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path d="M12 .5C5.6.5.5 5.7.5 12.2c0 5.2 3.4 9.6 8.1 11.1.6.1.8-.3.8-.6v-2.1c-3.3.7-4-1.4-4-1.4-.5-1.4-1.3-1.7-1.3-1.7-1.1-.8.1-.8.1-.8 1.2.1 1.9 1.3 1.9 1.3 1.1 1.9 2.9 1.4 3.6 1.1.1-.8.4-1.4.8-1.7-2.7-.3-5.5-1.4-5.5-6.2 0-1.4.5-2.5 1.3-3.4-.1-.3-.6-1.6.1-3.3 0 0 1.1-.4 3.5 1.3 1-.3 2.1-.4 3.2-.4s2.2.1 3.2.4c2.4-1.7 3.5-1.3 3.5-1.3.7 1.7.3 3 .1 3.3.8.9 1.3 2 1.3 3.4 0 4.9-2.9 5.9-5.6 6.2.4.4.8 1.1.8 2.2v3.3c0 .3.2.7.8.6 4.7-1.6 8.1-5.9 8.1-11.1C23.5 5.7 18.4.5 12 .5Z"/>
            </svg>
            <span>Lanjutkan dengan GitHub</span>
        </a>
    </div>

    <x-slot:footer>
        <div class="flex flex-col gap-2 text-center sm:flex-row sm:items-center sm:justify-center">
            <span>Belum punya akun?</span>
            <a href="{{ route('register') }}" class="font-semibold text-teal-600 hover:text-teal-500 dark:text-teal-300">Buat akun SafeFood</a>
        </div>
    </x-slot:footer>
</x-guest-layout>
