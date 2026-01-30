<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category: {{ str_replace('-', ' ', $category) }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

<x-user-navbar />

<div class="flex flex-col items-center min-h-screen pt-12 w-full px-4 md:px-8">
    <h2 class="text-3xl md:text-4xl text-center text-green-700 font-extrabold mb-6">
        Category: {{ str_replace('-', ' ', $category) }}
    </h2>

    <div class="bg-white mt-6 p-6 rounded-2xl shadow-xl w-full max-w-4xl overflow-x-auto">
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
                @forelse($quizData as $item)
                <tr class="text-gray-800 hover:bg-green-50 transition duration-150 even:bg-gray-50">
                    <td class="p-3 border">{{ $item->id }}</td>
                    <td class="p-3 border font-medium">{{ $item->name }}</td>
                    <td class="p-3 border">{{ $item->mcq_count }}</td>
                    <td class="p-3 border">
                        <a href="/start-quiz/{{ $item->id }}/{{ str_replace(' ', '-', $item->name) }}" 
                           class="text-white bg-green-500 hover:bg-green-600 px-4 py-2 rounded-lg font-semibold transition duration-150">
                           Attempt Quiz
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">
                        No quizzes found in this category.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<x-footer-user />

</body>
</html>