<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name' => fake()->words(3, true),
            'description' => fake()->paragraph(2),
            'price' => fake()->randomFloat(2, 50, 100000), 
            'duration' => fake()->numberBetween(1, 100),
            'image' => fake()->imageUrl('service', '640x480'),
            'availability' => fake()->boolean(80),
        ];
    }
}
