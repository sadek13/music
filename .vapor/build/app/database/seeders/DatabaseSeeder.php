<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            MusicSessionsTableSeeder::class,
            ReviewsTableSeeder::class,
            MusicTypesTableSeeder::class,
            LocationsTableSeeder::class,
            MentorScheduleSeeder::class
        ]);
    }
}


