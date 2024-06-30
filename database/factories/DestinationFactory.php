<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destination>
 */
class DestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'page_meta_id' => 1,
            'title' => $this->faker->sentence,
            'text' => $this->faker->paragraph,
            'overview' => $this->faker->paragraph,
            'info' => $this->faker->paragraph,
            'tour_details' => [
                ['title' => 'Tour Type', 'text' => 'Impression'],
                ['title' => 'Price', 'text' => '$300 - 500'],
                ['title' => 'Capital', 'text' => 'Bridgetown'],
                ['title' => 'Language', 'text' => 'English'],
                ['title' => 'Currency', 'text' => 'Euro'],
                ['title' => 'Time Zone', 'text' => 'UTC-4'],
                ['title' => 'Drives on the', 'text' => 'Left'],
                ['title' => 'Calling code', 'text' => '+1 -246'],
            ],
            'map' => '34.1622000318552, -118.32116574394514',
            'images' => [
                ['url' => 'banner-'.$this->faker->numberBetween(1, 4).'.jpg', 'caption' => $this->faker->sentence],
                ['url' => 'banner-'.$this->faker->numberBetween(1, 4).'.jpg', 'caption' => $this->faker->sentence],
                ['url' => 'banner-'.$this->faker->numberBetween(1, 4).'.jpg', 'caption' => $this->faker->sentence],
                ['url' => 'banner-'.$this->faker->numberBetween(1, 4).'.jpg', 'caption' => $this->faker->sentence],
            ],
        ];
    }
}
