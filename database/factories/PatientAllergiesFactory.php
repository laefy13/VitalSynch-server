<?php

namespace Database\Factories;

use App\Models\PatientAllergies;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PatientAllergies>
 */
class PatientAllergiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = PatientAllergies::class;
    public function definition(): array
    {
        $this->faker->unique(true);
        return [
            'pa_ptnt_id' => $this->faker->unique()->numberBetween(1, 10),
            'pa_allrgy_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
