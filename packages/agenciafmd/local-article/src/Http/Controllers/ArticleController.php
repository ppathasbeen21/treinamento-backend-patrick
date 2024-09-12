<?php

namespace Agenciafmd\Article\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Agenciafmd\Article\Http\Requests\ArticleRequest;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Agenciafmd\Article\Models\Article;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        session()->put('backUrl', request()->fullUrl());

        $query = QueryBuilder::for(Article::class)
            ->defaultSorts(config('local-article.default_sort'))
            ->allowedSorts($request->sort)
            ->allowedFilters(array_merge((($request->filter) ? array_keys(array_diff_key($request->filter, array_flip(['id', 'is_active']))) : []), [
                AllowedFilter::exact('id'),
                AllowedFilter::exact('is_active'),
                AllowedFilter::exact('star'),
            ]));

        if ($request->is('*/trash')) {
            $query->onlyTrashed();
        }

        $view['items'] = $query->paginate($request->get('per_page', 50));

        return view('agenciafmd/article::index', $view);
    }

    public function create(Article $article)
    {
        $view['model'] = $article;

        return view('agenciafmd/article::form', $view);
    }

    public function store(ArticleRequest $request)
    {
        if (Article::create($request->validated())) {
            flash('Item inserido com sucesso.', 'success');
        } else {
            flash('Falha no cadastro.', 'danger');
        }

        return ($url = session()->get('backUrl')) ? redirect($url) : redirect()->route('admix.article.index');
    }

    public function show(Article $article)
    {
        $view['model'] = $article;

        return view('agenciafmd/article::form', $view);
    }

    public function edit(Article $article)
    {
        $view['model'] = $article;

        return view('agenciafmd/article::form', $view);
    }

    public function update(Article $article, ArticleRequest $request)
    {
        if ($article->update($request->validated())) {
            flash('Item atualizado com sucesso.', 'success');
        } else {
            flash('Falha na atualização.', 'danger');
        }

        return ($url = session()->get('backUrl')) ? redirect($url) : redirect()->route('admix.article.index');
    }

    public function destroy(Article $article)
    {
        if ($article->delete()) {
            flash('Item removido com sucesso.', 'success');
        } else {
            flash('Falha na remoção.', 'danger');
        }

            return ($url = session()->get('backUrl')) ? redirect($url) : redirect()->route('admix.article.index');
        }

    public function restore($id)
    {
        $model = Article::onlyTrashed()
            ->find($id);

        if (!$model) {
            flash('Item já restaurado.', 'danger');
        } elseif ($model->restore()) {
            flash('Item restaurado com sucesso.', 'success');
        } else {
            flash('Falha na restauração.', 'danger');
        }

        return ($url = session()->get('backUrl')) ? redirect($url) : redirect()->route('admix.article.index');
    }

    public function batchDestroy(Request $request)
    {
        if (Article::destroy($request->get('id', []))) {
            flash('Item removido com sucesso.', 'success');
        } else {
            flash('Falha na remoção.', 'danger');
        }

        return ($url = session()->get('backUrl')) ? redirect($url) : redirect()->route('admix.article.index');
    }

    public function batchRestore(Request $request)
    {
        $model = Article::onlyTrashed()
            ->whereIn('id', $request->get('id', []))
            ->restore();

        if ($model) {
            flash('Item restaurado com sucesso.', 'success');
        } else {
            flash('Falha na restauração.', 'danger');
        }

        return ($url = session()->get('backUrl')) ? redirect($url) : redirect()->route('admix.article.index');
    }
}
