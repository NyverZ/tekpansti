<x-guest-layout>
    <x-slot:eyebrow>SafeFood Registration</x-slot:eyebrow>
    <x-slot:heading>Create your account</x-slot:heading>
    <x-slot:subheading>Join SafeFood to explore HACCP content, run safety checks, compare nutrition, and track your learning.</x-slot:subheading>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" class="mt-2 block w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Your full name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="mt-2 block w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="name@company.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="mt-2 block w-full" type="password" name="password" required autocomplete="new-password" placeholder="Create a secure password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="mt-2 block w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat your password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-primary-button class="w-full justify-center">
            {{ __('Create Account') }}
        </x-primary-button>
    </form>

    <x-slot:footer>
        <div class="flex flex-col gap-2 text-center sm:flex-row sm:items-center sm:justify-center">
            <span>Already have an account?</span>
            <a href="{{ route('login') }}" class="font-semibold text-teal-600 hover:text-teal-500 dark:text-teal-300">Sign in instead</a>
        </div>
    </x-slot:footer>
</x-guest-layout>
