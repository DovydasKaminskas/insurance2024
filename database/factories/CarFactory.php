<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reg_number'=>collect(range('A', 'Z'))->random(3)->implode('').rand(100,999),
            'brand'=>fake()->company,
            'model'=>fake()->companySuffix,
        ];
    }
}
