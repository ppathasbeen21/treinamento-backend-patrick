<?php

namespace Agenciafmd\Article\Providers;

use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadBladeComponents();

        $this->setMenu();

        $this->loadViews();

        $this->loadTranslations();

        $this->publish();
    }

    public function register()
    {
        //
    }

    protected function loadBladeComponents()
    {
        //
    }

    protected function setMenu()
    {
        $this->app->make('admix-menu')
            ->push((object)[
                'view' => 'agenciafmd/article::partials.menus.item',
                'ord' => config('local-article.sort', 1),
            ]);
    }

    protected function loadViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'agenciafmd/article');
    }

    protected function loadTranslations()
    {
        $this->loadJsonTranslationsFrom(__DIR__ . '/../resources/lang');
    }

    protected function publish()
    {
        $this->publishes([
            __DIR__ . '/../resources/views' => base_path('resources/views/vendor/agenciafmd/article'),
        ], 'local-article:views');
    }
}
