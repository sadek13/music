<x-layout>

    <div class=" flex py-8">
        <!-- Filters Section -->
        <div class="flex ">
            <!-- Filter Section -->
            <div class="w-full bg-gray-100 p-4">
                <!-- Subsection for Hourly Rate -->

                <div class="w-full">
                <form method="GET" action="{{ route('mentors.index') }}">

                    <h4 class="space-x-5 font-bold">Search</h4>
                    <input name="musicTypeName"  type="text" id="instrumentSearch" placeholder="Type an instrument..." class="border rounded p-2 w-full"/>
                    <div id="instrumentDropdown" class="absolute bg-white border mt-1 rounded shadow-lg hidden wiw">
                        <!-- Dropdown items will be populated dynamically -->
                    </div>
                    <hr class="border-gray-300 my-2 mx-auto my-5" style="width: 50%;"/>
                </div>


                <div class="mb-5">
                    <h4 class="font-bold">Hourly Rate</h4>
                    <div class="flex items-center">
                        <input name="min_hourly_rate" type="number" placeholder="Min" min="5" value="5" class="border rounded p-2 w-24" />
                        <span class="mx-2">to</span>
                        <input name="m_hourly_rate" type="number" placeholder="Max" max="50" value="50" class="border rounded p-2 w-24" />
                    </div>
                    <hr class="border-gray-300 my-2 mx-auto my-5" style="width: 50%;"/>

                </div>

                <!-- Subsection for Rating -->
                <div class="mb-5 ml-[33px]">
                    <h4 class="font-bold">Rating</h4>
                    <div>
                        <label>
                            <input type="radio" name="rating" value="1" class="mr-2" {{ old('rating') == 2 ? 'checked' : '' }} /> 1+
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="rating" value="2" class="mr-2" {{ old('rating') == 4 ? 'checked' : '' }} /> 2+
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="rating" value="3" class="mr-2" {{ old('rating') == 4 ? 'checked' : '' }} /> 3+
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="rating" value="4" class="mr-2" {{ old('rating') == 4 ? 'checked' : 'checked' }} /> 4+
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="rating" value="5" class="mr-2" {{ old('rating') == 5 ? 'checked' : '' }} /> 5
                        </label>
                    </div>
                    <hr class="border-gray-300 my-2 mx-auto my-5" style="width: 50%;"/>


                    <table>
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>From</th>
                                <th>To</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Monday</td>
                                <td><input type="time" name="availability[Monday][from]" required></td>
                                <td><input type="time" name="availability[Monday][to]" required></td>
                            </tr>
                            <tr>
                                <td>Tuesday</td>
                                <td><input type="time" name="availability[Tuesday][from]" required></td>
                                <td><input type="time" name="availability[Tuesday][to]" required></td>
                            </tr>
                            <tr>
                                <td>Wednesday</td>
                                <td><input type="time" name="availability[Wednesday][from]" required></td>
                                <td><input type="time" name="availability[Wednesday][to]" required></td>
                            </tr>
                            <tr>
                                <td>Thursday</td>
                                <td><input type="time" name="availability[Thursday][from]" required></td>
                                <td><input type="time" name="availability[Thursday][to]" required></td>
                            </tr>
                            <tr>
                                <td>Friday</td>
                                <td><input type="time" name="availability[Friday][from]" required></td>
                                <td><input type="time" name="availability[Friday][to]" required></td>
                            </tr>
                            <tr>
                                <td>Saturday</td>
                                <td><input type="time" name="availability[Saturday][from]" required></td>
                                <td><input type="time" name="availability[Saturday][to]" required></td>
                            </tr>
                            <tr>
                                <td>Sunday</td>
                                <td><input type="time" name="availability[Sunday][from]" required></td>
                                <td><input type="time" name="availability[Sunday][to]" required></td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Available Now Radio Button -->
                    <div class="radio-group">
                        <h4>Availability</h4>
                        <label>
                            <input type="radio" name="available_now" value="1" onclick="toggleDateFilter(false)"> Available Now
                        </label>
                        <label>
                            <input type="radio" name="available_now" value="0" onclick="toggleDateFilter(true)"> Not Available Now
                        </label>
                    </div>

                </div>

                <!-- Subsection for Instrument Search -->
                <x-href-blue-button type="submit" href="{{ route('mentors.index') }}">Apply</x-href-blue-button>

            </div>
        </form>
            <!-- Main Content Area (Placeholder) -->
            <div class="w-3/4 p-4">
                <!-- Your content goes here -->
            </div>
        </div>

        <!-- Mentors List Section -->


        @if(session('message'))
    <div class="alert alert-warning">
        {{ session('message') }}
    </div>
    @else
        <section class="w-full lg:w-3/4 lg:ml-4">
            <h2 class="text-2xl font-bold mb-4">Mentors List</h2>
            <div class="space-y-6">
                @foreach($mentors as $mentor)
                    <!-- Mentor List Item -->
                    <div class="flex items-center bg-white shadow-lg rounded-lg p-4">
                        <!-- Left Image (1/3 width) -->
                        <div class="w-1/3">
                            <img src="{{ $mentor->pp }}" alt="pic" class="rounded-lg w-full">
                        </div>

                        <!-- Right Content (2/3 width) -->
                        <div class="w-2/3 pl-4">
                            <div class="flex justify-between items-center">
                                <!-- Mentor Name -->
                                <h3 class="text-xl font-bold text-gray-900">{{ $mentor->mentor_name }}</h3>
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
                {{ $mentors->links() }}
            </div>
        </section>
        @endif
    </div>

    </x-layout>


<script>
$(document).ready(function() {
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
});
</script>
