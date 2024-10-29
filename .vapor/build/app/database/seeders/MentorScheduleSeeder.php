<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MentorScheduleSeeder extends Seeder
{
    public function run()
    {
        // Fetch all mentor IDs from the users table (adjust role if necessary)
        $mentors = DB::table('users')->where('role', 'mentor')->pluck('id');

        foreach ($mentors as $mentorId) {
            // Generate a schedule for the mentor
            $schedule = $this->generateSchedule();

            DB::table('mentor_schedules')->insert([
                'mentor_id' => $mentorId,
                'schedule' => json_encode($schedule),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function generateSchedule()
    {
        // Days of the week
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $schedule = [];

        foreach ($days as $day) {
            // Randomly decide if the mentor is available on this day
            if (rand(0, 1)) { // 50% chance the mentor is available on a given day
                $timeSlots = $this->generateTimeSlots();
                $schedule[$day] = $timeSlots;
            } else {
                $schedule[$day] = []; // No availability for the day
            }
        }

        return $schedule;
    }

    private function generateTimeSlots()
    {
        $timeSlots = [];
        $numberOfSlots = rand(1, 3); // Mentor can have 1 to 3 time slots per day

        for ($i = 0; $i < $numberOfSlots; $i++) {
            // Generate start and end times
            $startHour = rand(8, 18); // Between 8am and 6pm
            $duration = rand(1, 3); // 1 to 3 hours
            $endHour = $startHour + $duration;

            // Format the times properly
            $startTime = sprintf('%02d:00', $startHour);
            $endTime = sprintf('%02d:00', $endHour);

            $timeSlots[] = [
                'start_time' => $startTime,
                'end_time' => $endTime,
            ];
        }

        return $timeSlots;
    }
}
