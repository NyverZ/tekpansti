<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ArticleController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable'
        ]);

        Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'image' => $request->image
        ]);

        return redirect()->back()->with('success', 'Artikel berhasil ditambahkan');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('admin.edit-article', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $article->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'image' => $request->image
        ]);

        return redirect('/dashboard')->with('success', 'Artikel berhasil diupdate');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect('/dashboard')->with('success', 'Artikel berhasil dihapus');
    }

    public function show($slug)
    {
        $article = \App\Models\Article::where('slug', $slug)->firstOrFail();

        return view('article.show', compact('article'));
    }
}
