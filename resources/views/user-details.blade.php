<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details Page</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
<x-user-navbar />
<div class="flex flex-col min-h-screen items-center bg-gray-100">
    <h1 class="text-4xl font-bold text-green-900 pt-10 p-5 ">User Attempted Quiz</h1>

    <div class="bg-white mt-10 p-6 rounded-xl shadow-lg w-full max-w-3xl">
     

            <table class="w-full border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-2 border w-50">S.No</th>
                        <th class="p-2 border w-100">Name</th> 
                        <th class="p-2 border w-50">status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($quizRecord as $key=> $record)
                <tr class="text-center even:bg-gray-100">
                    <td class="p-2 border w-50 ">{{ $key+1 }}</td>
                    <td class="p-2 border w-100">{{ $record->name }}</td>
                    <td class="p-2 border w-50">
                        @if($record->status==2)
                        <span class="text-green-500">Completed</span>
                        @else
                        <span class="text-orange-500">Not Complete</span>
                        @endif
                    </td>
                    
                </tr>
                @endforeach
                </tbody>
                
        </div>
        

            </table>
        </div>
         <div class="mb-7 mt-5">
                    {{$quizRecord->links()}}
                </div>
</div>
<x-footer-user> </x-footer-user>

</body>