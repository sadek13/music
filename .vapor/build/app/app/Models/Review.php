<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'music_session_id',
        'rating',
        'comment',
    ];

    public function musicSession()
    {
        return $this->belongsTo(MusicSession::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function mentor()
    {
        return $this->belongsTo(User::class,'mentor_id');
    }


}
