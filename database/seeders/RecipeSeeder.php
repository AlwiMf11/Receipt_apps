<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();

        $categories->each(function ($category) {
            Recipe::factory()
                ->count(5)
                ->published()
                ->create([
                    'category_id' => $category->id,
                ]);
        });
    }
}
