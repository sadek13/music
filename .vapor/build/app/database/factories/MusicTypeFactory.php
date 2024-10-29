<?php

namespace Database\Factories;

use App\Models\MusicType;
use Illuminate\Database\Eloquent\Factories\Factory;

class MusicTypeFactory extends Factory
{
    protected $model = MusicType::class;

    public function definition()
    {   
        return [
            'name' => $this->faker->word, // Random music type name
        ];
    }
}
