<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class sessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'day'=>'lundi',
            'time'=>'19:00 ,2:00'
        ];
    }
}
