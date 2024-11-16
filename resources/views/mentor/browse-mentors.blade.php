<x-layout>

    <div class=" flex py-8">
        <!-- Filters Section -->
        <div class="flex ">
            <!-- Filter Section -->
            <div class="w-full bg-gray-100 p-4 flex mr-5 ">
                <!-- Subsection for Hourly Rate -->

                <div class="w-1/3 mr-5">
                    <form method="POST" action="{{ route('mentors.index') }}">
                        @csrf
                        <h4 class="space-x-5 font-bold">Search</h4>
                        <input
                            name="musicTypeName"
                            type="text"
                            id="instrumentSearch"
                            placeholder="Type an instrument..."
                            class="border rounded p-2 w-full"
                            value="{{request('musicTypeName')}}"

                             />
                        <div id="instrumentDropdown" class="absolute bg-white border mt-1 rounded shadow-lg hidden wiw">
                            <!-- Dropdown items will be populated dynamically -->
                        </div>
                        <hr class="border-gray-300 my-2 mx-auto my-5" style="width: 50%;" />

                        <div class="mb-5">
                            <h4 class="font-bold">Hourly Rate</h4>
                            <div class="flex items-center">
                                <input
                                    name="min_hourly_rate"
                                    type="number"
                                    placeholder="Min"
                                    min="5"
                                    class="border rounded p-2 w-24"
                                    value="{{ request('min_hourly_rate', 5) }}" />
                                <span class="mx-2">to</span>
                                <input
                                    name="max_hourly_rate"
                                    type="number"
                                    placeholder="Max"
                                    max="50"
                                    class="border rounded p-2 w-24"
                                    value="{{ request('max_hourly_rate', 50) }}" />
                            </div>
                            <hr class="border-gray-300 my-2 mx-auto my-5" style="width: 50%;" />
                        </div>

                        <div class="mb-5">
                            <h4 class="font-bold m-3">Experience Level</h4>
                            <select name="experience_level" id="experience_level">
                                <option value="Any" {{ request('experience_level') == 'Any' ? 'selected' : '' }}>Any</option>
                                <option value="Beginner" {{ request('experience_level') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                                <option value="Advanced" {{ request('experience_level') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                                <option value="Professional" {{ request('experience_level') == 'Professional' ? 'selected' : '' }}>Professional</option>
                            </select>
                            <hr class="border-gray-300 my-2 mx-auto my-5" style="width: 50%;" />
                        </div>

                        <div class="mb-5 ml-[33px]">
                            <h4 class="font-bold">Rating</h4>
                            <div>
                                @for ($i = 1; $i <= 5; $i++)

                                    <label>
                                        <input
                                            type="radio"
                                            name="rating"
                                            value="{{ $i }}"
                                            class="mr-2"
                                            {{ request('rating') == $i ? 'checked' : '' }} />
                                            {{ $i }}{{ $i < 5 ? '+' : '' }}
                                    </label>
                                    <br>
                                @endfor
                            </div>
                            <hr class="border-gray-300 my-2 mx-auto my-5" style="width: 50%;" />

                            <h4 class="font-bold">Availability</h4>

                            <div class="radio-group mt-3">
                                <!-- Option 1: Any -->
                                <label>
                                    <input
                                        type="radio"
                                        name="availability"
                                        value="any"
                                        {{ request('availability') === 'any' ? 'checked' : '' }}
                                        onclick="toggleDateFilter(false)"> Any
                                </label>
                                <br>

                                <!-- Option 2: Choose -->
                                <label>
                                    <input
                                        type="radio"
                                        name="availability"
                                        value="choose"
                                        {{ request('availability') === 'choose' ? 'checked' : '' }}
                                        onclick="toggleDateFilter(true)"> Choose:
                                </label>
                                <br>

                                <!-- Option 3: Available Now -->
                                <label>
                                    <input
                                        type="radio"
                                        name="availability"
                                        value="available_now"
                                        {{ request('availability') === 'available_now' ? 'checked' : '' }}
                                        onclick="toggleDateFilter(false)"> Available Now
                                </label>
                            </div>

                            <!-- Date Filter Table (Shown only when "Choose" is selected) -->
                            <div id="date-filter" class="m-4" style="display: none;">
                                <!-- HTML: Date input field -->
<x-dates>   </x-dates>



                            </div>

                        </div>

                        <!-- Subsection for Instrument Search -->
                        <x-href-blue-button href="/mentors" type="submit">Apply</x-href-blue-button>
                    </form>

            <!-- Main Content Area (Placeholder) -->
            <div class="w-3/4 p-4">
                <!-- Your content goes here -->
            </div>
        </div>

        <!-- Mentors List Section -->


        @if($mentors->isEmpty())

    <div class="alert alert-warning">
{{$message}}
    </div>


    @else


        <section class="w-full lg:w-3/4 lg:ml-4 ml-5">
            <h2 class="text-2xl font-bold mb-4">Mentors List</h2>
            <div class="space-y-6">
                @foreach($mentors as $mentor)
                    <!-- Mentor List Item -->
                    <div class="flex items-center bg-white shadow-lg rounded-lg p-4">
                        <!-- Left Image (1/3 width) -->
                        <div class="w-1/3">
                            <a href="{{ route('mentors.show', ['mentor' => $mentor->id, 'musicType' => $mentor->music_type_id]) }}">
                                <img src="{{$mentor->pp }}" alt="pic" class="rounded-lg w-full">
                            </a>

                        </div>

                        <!-- Right Content (2/3 width) -->
                        <div class="w-2/3 pl-4">
                            <div class="flex justify-between items-center">
                                <!-- Mentor Name -->
                                <div class="flex">
                                <h3 class="text-xl font-bold text-gray-900">{{ $mentor->mentor_name }}</h3>
                                <span class="text-sm ml-3 mt-1  ">{{$mentor->music_type_name}}</span>
                                </div>
                                <!-- Hourly Rate -->

                                <span class="text-sm text-gray-500">${{ $mentor->hourly_rate }}/hr</span>
                            </div>

                            <!-- Mentor Description -->
                            <p class="text-sm text-gray-700 mt-2">
                                {{ Str::limit($mentor->description, 100) }}
                            </p>

                            <!-- Rating (Top Right) -->
                            <div class="flex justify-end items-start mt-2">
                                <span class="text-yellow-400 font-semibold">
                                    @for ($i = 0; $i < 5; $i++)

                                        {{ $i < $mentor->review_star_rate ? '★' : '☆' }}
                                    @endfor
                                </span>
                            </div>


                            <div class="flex justify-end mt-5 font-bold ">
                                <span class="">
                                    {{$mentor->experience_level}}

                                </span>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Pagination -->
            <div class="mt-6">
                {{-- {{ $mentors->links() }} --}}
            </div>
        </section>
        @endif
    </div>

    </x-layout>

<script>$(document).ready(function() {
    // Function to toggle date filter display

    function toggleDateFilter(show) {
        const dateFilter = $('#date-filter');
        dateFilter.css('display', show === 'choose' ? 'block' : 'none');
    }

    // Automatically show/hide the date filter based on the current state
    const currentValue = "{{ request('availability') }}";
    toggleDateFilter(currentValue);

    // Sample instruments for the dropdown
    const instruments = ['Guitar', 'Piano', 'Violin', 'Drums', 'Flute', 'Saxophone', 'Trumpet'];

    // Handle input on the instrument search field
    $('#instrumentSearch').on('input', function() {
        const query = $(this).val().toLowerCase();
        $('#instrumentDropdown').empty().removeClass('hidden');

        if (query) {
            const filteredInstruments = instruments.filter(instrument =>
                instrument.toLowerCase().includes(query)
            );

            filteredInstruments.forEach(instrument => {
                $('#instrumentDropdown').append(`<div class="cursor-pointer hover:bg-gray-200 p-2">${instrument}</div>`);
            });
        } else {
            $('#instrumentDropdown').addClass('hidden');
        }
    });

    // Handle click on dropdown items
    $(document).on('click', '#instrumentDropdown div', function() {
        $('#instrumentSearch').val($(this).text());
        $('#instrumentDropdown').addClass('hidden');
    });

    // Hide dropdown when clicking outside
    $(document).click(function(event) {
        if (!$(event.target).closest('#instrumentSearch, #instrumentDropdown').length) {
            $('#instrumentDropdown').addClass('hidden');
        }
    });

    // Handle change event for radio buttons
    $('input[name="availability"]').on('change', function() {
        const selectedValue = $(this).val();
        toggleDateFilter(selectedValue);
    });
});

</script>
