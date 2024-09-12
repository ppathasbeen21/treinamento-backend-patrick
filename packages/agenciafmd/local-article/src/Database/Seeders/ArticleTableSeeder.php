<?php

namespace Agenciafmd\Article\Database\Seeders;

use Agenciafmd\Article\Models\Article;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File as HttpFile;
use Illuminate\Support\Facades\Storage;

class ArticleTableSeeder extends Seeder
{
    protected $total = 15;

    public function run(): void
    {
        Article::query()
            ->truncate();

        DB::table('media')
            ->where('model_type', 'Agenciafmd\\Article\\Models\\Article')
            ->delete();

        $faker = Factory::create('pt_BR');

        $this->command->getOutput()
            ->progressStart($this->total);

        Article::factory($this->total)
            ->create()
            ->each(function ($item) use ($faker) {
                foreach (config('upload-configs.article') as $key => $image) {
                    $fakerDir = __DIR__ . '/../Faker/article/' . $key;

                    if ($image['faker_dir']) {
                        $fakerDir = $image['faker_dir'];
                    }

                    if ($image['multiple']) {
                        $items = $faker->numberBetween(0, 6);
                        for ($i = 0; $i < $items; $i++) {
                            $sourceFile = $faker->file($fakerDir, storage_path('admix/tmp'));
                            $targetFile = Storage::putFile('tmp', new HttpFile($sourceFile));

                            $item->doUploadMultiple($targetFile, $key);
                        }
                    } else {
                        $sourceFile = $faker->file($fakerDir, storage_path('admix/tmp'));
                        $targetFile = Storage::putFile('tmp', new HttpFile($sourceFile));

                        $item->doUpload($targetFile, $key);
                    }
                }

                $this->command->getOutput()
                    ->progressAdvance();
            });

        $this->command->getOutput()
            ->progressFinish();
    }
}
