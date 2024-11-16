<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor Home | Join Us</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans leading-relaxed">

    <!-- Navbar -->
    <nav class="bg-white shadow-lg py-4">
        <div class="container mx-auto flex justify-between items-center px-4 lg:px-10">
            <a href="{{ route('/') }}" class="text-2xl font-bold text-green-500">
                Dawzin
            </a>
            <a href="{{ route('mentor/apply') }}" class="text-lg bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Apply Now
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-gradient-to-r from-green-400 to-green-600 text-white py-20">
        <div class="container mx-auto text-center px-4">
            <h1 class="text-4xl font-bold mb-4">Become a Mentor and Inspire the Next Generation</h1>
            <p class="text-lg mb-8">Share your expertise, make a difference, and build valuable connections by joining our mentor community.</p>
            <a href="{{ route('mentor/apply') }}" class="bg-white text-green-500 px-6 py-3 font-semibold rounded hover:bg-gray-100 transition">
                Start Mentoring Today
            </a>
        </div>
    </header>

    <!-- Stats Section -->
    <section class="container mx-auto py-16 px-4 lg:px-10">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-800">Why Join Us?</h2>
            <p class="text-gray-600">See how we're making an impact together.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
            <div>
                <h3 class="text-4xl font-bold text-green-500">10K+</h3>
                <p class="text-gray-700">Students Mentored</p>
            </div>
            <div>
                <h3 class="text-4xl font-bold text-green-500">95%</h3>
                <p class="text-gray-700">Satisfaction Rate</p>
            </div>
            <div>
                <h3 class="text-4xl font-bold text-green-500">500+</h3>
                <p class="text-gray-700">Active Mentors</p>
            </div>
            <div>
                <h3 class="text-4xl font-bold text-green-500">30+</h3>
                <p class="text-gray-700">Countries Reached</p>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="bg-gray-100 py-16">
        <div class="container mx-auto text-center px-4 lg:px-10">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Benefits of Joining Our Community</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold text-green-500 mb-3">Build Your Network</h3>
                    <p class="text-gray-600">Connect with like-minded professionals and grow your influence.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold text-green-500 mb-3">Flexible Scheduling</h3>
                    <p class="text-gray-600">Set your own availability and work with students on your own time.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold text-green-500 mb-3">Make a Lasting Impact</h3>
                    <p class="text-gray-600">Help students achieve their goals and shape the next generation.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="container mx-auto py-16 px-4 lg:px-10">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-800">Hear from Our Mentors</h2>
            <p class="text-gray-600">Real stories from mentors like you.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-white p-6 rounded-lg shadow">
                <p class="text-gray-700">"Mentoring has been incredibly rewarding. I love seeing my mentees succeed!"</p>
                <h3 class="text-green-500 font-semibold mt-4">- Alex P.</h3>
            </div>
            <!-- Testimonial 2 -->
            <div class="bg-white p-6 rounded-lg shadow">
                <p class="text-gray-700">"The platform makes it easy to connect with students globally."</p>
                <h3 class="text-green-500 font-semibold mt-4">- Sarah K.</h3>
            </div>
            <!-- Testimonial 3 -->
            <div class="bg-white p-6 rounded-lg shadow">
                <p class="text-gray-700">"Being a mentor has helped me grow professionally and personally."</p>
                <h3 class="text-green-500 font-semibold mt-4">- Chris T.</h3>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-gradient-to-r from-green-400 to-green-600 py-16 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Ready to Make a Difference?</h2>
        <a href="{{ route('mentor/apply') }}" class="bg-white text-green-500 px-8 py-3 font-semibold rounded hover:bg-gray-100 transition">
            Apply Now
        </a>
    </section>

</body>
</html>
