<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>  
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center text-gray-800">
    <div class="container mx-auto mt-10 bg-white p-6 rounded-xl shadow-lg max-w-xl">
        <h1 class="text-3xl font-bold text-center text-green-600 mb-6">Edit Task</h1>

        {{-- Edit Todo Form --}}
        <form action="{{ route('updateTasks.update', $task) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT') {{-- Use PUT method for updating --}}
            
            <div>
                <label for="title" class="block font-semibold mb-1">Title</label>
                <input type="text" id="title" name="TaskTitle" value="{{ old('TaskTitle', $task->TaskTitle) }}" class="w-full border-gray-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" placeholder="Enter task title" required>
            </div>

            <div>
                <label for="description" class="block font-semibold mb-1">Description</label>
                <textarea id="description" name="TaskDescription" class="w-full border-gray-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" rows="3" placeholder="Enter task description">{{ old('TaskDescription', $task->TaskDescription) }}</textarea>
            </div>

            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-700 transition">Update Task</button>
        </form>
        <a href="/taskShow" class="inline-block  text-green-600  mt-6">
             View Tasks
        </a>
    </div>
</body>
</html>
