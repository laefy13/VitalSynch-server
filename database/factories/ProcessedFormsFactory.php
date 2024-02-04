<?php

namespace Database\Factories;

use App\Models\ProcessedForms;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProcessedForms>
 */
class ProcessedFormsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ProcessedForms::class;
    public function definition(): array
    {
        return [
            'form_app_queue_num' => $this->sequence(1),
            'form_appointment_date' => $this->faker->date,
            'form_appointment_time' => $this->faker->time,
            'form_reason' => $this->faker->sentence,
            'form_isaccepted' => $this->faker->boolean,
        ];
    }
}
