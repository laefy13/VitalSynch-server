<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Allergies>
 */
class AllergiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'allrgy_name' => $this->faker->word,
            'allrgy_type' => $this->faker->word,
            'allrgy_severity' => $this->faker->word,
            'allrgy_notes' => $this->faker->sentence,
        ];
    }
}
