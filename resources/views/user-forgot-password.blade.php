<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>user-forgot-password</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-user-navbar />
<div class="bg-gray-100 flex items-center justify-center min-h-screen">
    
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
        <h2 class="text-2xl text-center text-gray-800 mb-6 ">Forgot Password  </h2>
        @error('user')
                <div class="text-red-500">{{$message}}</div>
                @enderror
            <form action="/user-forgot-password" method="POST" class="space-y-4">
                @csrf
                <div>
                  
                    <input type="email" name="email" placeholder="Enter your Email Id" class="w-full px-4 py-2 border rounded-xl">
                    @error('email') <div class="text-red-500">{{ $message }}</div> @enderror
                </div>

              
                <button class="w-full bg-blue-500 text-white rounded-xl py-2">
                    Submit
                </button>
            </form>

        
    </div>
</div>

    
</body>
</html>