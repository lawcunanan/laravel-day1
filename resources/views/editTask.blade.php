<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>  
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center text-gray-800">
    <div class="container mx-auto mt-10 bg-gray-50 p-8 rounded-lg shadow-2xl max-w-md w-full">
        <h1 class="text-2xl font-bold text-center text-blue-700 mb-6">Edit Task</h1>

        {{-- Edit Todo Form --}}
        <form action="{{ route('updateTasks.update', $task) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT') {{-- Use PUT method for updating --}}
            
            <div>
                <label for="title" class="block font-semibold mb-1">Title</label>
                <input type="text" id="title" name="TaskTitle" value="{{ old('TaskTitle', $task->TaskTitle) }}" class="w-full bg-white border-gray-300 rounded-md p-2 text-black focus:ring-blue-500 focus:border-blue-500" placeholder="Enter task title" required>
            </div>

            <div>
                <label for="description" class="block font-semibold mb-1">Description</label>
                <textarea id="description" name="TaskDescription" class="w-full bg-white border-gray-300 rounded-md p-2 text-black focus:ring-blue-500 focus:border-blue-500" rows="3" placeholder="Enter task description">{{ old('TaskDescription', $task->TaskDescription) }}</textarea>
            </div>

            <button type="submit" class="text-sm w-full bg-blue-700 text-white py-1 rounded hover:bg-blue-800 transition">Update Task</button>
        </form>
        <a href="/taskShow" class="inline-block  text-blue-700  mt-6">
             View Tasks
        </a>
    </div>
</body>
</html>
