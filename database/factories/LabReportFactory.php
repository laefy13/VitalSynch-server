<?php

namespace Database\Factories;

use App\Models\LabReport;
use Illuminate\Database\Eloquent\Factories\Factory;

class LabReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LabReport::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'labrep_ptnt_id' => $this->sequence(1),
            'labrep_test_date' => $this->faker->date,
            'labrep_test_time' => $this->faker->time,
            'labrep_result' => $this->faker->sentence,
            'labrep_type' => $this->faker->word,
        ];
    }
}
