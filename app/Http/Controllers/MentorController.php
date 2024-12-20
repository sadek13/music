<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MusicType;
use App\Models\MentorMusicType; // Make sure to include the relevant model
use App\Models\Mentor; // Make sure to include the relevant model
use Illuminate\Http\Request;

class MentorController extends Controller
{
    // Method to display the list of mentors
    public function index(Request $request)
    {
        $mentors = $this->getMentors($request);
        $musicTypes = MusicType::all();
        $availableDays = $request->input('availableDays', []);

        $message = "";

        // Filter mentors based on available days
        if ($availableDays && is_array($availableDays) && !empty($availableDays)) {
            $mentors = $mentors->filter(function ($mentor) use ($availableDays) {
                $availability = json_decode($mentor->schedule, true);

                // Check if any of the requested available days are true in the availability
                return collect($availableDays)->contains(function ($day) use ($availability) {
                    return isset($availability[$day]) && $availability[$day]['available'];
                });
            });
        }

        $message = $mentors->isEmpty() ? 'No mentors found' : '';


        return view('mentor.browse-mentors', compact('mentors', 'musicTypes', 'message', 'request'));
    }


    public function show($mentorId, $musicTypeId)
    {
        // Retrieve the mentor with specified ID and eager load related data, filtering by the specific music type
        $mentor = Mentor::with(['user', 'musicType', 'experienceLevel'])
            ->where('mentors.id', $mentorId)  // Specify the table for the ID
            ->whereHas('musicType', function ($query) use ($musicTypeId) {
                $query->where('music_type_id', $musicTypeId); // Specify the table for the ID
            })
            ->firstOrFail();

        $otherMentors = Mentor::with(['user', 'musicType', 'experienceLevel'])
            ->whereHas('musicType', function ($query) use ($musicTypeId) {
                $query->where('music_type_id', $musicTypeId); // Specify the table for the ID
            })
            ->where('mentors.id', '!=', $mentorId) // Exclude the current mentor
            ->get();

        // dump($otherMentors);

        // Retrieve the specific music type
        $musicType = $mentor->musicType->firstWhere('id', $musicTypeId); // Get the first music type for the mentor

        $mentorSchedule = json_decode($mentor->schedule, true); // Con

        // dump($mentorSchedule);
        // $this->fetchAvailableDates($mentorId);

        // Pass the variables to the view
        return view('mentor.mentor-details', compact('mentor', 'musicType', 'otherMentors','mentorSchedule'));
    }




    protected function getMentors(Request $request)
    {
        $query = MentorMusicType::query()
            ->join('music_types', 'mentor_music_type.music_type_id', '=', 'music_types.id')
            ->join('mentors', 'mentor_music_type.mentor_id', '=', 'mentors.id')
            ->join('users', 'mentors.user_id', '=', 'users.id')
            ->join('experience_levels', 'mentor_music_type.experience_level_id', '=', 'experience_levels.id')
            ->select(
                'mentor_music_type.*',
                'music_types.name as music_type_name',
                'users.name as mentor_name',
                'users.image as pp',
                'experience_levels.name as experience_level',
                'mentors.schedule',
                'mentors.id'
            );

            // dump($query);
        // Apply filters based on request inputs
        if ($experienceLevel = $request->input('experience_level')) {
            if ($experienceLevel !== 'Any') {
                $query->where('experience_levels.name', $experienceLevel);
            }
        }

        if ($musicTypeName = $request->input('musicTypeName')) {
            $query->where('music_types.name', $musicTypeName);
        }

        if ($minRating = $request->input('rating')) {
            $query->where('mentor_music_type.review_star_rate', '>=', $minRating);
        }

        if ($minHourlyRate = $request->input('min_hourly_rate')) {
            $query->where('mentor_music_type.hourly_rate', '>=', $minHourlyRate);
        }

        if ($maxHourlyRate = $request->input('max_hourly_rate')) {
            $query->where('mentor_music_type.hourly_rate', '<=', $maxHourlyRate);
        }

        return $query->orderBy('mentor_music_type.review_star_rate', 'desc')->get();
    }

    public function fetchAvailableDates($mentorId)
    {

        $schedule = Mentor::where('id', $mentorId)->value('schedule');

        dump($schedule);
    }
}
