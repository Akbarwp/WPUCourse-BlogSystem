<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
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
            'cover_image' => null,
            'author_id' => User::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
