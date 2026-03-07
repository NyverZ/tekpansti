<?php

use App\Http\Controllers\AdminArticleController;
use App\Http\Controllers\AdminPlantController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SafeFoodController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\Web\PlantCatalogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SafeFoodController::class, 'home'])->name('home');

Route::get('/food-education', [SafeFoodController::class, 'education'])->name('education');
Route::get('/haccp', [SafeFoodController::class, 'haccp'])->name('haccp');
Route::get('/food-safety-checker', [SafeFoodController::class, 'showSafetyChecker'])->name('safety-checker');
Route::post('/food-safety-checker', [SafeFoodController::class, 'submitSafetyChecker'])->name('safety-checker.submit');
Route::get('/quiz', [SafeFoodController::class, 'quiz'])->name('quiz');
Route::get('/consultation', [SafeFoodController::class, 'consultation'])->name('consultation');
Route::get('/about-us', [SafeFoodController::class, 'about'])->name('about');
Route::get('/contact', [SafeFoodController::class, 'contact'])->name('contact');

Route::get('/ingredients', [PlantCatalogController::class, 'index'])->name('foods.index');
Route::get('/ingredients/{plant:slug}', [PlantCatalogController::class, 'show'])->name('foods.show');
Route::get('/nutrition-comparison', [PlantCatalogController::class, 'compare'])->name('foods.compare');
Route::post('/nutrition-comparison', [PlantCatalogController::class, 'compareResult'])->name('foods.compare.result');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/suggest', [SuggestionController::class, 'form'])->name('suggest.form');
Route::post('/suggest', [SuggestionController::class, 'store'])->name('suggest.store');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('articles', AdminArticleController::class)->except('show');
        Route::resource('users', AdminUserController::class)->only(['index', 'destroy']);

        Route::resource('ingredients', AdminPlantController::class)
            ->except('show')
            ->parameters(['ingredients' => 'plant'])
            ->names('ingredients');
    });

Route::redirect('/edukasi', '/food-education');
Route::redirect('/konsultasi', '/consultation');
Route::redirect('/self-check', '/food-safety-checker');
Route::redirect('/tentang-kami', '/about-us');
Route::redirect('/kontak', '/contact');
Route::redirect('/compare', '/nutrition-comparison');
Route::redirect('/plants', '/ingredients');

require __DIR__ . '/auth.php';
