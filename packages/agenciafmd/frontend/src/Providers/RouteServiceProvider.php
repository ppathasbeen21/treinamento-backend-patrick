<?php

namespace Agenciafmd\Frontend\Providers;

use Agenciafmd\Article\Models\Article;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('web')
                ->group(__DIR__ . '/../routes/web.php');

            Route::prefix('api')
                ->middleware('api')
                ->group(__DIR__ . '/../routes/api.php');
        });

        $this->routeBinds();
    }

    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60);
        });
    }

    protected function routeBinds(): void
    {
        Route::bind('frontArticle', function ($value) {
            return Article::query()
                ->isActive()
                ->where('slug', $value)
                ->firstOrFail();
        });
    }
}
