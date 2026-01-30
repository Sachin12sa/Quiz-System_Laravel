<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ str_replace(' ', '-', $quizName) }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">

<x-user-navbar />

<!-- Success Message -->
@if(session('message-success'))
    <div class="max-w-3xl mx-auto mt-6 p-4 bg-green-100 text-green-700 rounded-lg shadow text-center font-semibold">
        {{ session('message-success') }}
    </div>
@endif

<div class="flex flex-col items-center justify-center min-h-screen px-4">
    <h1 class="text-4xl md:text-5xl font-extrabold text-green-700 text-center mt-12">
        {{ str_replace('-', ' ', $quizName) }}
    </h1>

    <p class="text-xl md:text-2xl text-green-800 mt-4 text-center font-medium">
        This quiz contains <span class="font-bold">{{ $quizCount }}</span> questions.<br>
        There is no limit to attempts.
    </p>

    <p class="text-lg text-gray-700 mt-4 mb-6 text-center">Good Luck! 🍀</p>

    <div class="flex flex-col md:flex-row gap-4">
        @if(session('user'))
            <a href="/mcq/{{ session('firstMCQ')->id }}/{{ $quizName }}" 
               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-150 text-center">
                Start Quiz
            </a>
        @else
            <a href="/user-signup-quiz" 
               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-150 text-center">
                Signup to Start Quiz
            </a>
            <a href="/user-login-quiz" 
               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-150 text-center">
                Login to Start Quiz
            </a>
        @endif
    </div>
</div>

<x-footer-user />

</body>
</html>