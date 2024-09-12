<?php

namespace Agenciafmd\Frontend\Http\Controllers;

use Agenciafmd\Article\Models\Article;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

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
    public function show(Article $frontArticle): View
    {
        $view['article'] = Article::query()
            ->isActive()
            ->where('id', $frontArticle->id)
            ->first();

        return view('agenciafmd/frontend::pages.article.show', $view);
    }

}
