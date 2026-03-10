<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request): View
    {
        $articles = Article::query()
            ->published()
            ->when(
                $request->filled('search'),
                fn ($query) => $query->where(function ($articleQuery) use ($request) {
                    $search = $request->string('search');

                    $articleQuery
                        ->where('title', 'like', '%' . $search . '%')
                        ->orWhere('content', 'like', '%' . $search . '%')
                        ->orWhere('slug', 'like', '%' . $search . '%');
                })
            )
            ->latest()
            ->select(['id', 'slug', 'title', 'content', 'image', 'created_at'])
            ->paginate(9)
            ->withQueryString();

        return view('article.index', [
            'articles' => $articles,
            'searchTerm' => (string) $request->string('search'),
        ]);
    }

    public function show(Article $article): View
    {
        abort_unless($article->is_published, 404);

        $relatedArticles = Article::query()
            ->published()
            ->whereKeyNot($article->id)
            ->latest()
            ->select(['id', 'slug', 'title', 'created_at'])
            ->take(3)
            ->get();

        return view('article.show', compact('article', 'relatedArticles'));
    }
}
