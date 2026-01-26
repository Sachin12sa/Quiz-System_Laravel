<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Home</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
<x-user-navbar />
<div class="flex flex-col min-h-screen items-center bg-gray-100">
    <h1 class="text-4xl font-bold text-green-900 pt-10 p-5 ">Check Yours Skills</h1>
    <div class="w-full max-w-md">
        <div class="relative"> 
            <form action="search-quiz" method="get">
            
            <input class="w-full px-4 py-3 text-gray-700 border border-gray-300 rounded-2xl shadow" type="text" name="search" placeholder="search quiz......">
            <button class="absolute right-2 top-3">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#00000"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>            </button>
                </form>
            </div>
    </div>
    <div class="bg-white mt-10 p-6 rounded-xl shadow-lg w-full max-w-3xl">
            <h2 class="text-2xl text-green-900   mb-4 text-center">
                Category List
            </h2>

            <table class="w-full border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-2 border">S.No</th>
                        <th class="p-2 border">Name</th> 
                        <th class="p-2 border">Creator</th>
                        <th class="p-2 border">Quiz Count</th>
                        <th class="p-2 border">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($categories as $key=> $category)
                <tr class="text-center even:bg-gray-100">
                    <td class="p-2 border">{{ $key+1 }}</td>
                    <td class="p-2 border">{{ $category->name }}</td>
                    <td class="p-2 border">{{ $category->creator }}</td>
                     <td class="p-2 border">{{ $category->quizzes_count }}</td>
                    <td class="p-2 border">
                        <div class="flex justify-center space-x-2">
                            

                
                        <a href="{{ url('user-quiz-list/'.$category->id.'/'.$category->name) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#00000"><path d="M342-48q-21 0-41.5-8.5T265-80L64-281l38-38q11-11 24.5-14.5t27.5.5l86 22v-325q0-15.3 10.29-25.65Q260.58-672 275.79-672t25.71 10.35Q312-651.3 312-636v419l-112-30 116 116q5 5 11.68 8t14.32 3h174.44q34.47 0 59.01-24.68Q600-169.35 600-204v-192q0-15.3 10.29-25.65Q620.58-432 635.79-432t25.71 10.35Q672-411.3 672-396v192q0 65-45.5 110.5T516-48H342Zm18-288v-156q0-15.3 10.29-25.65Q380.58-528 395.79-528t25.71 10.35Q432-507.3 432-492v156h-72Zm120 0v-107.74q0-15.26 10.29-25.76 10.29-10.5 25.5-10.5t25.71 10.35Q552-459.3 552-444v108h-72Zm36 216H316h200Zm120-456q-89 0-165-43.5T360-744q35-81 111-124.5T636-912q89 0 165 43.5T912-744q-35 81-111 124.5T636-576Zm0-72q58.44 0 110.22-24T830-744q-32-48-83.78-72T636-840q-58.44 0-110.22 24T442-744q32 48 83.78 72T636-648Zm0-36q-25 0-42.5-17.5T576-744q0-25 17.5-42.5T636-804q25 0 42.5 17.5T696-744q0 25-17.5 42.5T636-684Z"/></svg>                    <path d="M312-144q-29.7 0-50.85-21.15Q240-186.3 240-216v-480h-48v-72h192v-48h192v48h192v72h-48v479.57Q720-186 698.85-165T648-144H312Zm336-552H312v480h336v-480ZM384-288h72v-336h-72v336Zm120 0h72v-336h-72v336ZM312-696v480-480Z"/>
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
</div>
<x-footer-user> </x-footer-user>

</body>