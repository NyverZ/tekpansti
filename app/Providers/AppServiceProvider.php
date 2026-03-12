<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('register', function (Request $request) {
            $email = (string) $request->input('email');

            return Limit::perMinute(10)
                ->by($request->ip() . '|' . mb_strtolower($email))
                ->response(function () use ($request) {
                    return back()
                        ->withInput($request->except(['password', 'password_confirmation']))
                        ->withErrors([
                            'email' => 'Terlalu banyak percobaan pendaftaran. Silakan tunggu sekitar 1 menit lalu coba lagi.',
                        ]);
                });
        });

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->input('email');

            return Limit::perMinute(10)
                ->by($request->ip() . '|' . mb_strtolower($email))
                ->response(function () use ($request) {
                    return back()
                        ->withInput($request->only(['email', 'remember']))
                        ->withErrors([
                            'email' => 'Terlalu banyak percobaan masuk. Silakan tunggu sekitar 1 menit lalu coba lagi.',
                        ]);
                });
        });

        RateLimiter::for('password-reset', function (Request $request) {
            $email = (string) $request->input('email');

            return Limit::perMinute(10)
                ->by($request->ip() . '|' . mb_strtolower($email))
                ->response(function () use ($request) {
                    return back()
                        ->withInput($request->only('email'))
                        ->withErrors([
                            'email' => 'Terlalu banyak permintaan reset kata sandi. Silakan tunggu sekitar 1 menit lalu coba lagi.',
                        ]);
                });
        });

        RateLimiter::for('notifications-poll', function (Request $request) {
            $key = ($request->user()?->id ?? 'guest') . '|' . $request->ip();

            return Limit::perMinute(60)
                ->by($key)
                ->response(fn () => response()->json([
                    'message' => 'Terlalu banyak permintaan notifikasi. Coba lagi sebentar.',
                ], 429));
        });

        RateLimiter::for('notifications-action', function (Request $request) {
            $key = ($request->user()?->id ?? 'guest') . '|' . $request->ip();

            return Limit::perMinute(30)
                ->by($key)
                ->response(fn () => response()->json([
                    'message' => 'Aksi notifikasi terlalu sering. Silakan tunggu sebentar.',
                ], 429));
        });
    }
}
