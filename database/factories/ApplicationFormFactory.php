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
        $this->faker->unique(true);
        return [
            'app_full_name' => $this->faker->name,
            'app_birth_date' => $this->faker->date,
            'app_address' => $this->faker->address,
            'app_contact_num' => $this->faker->phoneNumber,
            'app_sex' => $this->faker->randomElement(['Male', 'Female']),
            'app_symptoms' => $this->faker->text,
            'app_doctor_name' => $this->faker->name,
            'app_date' => $this->faker->date,
            'app_time' => $this->faker->time,
            'app_reason' => $this->faker->text,
            'app_department' => $this->faker->word,
            'app_service' => $this->faker->word,
            'app_is_accepted'=> $this->faker->numberBetween(0,2),
            'app_reason'=> $this->faker->sentence,
            'app_patient_id' => $this->faker->unique()->numberBetween(1, 10),
        ];
    }
}
