<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => $this->faker->randomElement(['draft', 'published']),
            'category_name' => $this->faker->word,
            'intro_text' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(),
            'meta_title' => $this->faker->sentence,
            'meta_description' => $this->faker->sentence,
        ];
    }
}
