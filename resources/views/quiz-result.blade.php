<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Categories</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
<x-user-navbar />

<div class="flex flex-col min-h-screen items-center bg-gray-100">
    <h1 class="text-4xl font-bold text-green-900 pt-10 p-5 ">Quiz Result</h1>
  
    <div class="bg-white mt-10 p-6 rounded-xl shadow-lg w-full max-w-3xl">
        @if($correctAnswer*100/count($resultData)>70)
            <a class="text-green-500 font-bold block" href="/certificate">View and Download Certificate</a>
            @endif
            <h2 class="text-2xl text-green-900   mb-4 text-center">
                {{$correctAnswer}} out of {{count($resultData)}} 
            </h2>

            <table class="w-full border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-2 border">S.No</th>
                        <th class="p-2 border">Question</th> 
                        <th class="p-2 border">Result</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($resultData as $key=> $item)
                <tr class="text-center even:bg-gray-100">
                    <td class="p-2 border">{{ $key+1}}</td>
                    <td class="p-2 border">{{ $item->question}}</td>
                    @if($item->is_correct)
                    <td class="p-2 border text-green-500">Correct</td>
                    @else
                    <td class="p-2 border text-red-500">Incorrect</td>
                    @endif
                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
</div>
<x-footer-user> </x-footer-user>

</body>