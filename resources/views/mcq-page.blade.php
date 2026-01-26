<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCQs Page</title>

    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

<x-user-navbar/>


<div class="flex flex-col items-center min-h-screen pt-8 w-full">
    <h2 class="text-2xl text-center text-green-800 font-bold mb-4 pt-7">
        {{$quizName}}
    </h2>
     <h2 class="text-2xl text-center text-green-800 font-bold mb-4 pt-7">
        Question No.{{session('currentQuiz')['totalMcq']}}
    </h2>
    <h2 class="text-xl text-center text-green-800 font-bold mb-4 pt-7">
        {{session('currentQuiz')['currentMcq']}} of {{session('currentQuiz')['totalMcq']}}
    </h2>
    <div class="mt-2 p-4 bg-white shadow-2xl rounded-xl w-150">
        <h3 class="text-green-900 font-bold text-xl mb-1">{{$mcqData->question}}</h3>
        <form action="/submit-next/{{$mcqData->id}}" class="space-y-4" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$mcqData->id}}">
            <label for="option_1" class=" flex border p-3 rounded-2xl shadow-2xl cursor-pointer hover:bg-blue-50">
                <input id="option_1" class="form-radio" type="radio" value="a" name="option">
                <span class="text-green-900 pl-2">{{$mcqData->a}}</span>
            </label>
            <label for="option_2" class=" flex border p-3 rounded-2xl shadow-2xl hover:bg-blue-50 ">
                <input id="option_2" class="form-radio" type="radio" value="b" name="option">
                <span class="text-green-900 pl-2">{{$mcqData->b}}</span>
            </label>
            <label for="option_3" class=" flex border p-3 rounded-2xl shadow-2xl hover:bg-blue-50 ">
                <input id="option_3"  class="form-radio" type="radio" value="c" name="option">
                <span class="text-green-900 pl-2">{{$mcqData->c}}</span>
            </label>
            <label for="option_4" class=" flex border p-3 rounded-2xl shadow-2xl hover:bg-blue-50 ">
                <input id="option_4"  class="form-radio" type="radio" value="d" name="option">
                <span class="text-green-900 pl-2">{{$mcqData->d}}</span>
            </label>
             <button class="w-full bg-blue-500 text-white rounded-xl py-2">Submit Answer and Next</button>

        </form>

    </div>
   
</div>

</body>
<x-footer-user> </x-footer-user>
</html>
