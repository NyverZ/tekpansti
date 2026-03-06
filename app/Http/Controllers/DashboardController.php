<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Nutrient;
use App\Models\Plant;
use App\Models\Suggestion;
use App\Models\User;
use App\Services\SafeFoodContentService;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __construct(
        private readonly SafeFoodContentService $safeFoodContentService
    ) {
    }

    public function index(): View
    {
        return view('dashboard', [
            'stats' => [
                'ingredients' => Plant::count(),
                'nutrients' => Nutrient::count(),
                'articles' => Article::count(),
                'users' => User::count(),
                'pendingSuggestions' => Suggestion::query()->where('status', 'pending')->count(),
            ],
            'latestArticles' => Article::query()
                ->when(
                    auth()->user()?->role !== 'admin',
                    fn ($query) => $query->published()
                )
                ->latest()
                ->take(4)
                ->get(),
            'dailyTip' => $this->safeFoodContentService->dailyTip(),
        ]);
    }
}
