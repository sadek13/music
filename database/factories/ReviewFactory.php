<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition()
    {
        return [
            'music_session_id' => \App\Models\MusicSession::factory(), // Associate with a session
            'rating' => $this->faker->numberBetween(1, 5), // Random rating between 1 and 5
            'comment' => $this->faker->text(200), // Random comment
        ];
    }
}
