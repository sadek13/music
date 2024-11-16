<div class="h-full"> <!-- Removed mt-4 to prevent gap at the top -->
    <!-- Navbar Component -->
    <nav class="bg-white h-16 fixed top-0 left-0 right-0 shadow-md"> <!-- Adjust height as needed -->
        <div class="container mx-auto flex items-center justify-between h-full">

            <!-- Left Side: Logo and App Name -->
            <div class="flex items-center space-x-2">
                <a href="/">
                    {{-- <img src="your-logo.png" alt="Logo" class="h-8 w-8" /> --}}
                <span class="text-2xl font-semibold">Dawzin</span>

                </a>
            </div>

            <!-- Right Side: Login or Icons based on user authentication -->
            <div class="flex items-center space-x-4">
            <a href="login"><button class="text-md font-medium px-3 py-1 rounded-md hover:underline">Mentor</button>
            </a>
                <button class="text-md font-medium px-3 py-1 rounded-md hover:underline">Student</button>


                <!-- Icons -->
                <div class="flex items-center space-x-3">
                    <a href="/notifications">
                        <i class="fas fa-bell text-lg"></i>
                    </a>
                    <a href="/messages">
                        <i class="fas fa-envelope text-lg"></i>
                    </a>
                    <a href="/profile">
                        <i class="fas fa-user-circle text-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>
