<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Users</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">

    <!-- Navbar -->
    <x-navbar :name="$name" />

    <!-- Main Container -->
    <div class="flex flex-col items-center min-h-screen pt-10 px-4">

        <!-- Card -->
        <div class="bg-white mt-8 p-6 rounded-2xl shadow-lg w-full max-w-4xl overflow-x-auto">
            
            <!-- Title -->
            <h2 class="text-2xl text-green-700 font-bold mb-6 text-center">
                User List
            </h2>

            <!-- Table -->
            <table class="w-full border border-gray-300 text-sm md:text-base">
                <thead class="bg-green-50 text-green-900 font-semibold">
                    <tr>
                        <th class="p-3 border-b text-left">User ID</th>
                        <th class="p-3 border-b text-left">Name</th>
                        <th class="p-3 border-b text-left">Email</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($users as $key => $user)
                    <tr class="hover:bg-green-50 transition">
                        <td class="p-2 border">{{ $key + 1 }}</td>
                        <td class="p-2 border">{{ $user->name }}</td>
                        <td class="p-2 border">{{ $user->email }}</td>
                    </tr>
                    @endforeach
                    @if($users->isEmpty())
                    <tr>
                        <td colspan="3" class="text-center p-4 text-gray-500">No users found</td>
                    </tr>
                    @endif
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-6 mb-4 flex justify-center">
                {{ $users->links() }}
            </div>
        </div>

    </div>

</body>
</html>