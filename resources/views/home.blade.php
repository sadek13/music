<x-layout>


    <section class="flex items-center justify-between w-full h-screen bg-cover bg-center px-8" style="background-image: url('{{ asset('images/music-man.jpg') }}');">
        <!-- Left Content -->
        <div class="max-w-lg bg-white bg-opacity-75 p-6 rounded-lg">
          <h1 class="text-4xl font-bold text-gray-900 mb-4">
            Welcome to Music Learning
          </h1>
          <p class="text-lg text-gray-600 mb-6">
            Start your journey to becoming a master musician. Learn from top instructors and enhance your skills.
          </p>
          <a href="/mentors" class="px-6 py-3 bg-green-600 text-white rounded-md hover:bg-blue-500">
            Let’s Learn
          </a>
        </div>
      </section>

      <x-instruments>

      </x-instruments>

      <section class="flex items-center justify-between h-screen px-8 bg-gray-100">
        <!-- Image Element -->
        <div class="flex-shrink-0">
            <img src="{{ asset('images/music-woman.jpg') }}" alt="Music Woman" class="h-auto w-full max-w-xs rounded-lg shadow-lg">

        </div>

        <!-- Text Element -->
        <div class="max-w-lg">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Welcome to Music Learning</h1>
            <p class="text-lg text-gray-600 mb-6">
                Start your journey to becoming a master musician. Learn from top instructors and enhance your skills.
            </p>
            <a href="/mentors" class="px-6 py-3 bg-green-600 text-white rounded-md hover:bg-blue-500">
                Let’s Learn
            </a>
        </div>
    </section>


    <section class="flex items-center justify-between h-screen px-8 bg-gray-100">
        <!-- Image Element -->

        <!-- Text Element -->
        <div class="max-w-lg">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Welcome to Music Learning</h1>
            <p class="text-lg text-gray-600 mb-6">
                Start your journey to becoming a master musician. Learn from top instructors and enhance your skills.
            </p>
            <a href="/mentors" class="px-6 py-3 bg-green-600 text-white rounded-md hover:bg-blue-500">
                Let’s Learn
            </a>
        </div>


        <div class="flex-shrink-0">
            <img src="{{ asset('images/music-woman.jpg') }}" alt="Music Woman" class="h-auto w-full max-w-xs rounded-lg shadow-lg">

        </div>

    </section>



</x-layout>
