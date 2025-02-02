<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *k
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'user_id' => fake()->numberBetween(1,20),
            // 'title' => fake()->title(30),
            // 'slug' => fake()->lexify('?????_????_???_??'),
            // 'desc' => fake()->text(50),
            // 'video_path' => 'default.mp4',
            // 'image_path' => ,
            // 'hours' => fake()->numberBetween(1,24),
            // 'quality' => fake()->numberBetween(233,1000),
        ];
    }
}
