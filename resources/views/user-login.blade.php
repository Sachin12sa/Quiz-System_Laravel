<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

<x-user-navbar />

<div class="flex items-center justify-center min-h-screen px-4">
    <div class="bg-white p-8 rounded-3xl shadow-xl w-full max-w-md">
        <!-- Success Message -->
        @if (session('message-success'))
            <div class="mb-4 text-center bg-green-100 text-green-700 p-3 rounded-lg font-semibold">
                {{ session('message-success') }}
            </div>
        @endif

        <!-- Error Message -->
        @if (session('message-error'))
            <div class="mb-4 text-center bg-red-100 text-red-700 p-3 rounded-lg font-semibold">
                {{ session('message-error') }}
            </div>
        @endif

        <h2 class="text-3xl font-extrabold text-gray-800 text-center mb-6">
            User Login
        </h2>

        <form action="{{ url('user-login') }}" method="POST" class="space-y-5">
            @csrf
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

            <button type="submit"
                    class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-3 rounded-xl shadow-md transition duration-150">
                Login
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="/user-forgot-password" class="text-green-500 hover:underline font-medium">
                Forgot Password?
            </a>
        </div>
    </div>
</div>

</body>
</html>