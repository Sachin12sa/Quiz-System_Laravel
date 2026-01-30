<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User SignUp</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

<x-user-navbar />

<div class="flex items-center justify-center min-h-screen px-4">
    <div class="bg-white p-8 rounded-3xl shadow-xl w-full max-w-md">
        <h2 class="text-3xl font-extrabold text-gray-800 text-center mb-6">
            User Sign Up
        </h2>

        @if(session('message-success'))
            <div class="mb-4 text-center bg-green-100 text-green-700 p-3 rounded-lg font-semibold">
                {{ session('message-success') }}
            </div>
        @endif

        @if(session('message-error'))
            <div class="mb-4 text-center bg-red-100 text-red-700 p-3 rounded-lg font-semibold">
                {{ session('message-error') }}
            </div>
        @endif

        @error('user')
            <div class="text-red-500 mb-2 text-center">{{ $message }}</div>
        @enderror

        <form action="{{ url('user-signup') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-gray-600 mb-1">Name</label>
                <input type="text" name="name" placeholder="Enter your name"
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-400 focus:outline-none">
                @error('name') <p class="text-red-500 mt-1 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-gray-600 mb-1">Email</label>
                <input type="email" name="email" placeholder="Enter your email"
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-400 focus:outline-none">
                @error('email') <p class="text-red-500 mt-1 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-gray-600 mb-1">Password</label>
                <input type="password" name="password" placeholder="Enter your password"
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-400 focus:outline-none">
                @error('password') <p class="text-red-500 mt-1 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-gray-600 mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation" placeholder="Confirm your password"
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-400 focus:outline-none">
            </div>

            <button type="submit"
                    class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-3 rounded-xl shadow-md transition duration-150">
                Sign Up
            </button>
        </form>

        <p class="mt-4 text-center text-gray-600">
            Already have an account? 
            <a href="/user-login" class="text-green-500 font-medium hover:underline">Login here</a>
        </p>
    </div>
</div>

</body>
</html>