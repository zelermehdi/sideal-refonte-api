<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class my_bookingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' =>$this->faker->date(),
        ];
    }
}
