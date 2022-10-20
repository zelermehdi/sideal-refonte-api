<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class membersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
             'first_name' =>$this->faker->name(),
             'last_name' =>$this->faker->name(),
             'birthdate' => $this->faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null) // DateTime('2003-03-15 02:00:49', 'Africa/Lagos')
             ,
             'phone' =>$this->faker->phoneNumber (),
             'adresse' =>$this->faker->streetAddress(),
             'city' =>$this->faker-> state (),
             'code_postal' =>   $this->faker->postcode (),
             'currently_active'=>$this->faker->boolean (),
             'is_sideal' =>$this->faker->boolean   (),
             'is_adult' =>  $this->faker->boolean(),
            'email' => $this->faker->unique()->safeEmail(),
    
        ];
    }
}
