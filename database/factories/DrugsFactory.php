<?php

namespace Database\Factories;
use App\Models\Drugs;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Drugs>
 */
class DrugsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Drugs::class;
    public function definition()
    {
        return [
            'drug_name' => $this->faker->word,
            'drug_description' => $this->faker->sentence,
        ];
    }
}
