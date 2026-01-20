<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Categories</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <x-navbar name="{{ $name }}" />

            <h2 class="text-2xl text-center items-center  text-gray-800 mb-4 pt-7">
                All Current Quiz's Mcqs.
            </h2>
        

        <div class="bg-white mt-10 p-6 rounded-xl shadow-lg w-full max-w-3xl overflow-x-auto">            
           
    <table class="w-full border border-gray-300 ">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2 border">MCQ ID</th>
                <th class="p-2 border">Question</th>
                <th class="p-2 border">Options</th>
                <th class="p-2 border">Correct Answer</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mcqs as $mcq)
                <tr class="text-center even:bg-gray-100">
                    <td class="p-2 border">{{ $mcq->id }}</td>
                    <td class="p-2 border">{{ $mcq->question }}</td>
                    <td class="p-2 border">{{ $mcq->a }} | {{ $mcq->b }} | {{ $mcq->c }} | {{ $mcq->d }}</td>
                    <td class="p-2 border text-green-600 font-semibold">{{ strtoupper($mcq->correct_ans) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center p-2">No MCQs found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

    </div>

</body>
</html>
