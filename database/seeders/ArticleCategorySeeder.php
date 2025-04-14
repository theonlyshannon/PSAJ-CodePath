<?php

namespace Database\Seeders;

use App\Models\ArticleCategory;
use Illuminate\Database\Seeder;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articleCategories = [
            'Web Development',
            'Mobile Development',
            'Backend Development',
            'Frontend Development',
            'Database',
            'Cloud Computing',
            'DevOps',
            'Artificial Intelligence',
            'Machine Learning',
            'Data Science',
            'Cyber Security',
            'Game Development',
            'Software Architecture',
            'Programming Languages',
            'UI/UX Design',
            'Testing & QA',
            'Version Control',
            'API Development',
            'Microservices',
            'IoT Development',
        ];

        foreach ($articleCategories as $articleCategory) {
            ArticleCategory::factory()->create([
                'name' => $articleCategory
            ]);
        }
    }
}
