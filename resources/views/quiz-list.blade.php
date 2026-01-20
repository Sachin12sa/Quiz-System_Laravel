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

<div class="flex flex-col items-center min-h-screen pt-8 w-full">
    <h2 class="text-2xl text-center text-gray-800 mb-4 pt-7">
        Category Name: {{ $category }}
    </h2>

    <div class="bg-white mt-4 p-6 rounded-xl shadow-lg w-full max-w-3xl overflow-x-auto">
        <table class="w-full border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2 border">Quiz ID</th>
                    <th class="p-2 border">Name</th>

                    <th class="p-2 border">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($quizData as $item)
                <tr class="text-center even:bg-gray-100">
                    <td class="p-2 border">{{ $item->id }}</td>
                    <td class="p-2 border">{{ $item->name }}</td>
                    <td class="w-30 p-2 border ">
                        <a href="/show-quiz/{{ $item->id }}/{{ $item->name}}" class="text-red-500 hover:text-red-700 ">
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#00000"><path d="M240-48H120q-33 0-52.5-19.5T48-120v-120h72v120h120v72Zm480 0v-72h120v-120h72v120q0 33-19.5 52.5T840-48H720ZM480-240q-112.38 0-203.69-65.5T144-480q41-109 132.31-174.5T480-720q112.38 0 203.69 65.5T816-480q-41 109-132.31 174.5T480-240Zm-.12-72q83.12 0 152.17-44.8Q701.11-401.6 738-480q-36.84-78.4-105.8-123.2Q563.25-648 480.12-648q-83.12 0-152.17 44.8Q258.89-558.4 222-480q36.84 78.4 105.79 123.2Q396.75-312 479.88-312Zm.34-36q54.78 0 93.28-38.72t38.5-93.5q0-54.78-38.72-93.28t-93.5-38.5q-54.78 0-93.28 38.72t-38.5 93.5q0 54.78 38.72 93.28t93.5 38.5Zm-.22-72q-25 0-42.5-17.5T420-480q0-25 17.5-42.5T480-540q25 0 42.5 17.5T540-480q0 25-17.5 42.5T480-420ZM48-720v-120q0-33 19.5-52.5T120-912h120v72H120v120H48Zm792 0v-120H720v-72h120q33 0 52.5 19.5T912-840v120h-72ZM480-480Z"/></svg>
            </a> 
        </td>
                </tr>
                @empty
                
                    
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
