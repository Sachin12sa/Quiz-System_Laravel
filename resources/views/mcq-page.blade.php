<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCQs Page - {{ $quizName }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">

<x-user-navbar/>

<div class="flex flex-col items-center min-h-screen pt-8 px-4 md:px-0">
    <!-- Quiz Title -->
    <h1 class="text-3xl md:text-4xl font-extrabold text-green-700 text-center mb-4">
        {{ $quizName }}
    </h1>

    <!-- Question Number -->
    <p class="text-lg md:text-xl text-green-800 font-semibold mb-2">
        Question {{ session('currentQuiz')['currentMcq'] }} of {{ session('currentQuiz')['totalMcq'] }}
    </p>

    <!-- MCQ Card -->
    <div class="mt-4 p-6 bg-white rounded-2xl shadow-xl w-full max-w-2xl">
        <h2 class="text-xl md:text-2xl font-bold text-green-900 mb-6">
            {{ $mcqData->question }}
        </h2>

        <form action="/submit-next/{{ $mcqData->id }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="id" value="{{ $mcqData->id }}">

            <!-- Options -->
            @foreach (['a', 'b', 'c', 'd'] as $opt)
                <label for="option_{{ $opt }}" 
                       class="flex items-center border border-gray-300 p-3 rounded-2xl shadow hover:bg-blue-50 cursor-pointer transition duration-150">
                    <input id="option_{{ $opt }}" type="radio" name="option" value="{{ $opt }}" class="form-radio h-5 w-5 text-green-500">
                    <span class="pl-3 text-green-900">{{ $mcqData->$opt }}</span>
                </label>
            @endforeach

            @if ($errors->has('option'))
                <p class="text-red-500 text-sm mt-1">{{ $errors->first('option') }}</p>
            @endif

            <button type="submit" 
                    class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-3 rounded-xl shadow-md transition duration-150">
                Submit Answer & Next
            </button>
        </form>
    </div>
</div>

<x-footer-user />

</body>
</html>