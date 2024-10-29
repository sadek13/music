<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MentorMusicTypeFactory extends Factory
{
    protected $model = \App\Models\MentorMusicType::class;

    public function definition()
    {
        return [
            'mentor_id' => \App\Models\User::factory(), // Assumes you have a User factory
            'music_type_id' => \App\Models\MusicType::factory(), // Assumes you have a MusicType factory
            'experience_level' => $this->faker->randomElement(['beginner', 'intermediate', 'advanced']),
            'description' => $this->faker->sentence(),
            'hourly_rate' => $this->faker->randomFloat(2, 20, 100), // Random hourly rate between 20 and 100
            'review_star_rate' => $this->faker->randomFloat(1, 0, 5), // Random star rating between 0 and 5
        ];
    }
}
