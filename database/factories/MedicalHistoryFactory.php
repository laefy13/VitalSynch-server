<?php

namespace Database\Factories;

use App\Models\MedicalHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicalHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MedicalHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'medhis_ptnt_id' => $this->sequence(1),
            'medhis_record_date' => $this->faker->date,
            'medhis_record_time' => $this->faker->time,
            'medhis_height' => $this->faker->randomFloat(2, 150, 200), // Adjust the range as needed
            'medhis_weight' => $this->faker->randomFloat(2, 40, 150), // Adjust the range as needed
            'medhis_blood_pressure' => $this->faker->randomFloat(2, 80, 180), // Adjust the range as needed
            'medhis_glucose' => $this->faker->randomFloat(2, 60, 200), // Adjust the range as needed
            'medhis_illness' => $this->faker->sentence,
        ];
    }
}
