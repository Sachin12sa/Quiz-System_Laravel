<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

<x-user-navbar />

<!-- Success Message -->
@if (session('message-success'))
<div class="mt-4 text-center">
    <p class="text-green-600 font-semibold">{{ session('message-success') }}</p>
</div>
@endif

<div class="flex flex-col min-h-screen items-center pt-10 px-4">

    <!-- Page Heading -->
    <h1 class="text-4xl font-bold text-green-800 mb-6 text-center">Check Your Skills</h1>

    <!-- Search Form -->
    <div class="w-full max-w-md mb-8">
        <form action="{{ url('search-quiz') }}" method="get" class="relative">
            <input type="text" name="search" placeholder="Search quiz..." 
                   class="w-full px-4 py-3 border border-gray-300 rounded-2xl shadow focus:outline-none focus:ring-2 focus:ring-green-400">
            <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000">
                    <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/>
                </svg>
            </button>
        </form>
    </div>

    <!-- Category Table -->
    <div class="bg-white p-6 rounded-2xl shadow-lg w-full max-w-4xl overflow-x-auto">
        <h2 class="text-2xl text-green-700 font-bold mb-6 text-center">Top Category List</h2>

        <table class="w-full border border-gray-200 table-auto">
            <thead class="bg-green-50 text-green-800 font-semibold">
                <tr>
                    <th class="p-3 border-b text-left">S.No</th>
                    <th class="p-3 border-b text-left">Name</th>
                    <th class="p-3 border-b text-left">Creator</th>
                    <th class="p-3 border-b text-left">Quiz Count</th>
                    <th class="p-3 border-b text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $key => $category)
                <tr class="even:bg-gray-50 hover:bg-green-50 transition">
                    <td class="p-3 border-b">{{ $key + 1 }}</td>
                    <td class="p-3 border-b font-medium">{{ $category->name }}</td>
                    <td class="p-3 border-b">{{ $category->creator }}</td>
                    <td class="p-3 border-b">{{ $category->quizzes_count }}</td>
                    <td class="p-3 border-b">
                        <div class="flex justify-center space-x-2">
                            <!-- View Quizzes -->
                            <a href="{{ url('user-quiz-list/'.$category->id.'/'. str_replace(' ','-',$category->name)) }}" 
                               class="text-blue-600 hover:text-blue-800 font-semibold flex items-center space-x-1">
                                <span>Quizzes</span>
                                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#0000FF"><path d="M240-48H120q-33 0-52.5-19.5T48-120v-120h72v120h120v72Zm480 0v-72h120v-120h72v120q0 33-19.5 52.5T840-48H720ZM480-240q-112.38 0-203.69-65.5T144-480q41-109 132.31-174.5T480-720q112.38 0 203.69 65.5T816-480q-41 109-132.31 174.5T480-240Zm-.12-72q83.12 0 152.17-44.8Q701.11-401.6 738-480q-36.84-78.4-105.8-123.2Q563.25-648 480.12-648q-83.12 0-152.17 44.8Q258.89-558.4 222-480q36.84 78.4 105.79 123.2Q396.75-312 479.88-312Zm.34-36q54.78 0 93.28-38.72t38.5-93.5q0-54.78-38.72-93.28t-93.5-38.5q-54.78 0-93.28 38.72t-38.5 93.5q0 54.78 38.72 93.28t93.5 38.5Zm-.22-72q-25 0-42.5-17.5T420-480q0-25 17.5-42.5T480-540q25 0 42.5 17.5T540-480q0 25-17.5 42.5T480-420ZM48-720v-120q0-33 19.5-52.5T120-912h120v72H120v120H48Zm792 0v-120H720v-72h120q33 0 52.5 19.5T912-840v120h-72ZM480-480Z"/></svg>

                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-gray-500 py-4">No categories found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $categories->links() }}
        </div>
    </div>

</div>

<x-footer-user />

</body>
</html>