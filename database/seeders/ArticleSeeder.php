<?php

namespace Database\Seeders;

use App\Models\Writer;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\ArticleCategory;
use Illuminate\Database\Seeder;
use App\Helpers\ImageHelper\ImageHelper;
use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imageHelper = new ImageHelper();

        // Dapatkan semua writer, category, dan tag yang tersedia
        $writers = Writer::all();
        $categories = ArticleCategory::all();
        $tags = ArticleTag::all();

        if ($writers->isEmpty()) {
            throw new \Exception('Tidak ada writer tersedia. Pastikan WriterSeeder sudah dijalankan.');
        }

        if ($categories->isEmpty() || $tags->isEmpty()) {
            throw new \Exception('Categories atau Tags kosong. Pastikan ArticleCategorySeeder dan ArticleTagSeeder sudah dijalankan.');
        }

        for ($i = 0; $i < 50; $i++) {
            $writer = $writers->random();

            // Generate tanggal acak dalam rentang 90 hari terakhir
            $randomDate = Carbon::now()
                ->subDays(rand(1, 90))
                ->setHour(rand(0, 23))
                ->setMinute(rand(0, 59))
                ->setSecond(rand(0, 59));

            $article = Article::factory()
                ->create([
                    'writer_id' => $writer->id,
                    'thumbnail' => $imageHelper
                        ->createDummyImageWithTextSizeAndPosition(
                            1920, 1080, 'center', 'center', 'random', 'medium'
                        )->store('assets/article/thumbnail', 'public'),
                    'created_at' => $randomDate,
                    'updated_at' => $randomDate,
                ]);

            // Attach random categories (1-3)
            $article->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );

            // Attach random tags (1-3)
            $article->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}
