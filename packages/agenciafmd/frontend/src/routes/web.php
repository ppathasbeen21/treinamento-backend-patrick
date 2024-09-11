<?php

use Agenciafmd\Frontend\Http\Controllers\ArticleController;
use Agenciafmd\Frontend\Http\Controllers\FrontendController;
use Agenciafmd\Frontend\Http\Controllers\HtmlController;
use Agenciafmd\Frontend\Http\Controllers\WebVitalsController;
use Illuminate\Support\Facades\Route;

Route::get('html/{any?}', [HtmlController::class, 'index'])
    ->name('frontend.html');

Route::get('/', [FrontendController::class, 'index'])
    ->name('frontend.index');

Route::get('/article', [ArticleController::class, 'index'])
    ->name('frontend.article.index');
Route::get('/article/{frontArticle}', [ArticleController::class, 'show'])
    ->name('frontend.article.show');

Route::get('/webvitals/{environment}', [WebVitalsController::class, 'index'])
    ->name('frontend.webvitals');
Route::view('/offline', 'agenciafmd/frontend::pages.offline')
    ->name('frontend.offline');
