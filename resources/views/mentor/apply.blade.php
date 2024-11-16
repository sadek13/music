

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor Sign Up | Join Us</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans leading-relaxed">

    <!-- Navbar -->
   <x-mentor-navbar>

   </x-mentor-navbar>

    <!-- Mentor Sign Up Form -->
    <section class="container mx-auto py-16 px-4 lg:px-10">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800">Become a Mentor</h2>
            <p class="text-lg text-gray-600">Fill out the form below to join our community of mentors.</p>
        </div>

        <div class="bg-white p-8 rounded-lg shadow-lg">
            <form action="{{ route('mentor/apply') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <!-- Name -->
                    <div class="form-group">
                        <label for="full_name" class="block text-gray-800 font-semibold mb-2">Full Name</label>
                        <input type="text" id="full_name" name="full_name" class="w-full px-4 py-2 rounded-md border border-gray-300" required>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email" class="block text-gray-800 font-semibold mb-2">Email Address</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-2 rounded-md border border-gray-300" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 mt-8">
                    <!-- Phone -->
                    <div class="form-group">
                        <label for="phone" class="block text-gray-800 font-semibold mb-2">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="w-full px-4 py-2 rounded-md border border-gray-300" required>
                    </div>

                    <!-- Location -->
                    <div class="form-group">
                        <label for="location" class="block text-gray-800 font-semibold mb-2">Location</label>
                        <input type="text" id="location" name="location" class="w-full px-4 py-2 rounded-md border border-gray-300" required>
                    </div>
                </div>

                <div class="mt-8">
                    <!-- Profile Picture -->
                    <label for="profile_picture" class="block text-gray-800 font-semibold mb-2">Upload Your Profile Picture</label>
                    <input type="file" id="profile_picture" name="profile_picture" accept="image/*" class="w-full px-4 py-2 rounded-md border border-gray-300" required>
                </div>

                <div class="mt-8">
                    <!-- Bio -->
                    <label for="bio" class="block text-gray-800 font-semibold mb-2">Short Bio</label>
                    <textarea id="bio" name="bio" rows="4" class="w-full px-4 py-2 rounded-md border border-gray-300" placeholder="Tell us about yourself..." required></textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 mt-8">
                    <!-- Expertise -->
                    <div class="form-group">
                        <label for="expertise" class="block text-gray-800 font-semibold mb-2">Areas of Expertise</label>
                        <input type="text" id="expertise" name="expertise" class="w-full px-4 py-2 rounded-md border border-gray-300" required>
                    </div>


                </div>

                <div class="mt-8 text-center">
                    <button type="submit" class="bg-green-500 text-white px-8 py-3 font-semibold rounded hover:bg-green-600 transition">
                        Submit Application
                    </button>
                </div>
            </form>
        </div>
    </section>

</body>
</html>
