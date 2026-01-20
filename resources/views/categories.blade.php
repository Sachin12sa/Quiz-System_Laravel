<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Categories</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <x-navbar name="{{ $name }}" />

    {{-- Success Message --}}
    @if (session('success'))
        <div class="bg-green-600 p-4 text-white text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="bg-red-500 p-4 text-white text-center">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="flex flex-col items-center min-h-screen pt-8">
        <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
            <h2 class="text-2xl text-center text-gray-800 mb-6">
                Add Categories
            </h2>

            <form action="/add-category" method="POST" class="space-y-4">
                @csrf

                <input
                    type="text"
                    name="category"
                    placeholder="Enter category name"
                    class="w-full px-4 py-2 border rounded-xl border-gray-400 focus:outline-none focus:ring">

                <button
                    type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 rounded-xl py-2 text-white">
                    Add
                </button>
            </form>
        </div>

        {{-- Category List --}}
        <div class="bg-white mt-10 p-6 rounded-xl shadow-lg w-full max-w-3xl">
            <h2 class="text-2xl text-green-600 mb-4 text-center">
                Category List
            </h2>

            <table class="w-full border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-2 border">ID</th>
                        <th class="p-2 border">Name</th>
                        <th class="p-2 border">Creator</th>
                        <th class="p-2 border">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                <tr class="text-center even:bg-gray-100">
                    <td class="p-2 border">{{ $category->id }}</td>
                    <td class="p-2 border">{{ $category->name }}</td>
                    <td class="p-2 border">{{ $category->creator }}</td>
                    <td class="p-2 border">
                        <div class="flex justify-center space-x-2">
                            <!-- Delete -->
                            <a href="/category/delete/{{ $category->id }}" class="text-red-500 hover:text-red-700" title="Delete">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20px" width="20px" viewBox="0 -960 960 960" fill="currentColor">
                                    <path d="M312-144q-29.7 0-50.85-21.15Q240-186.3 240-216v-480h-48v-72h192v-48h192v48h192v72h-48v479.57Q720-186 698.85-165T648-144H312Zm336-552H312v480h336v-480ZM384-288h72v-336h-72v336Zm120 0h72v-336h-72v336ZM312-696v480-480Z"/>
                                </svg>
                            </a>

                            <!-- Quiz link -->
                            <a href="{{ url('/quiz-list/'.$category->id.'/'.$category->name) }}" class="flex items-center space-x-1 text-blue-600 hover:text-blue-800" title="View Quizzes">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#00000"><path d="M342-48q-21 0-41.5-8.5T265-80L64-281l38-38q11-11 24.5-14.5t27.5.5l86 22v-325q0-15.3 10.29-25.65Q260.58-672 275.79-672t25.71 10.35Q312-651.3 312-636v419l-112-30 116 116q5 5 11.68 8t14.32 3h174.44q34.47 0 59.01-24.68Q600-169.35 600-204v-192q0-15.3 10.29-25.65Q620.58-432 635.79-432t25.71 10.35Q672-411.3 672-396v192q0 65-45.5 110.5T516-48H342Zm18-288v-156q0-15.3 10.29-25.65Q380.58-528 395.79-528t25.71 10.35Q432-507.3 432-492v156h-72Zm120 0v-107.74q0-15.26 10.29-25.76 10.29-10.5 25.5-10.5t25.71 10.35Q552-459.3 552-444v108h-72Zm36 216H316h200Zm120-456q-89 0-165-43.5T360-744q35-81 111-124.5T636-912q89 0 165 43.5T912-744q-35 81-111 124.5T636-576Zm0-72q58.44 0 110.22-24T830-744q-32-48-83.78-72T636-840q-58.44 0-110.22 24T442-744q32 48 83.78 72T636-648Zm0-36q-25 0-42.5-17.5T576-744q0-25 17.5-42.5T636-804q25 0 42.5 17.5T696-744q0 25-17.5 42.5T636-684Z"/></svg>                    <path d="M312-144q-29.7 0-50.85-21.15Q240-186.3 240-216v-480h-48v-72h192v-48h192v48h192v72h-48v479.57Q720-186 698.85-165T648-144H312Zm336-552H312v480h336v-480ZM384-288h72v-336h-72v336Zm120 0h72v-336h-72v336ZM312-696v480-480Z"/>
                                </svg>
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
