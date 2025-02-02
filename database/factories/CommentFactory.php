<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'body' => fake()->text(30),
            'user_id' => fake()->numberBetween(1,30),
            'commentable_id' => fake()->numberBetween(1,40),
            'commentable_type' => Video::class,
        ];
    }
}
