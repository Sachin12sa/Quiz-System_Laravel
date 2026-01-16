<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin-login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
        <h2 class="text-2xl text-center text-gray-800 mb-6 ">Admin Login </h2>
        @error('user')
                <div class="text-red-500">{{$message}}</div>
                @enderror
        <form action="admin-login" method="post" class="space-y-4">
            @csrf
            <div>
                <label for="" class="text-gray-600 mb-1 ">Admin Name</label>
                <input type="text" name="name" placeholder="Enter your name"
                class="w-full px-4  py-2 border rounded-xl border-gray-500 focus:outline-none">
                @error('name')
                <div class="text-red-500">{{$message}}</div>
                @enderror
            </div>
            <div>
                <label for=""class="text-gray-600 mb-1">Password</label>
                <input type="password" name="password" placeholder="Enter your passowrd"
               class="w-full px-4  py-2 border rounded-xl border-gray-500 focus:outline-none">
               @error('password')
                <div class="text-red-500">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="w-full bg-blue-500 rounded-xl py-2 text-white ">Login</button>
        </form>
        
    </div>
    
    
</body>
</html>