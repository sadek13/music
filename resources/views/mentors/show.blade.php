<x-layout>
    <div class=" flex justify-between">
        <div class="w-3/4">
    <section class="max-w-7xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-10">
        <!-- Mentor's Image and Basic Info -->
        <div class="flex items-start space-x-6">
            <!-- Mentor's Profile Picture -->
            <div class="w-1/4 flex-shrink-0">
                {{-- {{dump($mentor->user->image)}} --}}
                <img src="{{asset($mentor->user->image)}}" alt="Mentor Image" class="w-full rounded-lg shadow-lg">
            </div>

            <!-- Mentor's Details -->
            <div class="w-2/3">
                <div class="flex">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $mentor->user->name }}</h1>
                  <span class="ml-3 mt-3"> <h2 class="text-gray-800 font-semibold"> {{ $musicType->name }}</h2></span>

                </div>

                <!-- Music Types with Pivot Data -->
                <div class="mb-4">
                    <p class="text-gray-600">{{ $musicType->pivot->description }}
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus corporis quasi, provident placeat rem, in alias eos minus reiciendis veritatis optio consectetur libero autem enim temporibus maiores dicta debitis id.
                    </p>
                </div>

                <!-- Display Overall Rating (Assumed) -->
                <div class="flex items-center mb-4">
                    <span class="text-yellow-400 font-semibold text-xl">
                        @for ($i = 0; $i < 5; $i++)
                            {{ $i < $musicType->pivot->review_star_rate ? '★' : '☆' }}
                        @endfor
                    </span>
                    <span class="ml-3 text-sm text-gray-500">
                        ({{ $musicType->pivot->review_star_rate }} Stars)
                    </span>
                </div>

                <!-- Experience Levels -->
                <p class="text-gray-800 font-semibold mb-2">Experience Level: <span class="text-gray-600">{{ $mentor->experienceLevel[0]->name }}</span></p>


                <!-- Hourly Rate -->
                <p class="text-gray-800 font-semibold mb-4">
                    Hourly Rate: ${{ $musicType->pivot->hourly_rate }}/hr
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

        <div class="w-1/3">
            sass
        </div>
    </div>


