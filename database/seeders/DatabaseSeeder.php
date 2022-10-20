<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\PlateformLogs;
use App\Models\members;
use App\Models\my_bookings;
use App\Models\activities;
use App\Models\credits;
use App\Models\session;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        PlateformLogs::factory(5)->create();
        members::factory(5)->create();
    my_bookings::factory(5)->create();
    activities::factory(5)->create();
    credits::factory(5)->create();
session::factory(5)->create();
        
    }
}
