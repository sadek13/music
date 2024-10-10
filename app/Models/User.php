<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',        // User's name
        'email',       // User's email address
        'password',    // User's password
        'role',        // Role of the user (mentor or student)
    ];

    protected $hidden = [
        'password',    // Password will be hidden from array and JSON representations
        'remember_token', // Token for "remember me" functionality
    ];

    protected $casts = [
        'email_verified_at' => 'datetime', // Casting to date type
    ];

    // Define relationships with other models
    public function sessions()
    {
        return $this->hasMany(MusicSession::class); // User can have multiple sessions
    }

    public function reviews()
    {
        return $this->hasMany(Review::class); // User can have multiple reviews
    }

    // Mentor.php
    public function musicTypes()
    {
        return $this->belongsToMany(MusicType::class, 'mentor_music_type', 'mentor_id', 'music_type_id');
    }


}
