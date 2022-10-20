<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class creditsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'adult_sideal_value' => $this->faker->boolean(),
            'adult_out_sideal_value' =>$this->faker->boolean(),
            'kid_sideal_value' =>$this->faker->boolean(),
            'kid_out_sideal_value' =>$this->faker-> boolean(),
            'reduction' =>$this->faker->randomDigit(),
        ];
    }
}
