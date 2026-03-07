<x-guest-layout>
    <x-slot:eyebrow>Pemeriksaan Keamanan</x-slot:eyebrow>
    <x-slot:heading>Konfirmasi kata sandi Anda</x-slot:heading>
    <x-slot:subheading>Ini adalah area aman di SafeFood. Silakan konfirmasi kata sandi Anda sebelum melanjutkan.</x-slot:subheading>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="password" :value="__('Kata Sandi')" />
            <x-text-input id="password" class="mt-2 block w-full" type="password" name="password" required autocomplete="current-password" placeholder="Masukkan kata sandi Anda" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <x-primary-button class="w-full justify-center">
            {{ __('Konfirmasi Akses') }}
        </x-primary-button>
    </form>
</x-guest-layout>
