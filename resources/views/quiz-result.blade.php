<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

<x-user-navbar />

<div class="flex flex-col items-center min-h-screen pt-10 px-4">
    <h1 class="text-4xl md:text-5xl font-extrabold text-green-800 mb-6 text-center">
        Quiz Result
    </h1>

    <div class="bg-white p-6 rounded-2xl shadow-xl w-full max-w-4xl">
        <!-- Certificate link if score > 70% -->
        @if($correctAnswer*100/count($resultData) > 70)
            <div class="text-center mb-6">
                <a href="/certificate" class="inline-block bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-150">
                    View & Download Certificate
                </a>
            </div>
        @endif

        <!-- Score Summary -->
        <h2 class="text-2xl md:text-3xl font-bold text-green-900 text-center mb-6">
            You scored {{ $correctAnswer }} out of {{ count($resultData) }}
        </h2>

        <!-- Result Table -->
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-300 table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-3 border text-left">#</th>
                        <th class="p-3 border text-left">Question</th>
                        <th class="p-3 border text-left">Your Answer</th>
                        <th class="p-3 border text-left">Correct Answer</th>
                        <th class="p-3 border text-left">Result</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resultData as $key => $item)
                    <tr class="even:bg-gray-50 hover:bg-blue-50 transition duration-150">
                        <td class="p-2 border">{{ $key + 1 }}</td>
                        <td class="p-2 border">{{ $item->question }}</td>
                        <td class="p-2 border text-gray-800">
                            {{ optional($item->mcq)->{$item->selected_answer} ?? 'N/A' }}
                        </td>
                        <td class="p-2 border text-gray-800">
                            {{ optional($item->mcq)->{optional($item->mcq)->correct_ans} ?? 'N/A' }}
                        </td>
                        <td class="p-2 border font-semibold {{ $item->is_correct ? 'text-green-500' : 'text-red-500' }}">
                            {{ $item->is_correct ? 'Correct' : 'Incorrect' }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<x-footer-user />

</body>
</html>