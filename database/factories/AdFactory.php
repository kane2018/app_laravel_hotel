<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'title' => fake()->sentence,
            'introduction' => fake()->paragraph(2),
            'content' => '<p>'. join('</p><p>', fake()->paragraphs(5)).'</p>',
            'rooms' => mt_rand(1, 5),
            'price' => mt_rand(50, 200),
            'cover_image' => fake()->imageUrl(1000, 350)
        ];
    }
}
