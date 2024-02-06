<?php

namespace Database\Factories;

use App\Models\PatientProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PatientProfile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->unique(true);
        $allergies = [
            1 => $this->faker->word,
            2 => $this->faker->word,
            3 => $this->faker->word,
        ];

        return [
            'ptnt_grdn_id' => null,
            'ptnt_doctor_id' => $this->faker->numberBetween(1, 10),
            'ptnt_user_id' => $this->faker->unique()->numberBetween(1, 10),
            'ptnt_surname' => $this->faker->lastName,
            'ptnt_first_name' => $this->faker->firstName,
            'ptnt_mid_name' => $this->faker->firstName,
            'ptnt_allergies' => json_encode($allergies), // Convert to JSON
            'ptnt_extn_name' => $this->faker->optional()->lastName,
            'ptnt_sex' => $this->faker->randomElement(['Male', 'Female']),
            'ptnt_birth_date' => $this->faker->date,
            'ptnt_blood_group' => $this->faker->randomElement(['A+', 'B+', 'AB+', 'O+', 'A-', 'B-', 'AB-', 'O-']),
            'ptnt_marital_status' => $this->faker->randomElement(['Single', 'Married', 'Divorced', 'Widowed']),
            'ptnt_contact_number' => $this->faker->phoneNumber,
            'ptnt_address' => $this->faker->address,
        ];
    }
}
