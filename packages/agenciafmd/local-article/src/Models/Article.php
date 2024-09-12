<?php

namespace Agenciafmd\Article\Models;

use Agenciafmd\Article\Database\Factories\ArticleFactory;
use Agenciafmd\Media\Traits\MediaTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Article extends Model implements AuditableContract, HasMedia, Searchable
{
    use SoftDeletes, HasFactory, Auditable, MediaTrait;

    protected $guarded = [
        'media',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'star' => 'boolean',
    ];

    public $searchableType;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->searchableType = config('local-article.name');
    }

    public function getSearchResult(): SearchResult
    {
        return new SearchResult(
            $this,
            $this->name,
            route('admix.article.edit', $this->id)
        );
    }

    public function getUrlAttribute()
    {
        return route('frontend.article.show', [
            $this->slug
        ]);
    }

    public function scopeIsActive($query)
    {
        $query->where('is_active', 1);
    }

    public function scopeSort($query)
    {
        $sorts = default_sort(config('local-article.default_sort'));

        foreach ($sorts as $sort) {
            if ($sort['field'] === 'sort') {
                $query->orderByRaw('ISNULL(sort), sort ' . $sort['direction']);
            }
            else {
                $query->orderBy($sort['field'], $sort['direction']);
            }
        }
    }

    protected static function newFactory()
    {
        if (class_exists(\Database\Factories\ArticleFactory::class)) {
            return \Database\Factories\ArticleFactory::new();
        }

        return ArticleFactory::new();
    }
}
