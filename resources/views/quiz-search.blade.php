<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Quiz List - Search: {{ $quiz }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

<x-user-navbar/>

<div class="flex flex-col items-center min-h-screen pt-8 px-4 md:px-0">
    <!-- Search Heading -->
    <h1 class="text-3xl md:text-4xl font-extrabold text-green-700 text-center mb-6">
        Search Results: "{{ $quiz }}"
    </h1>

    <!-- Quiz Table Card -->
    <div class="bg-white p-6 rounded-2xl shadow-xl w-full max-w-4xl overflow-x-auto">
        @if($quizData->isEmpty())
            <p class="text-center text-gray-500 font-medium py-6">
                No quizzes found matching your search.
            </p>
        @else
            <table class="w-full border border-gray-200 table-auto">
                <thead class="bg-green-100">
                    <tr>
                        <th class="p-3 border text-left text-gray-700">Quiz ID</th>
                        <th class="p-3 border text-left text-gray-700">Name</th>
                        <th class="p-3 border text-left text-gray-700">MCQ Count</th>
                        <th class="p-3 border text-left text-gray-700">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quizData as $item)
                    <tr class="even:bg-gray-50 hover:bg-green-50 transition duration-150">
                        <td class="p-2 border">{{ $item->id }}</td>
                        <td class="p-2 border font-medium">{{ $item->name }}</td>
                        <td class="p-2 border">{{ $item->mcq_count }}</td>
                        <td class="p-2 border">
                            <a href="/start-quiz/{{ $item->id }}/{{ str_replace(' ', '-', $item->name) }}" 
                               class="inline-block bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-semibold shadow-md transition duration-150">
                               Attempt Quiz
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

<x-footer-user />

</body>
</html>