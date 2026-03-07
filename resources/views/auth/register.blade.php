<x-guest-layout>
    <x-slot:eyebrow>Registrasi SafeFood</x-slot:eyebrow>
    <x-slot:heading>Buat akun Anda</x-slot:heading>
    <x-slot:subheading>Bergabung dengan SafeFood untuk mempelajari HACCP, melakukan cek keamanan, membandingkan nutrisi, dan memantau proses belajar Anda.</x-slot:subheading>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" class="mt-2 block w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Nama lengkap Anda" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Alamat Email')" />
            <x-text-input id="email" class="mt-2 block w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="name@company.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Kata Sandi')" />
            <x-text-input id="password" class="mt-2 block w-full" type="password" name="password" required autocomplete="new-password" placeholder="Buat kata sandi yang aman" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />
            <x-text-input id="password_confirmation" class="mt-2 block w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi kata sandi Anda" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-primary-button class="w-full justify-center">
            {{ __('Buat Akun') }}
        </x-primary-button>
    </form>

    <x-slot:footer>
        <div class="flex flex-col gap-2 text-center sm:flex-row sm:items-center sm:justify-center">
            <span>Sudah punya akun?</span>
            <a href="{{ route('login') }}" class="font-semibold text-teal-600 hover:text-teal-500 dark:text-teal-300">Masuk di sini</a>
        </div>
    </x-slot:footer>
</x-guest-layout>
