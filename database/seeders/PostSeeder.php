<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $postCount = 1000000;
        $tags = Tag::all();
        for ($i = 0; $i < $postCount; $i++) {
            $post = Post::create([
                'title' => fake()->name(),
                'slug' => fake()->slug(),
                'content' => fake()->realText(),
                'published_at' => fake()->date(),
                'author_id' => User::all()->random()->id,
            ]);
            $requiredTagsCount = rand(2, 8);
            $tagsCount = Tag::count();
            while ($requiredTagsCount > $tagsCount) {
                $seeder = new CategoryTagSeeder;
                $seeder->run();
                $tagsCount = Tag::count();
            };
            $selectedTags = $tags->random($requiredTagsCount);
            $post->tags()->attach($selectedTags);
        }
    }
}
