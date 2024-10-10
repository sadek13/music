<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicSessionsTable extends Migration
{
    public function up()
    {
        Schema::create('music_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentor_id')->constrained('users'); // Mentor's user ID
            $table->foreignId('student_id')->constrained('users'); // Student's user ID
            $table->dateTime('session_date');
            $table->integer('duration'); // Duration in minutes
            $table->foreignId('location_id')->constrained('location'); // Location's user ID
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('music_sessions');
    }
}
