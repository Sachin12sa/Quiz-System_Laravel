<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Quiz MCQs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <x-navbar name="{{ $name }}" />

    <div class="flex flex-col items-center min-h-screen pt-8 px-4">

        <h2 class="text-2xl text-center text-gray-800 font-bold mb-6">
            All Current Quiz MCQs
        </h2>

        <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-4xl overflow-x-auto">

            <table class="w-full border border-gray-300 text-sm md:text-base">
                <thead class="bg-gray-200 text-gray-700 font-semibold">
                    <tr>
                        <th class="p-3 border">MCQ ID</th>
                        <th class="p-3 border">Question</th>
                        <th class="p-3 border">Options</th>
                        <th class="p-3 border">Correct Answer</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mcqs as $mcq)
                        <tr class="text-center even:bg-gray-50 hover:bg-gray-100 transition">
                            <td class="p-2 border">{{ $mcq->id }}</td>
                            <td class="p-2 border text-left">{{ $mcq->question }}</td>
                            <td class="p-2 border text-left">
                                <span class="inline-block mr-2"><strong>A:</strong> {{ $mcq->a }}</span>
                                <span class="inline-block mr-2"><strong>B:</strong> {{ $mcq->b }}</span>
                                <span class="inline-block mr-2"><strong>C:</strong> {{ $mcq->c }}</span>
                                <span class="inline-block"><strong>D:</strong> {{ $mcq->d }}</span>
                            </td>
                            <td class="p-2 border text-green-600 font-semibold">{{ strtoupper($mcq->correct_ans) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-4 text-center text-gray-500">No MCQs found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>

</body>
</html>