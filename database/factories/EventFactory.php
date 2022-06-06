<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => rand(1, 6),
            'title' => $this->faker->sentence(2),
            'img_banner' => $this->faker->imageUrl(1280, 600),
            'date_event' => $this->faker->dateTimeBetween('now', '+1 year'),
            'place_event' => $this->faker->sentence(1),
            'description' => $this->faker->text(400),
            'is_banner' => 0,
            'status' => 1,
        ];
    }
}
