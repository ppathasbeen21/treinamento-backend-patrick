<?php

namespace Agenciafmd\Article\Providers;

use Agenciafmd\Article\Models\Article;
use Agenciafmd\Article\Observers\ArticleObserver;
use Illuminate\Support\ServiceProvider;

class ArticleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->providers();

        $this->setObservers();

        $this->setSearch();

        $this->loadMigrations();

        $this->publish();
    }

    protected function providers()
    {
        $this->app->register(AuthServiceProvider::class);
        $this->app->register(BladeServiceProvider::class);
        $this->app->register(LivewireServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
    }

    protected function setObservers()
    {
        Article::observe(ArticleObserver::class);
    }

    protected function setSearch()
    {
        $this->app->make('admix-search')
            ->registerModel(Article::class, 'name');
    }

    protected function loadMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    public function register()
    {
        $this->loadConfigs();
    }

    protected function loadConfigs()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/local-article.php', 'local-article');
        $this->mergeConfigFrom(__DIR__ . '/../config/gate.php', 'gate');
        $this->mergeConfigFrom(__DIR__ . '/../config/audit-alias.php', 'audit-alias');
        $this->mergeConfigFrom(__DIR__ . '/../config/upload-configs.php', 'upload-configs');
    }

    protected function publish()
    {
        $this->publishes([
            __DIR__ . '/../Database/Faker' => base_path('database/faker'),
            __DIR__ . '/../config/upload-configs.php' => base_path('config/upload-configs.php'),
        ], 'local-article:minimal');

        $this->publishes([
            __DIR__ . '/../Database/Factories/ArticleFactory.php' => base_path('database/factories/ArticleFactory.php'),
            __DIR__ . '/../Database/Faker' => base_path('database/faker'),
            __DIR__ . '/../Database/Seeders/ArticleTableSeeder.php' => base_path('database/seeders/ArticleTableSeeder.php'),
        ], 'local-article:seeders');
    }
}
