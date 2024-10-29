<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // Column to store the name of the experience level
    ];

    // Define the relationship with the Mentor model
    public function MentorMusicType()
    {
        return $this->hasOne(Mentor::class);
    }
}

?>
