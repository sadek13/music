<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    // Define the relationship with the MusicType model
        public function musicType()
    {
        return $this->belongsToMany(MusicType::class, 'mentor_music_type')
        ->withPivot(['review_star_rate', 'experience_level_id', 'hourly_rate', 'description'])
        ->withTimestamps(); // Optional if you have timestamps}

    }

    public function experienceLevel()
{
    return $this->hasManyThrough(ExperienceLevel::class, MentorMusicType::class, 'mentor_id', 'id', 'id', 'experience_level_id');
}

    public function musicSession()
    {
        return $this->belongsToMany(MusicSession::class,''); // User can have multiple sessions
    }


    // Mentor.php

}
?>
