<?php

namespace Agenciafmd\Article\Providers;

use Agenciafmd\Article\Policies\ArticlePolicy;
use Agenciafmd\Article\Models\Article;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Article::class => ArticlePolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
