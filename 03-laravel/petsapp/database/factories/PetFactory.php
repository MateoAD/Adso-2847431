<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $kind = fake()->randomElements(['dog', 'cat', 'bird', 'fish', 'mouse']);
        return [
            'name'  => fake()->domainWord(),
            'kind' => implode($kind),
            'weight' => fake()->numberBetween(1, 80),
            'age' => fake()->randomNumber(2, true),
            'breed' => fake()->colorName(),
            'location' => fake()->city(),
            'description' => implode(" ", fake()->sentences(10)),
            'created_at' => now()
        ];
    }
}
