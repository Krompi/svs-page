<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use Illuminate\Contracts\View\View;

class ArticleDisplayController extends Controller
{
    public function index(): View
    {
        $articles = \App\Models\Article::published()
            ->orderBy('publish_start_date', 'desc')
            ->paginate(12);

        return view('site.articles.index', ['items' => $articles]);
    }

    public function show(string $slug): View
    {
        $article = \App\Models\Article::published()
            ->forSlug($slug)
            ->firstOrFail();

        return view('site.articles.show', ['item' => $article]);
    }
}
