<?php

namespace Agenciafmd\Frontend\Http\Controllers;

use Agenciafmd\Article\Models\Article;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
//    public function index()
//    {
//        $view = [];
//
//        return view('agenciafmd/frontend::pages.index', $view);
//    }

    public function index(Request $request): View
    {
//        $view['articles'] = Article::query()
//            ->with(['media', 'category'])
//            ->when($request->tags, function ($query, $tags) {
//                return $query->whereHas('category', function ($query) use ($tags) {
//                    $query->whereIn('slug', $tags);
//                });
//            })
//            ->isActive()
//            ->sort()
//            ->paginate(9);


        $view['article'] = Article::query()
            ->isActive()
            ->sort()
            ->get();

        return view('agenciafmd/frontend::pages.index', $view);
    }
}
