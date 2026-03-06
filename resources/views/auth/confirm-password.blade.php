<x-guest-layout>
    <x-slot:eyebrow>Security Check</x-slot:eyebrow>
    <x-slot:heading>Confirm your password</x-slot:heading>
    <x-slot:subheading>This is a secure area of SafeFood. Please confirm your password before continuing.</x-slot:subheading>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="mt-2 block w-full" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <x-primary-button class="w-full justify-center">
            {{ __('Confirm Access') }}
        </x-primary-button>
    </form>
</x-guest-layout>
