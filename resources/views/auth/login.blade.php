<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <!-- Container for the image and form split into two halves on medium screens and above -->
    <div class="flex items-center min-h-screen">
        <!-- Left Side (Image) - Visible only on medium and larger screens -->
        <div class="hidden md:block w-1/2 h-screen">
            <img src="{{ asset('images/music-woman.jpg') }}" alt="Music Woman" class="w-full h-full object-cover">
        </div>

        <!-- Right Side (Form) -->
        <div class="w-full md:w-1/2 flex justify-center md:justify-start items-center px-4 py-8">
            <div class="max-w-lg w-full bg-white p-8 rounded-lg shadow-lg">
                <!-- Tab Headers -->
                <div class="flex justify-center space-x-8 mb-6">
                    <button id="studentTab" onclick="showForm('student')" class="px-4 py-2 text-lg font-semibold text-gray-700 hover:bg-green-500 hover:text-white transition">
                        I'm a Student
                    </button>
                    <button id="mentorTab" onclick="showForm('mentor')" class="px-4 py-2 text-lg font-semibold text-gray-700 hover:bg-green-500 hover:text-white transition">
                        I'm a Mentor
                    </button>
                </div>

                <!-- Student Login Form -->
                <form id="studentForm" action="{{ route('login-student') }}" method="POST" class="login-form">
                    @csrf
                    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">Student Login</h2>
                    <input type="email" name="email" placeholder="Email" required class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" />
                    <input type="password" name="password" placeholder="Password" required class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" />
                    <button type="submit" class="w-full py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition">Sign In</button>
                    <a href="{{ route('password.request') }}" class="block text-center text-sm text-gray-600 mt-2 hover:text-green-500">Forgot Password?</a>
                    <p class="text-center text-gray-600 mt-4">Want to start mentoring? <a href="{{ route('mentor/home') }}" class="text-green-500 hover:underline">Apply now</a></p>
                </form>

                <!-- Mentor Login Form -->
                <form id="mentorForm" action="{{ route('login-mentor') }}" method="POST" class="login-form hidden">
                    @csrf
                    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">Mentor Login</h2>
                    <input type="email" name="email" placeholder="Email" required class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" />
                    <input type="password" name="password" placeholder="Password" required class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" />
                    <button type="submit" class="w-full py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition">Sign In</button>
                    <a href="{{ route('password.request') }}" class="block text-center text-sm text-gray-600 mt-2 hover:text-green-500">Forgot Password?</a>
                    <p class="text-center text-gray-600 mt-4">Want to start mentoring? <a href="{{ route('mentor/home') }}" class="text-green-500 hover:underline">Apply now</a></p>
                </form>
            </div>
        </div>
    </div>

    <script>
        // JavaScript to toggle forms between student and mentor
        function showForm(type) {
            document.getElementById('studentForm').classList.toggle('hidden', type !== 'student');
            document.getElementById('mentorForm').classList.toggle('hidden', type !== 'mentor');
        }
    </script>
</body>
</html>