{{--
       Mentor's Availability
      Uncomment this section if you want to show availability
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


         Other Information
 Uncomment this section if you want to show specializations
        <div class="mt-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Specializations</h2>
            <p class="text-gray-600">
                {{ implode(', ', $mentor->specializations) }}
            </p>
        </div> --}}


    </section>

    <section class="my-[32px]">
        <h1 class="text-2xl font-bold text-gray-900 mb-2 mt-3">Other <span class="text-3xl font-bold">{{$musicType->name}}</span> Mentors</h1>

        <!-- Horizontal scroll container -->
        <div class="overflow-x-auto">
            <div class="flex space-x-6">
                @for ($i = 0; $i < count($otherMentors); $i++)
                    @php $currentMusicType = $otherMentors[$i]->musicType[0]; @endphp

                    <!-- Mentor Card -->
                    <div class="flex-none bg-white shadow-lg rounded-lg p-4 w-72">

                        <!-- Mentor Image -->
                        <div class="w-full">
                            <a href="{{ route('mentors.show', ['mentor' => $otherMentors[$i]->id, 'musicType' => $currentMusicType->id]) }}">
                                <img src="{{ asset($otherMentors[$i]->user->image) }}" alt="Mentor Pic" class="rounded-lg w-full">
                            </a>
                        </div>

                        <!-- Mentor Content -->
                        <div class="pt-2">
                            <div class="flex justify-between items-center">
                                <!-- Mentor Name -->
                                <div class="flex-col">
                                    <h1 class="text-xl font-bold text-gray-900 mb-2">{{ $otherMentors[$i]->user->name }}</h1>
                                  <span class="ml-3 mt-3"> <h2 class="text-gray-800 font-semibold"> {{ $musicType->name }}</h2></span>

                                </div>
                                <!-- Hourly Rate -->
                                <span class="text-sm text-gray-500">${{ $currentMusicType->pivot->hourly_rate }}/hr</span>
                            </div>

                            <!-- Mentor Description -->
                            <p class="text-sm text-gray-700 mt-2">
                                {{ Str::limit('This is a brief description of Mentor ' . ($i + 1) . '. They have various skills and experience in their field.', 100) }}
                            </p>

                            <!-- Rating -->
                            <div class="flex justify-end items-start mt-2">
                                <span class="text-yellow-400 font-semibold">
                                    @for ($j = 0; $j < 5; $j++)
                                        {{ $j < $currentMusicType->pivot->review_star_rate ? '★' : '☆' }}
                                    @endfor
                                </span>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>


    <section class="my-[32px]">
        <h1 class="text-xl font-bold text-gray-900 mb-2 mt-3"> <span class="text-3xl font-bold">{{$mentor->user->name}}</span> Teaches Other Intsruments</h1>
        <div class="overflow-x-auto">
         <div class="flex space-x-6">
             @for ($i = 0; $i < count($mentor->musicType); $i++) <!-- Generate 10 mentor cards -->
             @php $currentMusicType = $mentor->musicType[$i]; @endphp

             @php $currentMusicType = $mentor->musicType[$i]; @endphp

             @if($currentMusicType->name !== $musicType->name)

                 <!-- Mentor List Item -->
                 <div class="flex-none bg-white shadow-lg rounded-lg p-4 w-72">
                     <!-- Left Image (1/3 width) -->
                     <div class="w-full">
                         <a href="{{ route('mentors.show', ['mentor' => $mentor->id, 'musicType' => $currentMusicType->id]) }}">
                             <img src="{{ asset($mentor->user->image) }}" alt="Mentor Pic" class="rounded-lg w-full">
                         </a>
                     </div>

                     <!-- Right Content -->
                     <div class="pt-2">
                         <div class="flex justify-between items-center">
                             <!-- Mentor Name -->
                             <h3 class="text-xl font-bold text-gray-900">{{ $currentMusicType->name }}</h3>
                             <!-- Hourly Rate -->
                             <span class="text-sm text-gray-500">${{ $currentMusicType->pivot->hourly_rate }}/hr</span>
                         </div>

                         <!-- Mentor Description -->
                         <p class="text-sm text-gray-700 mt-2">
                             {{ Str::limit('This is a brief description of Mentor ' . ($i + 1) . '. They have various skills and experience in their field.', 100) }}
                         </p>

                         <!-- Rating (Top Right) -->
                         <div class="flex justify-end items-start mt-2">
                             <span class="text-yellow-400 font-semibold">
                                 @for ($j = 0; $j < 5; $j++)
                                     {{ $j < $currentMusicType->pivot->review_star_rate ? '★' : '☆' }}
                                 @endfor
                             </span>
                         </div>

                         <!-- Experience Level (Optional) -->
                         @if(isset($mentor->experienceLevel[$i]))
                             <div class="flex justify-end mt-5 font-bold">
                                 <span>{{ $mentor->experienceLevel[$i]->name }}</span>
                             </div>
                         @endif
                     </div>
                 </div>

             @endif


             @endfor
         </div>
     </div>

     </section>

<x-modal-two>

</x-modal-two>

        </div>

        {{-- reservartion section --}}
        <div class=" bg-white mt-16 ml-5 px-[92px] flex justify-between h-screen">
            <div class='flex-col justify-between  mx-auto  mt-5'>
                <label for="daySelectFlatPickr" class="font-bold">Select A Day</label>
                <br>
                <input type="date" id='daySelectFlatPickr'>
                </div>
            </div>
        </div>
    </div>
</x-layout>
<!-- Include Flatpickr CSS -->


<script>



$(document).ready(function() {

    //falt
const dateInput = $('#daySelectFlatPickr'); // Get the input element

 flatpickr(dateInput, {
    dateFormat: "Y-m-d",
    onChange: function(selectedDates, dateStr, instance) {
        console.log('Day clicked:', dateStr); // Log the selected date when clicked
    }
});





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



// Initialize Flatpickr


// Open the calendar immediately after initialization
    // })
    //     // Send the AJAX request when the input is clicked (on focus)
    //     $.ajax({
    //         url: '/mentors', // Adjust route if needed
    //         method: 'GET',
    //         data: {
    //             action: 'fetchUnavailableDates',

    //         },
    //         success: function(response) {
    //             // Initialize Flatpickr with disabled dates
    //             flatpickr('#daySelectFlatPickr', {
    //                 dateFormat: "Y-m-d",
    //                 disable: response.unavailableDates || [], // Disable dates from response
    //             });
    //         },
    //         error: function() {
    //             alert('Failed to load unavailable dates.');
    //         }
    //     });
    });


</script>