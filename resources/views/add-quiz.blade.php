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

    <div class="flex flex-col items-center min-h-screen pt-8 px-4">

        <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">

            {{-- Add Quiz Form --}}
            @if(!session('quizDetails'))
                <h2 class="text-2xl text-center text-gray-800 font-bold mb-6">Add Quiz</h2>

                <form action="{{ route('add.quiz') }}" method="POST" class="space-y-4">                
                    @csrf

                    <input type="text" name="quiz" placeholder="Enter Quiz Name"
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400">
                    @error('quiz')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror

                    <select name="category_id"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <button type="submit"
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-xl font-semibold transition">
                        Add Quiz
                    </button>
                </form>

            @else
                {{-- Quiz Details & Add MCQs --}}
                <h2 class="text-2xl text-center text-gray-800 font-bold mb-4">Quiz: <span class="text-green-600">{{ $quizDetails->name }}</span></h2>
                <p class="text-center text-gray-700 mb-6">
                    Total MCQs: <span class="font-semibold">{{ $totalMCQs }}</span>
                    @if($totalMCQs > 0)
                        <a href="{{ url('/show-quiz/'.$quizDetails->id) }}" class="text-yellow-500 ml-2 hover:underline">Show All MCQs</a>
                    @endif
                </p>

                <h2 class="text-2xl text-center text-gray-800 font-bold mb-4">Add MCQs</h2>

                <form action="add-mcq" method="post" class="space-y-4">
                    @csrf

                    <textarea name="question" placeholder="Enter your question"
                              class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400"></textarea>
                    @error('question') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                    <input type="text" name="a" placeholder="Option A" class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400">
                    @error('a') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                    <input type="text" name="b" placeholder="Option B" class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400">
                    @error('b') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                    <input type="text" name="c" placeholder="Option C" class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400">
                    @error('c') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                    <input type="text" name="d" placeholder="Option D" class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400">
                    @error('d') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                    <select name="correct_ans" class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400">
                        <option value="">Select Correct Answer</option>
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                    </select>
                    @error('correct_ans') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

                    <div class="flex flex-col space-y-3">
                        <button type="submit" name="submit" value="add-more" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-xl transition">
                            Add More
                        </button>

                        <button type="submit" name="submit" value="done" class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-xl transition">
                            Done & Submit
                        </button>

                        <a href="/end-quiz" class="w-full block text-center bg-gray-500 hover:bg-gray-600 text-white py-3 rounded-xl transition">
                            Finish & Return
                        </a>
                    </div>
                </form>

            @endif

        </div>
    </div>

</body>
</html>