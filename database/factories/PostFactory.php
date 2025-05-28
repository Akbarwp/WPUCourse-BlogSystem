<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(rand(7, 11)),
            'body' => fake()->paragraph(rand(4, 7), false),
            'cover_image' => "https://source.unsplash.com/random/500×500/?code,art,laravel",
        ];
    }
}
