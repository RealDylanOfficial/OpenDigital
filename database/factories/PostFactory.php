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
    public function definition()
    {
        return [
            //
            "title" => fake()->words(3, true),
            "download_count" => fake()->numberBetween(0, 100000),
            "file_ext" => "",
            "content_type" => "",
            "description" => fake()->words(50, true)

        ];
    }
}
