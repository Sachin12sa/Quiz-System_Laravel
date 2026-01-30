<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Quiz System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        .gradient-text {
            background: linear-gradient(135deg, #10b981, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-green-50 via-blue-50 to-purple-50 min-h-screen">

<!-- Navbar (same as before) -->
<nav class="bg-white shadow-sm border-b-2 border-green-100 px-6 py-4 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <div class="flex items-center space-x-2 cursor-pointer">
            <span class="text-2xl">📚</span>
            <span class="text-xl font-bold bg-gradient-to-r from-green-600 to-blue-500 bg-clip-text text-transparent">
                Quiz System
            </span>
        </div>
        <div class="hidden md:flex items-center space-x-8">
            <a href="/" class="text-gray-700 hover:text-green-600 font-medium">Home</a>
            <a href="/user-categories" class="text-gray-700 hover:text-green-600 font-medium">Categories</a>
            <a href="/blog" class="text-green-600 font-semibold">Blog</a>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="max-w-7xl mx-auto px-6 py-16 text-center">
    <h1 class="text-5xl md:text-6xl font-bold text-gray-800 mb-4">
        Our <span class="gradient-text">Blog</span> 📝
    </h1>
    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
        Tips, tricks, and insights to help you ace your quizzes!
    </p>
    
    <!-- Search Bar -->
    <div class="mt-8 max-w-xl mx-auto">
        <div class="relative">
            <input 
                type="text" 
                placeholder="Search articles..." 
                class="w-full px-6 py-4 rounded-full border-2 border-gray-200 focus:border-green-500 focus:outline-none shadow-sm"
            />
            <button class="absolute right-2 top-2 bg-gradient-to-r from-green-500 to-blue-500 text-white px-6 py-2 rounded-full font-semibold hover:shadow-lg transition-all">
                🔍 Search
            </button>
        </div>
    </div>
</div>

<!-- Categories Filter -->
<div class="max-w-7xl mx-auto px-6 mb-12">
    <div class="flex flex-wrap gap-3 justify-center">
        <button class="px-6 py-2 bg-white rounded-full shadow-sm border-2 border-green-500 text-green-600 font-semibold hover:bg-green-500 hover:text-white transition-all">
            ✨ All
        </button>
        <button class="px-6 py-2 bg-white rounded-full shadow-sm border-2 border-gray-200 text-gray-600 font-medium hover:border-green-500 hover:text-green-600 transition-all">
            📚 Study Tips
        </button>
        <button class="px-6 py-2 bg-white rounded-full shadow-sm border-2 border-gray-200 text-gray-600 font-medium hover:border-green-500 hover:text-green-600 transition-all">
            🧠 Brain Games
        </button>
        <button class="px-6 py-2 bg-white rounded-full shadow-sm border-2 border-gray-200 text-gray-600 font-medium hover:border-green-500 hover:text-green-600 transition-all">
            🎯 Quiz Strategies
        </button>
        <button class="px-6 py-2 bg-white rounded-full shadow-sm border-2 border-gray-200 text-gray-600 font-medium hover:border-green-500 hover:text-green-600 transition-all">
            📰 News
        </button>
    </div>
</div>

<!-- Featured Post -->
<div class="max-w-7xl mx-auto px-6 mb-16">
    <div class="bg-white rounded-3xl shadow-lg overflow-hidden card-hover">
        <div class="md:flex">
            <div class="md:w-1/2">
                <img 
                    src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=800" 
                    alt="Featured" 
                    class="w-full h-64 md:h-full object-cover"
                />
            </div>
            <div class="md:w-1/2 p-8 md:p-12">
                <div class="flex items-center space-x-2 mb-4">
                    <span class="px-4 py-1 bg-gradient-to-r from-green-500 to-blue-500 text-white text-sm font-semibold rounded-full">
                        ⭐ Featured
                    </span>
                    <span class="text-gray-500 text-sm">📅 Jan 30, 2026</span>
                </div>
                <h2 class="text-3xl font-bold text-gray-800 mb-4">
                    10 Proven Study Techniques to Ace Any Quiz
                </h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Discover the most effective study methods used by top students worldwide. From spaced repetition to active recall, learn how to maximize your learning potential.
                </p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-blue-500 rounded-full flex items-center justify-center text-white font-bold">
                            S
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">Sachin</p>
                            <p class="text-sm text-gray-500">5 min read</p>
                        </div>
                    </div>
                    <button class="px-6 py-3 bg-gradient-to-r from-green-500 to-blue-500 text-white rounded-full font-semibold hover:shadow-lg transform hover:-translate-y-1 transition-all">
                        Read More →
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Blog Posts Grid -->
<div class="max-w-7xl mx-auto px-6 pb-16">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Latest Articles 📰</h2>
    
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Blog Card 1 -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
            <img 
                src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=600" 
                alt="Blog" 
                class="w-full h-48 object-cover"
            />
            <div class="p-6">
                <span class="px-3 py-1 bg-blue-100 text-blue-600 text-xs font-semibold rounded-full">
                    🧠 Brain Games
                </span>
                <h3 class="text-xl font-bold text-gray-800 mt-4 mb-2">
                    Memory Techniques That Actually Work
                </h3>
                <p class="text-gray-600 text-sm mb-4">
                    Learn practical memory tricks to remember more information faster and longer.
                </p>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">📅 Jan 28, 2026</span>
                    <button class="text-green-600 font-semibold hover:text-green-700">
                        Read →
                    </button>
                </div>
            </div>
        </div>

        <!-- Blog Card 2 -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
            <img 
                src="https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?w=600" 
                alt="Blog" 
                class="w-full h-48 object-cover"
            />
            <div class="p-6">
                <span class="px-3 py-1 bg-purple-100 text-purple-600 text-xs font-semibold rounded-full">
                    🎯 Quiz Strategies
                </span>
                <h3 class="text-xl font-bold text-gray-800 mt-4 mb-2">
                    How to Beat Test Anxiety
                </h3>
                <p class="text-gray-600 text-sm mb-4">
                    Simple breathing exercises and mindset shifts to stay calm during exams.
                </p>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">📅 Jan 27, 2026</span>
                    <button class="text-green-600 font-semibold hover:text-green-700">
                        Read →
                    </button>
                </div>
            </div>
        </div>

        <!-- Blog Card 3 -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
            <img 
                src="https://images.unsplash.com/photo-1488190211105-8b0e65b80b4e?w=600" 
                alt="Blog" 
                class="w-full h-48 object-cover"
            />
            <div class="p-6">
                <span class="px-3 py-1 bg-green-100 text-green-600 text-xs font-semibold rounded-full">
                    📚 Study Tips
                </span>
                <h3 class="text-xl font-bold text-gray-800 mt-4 mb-2">
                    The Pomodoro Technique Explained
                </h3>
                <p class="text-gray-600 text-sm mb-4">
                    Boost your productivity with this time management method loved by students.
                </p>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">📅 Jan 26, 2026</span>
                    <button class="text-green-600 font-semibold hover:text-green-700">
                        Read →
                    </button>
                </div>
            </div>
        </div>

        <!-- Blog Card 4 -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
            <img 
                src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=600" 
                alt="Blog" 
                class="w-full h-48 object-cover"
            />
            <div class="p-6">
                <span class="px-3 py-1 bg-orange-100 text-orange-600 text-xs font-semibold rounded-full">
                    📰 News
                </span>
                <h3 class="text-xl font-bold text-gray-800 mt-4 mb-2">
                    New Features Coming to Quiz System
                </h3>
                <p class="text-gray-600 text-sm mb-4">
                    Exciting updates including AI-powered quiz recommendations and more!
                </p>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">📅 Jan 25, 2026</span>
                    <button class="text-green-600 font-semibold hover:text-green-700">
                        Read →
                    </button>
                </div>
            </div>
        </div>

        <!-- Blog Card 5 -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
            <img 
                src="https://images.unsplash.com/photo-1516321497487-e288fb19713f?w=600" 
                alt="Blog" 
                class="w-full h-48 object-cover"
            />
            <div class="p-6">
                <span class="px-3 py-1 bg-pink-100 text-pink-600 text-xs font-semibold rounded-full">
                    🎯 Quiz Strategies
                </span>
                <h3 class="text-xl font-bold text-gray-800 mt-4 mb-2">
                    Multiple Choice Test Hacks
                </h3>
                <p class="text-gray-600 text-sm mb-4">
                    Smart strategies to improve your odds on multiple choice questions.
                </p>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">📅 Jan 24, 2026</span>
                    <button class="text-green-600 font-semibold hover:text-green-700">
                        Read →
                    </button>
                </div>
            </div>
        </div>

        <!-- Blog Card 6 -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
            <img 
                src="https://images.unsplash.com/photo-1497633762265-9d179a990aa6?w=600" 
                alt="Blog" 
                class="w-full h-48 object-cover"
            />
            <div class="p-6">
                <span class="px-3 py-1 bg-indigo-100 text-indigo-600 text-xs font-semibold rounded-full">
                    📚 Study Tips
                </span>
                <h3 class="text-xl font-bold text-gray-800 mt-4 mb-2">
                    Creating the Perfect Study Environment
                </h3>
                <p class="text-gray-600 text-sm mb-4">
                    How your surroundings impact your learning and what you can do about it.
                </p>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">📅 Jan 23, 2026</span>
                    <button class="text-green-600 font-semibold hover:text-green-700">
                        Read →
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Load More Button -->
    <div class="text-center mt-12">
        <button class="px-8 py-4 bg-white border-2 border-green-500 text-green-600 rounded-full font-semibold hover:bg-green-500 hover:text-white transition-all shadow-sm">
            Load More Articles 📚
        </button>
    </div>
</div>

<!-- Newsletter Section -->
<div class="max-w-7xl mx-auto px-6 pb-16">
    <div class="bg-gradient-to-r from-green-500 to-blue-500 rounded-3xl p-8 md:p-12 text-center text-white shadow-xl">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">
            Stay Updated! 📬
        </h2>
        <p class="text-lg mb-8 opacity-90">
            Get weekly study tips and quiz strategies delivered to your inbox
        </p>
        <div class="max-w-md mx-auto flex gap-3">
            <input 
                type="email" 
                placeholder="Enter your email" 
                class="flex-1 px-6 py-4 rounded-full text-gray-800 focus:outline-none shadow-lg"
            />
            <button class="px-8 py-4 bg-white text-green-600 rounded-full font-bold hover:shadow-xl transform hover:-translate-y-1 transition-all">
                Subscribe
            </button>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-white border-t-2 border-gray-100 py-8">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <p class="text-gray-600">
            Made with 💚 by Quiz System Team
        </p>
        <p class="text-sm text-gray-500 mt-2">
            © 2026 All rights reserved
        </p>
    </div>
</footer>

</body>
</html>