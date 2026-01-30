<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    @vite('resources\css\app.css')
</head>
<body>
    <x-navbar name={{$name}}></x-navbar>
        <div class="flex flex-col items-center min-h-screen pt-8">
                   <div class="bg-white mt-10 p-6 rounded-xl shadow-lg w-full max-w-3xl">
            <h2 class="text-2xl text-green-600 mb-4 text-center">
                User List
            </h2>

            <table class="w-full border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-2 border">User ID</th>
                        <th class="p-2 border">Name</th>
                        <th class="p-2 border">Email</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $key=>$user)
                <tr class="text-center even:bg-gray-100">
                    <td class="p-2 border">{{ $key+1}}</td>
                    <td class="p-2 border">{{ $user->name }}</td>
                    <td class="p-2 border">{{ $user->email }}</td>
 
                </tr>
                @endforeach
                </tbody>

            </table>
            <div class="mb-7 mt-5">
                    {{$users->links()}}
                </div>
        </div>

        </div>
    
</body>
</html>