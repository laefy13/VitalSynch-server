<?php

namespace Database\Factories;

use App\Models\ApplicationForm;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApplicationForm>
 */
class ApplicationFormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ApplicationForm::class;
    public function definition()
    {
        return [
            'app_queue_num' => $this->faker->unique()->randomNumber(),
            'app_full_name' => $this->faker->name,
            'app_department' => $this->faker->word,
            'app_service' => $this->faker->word,
            'app_email' => $this->faker->unique()->safeEmail,
            'app_date' => $this->faker->date,
            'app_time' => $this->faker->time,
            'app_patient_id'=> $this->faker->numberBetween(1, 10),
            'app_doctor_id'=> $this->faker->numberBetween(1, 10),
            'app_is_accepted'=> $this->faker->numberBetween(0,2),
            'app_reason'=> $this->faker->sentence,
        ];
    }
}
