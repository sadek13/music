<x-layout>


<div class="container mx-auto flex flex-col lg:flex-row py-8">
    <!-- Filters Section -->
    <aside class="w-full lg:w-1/4 bg-white shadow-md p-4 rounded-lg mb-6 lg:mb-0">
        <h2 class="text-xl font-bold mb-4">Filters</h2>
        <form method="GET" action="{{ route('mentors.index') }}">
            <!-- Search -->
            <div class="mb-4">
                <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                <input type="text" name="search" id="search"
                       value="{{ request('search') }}"
                       placeholder="Search mentors..."
                       class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <!-- Music Types Filter -->
            <div class="mb-4">
                <label for="music_type" class="block text-sm font-medium text-gray-700">Music Type</label>
                <select name="music_type" id="music_type" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    <option value="">All Types</option>
                    <!-- Loop through music types dynamically -->
                    @foreach($musicTypes as $type)
                        <option value="{{ $type->id }}" {{ request('music_type') == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <!-- Experience Level Filter -->
            <div class="mb-4">
                <label for="experience" class="block text-sm font-medium text-gray-700">Experience Level</label>
                <select name="experience" id="experience" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    <option value="">All Levels</option>
                    <option value="beginner" {{ request('experience') == 'beginner' ? 'selected' : '' }}>Beginner</option>
                    <option value="intermediate" {{ request('experience') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                    <option value="advanced" {{ request('experience') == 'advanced' ? 'selected' : '' }}>Advanced</option>
                </select>
            </div>
            <!-- Availability Filter -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Availability</label>
                <div class="flex items-center">
                    <input type="checkbox" name="available" id="available" {{ request('available') ? 'checked' : '' }}>
                    <label for="available" class="ml-2 text-sm text-gray-700">Available now</label>
                </div>
            </div>
            <!-- Apply Filters Button -->
            <button type="submit" class="w-full bg-blue-500 text-white px-3 py-2 rounded-md hover:bg-blue-600">Apply Filters</button>
        </form>
    </aside>

    <!-- Mentors List Section -->
    <section class="w-full lg:w-3/4 lg:ml-4">
        <h2 class="text-2xl font-bold mb-4">Mentors List</h2>
        <div class="space-y-6">
            @foreach($mentors as $mentor)
                <!-- Mentor List Item -->
                <div class="flex items-center bg-white shadow-lg rounded-lg p-4">
                    <!-- Left Image (1/3 width) -->
                    <div class="w-1/3">
                        <img src="{{ $mentor->profile_picture_url }}" alt="{{ $mentor->name }}" class="rounded-lg w-full">
                    </div>

                    <!-- Right Content (2/3 width) -->
                    <div class="w-2/3 pl-4">
                        <div class="flex justify-between items-center">
                            <!-- Mentor Name -->
                            <h3 class="text-xl font-bold text-gray-900">{{ $mentor->name }}</h3>
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
                                    {{ $i < $mentor->rating ? '★' : '☆' }}
                                @endfor
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
</div>

</x-layout>
