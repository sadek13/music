<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorMusicType extends Model
{
    use HasFactory;

    protected $table = 'mentor_music_type'; // Specify the table name if it doesn't follow Laravel's naming conventions

    // Fillable properties to allow mass assignment
    protected $fillable = [
        'mentor_id',
        'music_type_id',
        'experience_level',
        'description',
        'hourly_rate',
        'review_star_rate',
    ];

    // Define the relationships
    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function musicType()
    {
        return $this->belongsTo(MusicType::class, 'music_type_id');
    }
}
