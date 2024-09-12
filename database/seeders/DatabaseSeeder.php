<?php

namespace Database\Seeders;

use Agenciafmd\Article\Database\Seeders\ArticleTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
//        $this->call(PostalTableSeeder::class);
        $this->call(ArticleTableSeeder::class);
    }
}
