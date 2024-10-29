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

    public function mentor()
    {
        return $this->belongsToMany(Mentor::class, 'mentor_music_type')
        ->withPivot(['review_star_rate', 'experience_level_id', 'hourly_rate', 'description'])
                    ->withTimestamps();
    }
}
