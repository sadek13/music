<?php

namespace App\Http\Controllers;

use App\Models\User; // Import the User model
use App\Models\MusicType; // Import the MusicType model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MentorController extends Controller
{
    // Method to display the list of mentors
    public function index(Request $request)
    {
        // Get all distinct mentors initially
        $musicTypeName = $request->input('musicTypeName'); // For music instrument
        $minRating = $request->input('rating'); // For rating (e.g., 3)
        $minHourlyRate = $request->input('min_hourly_rate'); // Minimum hourly rate (e.g., 20)
        $maxHourlyRate = $request->input('max_hourly_rate'); // Maximum hourly rate (e.g., 50)


        $mentors = DB::table('mentor_music_type')
            ->join('music_types', 'mentor_music_type.music_type_id', '=', 'music_types.id')
            ->join('users', 'mentor_music_type.mentor_id', '=', 'users.id') // Joining users to get mentor details
            ->select('mentor_music_type.*', 'music_types.name as music_type_name', 'users.name as mentor_name',
            'users.image as pp')
            ->when($musicTypeName, function ($query) use ($musicTypeName) {
                return $query->where('mentor_music_type.name', $musicTypeName);
            })
            ->when($minRating, function ($query) use ($minRating) {
                return $query->where('mentor_music_type.review_star_rate', '>=', $minRating); // Assuming you have a rating column in users table
            })
            ->when($minHourlyRate, function ($query) use ($minHourlyRate) {
                return $query->where('mentor_music_type.hourly_rate', '>=', $minHourlyRate); // Assuming you have hourly_rate in pivot
            })
            ->when($maxHourlyRate, function ($query) use ($maxHourlyRate) {
                return $query->where('mentor_music_type.hourly_rate', '<=', $maxHourlyRate); // Assuming you have hourly_rate in pivot
            })
            ->distinct() // Ensure unique records if necessary
            ->paginate(5); // Paginate the results

        // Get all music types for the filter dropdown
        $musicTypes = MusicType::all();


        if ($mentors->isEmpty()) {
            return view('mentors.index')->with('message', 'No mentors found for the selected music types.');
        }

        // Pass the mentors and music types to the view
        return view('mentors.index', compact('mentors', 'musicTypes'));
    }
}
