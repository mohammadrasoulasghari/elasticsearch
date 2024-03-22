<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoriesCount = rand(2, 8);
        for ($i = 0; $i < $categoriesCount; $i++) {
            $category = Category::create(['name' => fake()->name(), 'slug' => fake()->unique()->slug(), 'description' => fake()->realText()]);
            $tagsCount = rand(2, 8);
            for ($j = 0; $j < $tagsCount; $j++) {
                $category->tags()->create(['name' => fake()->name(), 'category_id' => $category->id, 'slug' => fake()->unique()->slug()]);
            }
        }
    }
}
