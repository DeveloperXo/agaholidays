<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'page_meta_id' => '1', // remove it
            'status' => $this->faker->randomElement(['draft', 'published']),
            'blog_title' => $this->faker->sentence,
            'intro_text' => $this->faker->paragraph,
            'blog_content' => $this->faker->text,
            'category_id' => Category::inRandomOrder()->first()->id, // Use existing category ID
            'user_id' => User::inRandomOrder()->first()->id, // Use existing user ID
            'featured_image' => $this->faker->imageUrl(),
            'tags' => json_encode([$this->faker->word, $this->faker->word]), // Example of tags as JSON
            'meta_title' => $this->faker->sentence,
            'meta_description' => $this->faker->sentence,
        ];
    }
}
