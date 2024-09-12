<?php

use Agenciafmd\Article\Http\Controllers\ArticleController;
use Agenciafmd\Article\Models\Article;

Route::get('article/', [ArticleController::class, 'index'])
    ->name('admix.article.index')
    ->middleware('can:view,' . Article::class);
Route::get('article/trash', [ArticleController::class, 'index'])
    ->name('admix.article.trash')
    ->middleware('can:restore,' . Article::class);
Route::get('article/create', [ArticleController::class, 'create'])
    ->name('admix.article.create')
    ->middleware('can:create,' . Article::class);
Route::post('article/', [ArticleController::class, 'store'])
    ->name('admix.article.store')
    ->middleware('can:create,' . Article::class);
Route::get('article/{article}', [ArticleController::class, 'show'])
    ->name('admix.article.show')
    ->middleware('can:view,' . Article::class);
Route::get('article/{article}/edit', [ArticleController::class, 'edit'])
    ->name('admix.article.edit')
    ->middleware('can:update,' . Article::class);
Route::put('article/{article}', [ArticleController::class, 'update'])
    ->name('admix.article.update')
    ->middleware('can:update,' . Article::class);
Route::delete('article/destroy/{article}', [ArticleController::class, 'destroy'])
    ->name('admix.article.destroy')
    ->middleware('can:delete,' . Article::class);
Route::post('article/{id}/restore', [ArticleController::class, 'restore'])
    ->name('admix.article.restore')
    ->middleware('can:restore,' . Article::class);
Route::post('article/batchDestroy', [ArticleController::class, 'batchDestroy'])
    ->name('admix.article.batchDestroy')
    ->middleware('can:delete,' . Article::class);
Route::post('article/batchRestore', [ArticleController::class, 'batchRestore'])
    ->name('admix.article.batchRestore')
    ->middleware('can:restore,' . Article::class);
