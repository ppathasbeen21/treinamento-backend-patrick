<?php

namespace Agenciafmd\Article\Observers;

use Agenciafmd\Article\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;

class ArticleObserver
{
    public function saving(Article $model)
    {
        $model->slug = Str::slug($model->name);
    }

    public function saved(Article $model)
    {
        if (!app()->runningInConsole()) {

            /* descomente caso for utilizar, não faça cache da listagem (ex. frontend.article.index)
            try {
                dispatch(function () use ($model) {
                    Artisan::call('page-cache:clear', [
                        'slug' => 'pc__index__pc',
                    ]);

                    Http::get(url('/'));
                })
                    ->delay(now()->addSeconds(5))
                    ->onQueue('low');
            } catch (\Exception $exception) {
                // não tem problema
            }

            try {
                dispatch(function () use ($model) {
                    $url = str_replace(config('app.url') . '/', '', $model->url);
                    Artisan::call('page-cache:clear', [
                        'slug' => $url,
                    ]);

                    Http::get($model->url);
                })
                    ->delay(now()->addSeconds(5))
                    ->onQueue('low');
            } catch (\Exception $exception) {
                // não tem problema
            }
            */
        }
    }
}