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
        return [
            'pd_prescr_id' => $this->sequence(1),
            'pd_drug_id' => $this->sequence(1),
            'pd_instruction' => $this->faker->sentence,
        ];
    }
}
