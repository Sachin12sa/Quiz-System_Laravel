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
                    class="w-full px-4 py-2 border rounded-xl border-gray-400 focus:outline-none focus:ring"
                >
                {{-- @error('category')
                <div>{{$message}}</div>
                @enderror --}}

                <button
                    type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 rounded-xl py-2 text-white"
                >
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
                            <td class="p-2 border text-red-500 cursor-pointer">
                                <a href="/category/delete/{{ $category->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="currentColor">
                                        <path d="M312-144q-29.7 0-50.85-21.15Q240-186.3 240-216v-480h-48v-72h192v-48h192v48h192v72h-48v479.57Q720-186 698.85-165T648-144H312Zm336-552H312v480h336v-480ZM384-288h72v-336h-72v336Zm120 0h72v-336h-72v336ZM312-696v480-480Z"/>
                                    </svg>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
