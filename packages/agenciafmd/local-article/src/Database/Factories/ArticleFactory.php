<?php

namespace Agenciafmd\Article\Database\Factories;

use Agenciafmd\Article\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition()
    {
        return [
            'is_active' => $this->faker->optional(0.2, 1)
                ->randomElement([0]),
            'star' => $this->faker->optional(0.2, 1)
                ->randomElement([0]),
            'name' => $this->faker->sentence(),
            'description' => '<p>' . implode('</p><p>', $this->faker->paragraphs(10)) . '</p>',
            'sort' => null,
        ];
    }
}
