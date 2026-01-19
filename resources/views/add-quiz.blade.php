<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Quiz Page</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <x-navbar name="{{ $name }}" />
    <div class="flex flex-col items-center min-h-screen pt-8">
        <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
            @if(!session('quizDetails'))
                
            

            <h2 class="text-2xl text-center text-gray-800 mb-6">
                Add Quiz
            </h2>

                <form action="{{ route('add.quiz') }}" method="POST" class="space-y-4">                
                @csrf
                <input
                    type="text"
                    name="quiz"
                    placeholder="Enter Quiz name"
                    class="w-full px-4 py-2 border rounded-xl border-gray-400 focus:outline-none focus:ring"
                >
              <select name="category_id" type="text" class="w-full px-4 py-2 border rounded-xl border-gray-400 focus:outline-none focus:ring">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
                

              </select>

                <button
                    type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 rounded-xl py-2 text-white"
                >
                    Add
                </button>
            </form>
            @else
                <span class="text-green-500 font-bold">
                    Quiz : {{ $quizDetails->name }}
                </span>
            <h2 class="text-2xl text-center text-gray-800 mb-6">
                Add MCQs
            </h2>
            <form action="add-mcq" method="post" class="space-y-4">
                @csrf
                 <textarea
                    type="text"
                    name="question"
                    placeholder="Enter your Question"
                    class="w-full px-4 py-2 border rounded-xl border-gray-400 focus:outline-none focus:ring"
                ></textarea>
                 <input
                    type="text" name="a" placeholder="Enter first Question"
                    class="w-full px-4 py-2 border rounded-xl border-gray-400 focus:outline-none focus:ring"
                >
                <input
                    type="text" name="b" placeholder="Enter second Question"
                    class="w-full px-4 py-2 border rounded-xl border-gray-400 focus:outline-none focus:ring"
                >
                <input
                    type="text" name="c" placeholder="Enter third Question"
                    class="w-full px-4 py-2 border rounded-xl border-gray-400 focus:outline-none focus:ring"
                >
                <input
                    type="text" name="d" placeholder="Enter fourth Question"
                    class="w-full px-4 py-2 border rounded-xl border-gray-400 focus:outline-none focus:ring"
                >
                <select
                    type="text" name="correct_ans" placeholder="Enter first Question"
                    class="w-full px-4 py-2 border rounded-xl border-gray-400 focus:outline-none focus:ring">
                    <option value="">Select Right Answer</option>
                    <option value="a">A</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                    <option value="d">D</option>
            </select>
            <button
                    type="submit"
                    name="submit"
                    value="add-more"
                    class="w-full bg-blue-500 hover:bg-blue-600 rounded-xl py-2 text-white">
                    Add More
                </button>
                <button
                    type="submit"
                    name="submit"
                    value="done"
                    class="w-full bg-green-500 hover:bg-blue-600 rounded-xl py-2 text-white">
                    Added and Submit
            </button>

            </form>
            @endif
        </div>

</body>
</html>