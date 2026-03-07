<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\Provider as SocialiteProvider;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User as SocialiteUser;
use Throwable;

class SocialAuthController extends Controller
{
    private const PROVIDERS = ['google', 'github'];

    public function redirect(string $provider): RedirectResponse
    {
        try {
            return $this->driver($provider)->redirect();
        } catch (Throwable) {
            return redirect()
                ->route('login')
                ->withErrors(['social' => 'Konfigurasi login ' . ucfirst($provider) . ' belum lengkap.']);
        }
    }

    public function callback(string $provider): RedirectResponse
    {
        try {
            $socialUser = $this->driver($provider)->user();
        } catch (Throwable) {
            return redirect()
                ->route('login')
                ->withErrors(['social' => 'Autentikasi ' . ucfirst($provider) . ' gagal. Silakan coba lagi.']);
        }

        $user = $this->resolveUser($provider, $socialUser);

        if (! $user) {
            return redirect()
                ->route('login')
                ->withErrors(['social' => 'Akun ' . ucfirst($provider) . ' Anda tidak menyediakan email yang dapat digunakan.']);
        }

        Auth::login($user, true);
        request()->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    private function resolveUser(string $provider, SocialiteUser $socialUser): ?User
    {
        $user = User::query()
            ->where('provider', $provider)
            ->where('provider_id', $socialUser->getId())
            ->first();

        $email = $socialUser->getEmail();

        if (! $user && $email) {
            $user = User::query()->where('email', $email)->first();
        }

        if (! $user && ! $email) {
            return null;
        }

        if (! $user) {
            $user = User::create([
                'name' => $socialUser->getName() ?: $socialUser->getNickname() ?: 'Pengguna SafeFood',
                'email' => $email,
                'password' => Hash::make(Str::random(40)),
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
                'avatar' => $socialUser->getAvatar(),
                'email_verified_at' => now(),
            ]);

            event(new Registered($user));

            return $user;
        }

        $user->forceFill([
            'name' => $user->name ?: ($socialUser->getName() ?: $socialUser->getNickname() ?: 'Pengguna SafeFood'),
            'provider' => $provider,
            'provider_id' => $socialUser->getId(),
            'avatar' => $socialUser->getAvatar() ?: $user->avatar,
            'email_verified_at' => $user->email_verified_at ?: now(),
        ])->save();

        return $user;
    }

    private function scopesFor(string $provider): array
    {
        return match ($provider) {
            'github' => ['read:user', 'user:email'],
            default => ['openid', 'profile', 'email'],
        };
    }

    private function driver(string $provider): SocialiteProvider
    {
        abort_unless(in_array($provider, self::PROVIDERS, true), 404);

        $driver = Socialite::driver($provider)
            ->redirectUrl(route('auth.social.callback', ['provider' => $provider], true));

        if (method_exists($driver, 'scopes')) {
            $driver->scopes($this->scopesFor($provider));
        }

        return $driver;
    }
}
