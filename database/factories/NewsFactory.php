<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(5),
            'content' => $this->faker->sentences(10, true),
            'image' => $this->faker->imageUrl(),
            'author' => $this->faker->firstName(),
            'status' => array_values(News::STATUSES)[rand(0, 2)],
            'category_id' => 1,
            'source_id' => 1
        ];
    }
}
