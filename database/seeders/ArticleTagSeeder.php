<?php

namespace Database\Seeders;

use App\Models\ArticleTag;
use Illuminate\Database\Seeder;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articleTags = [
            'PHP',
            'JavaScript',
            'Python',
            'Java',
            'React',
            'Vue.js',
            'Laravel',
            'Node.js',
            'Docker',
            'Kubernetes',
            'AWS',
            'Git',
            'SQL',
            'NoSQL',
            'REST API',
            'GraphQL',
            'Flutter',
            'React Native',
            'Angular',
            'TypeScript',
            'Spring Boot',
            'Django',
            'Express.js',
            'MongoDB',
            'PostgreSQL',
        ];

        foreach ($articleTags as $articleTag) {
            ArticleTag::factory()->create([
                'name' => $articleTag
            ]);
        }
    }
}
