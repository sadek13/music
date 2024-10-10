<?php

namespace Database\Factories;

use App\Models\MusicSession;
use Illuminate\Database\Eloquent\Factories\Factory;

class MusicSessionFactory extends Factory
{
    protected $model = MusicSession::class;

    public function definition()
    {
        return [
            'student_id' => \App\Models\User::factory(),
            'mentor_id' => \App\Models\User::factory(),// Associate with a user
            'location_id' => \App\Models\Location::factory(), // Associate with a location
            'session_date' => $this->faker->dateTimeBetween('now', '+1 month'), // Random future date
            'duration' => $this->faker->numberBetween(30, 120), // Random duration in minutes
        ];
    }
}
