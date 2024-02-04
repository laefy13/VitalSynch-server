<?php

namespace Database\Factories;

use App\Models\Prescription;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrescriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Prescription::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'prescr_ptnt_id' => $this->sequence(1),
            'prescr_doctor_id' => $this->sequence(1),
            'prescr_date' => $this->faker->date,
            'prescr_time' => $this->faker->time,
        ];
    }
}
