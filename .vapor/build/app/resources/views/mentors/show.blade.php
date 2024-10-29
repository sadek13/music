<x-layout>
    <section class="max-w-7xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-10">
        <!-- Mentor's Image and Basic Info -->
        <div class="flex items-start space-x-6">
            <!-- Mentor's Profile Picture -->
            <div class="w-1/4 flex-shrink-0">
                {{-- {{dump($mentor->user->image)}} --}}
                <img src="{{asset($mentor->user->image)}}" alt="Mentor Image" class="w-full rounded-lg shadow-lg">
            </div>

            <!-- Mentor's Details -->
            <div class="w-3/4">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $mentor->user->name }}</h1>

                <!-- Music Types with Pivot Data -->
                @if($mentor->musicType->isNotEmpty())
                    @foreach($mentor->musicType as $music)
                        <div class="mb-4">
                            <p class="text-gray-800 font-semibold">Music Type: {{ $music->name }}</p>
                            <p class="text-gray-600">Review Star Rate: {{ $music->pivot->review_star_rate }} stars</p>
                            <p class="text-gray-600">Description: {{ $music->pivot->description }}</p>
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-600">No music types available.</p>
                @endif

                <!-- Display Overall Rating (Assumed) -->
                <div class="flex items-center mb-4">
                    <span class="text-yellow-400 font-semibold text-xl">
                        @for ($i = 0; $i < 5; $i++)
                            {{ $i < $mentor->musicType[0]->pivot->review_star_rate ? '★' : '☆' }}
                        @endfor
                    </span>
                    <span class="ml-3 text-sm text-gray-500">
                        ({{ $mentor->musicType[0]->pivot->review_star_rate }} Stars)
                    </span>
                </div>

                <!-- Experience Levels -->
                <p class="text-gray-800 font-semibold mb-2">Experience Level:</p>
                @if($mentor->experienceLevel->isNotEmpty())
                    @foreach($mentor->experienceLevel as $experience)
                        <p class="text-gray-600">{{ $experience->name }}</p>
                    @endforeach
                @else
                    <p class="text-gray-600">No experience levels available.</p>
                @endif

                <!-- Hourly Rate -->
                <p class="text-gray-800 font-semibold mb-4">
                    Hourly Rate: ${{ $mentor->musicType[0]->pivot->hourly_rate }}/hr
                </p>

                <!-- Contact and Reserve Buttons -->
                <div class="flex space-x-4 mt-4">
                    <a href="https://wa.me/{{ $mentor->phone }}"
                       class="px-6 py-2 bg-green-500 text-white rounded-md hover:bg-green-400"
                       target="_blank">
                        WhatsApp
                    </a>
                    <button id="reserveBtn"
                       class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-500">
                        Reserve a Session
                    </button>
                </div>
            </div>
        </div>

        <!-- Mentor's Availability -->
        {{-- Uncomment this section if you want to show availability
        <div class="mt-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Availability</h2>
            <p class="text-gray-600">This mentor is available on the following days:</p>
            <div class="grid grid-cols-2 gap-4 mt-4">
                @if($mentor->availability->isNotEmpty())
                    @foreach($mentor->availability as $day)
                        <span class="px-4 py-2 bg-gray-100 rounded-md">{{ ucfirst($day) }}</span>
                    @endforeach
                @else
                    <p class="text-gray-600">No availability information.</p>
                @endif
            </div>
        </div>
        --}}

        <!-- Other Information -->
        {{-- Uncomment this section if you want to show specializations
        <div class="mt-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Specializations</h2>
            <p class="text-gray-600">
                {{ implode(', ', $mentor->specializations) }}
            </p>
        </div>
        --}}

    </section>

<x-modal-two>

</x-modal-two>

</x-layout>
<!-- Include Flatpickr CSS -->


<script>

$(document).ready(function() {
    // Show modal on button click
    $('#reserveBtn').on('click', function() {
        $('#reservationModal').removeClass('hidden');
    });

    // Close modal on close button click
    $('#closeModal').on('click', function() {
        $('#reservationModal').addClass('hidden');
    });

    // Close modal when overlay is clicked
    $('#reservationModal').on('click', function(e) {
        if ($(e.target).is('#reservationModal')) {
            $(this).addClass('hidden');
        }
    });


// JavaScript: Initialize Flatpickr
flatpickr("#availabilityDate", {
    
    enableTime: true, // Enable time selection
    dateFormat: "Y-m-d G:i", // Date format: Year-Month-Day Hour:Minute
    minDate: "today", // Disable past dates

    disable: [
        function(date) {
            // Custom logic to disable unavailable dates
            return date.getDay() === 0; // Disable Sundays as an example
        }
    ],
    onChange: function(selectedDates, dateStr, instance) {
        console.log("Selected date:", dateStr);
        // Additional logic based on selected date
    }
});



});

</script>
