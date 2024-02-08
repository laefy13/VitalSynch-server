<?php

namespace Database\Factories;

use App\Models\DoctorProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Facades\Hash;
class DoctorProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DoctorProfile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'doctor_surname' => $this->faker->lastName,
            'doctor_first_name' => $this->faker->firstName,
            'doctor_mid_name' => $this->faker->firstName,
            'doctor_extn_name' => $this->faker->optional()->lastName,
            'doctor_surname' => $this->faker->lastName,
            'doctor_email' => $this->faker->unique()->safeEmail,
            'doctor_password' => Hash::make('password'), 
            'doctor_sex' => $this->faker->randomElement(['Male', 'Female']),
            'doctor_contact_number' => $this->faker->phoneNumber,
            'doctor_address' => $this->faker->address,
            'doctor_department' => $this->faker->word,
            'doctor_position' => $this->faker->word,
            'doctor_signature' => $this->faker->imageUrl(100, 50), // Example signature image URL
        ];
    }
}
