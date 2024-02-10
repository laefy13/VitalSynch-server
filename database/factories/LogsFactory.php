<?php

namespace Database\Factories;

use App\Models\Logs;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Logs>
 */
class LogsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Logs::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'log_usr_username' => $this->faker->userName,
            'log_app_queue_num' => $this->faker->randomNumber(),
            'log_action' => $this->faker->sentence,
        ];
    }
}
