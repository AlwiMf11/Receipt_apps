<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RecipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recipe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->words(3, true);

        return [
            'category_id' => Category::factory(),
            'title' => ucwords($title),
            'slug' => Str::slug($title),
            'thumbnail' => null,
            'ingredients' => implode("\n", $this->faker->sentences(6)),
            'instructions' => implode("\n", $this->faker->paragraphs(4)),
            'cooking_time' => $this->faker->numberBetween(10, 120),
            'difficulty' => $this->faker->randomElement(['easy', 'medium', 'hard']),
            'servings' => $this->faker->numberBetween(1, 8),
            'status' => $this->faker->randomElement(['draft', 'published']),
        ];
    }

    /**
     * Indicate that the recipe is published.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function published()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'published',
            ];
        });
    }
}
