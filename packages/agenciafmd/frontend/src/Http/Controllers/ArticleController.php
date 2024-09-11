<?php

namespace Agenciafmd\Frontend\Http\Controllers;

use Agenciafmd\Article\Models\Article;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $view['article'] = Article::query()
            ->isActive()
            ->sort()
            ->get();

        return view('agenciafmd/frontend::pages.article.index', $view);
    }
    public function show()
    {
        $view['article'] = Article::query()
            ->isActive()
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('agenciafmd/frontend::pages.article.show', $view);
    }

}
