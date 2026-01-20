<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>user-login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-user-navbar />
<div class="bg-gray-100 flex items-center justify-center min-h-screen">
    
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
        <h2 class="text-2xl text-center text-gray-800 mb-6 ">User login </h2>
        @error('user')
                <div class="text-red-500">{{$message}}</div>
                @enderror
            <form action="{{ url('user-login') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="text-gray-600">User Email</label>
                    <input type="email" name="email" class="w-full px-4 py-2 border rounded-xl">
                    @error('email') <div class="text-red-500">{{ $message }}</div> @enderror
                </div>

                <div>
                    <label class="text-gray-600">Password</label>
                    <input type="password" name="password" class="w-full px-4 py-2 border rounded-xl">
                    @error('password') <div class="text-red-500">{{ $message }}</div> @enderror
                </div>

                <button class="w-full bg-blue-500 text-white rounded-xl py-2">
                    Login
                </button>
            </form>

        
    </div>
</div>

    
</body>
</html>