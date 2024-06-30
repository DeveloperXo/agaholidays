<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PageMeta>
 */
class PageMetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'page_title' => 'Packages',
            'page_meta_title' => $this->faker->sentence,
            'page_meta_description' => $this->faker->paragraph,
            'page_url' => '/packages',
            'page_name' => 'packages_page',
            'banner_title' => 'Packages',
            'banner_text' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. ',
            'banner_image' => 'banner-4.jpg',
        ];
    }
}
