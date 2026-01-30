<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Categories</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans">

    <x-navbar name="{{ $name }}" />

    <!-- Success Message -->
    @if (session('success'))
    <div class="mt-6 mx-auto max-w-md bg-green-600 text-white p-4 rounded-xl shadow text-center">
        {{ session('success') }}
    </div>
    @endif

    <!-- Validation Errors -->
    @if ($errors->any())
    <div class="mt-6 mx-auto max-w-md bg-red-500 text-white p-4 rounded-xl shadow text-center">
        {{ $errors->first() }}
    </div>
    @endif

    <div class="flex flex-col items-center min-h-screen pt-10 px-4">

        <!-- Add Category Form -->
        <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Add Category</h2>

            <form action="/add-category" method="POST" class="space-y-4">
                @csrf
                <input
                    type="text"
                    name="category"
                    placeholder="Enter category name"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400"
                >
                <button
                    type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-xl font-semibold transition">
                    Add Category
                </button>
            </form>
        </div>

        <!-- Category List -->
        <div class="bg-white mt-10 p-6 rounded-2xl shadow-lg w-full max-w-4xl overflow-x-auto">
            <h2 class="text-2xl text-green-600 font-bold mb-6 text-center">Category List</h2>

            <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-green-50 text-green-800 font-semibold">
                    <tr>
                        <th class="p-3 border-b text-left">ID</th>
                        <th class="p-3 border-b text-left">Name</th>
                        <th class="p-3 border-b text-left">Creator</th>
                        <th class="p-3 border-b text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr class="even:bg-gray-50 hover:bg-green-50 transition">
                        <td class="p-3 border-b">{{ $category->id }}</td>
                        <td class="p-3 border-b font-medium">{{ $category->name }}</td>
                        <td class="p-3 border-b">{{ $category->creator }}</td>
                        <td class="p-3 border-b">
                            <div class="flex justify-center space-x-4">

                                <!-- Delete -->
                                <a href="/category/delete/{{ $category->id }}"
                                   class="text-red-500 hover:text-red-700 transition"
                                   title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" width="20px" viewBox="0 -960 960 960" fill="currentColor">
                                        <path d="M312-144q-29.7 0-50.85-21.15Q240-186.3 240-216v-480h-48v-72h192v-48h192v48h192v72h-48v479.57Q720-186 698.85-165T648-144H312Zm336-552H312v480h336v-480ZM384-288h72v-336h-72v336Zm120 0h72v-336h-72v336ZM312-696v480-480Z"/>
                                    </svg>
                                </a>

                                <!-- Quiz link -->
                                <a href="{{ url('/quiz-list/'.$category->id.'/'.$category->name) }}"
                                   class="flex items-center space-x-1 text-blue-600 hover:text-blue-800 font-semibold transition"
                                   title="View Quizzes">
                                    <span>Quizzes</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#0000FF"><path d="M240-48H120q-33 0-52.5-19.5T48-120v-120h72v120h120v72Zm480 0v-72h120v-120h72v120q0 33-19.5 52.5T840-48H720ZM480-240q-112.38 0-203.69-65.5T144-480q41-109 132.31-174.5T480-720q112.38 0 203.69 65.5T816-480q-41 109-132.31 174.5T480-240Zm-.12-72q83.12 0 152.17-44.8Q701.11-401.6 738-480q-36.84-78.4-105.8-123.2Q563.25-648 480.12-648q-83.12 0-152.17 44.8Q258.89-558.4 222-480q36.84 78.4 105.79 123.2Q396.75-312 479.88-312Zm.34-36q54.78 0 93.28-38.72t38.5-93.5q0-54.78-38.72-93.28t-93.5-38.5q-54.78 0-93.28 38.72t-38.5 93.5q0 54.78 38.72 93.28t93.5 38.5Zm-.22-72q-25 0-42.5-17.5T420-480q0-25 17.5-42.5T480-540q25 0 42.5 17.5T540-480q0 25-17.5 42.5T480-420ZM48-720v-120q0-33 19.5-52.5T120-912h120v72H120v120H48Zm792 0v-120H720v-72h120q33 0 52.5 19.5T912-840v120h-72ZM480-480Z"/></svg>

                                </a>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>