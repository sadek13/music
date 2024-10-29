<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationsTableSeeder extends Seeder
{
    public function run()
    {
        Location::factory()->count(10)->create(); // Create 10 locations
    }
}

