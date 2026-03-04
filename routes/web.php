<?php

use App\Http\Controllers\AdminArticleController;
use App\Http\Controllers\AdminPlantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\Web\PlantCatalogController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/suggest', [SuggestionController::class, 'form'])
    ->name('suggest.form');

Route::post('/suggest', [SuggestionController::class, 'store'])
    ->name('suggest.store');

Route::get('/compare', [PlantCatalogController::class, 'compare'])->name('compare');
Route::post('/compare/result', [PlantCatalogController::class, 'compareResult'])->name('compare.result');

Route::post('/compare/result', [PlantCatalogController::class, 'compareResult'])
    ->name('compare.result');

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('plants', AdminPlantController::class);
    });

Route::middleware(['auth','admin'])->group(function(){

Route::resource('admin/articles',AdminArticleController::class);

});

Route::get('/plants', [PlantCatalogController::class, 'index'])
    ->name('plants.index');

Route::get('/plants/{plant}', [PlantCatalogController::class, 'show'])
    ->name('plants.show');

Route::get('/plants/search', [PlantCatalogController::class, 'search'])
    ->name('plants.search');


Route::get('/', fn() => view('home'))->name('home');
Route::get('/edukasi', fn() => view('pages.edukasi'))->name('edukasi');
Route::get('/konsultasi', fn() => view('pages.konsultasi'))->name('konsultasi');
Route::get('/self-check', fn() => view('pages.selfcheck'))->name('selfcheck');
Route::get('/tentang-kami', fn() => view('pages.about'))->name('about');
Route::get('/kontak', fn() => view('pages.contact'))->name('contact');
Route::get('/quiz', fn() => view('pages.quiz'))->name('quiz');



Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__ . '/auth.php';
