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
        'notes',
    ];

    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function musicTypes()
    {
        return $this->belongsTo(MusicType::class, 'music_session');
    }

    

}
