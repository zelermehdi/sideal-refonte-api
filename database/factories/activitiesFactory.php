<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class activitiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' =>$this->faker->title(),
            'file_title' =>$this->faker->title(),
            'color' =>$this->faker->hexcolor (),
            'slots' =>$this->faker->boolean(),
            'require_approval' =>$this->faker->boolean(),
            'adult_only' =>$this->faker->boolean(),
            'kid_only' =>$this->faker->boolean(),
            'adult_sideal_value' => $this->faker->boolean(),
            'adult_out_sideal_value' =>$this->faker->boolean(),
            'kid_sideal_value' =>$this->faker->boolean(),
            'kid_out_sideal_value' =>$this->faker-> boolean(),
            'day' =>$this->faker->  dayOfWeek(),
            'starts_at' =>$this->faker-> time($format = 'H:i') ,
            'ends_at' =>$this->faker-> time($format = 'H:i'),

        ];
    }
}
