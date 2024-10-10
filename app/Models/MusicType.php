<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function sessions()
    {
        return $this->belongsToMany(MusicSession::class, 'music_session');
    }

    // MusicType.php
public function mentors()
{
    return $this->belongsToMany(User::class, 'mentor_music_type');
}

}
