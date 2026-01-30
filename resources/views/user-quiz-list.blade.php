<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Name : {{str_replace('-',' ',$category)}}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<x-user-navbar/>


<div class="flex flex-col items-center min-h-screen pt-8 w-full">
    <h2 class="text-2xl text-center text-green-800 font-bold mb-4 pt-7">
        Category Name: {{str_replace('-',' ',$category)}}
    </h2>

    <div class="bg-white mt-4 p-6 rounded-xl shadow-lg w-full max-w-3xl overflow-x-auto">
        <table class="w-full border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2 border">Quiz ID</th>
                    <th class="p-2 border">Name</th>
                    <th class="p-2 border">Mcq Count</th>
                    <th class="p-2 border">Action</th>

                </tr>
            </thead>
            <tbody>
                @forelse($quizData as $item)
                <tr class="text-center even:bg-gray-100">
                    <td class="p-2 border">{{ $item->id }}</td>
                    <td class="p-2 border">{{ $item->name }}</td>
                      <td class="p-2 border">{{ $item->mcq_count }}</td>
                    <td class="w-30 p-2 border ">
                    <a href="/start-quiz/{{$item->id}}/{{str_replace(' ','-', $item->name)}}" class="text-green-500 font-bold ">Attempt Quiz</a>
        </td>
                </tr>
                @empty
                
                    
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
<x-footer-user> </x-footer-user>
</html>
