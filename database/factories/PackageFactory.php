<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'package_name' => $this->faker->sentence,
            'package_location' => 'Sabah, Malaysia',
            'actual_price' => $this->faker->numberBetween(60000, 90000),
            'payable_price' => $this->faker->numberBetween(40000, 60000),
            'tags' => [
                ['icon' => '<i class="bi bi-clock"></i>', 'text' => '4 Days'],
            ],
            'infos' => [
                ['icon' => '<i class="bi bi-calendar3"></i>', 'title' => 'Duration', 'text' => $this->faker->numberBetween(2, 10).' hours'],
                ['icon' => '<i class="bi bi-people"></i>', 'title' => 'Max People', 'text' => $this->faker->numberBetween(5, 25)],
                ['icon' => '<i class="bi bi-person-lock"></i>', 'title' => 'Min Age', 'text' => '3+'],
                ['icon' => '<i class="bi bi-geo-alt"></i>', 'title' => 'Pickup', 'text' => 'Bus'],
            ],
            'images' => [
                ['url' => 'banner-'.$this->faker->numberBetween(1, 4).'.jpg', 'caption' => $this->faker->sentence],
                ['url' => 'banner-'.$this->faker->numberBetween(1, 4).'.jpg', 'caption' => $this->faker->sentence],
                ['url' => 'banner-'.$this->faker->numberBetween(1, 4).'.jpg', 'caption' => $this->faker->sentence],
                ['url' => 'banner-'.$this->faker->numberBetween(1, 4).'.jpg', 'caption' => $this->faker->sentence],
            ],
            'video' => "abc.mp4",
            'intro_text' => $this->faker->sentence,
            'body_text' => $this->faker->paragraph,
            'included_excluded' => [
                'included' => [
                    ['text' => $this->faker->sentence],
                    ['text' => $this->faker->sentence],
                    ['text' => $this->faker->sentence],
                ],
                'excluded' => [
                    ['text' => $this->faker->sentence],
                    ['text' => $this->faker->sentence],
                    ['text' => $this->faker->sentence],
                ]
            ],
            'tour_plan' => [
                ['main_title' => 'Day 1', 'sub_title' => 'Starting', 'body' => $this->faker->sentence],
                ['main_title' => 'Day 2', 'sub_title' => 'Relax', 'body' => $this->faker->sentence],
                ['main_title' => 'Day 3', 'sub_title' => 'End Tour', 'body' => $this->faker->sentence]
            ],
            'tour_map' => '34.1622000318552, -118.32116574394514',
            'meta_title' => $this->faker->sentence,
            'meta_description' => $this->faker->sentence,
        ];
    }
}
