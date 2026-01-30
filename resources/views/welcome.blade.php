<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz System Home Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans">

<x-user-navbar />

<!-- Success Message -->
@if (session('message-success'))
<div class="mt-6 text-center">
    <p class="text-green-600 font-semibold bg-green-100 inline-block px-4 py-2 rounded-lg shadow">
        {{ session('message-success') }}
    </p>
</div>
@endif

<!-- Main Content -->
<div class="flex flex-col items-center min-h-screen pt-12 px-4 sm:px-6 lg:px-8">

    <!-- Page Title -->
    <h1 class="text-4xl md:text-5xl font-extrabold text-green-900 mb-8 text-center">
        Test Your Skills
    </h1>

    <!-- Search Box -->
    <div class="w-full max-w-md mb-12">
        <form action="search-quiz" method="get" class="relative">
            <input 
                class="w-full px-5 py-3 pr-12 rounded-3xl border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400" 
                type="text" 
                name="search" 
                placeholder="Search quizzes..." 
            />
            <button type="submit" class="absolute right-3 top-3 text-gray-500 hover:text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                    <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/>
                </svg>
            </button>
        </form>
    </div>

    <!-- Top Categories -->
    <div class="w-full max-w-4xl bg-white p-6 rounded-2xl shadow-lg mb-12">
        <h2 class="text-2xl text-green-900 font-bold mb-6 text-center">Top Categories</h2>
        <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-green-50 text-green-900">
                <tr>
                    <th class="p-3 text-left border-b">#</th>
                    <th class="p-3 text-left border-b">Name</th>
                    <th class="p-3 text-left border-b">Creator</th>
                    <th class="p-3 text-left border-b">Quizzes</th>
                    <th class="p-3 text-left border-b">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key=> $category)
                <tr class="even:bg-gray-50 hover:bg-green-50 transition">
                    <td class="p-3 border-b">{{ $key+1 }}</td>
                    <td class="p-3 border-b font-medium">{{ $category->name }}</td>
                    <td class="p-3 border-b">{{ $category->creator }}</td>
                    <td class="p-3 border-b">{{ $category->quizzes_count }}</td>
                    <td class="p-3 border-b">
                        <a href="{{ url('user-quiz-list/'.$category->id.'/'. str_replace(' ','-',$category->name)) }}" 
                           class="text-green-600 hover:text-green-800 font-semibold flex items-center space-x-1">
                            <span>View</span>
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#008000"><path d="M240-48H120q-33 0-52.5-19.5T48-120v-120h72v120h120v72Zm480 0v-72h120v-120h72v120q0 33-19.5 52.5T840-48H720ZM480-240q-112.38 0-203.69-65.5T144-480q41-109 132.31-174.5T480-720q112.38 0 203.69 65.5T816-480q-41 109-132.31 174.5T480-240Zm-.12-72q83.12 0 152.17-44.8Q701.11-401.6 738-480q-36.84-78.4-105.8-123.2Q563.25-648 480.12-648q-83.12 0-152.17 44.8Q258.89-558.4 222-480q36.84 78.4 105.79 123.2Q396.75-312 479.88-312Zm.34-36q54.78 0 93.28-38.72t38.5-93.5q0-54.78-38.72-93.28t-93.5-38.5q-54.78 0-93.28 38.72t-38.5 93.5q0 54.78 38.72 93.28t93.5 38.5Zm-.22-72q-25 0-42.5-17.5T420-480q0-25 17.5-42.5T480-540q25 0 42.5 17.5T540-480q0 25-17.5 42.5T480-420ZM48-720v-120q0-33 19.5-52.5T120-912h120v72H120v120H48Zm792 0v-120H720v-72h120q33 0 52.5 19.5T912-840v120h-72ZM480-480Z"/></svg>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Top Quizzes -->
    <div class="w-full max-w-4xl bg-white p-6 rounded-2xl shadow-lg mb-12 overflow-x-auto">
        <h2 class="text-2xl text-green-900 font-bold mb-6 text-center">Top Quizzes</h2>
        <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-green-50 text-green-900">
                <tr>
                    <th class="p-3 text-left border-b">Name</th>
                    <th class="p-3 text-left border-b">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($quizData as $item)
                <tr class="even:bg-gray-50 hover:bg-green-50 transition">
                    <td class="p-3 border-b font-medium">{{ $item->name }}</td>
                    <td class="p-3 border-b">
                        <a href="/start-quiz/{{$item->id}}/{{$item->name}}" class="text-green-600 hover:text-green-800 font-semibold">
                            Attempt Quiz
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="2" class="p-3 text-center text-gray-500">No quizzes found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

<x-footer-user></x-footer-user>

</body>
</html>