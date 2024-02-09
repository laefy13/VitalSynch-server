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
            'app_full_name' => "Surname Firstname",
            'app_birth_date' => now(),
            'app_address' => 'Default_Address',
            'app_contact_num' => '1234567890',
            'app_sex' => 'Male',
            'app_symptoms' => json_encode(['Default_Allergy']),
            'app_doctor_name' => 'DOC-askdbak1213',
            'app_date' => $this->faker->date,
            'app_time' => $this->faker->time,
            'app_reason' => $this->faker->text,
            'app_department' => $this->faker->randomElement(['Cardiology',
                                                            'Orthopedics',
                                                            'Radiology',
                                                            'General Medicine',
                                                            'Neurology',]),
            'app_service' => $this->faker->randomElement(['Cardiology',
                                                        'Consultation',
                                                        'Folow-up',
                                                        'Check-up',
                                                        'Treatment',
                                                        'Lab Test',]),
            'app_is_accepted'=> $this->faker->numberBetween(0,2),
            'app_reason'=> $this->faker->sentence,
            'app_patient_id' => 'PTNT-askdbak1213',
        ];
    }
}
