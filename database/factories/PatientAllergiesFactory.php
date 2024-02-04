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
        return [
            'pa_ptnt_id' => $this->sequence(1),
            'pa_allrgy_id' => $this->sequence(1),
        ];
    }
}
