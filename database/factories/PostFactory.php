<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->sentence();
        $genere = [
            'Poesia',
            'Racconto',
            'Articolo',
            'Saggio'
        ];

        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . Str::random(5),
            'excerpt' => $this->faker->paragraph(),
            'content' => $this->faker->paragraphs(5, true),
            'cover_image' => null,
            'genere' => $this->faker->randomElement($genere),
            'published' => $this->faker->boolean(70),
        ];
    }
}
