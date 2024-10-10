<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MusicSession;

class MusicSessionsTableSeeder extends Seeder
{
    public function run()
    {
        MusicSession::factory()->count(20)->create(); // Create 20 sessions
    }
}
