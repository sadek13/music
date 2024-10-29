<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'mentor_id', // Mentor's user ID
        'student_id', // Student's user ID
        'session_date',
        'duration',
        'review',
        'location'

    ];

    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }


    public function musicType()
    {
        return $this->belongsTo(MusicType::class, 'music_type_id');
    }

public function location(){
    return $this->belongsTo(Location::class, 'location_id');
}

public function review(){
    return $this->hasOne(Review::class);
}

}
