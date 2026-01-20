<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Quiz List</title>

    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

<x-user-navbar/>


<div class="flex flex-col items-center min-h-screen pt-8 w-full">
    <h2 class="text-4xl text-center text-green-800 font-bold mb-4 pt-7">
        {{$quizName}}
    </h2>
    <h2 class="text-2xl text-center text-green-800 mb-6 font-bold">This Quiz contain {{$quizCount}} Questions and no limit to attent this Quiz </h2>
    <h3>GoodLuck</h3>
    @if(session('user'))
    <a href="/mcq/{{session('firstMCQ')->id.'/'.$quizName}}" type="submit" class=" bg-blue-400 rounded-md py-2 px-4 py-5 text-white ">Start Quiz</a>
    @else
        <a href="/user-signup-quiz" type="submit" class=" bg-blue-400 rounded-md py-2 px-4 py-5 text-white ">Signup for Start Quiz</a>
        <a href="/user-login-quiz" type="submit" class=" bg-blue-400 rounded-md py-2 px-4 py-5  text-white ">Login for Start Quiz</a>

        @endif
</div>

</body>
<x-footer-user> </x-footer-user>
</html>
