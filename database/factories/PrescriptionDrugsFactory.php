<?php

namespace Database\Factories;

use App\Models\PrescriptionDrugs;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PrescriptionDrugs>
 */
class PrescriptionDrugsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = PrescriptionDrugs::class;
    public function definition(): array
    {
        $this->faker->unique(true);
        return [
            'pd_prescr_id' => $this->faker->unique()->numberBetween(1, 10),
            'pd_drug_id' => $this->faker->numberBetween(1, 10),
            'pd_instruction' => $this->faker->sentence,
        ];
    }
}
