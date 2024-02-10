<?php

namespace Database\Factories;

use App\Models\GuardianProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuardianProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GuardianProfile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'grdn_surname' => $this->faker->lastName,
            'grdn_first_name' => $this->faker->firstName,
            'grdn_mid_name' => $this->faker->firstName,
            'grdn_extn_name' => $this->faker->optional()->lastName,
            'grdn_sex' => $this->faker->randomElement(['Male', 'Female']),
            'grdn_birth_date' => $this->faker->date,
            'grdn_blood_group' => $this->faker->randomElement(['A+', 'B+', 'AB+', 'O+', 'A-', 'B-', 'AB-', 'O-']),
            'grdn_marital_status' => $this->faker->randomElement(['Single', 'Married', 'Divorced', 'Widowed']),
            'grdn_contact_number' => $this->faker->phoneNumber,
            'grdn_address' => $this->faker->address,
        ];
    }
}
