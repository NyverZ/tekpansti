<?php

use App\Models\User;

dataset('public safefood pages', [
    '/',
    '/about-us',
    '/contact',
]);

dataset('protected safefood pages', [
    '/food-education',
    '/haccp',
    '/higiene-sanitasi',
    '/pengolahan-penyimpanan-pangan',
    '/food-safety-checker',
    '/quiz',
    '/consultation',
    '/ingredients',
    '/nutrition-comparison',
    '/articles',
    '/dashboard',
]);

dataset('protected safefood aliases', [
    '/edukasi',
    '/higiene-dan-sanitasi',
    '/pengolahan-dan-penyimpanan-pangan',
    '/konsultasi',
    '/self-check',
    '/compare',
    '/plants',
]);

test('public safefood pages remain accessible to guests', function (string $uri) {
    $this->get($uri)->assertOk();
})->with('public safefood pages');

test('guests are redirected to login when visiting protected safefood pages', function (string $uri) {
    $this->get($uri)->assertRedirect(route('login', absolute: false));
})->with('protected safefood pages');

test('guests are redirected to login when visiting protected safefood aliases', function (string $uri) {
    $this->get($uri)->assertRedirect(route('login', absolute: false));
})->with('protected safefood aliases');

test('guests are redirected to login when submitting protected feature forms', function () {
    $this->post('/food-safety-checker')->assertRedirect(route('login', absolute: false));
    $this->post('/nutrition-comparison')->assertRedirect(route('login', absolute: false));
});

test('authenticated users can access protected feature pages', function (string $uri) {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get($uri)
        ->assertOk();
})->with([
    '/food-education',
    '/ingredients',
    '/articles',
    '/dashboard',
]);

test('admin routes still require admin authorization after login', function () {
    $user = User::factory()->create(['role' => 'user']);
    $admin = User::factory()->create([
        'role' => 'admin',
        'is_admin' => true,
    ]);

    $this->actingAs($user)
        ->get(route('admin.articles.index', absolute: false))
        ->assertForbidden();

    $this->actingAs($admin)
        ->get(route('admin.articles.index', absolute: false))
        ->assertOk();
});
