<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::query()
            ->published()
            ->latest()
            ->paginate(9);

        return view('article.index', compact('articles'));
    }

    public function show(Article $article): View
    {
        abort_unless($article->is_published, 404);

        $relatedArticles = Article::query()
            ->published()
            ->whereKeyNot($article->id)
            ->latest()
            ->take(3)
            ->get();

        return view('article.show', compact('article', 'relatedArticles'));
    }
}
