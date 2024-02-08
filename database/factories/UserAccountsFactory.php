<?php

namespace Database\Factories;

use App\Models\UserAccounts;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAccounts>
 */
class UserAccountsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = UserAccounts::class;
    public function definition()
    {
        return [
            'usr_email' => $this->faker->unique()->safeEmail,
            'usr_username' => $this->faker->userName,
            'usr_password' => Hash::make('password'),
            'usr_acc_type' => $this->faker->numberBetween(1, 3), 
        ];
    }
}
