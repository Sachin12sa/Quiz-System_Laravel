<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Attempted Quizzes</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">
    <x-user-navbar />

    <div class="flex flex-col items-center min-h-screen py-10 px-4">
        <h1 class="text-4xl font-bold text-green-900 mb-8 text-center">User Attempted Quizzes</h1>

        <div class="bg-white rounded-xl shadow-lg w-full max-w-4xl p-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-green-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Quiz Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($quizRecord as $record)
                    <tr class="hover:bg-green-50 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $record->quiz->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($record->status == 'completed')
                                @if($record->can_download)
                                    <a href="{{ route('download.certificate') }}" 
                                       class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow-md transition">
                                        Download Certificate
                                    </a>
                                @else
                                    <span class="inline-block bg-red-100 text-red-700 px-4 py-2 rounded-lg font-medium">Score below 70%  <br> (Cannot download Certificate)</span>
                                @endif
                            @else
                                <a href="{{ route('resume.quiz', $record->quiz->id) }}" 
                                   class="inline-block bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg shadow-md transition font-medium">
                                    Resume Quiz
                                </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $quizRecord->links('pagination::tailwind') }}
        </div>
    </div>

    <x-footer-user />
</body>
</html>